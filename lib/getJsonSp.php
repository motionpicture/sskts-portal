<?php
/**
 * SPサイトで使用されている
 *
 * @todo スケジュール取得関係をひとつにまとめたい（getJson.php、getJsonSp.php、getSchedule.php）
 */

require_once 'const.php';
require_once APP_ROOT_DIR . '/vendor/autoload.php';

use Cinemasunshine\Schedule\Theater;


/**
 * 劇場のxmlを取得
 *
 * Return valuds:
 *  エラーの時はerrorだけ。
 *  * error        string
 *  * attention    string
 *  * theater_code string
 *  * data         \SimpleXMLElement
 *
 * @param string $name 劇場名
 * @param string $pre
 * @return array
 */
function targetTheater($name, $pre = null) {

    $isPre = ($pre !== null);

    // @todo ライブラリで判断したい
    $hasTestApiTheaterList = array(
        'kitajima', 'aira',
    );
    $useTestApi = (APP_ENV !== 'prod' && in_array($name, $hasTestApiTheaterList));

    try {
        $theater = new Theater($name, $useTestApi);

        $response = $isPre
                  ? $theater->fetchPreSchedule()
                  : $theater->fetchSchedule();

        /** @var \SimpleXMLElement */
        $schedules = $response->getContents();

    } catch (Exception $e) {
        // @todo ログを出すなり、エラーコードを細かく設定するなり
        $result["error"] = '222222';
		return $result;
    }

    if ($schedules->error != "000000"){
        //エラーコードの場合
        $result["error"] = "$schedules->error";
    } else {
        $result["error"]     = "$schedules->error";
        $result["attention"] = "$schedules->attention";
        $result["data"]      = $schedules->schedule;

        // SSKTS-60
        $result['theater_code'] = isset($schedules->theater_code)
                                ? (string) $schedules->theater_code
                                : null;
    }

	return $result;
}

//作品一覧を取得
function getScheduleSp($theater,$date,$pre=null) {

	if ($pre != null) {
		$result = targetTheater($theater,$pre);
	} else {
		$result = targetTheater($theater);
	}
	foreach ($result['data'] as $schedule) {
		if($date == $schedule->date) {
			$result["data"] =$schedule;
			break;
		}
	}

    if ($theater === 'aira' || $theater === 'kitajima') {
        $data = $result['data'];

        foreach ($data->movie as $movie) {
            convertTicketingURL($result['theater_code'], $movie, (string) $data->date) ;
        }

    }

	return $result;
}

//指定作品のみ出力
function getScheduleMovieSp($theater,$date,$movie_code) {

	$result = targetTheater($theater);
	foreach ($result['data'] as $sKey =>$schedule) {
		if($schedule->date == $date) {
			foreach($schedule->movie as $mKey => $movie) {
				if($movie->movie_code == $movie_code) {
					//movieのみ格納
					$r_schedule['date'] ="$schedule->date";
					$r_schedule['usable'] ="$schedule->usable";

                    if ($theater === 'aira' || $theater === 'kitajima') {
                        convertTicketingURL($result['theater_code'], $movie, $r_schedule['date']);
                    }

					$r_schedule['movie'] =$movie;

					$return['error'] = $result['error'];
					$return['attention'] = $result['attention'];

					$return["data"] = $r_schedule;
					break;
				}

			}
		}
	}
	return $return;

}

/**
 * チケッティングURLを変換
 *
 * 既存のリンクを新チケッティングへ変更する
 * 引数に設定したXMLデータがそのまま変更されるので、
 * 必要に応じて渡す前にcloneなどする。
 *
 * @link https://m-p.backlog.jp/view/SSKTS-60
 * @link https://m-p.backlog.jp/view/SSKTS-635
 * @param string            $theaterCode
 * @param \SimpleXMLElement $movie
 * @param string            $date 日付（YYYYMMDD）
 * @throws \InvalidArgumentException
 */
function convertTicketingURL($theaterCode, \SimpleXMLElement $movie, $date) {

    if (isset($theaterCode) === false) {
        throw new \InvalidArgumentException('required "theater_code"');
    }

    $theaterCode    = sprintf('%03d', $theaterCode);
    $titleCode      = (string) $movie->movie_short_code;
    $titleBranchNum = sprintf('%02d', (string) $movie->movie_branch_code);
    $dateJouei      = $date;

    foreach ($movie->screen as $screen) {
        $screenCode = (string) $screen->screen_code;

        foreach ($screen->time as $time) {
            $timeBegin = (string) $time->start_time;

            $id = $theaterCode . $titleCode . $titleBranchNum . $dateJouei . $screenCode . $timeBegin;
            $time->url = TICKETING_BASE_URL . '/purchase?id=' . $id;
        }
    }
}

function  getTimeFormat($time) {

	$h = substr($time, 0,2);
	$m = substr($time, 2,2);
	return $h.":".$m;

}

?>

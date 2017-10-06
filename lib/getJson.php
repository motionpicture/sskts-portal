<?php
/**
 * PCサイトのjsからajaxされている
 *
 * @todo スケジュール取得関係をひとつにまとめたい（getJson.php、getJsonSp.php、getSchedule.php）
 * @todo ajaxされるものは別のディレクトリにしたい（/apiとか）
 */

require_once 'const.php';
require_once APP_ROOT_DIR . '/vendor/autoload.php';

use Cinemasunshine\Schedule\Theater;

/*if (PHP_VERSION <"5.2.0") {
	include("upgrade.php");
}*/

/** @var \SimpleXMLElement */
$schedules;

//結果格納
$result;


//dateを選択した場合

//面倒なんで上から優先順のifとして処理
if(!empty($_GET["result"])) {
	if (targetTheater($_GET["theater"])) {

		if (!empty($_GET["movie"])) {
			getScheduleMovie($_GET["date"], $_GET["movie"], $_GET["theater"]);
		} else {
			getSchedule($_GET["date"], $_GET["theater"]);
		}

		//getDateList();
	}
	//劇場TOP
} else if(!empty($_GET["top"])) {
	if (targetTheater($_GET["theater"])) {
		getSchedule($_GET["date"], $_GET["theater"]);
		//getDateList();
	}
	//それ以外はエラー
}else if (!empty($_GET["theater"]) && !empty($_GET["date"])) {
	if (targetTheater($_GET["theater"])) {

		getMovieList($_GET["date"]);
		//getDateList();
	}

	//劇場を選択した場合
} else if(!empty($_GET["theater"])) {

	if (targetTheater($_GET["theater"])) {
		getDateList();
	}
} else  {
	$result["error"] ="222222";
	output($result);
}



/**
 * 劇場のxmlを取得
 *
 * @global \SimpleXMLElement $schedules
 * @global array             $result
 * @param string $name 劇場名
 * @return boolean
 */
function targetTheater($name) {
	global $schedules;
	global $result;

    // @todo ライブラリで判断したい
    $hasTestApiTheaterList = array(
        'kitajima', 'aira',
    );
    $useTestApi = (APP_ENV !== 'prod' && in_array($name, $hasTestApiTheaterList));
    
    $isPre = (isset($_GET['pre']) && $_GET['pre']);

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
		output($result);
		return false;
    }

    if ($schedules->error!= "000000"){
        // エラーコードの場合
        $result["error"] ="$schedules->error";
        output($result);
        return false;
    }

    // 正常終了
    $result["error"]     = "$schedules->error";
    $result["attention"] = "$schedules->attention";

    // SSKTS-60
    $result['theater_code'] = isset($schedules->theater_code)
                            ? (string) $schedules->theater_code
                            : null;

    return true;
}


//日付一覧を取得
function getDateList(){
	global $schedules;
	global $result;

	$dateArr;
	foreach ($schedules->schedule as $schedules) {
		//var_dump($schedules);
		$dateArr["$schedules->date"] = "$schedules->date";
	}
	$result["data"] =$dateArr;

	output($result);
}

//日付一覧を取得
function getDateListPhp(){
	global $schedules;
	global $result;

	$dateArr;
	foreach ($schedules->schedule as $schedules) {
		//var_dump($schedules);
		$dateArr["$schedules->date"] = "$schedules->date";
	}
	$dateArr;
	return $dateArr;
}

//作品一覧を取得
function getMovieList($date) {
	global $schedules;
	global $result;

	$movieArr;
	foreach ($schedules->schedule as $schedules) {
		if($date == $schedules->date) {
			foreach ($schedules->movie as $movies) {
				$movieArr["$movies->movie_code"] = "$movies->name";
			}
		}
	}
	$result["data"] =$movieArr;
	output($result);

}

//作品一覧を取得
function getSchedule($date, $theater) {
	global $schedules;
	global $result;

	$movieArr;
	foreach ($schedules->schedule as $schedule) {
		//var_dump($schedule->date);
		//var_dump($schedule->date);
		if($date == $schedule->date) {
			//foreach ($schedules->movie as $movies) {
				//$movieArr["$movies->movie_code"] = "$movies->name";
			$result["data"] =$schedule;

			//}
		}
	}

    if ($theater === 'aira' || $theater === 'kitajima') {
        $data = $result['data'];

        foreach ($data->movie as $movie) {
            convertTicketingURL($result['theater_code'], $movie, (string) $data->date) ;
        }

    }
//var_dump($result);
	output($result);

}

//指定作品のみ出力
function getScheduleMovie($date, $movie_code, $theater) {
	global $schedules;
	global $result;


	foreach ($schedules->schedule as $sKey =>$schedule) {
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


					$return['error'] =  $result['error'];
					$return['attention'] = $result['attention'];

					$return["data"] = $r_schedule;
					break;
				}

			}
		}
	}
	//var_dump($result);
	output($return);

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

function outputArray($data){
	//echo json_encode(json_decode(json_encode($data), true));
}


function output($data) {
	echo json_encode($data);
}
?>

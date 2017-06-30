<?php
require_once 'const.php';

//dateを選択した場合

//面倒なんで上から優先順のifとして処理
/*
if(!empty($_GET["result"])) {
	if (targetTheater($_GET["theater"])) {

		if (!empty($_GET["movie"])) {
			getScheduleMovie($_GET["date"], $_GET["movie"]);
		} else {
			getSchedule($_GET["date"]);
		}

		//getDateList();
	}
	//劇場TOP
} else if(!empty($_GET["top"])) {
	if (targetTheater($_GET["theater"])) {
		getSchedule($_GET["date"]);
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
*/


//
//劇場のxmlを取得
//エラーチェックもする
function targetTheater($theater,$pre = null) {

	if ($pre!=null){
		$theaterUrls= array(
            "ikebukuro"=>"http://www2.cinemasunshine.jp/ikebukuro/schedule/xml/preSchedule.xml",
            "heiwajima"=>"http://www1.cinemasunshine.jp/heiwajima/schedule/xml/preSchedule.xml",
            "tsuchiura"=>"http://www1.cinemasunshine.jp/tsuchiura/schedule/xml/preSchedule.xml",
            "kahoku"=>"http://www1.cinemasunshine.jp/kahoku/schedule/xml/preSchedule.xml",
            "numazu"=>"http://www1.cinemasunshine.jp/numazu/schedule/xml/preSchedule.xml",
            "yamatokoriyama"=>"http://www1.cinemasunshine.jp/yamatokoriyama/schedule/xml/preSchedule.xml",
            "shimonoseki"=>"http://www1.cinemasunshine.jp/shimonoseki/schedule/xml/preSchedule.xml",
            "okaido"=>"http://www1.cinemasunshine.jp/okaido/schedule/xml/preSchedule.xml",
            "kinuyama"=>"http://www1.cinemasunshine.jp/kinuyama/schedule/xml/preSchedule.xml",
            "shigenobu"=>"http://www1.cinemasunshine.jp/shigenobu/schedule/xml/preSchedule.xml",
            "ozu"=>"http://www1.cinemasunshine.jp/ozu/schedule/xml/preSchedule.xml",
            'kitajima' => PRE_SCHEDULE_KITAJIMA,
            "masaki"=>"http://www1.cinemasunshine.jp/masaki/schedule/xml/preSchedule.xml",
            'aira' => PRE_SCHEDULE_AIRA,
		);

	} else {
		$theaterUrls= array(
            "ikebukuro"=>"http://www2.cinemasunshine.jp/ikebukuro/schedule/xml/schedule.xml",
            "heiwajima"=>"http://www1.cinemasunshine.jp/heiwajima/schedule/xml/schedule.xml",
            "tsuchiura"=>"http://www1.cinemasunshine.jp/tsuchiura/schedule/xml/schedule.xml",
            "kahoku"=>"http://www1.cinemasunshine.jp/kahoku/schedule/xml/schedule.xml",
            "numazu"=>"http://www1.cinemasunshine.jp/numazu/schedule/xml/schedule.xml",
            "yamatokoriyama"=>"http://www1.cinemasunshine.jp/yamatokoriyama/schedule/xml/schedule.xml",
            "shimonoseki"=>"http://www1.cinemasunshine.jp/shimonoseki/schedule/xml/schedule.xml",
            "okaido"=>"http://www1.cinemasunshine.jp/okaido/schedule/xml/schedule.xml",
            "kinuyama"=>"http://www1.cinemasunshine.jp/kinuyama/schedule/xml/schedule.xml",
            "shigenobu"=>"http://www1.cinemasunshine.jp/shigenobu/schedule/xml/schedule.xml",
            "ozu"=>"http://www1.cinemasunshine.jp/ozu/schedule/xml/schedule.xml",
            'kitajima' => SCHEDULE_KITAJIMA,
            "masaki"=>"http://www1.cinemasunshine.jp/masaki/schedule/xml/schedule.xml",
            'aira' => SCHEDULE_AIRA,
		);
	}

    $url = $theaterUrls[$theater];

    $data = file_get_contents($url);
    $schedules = @simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);

    if(!$schedules) {
        $result["error"] ="222222";
    } else if ($schedules->error!= "000000"){
        //エラーコードの場合
        $result["error"] ="$schedules->error";
    } else {
        $result["error"] ="$schedules->error";
        $result["attention"] ="$schedules->attention";
        $result['theater_code'] = isset($schedules->theater_code) ? (string) $schedules->theater_code : null; // SSKTS-60
        //var_dump($schedules->schedule);
        $result["data"] = $schedules->schedule;
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
 * @param string $theaterCode
 * @param \SimpleXMLElement $movie
 * @param string $date 日付（YYYYMMDD）
 * @throws \LogicException
 */
function convertTicketingURL($theaterCode, \SimpleXMLElement $movie, $date) {

    if (isset($theaterCode) === false) {
        throw new \LogicException('required "theater_code"');
    }

    // @see SSKTS-453
    $theaterCode = sprintf('%03d', $theaterCode);

    $movieCode = (string) $movie->movie_short_code;
    $movieBranchCode = (string) $movie->movie_branch_code;

    foreach ($movie->screen as $screen) {
        $screenCode = (string) $screen->screen_code;

        foreach ($screen->time as $time) {
            // 施設コード + 上映日 + 作品コード + 作品枝番 + スクリーンコード + 上映開始時刻
            $param = $theaterCode . $date . $movieCode . $movieBranchCode . $screenCode . (string) $time->start_time;
            $time->url = TICKETING_BASE_URL . '/purchase?id=' . $param;
        }
    }
}

function  getTimeFormat($time) {

	$h = substr($time, 0,2);
	$m = substr($time, 2,2);
	return $h.":".$m;

}

?>

<?php
require_once 'const.php';

/*if (PHP_VERSION <"5.2.0") {
	include("upgrade.php");
}*/

//xmlパーシング格納
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



//
//劇場のxmlを取得
//エラーチェックもする
function targetTheater($theater) {
	global $schedules;
	global $result;


	if (isset($_GET['pre']) && $_GET['pre']) {
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
            "kitajima"=>"http://www1.cinemasunshine.jp/kitajima/schedule/xml/preSchedule.xml",
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
            "kitajima"=>"http://www1.cinemasunshine.jp/kitajima/schedule/xml/schedule.xml",
            "masaki"=>"http://www1.cinemasunshine.jp/masaki/schedule/xml/schedule.xml",
            'aira' => SCHEDULE_AIRA,
		);
	}

    if(isset($theaterUrls[$theater]) === false) {
		$result["error"] ="222222";
		output($result);
		return false;
	}

    $url = $theaterUrls[$theater];
    $data = file_get_contents($url);
    $schedules = @simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);

    if(!$schedules) {
        $result["error"] ="222222";
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
    $result["error"] ="$schedules->error";
    $result["attention"] ="$schedules->attention";
    $result['theater_code'] = isset($schedules->theater_code) ? (string) $schedules->theater_code : null; // SSKTS-60

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

    if ($theater === 'aira') {
        $data = $result['data'];

        foreach ($data->movie as $movie) {
            convertTicketingURL($movie, (string) $data->date) ;
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

                    if ($theater === 'aira') {
                        convertTicketingURL($movie, $r_schedule['date']);
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
 * @global array $result
 * @param \SimpleXMLElement $movie
 * @param string $date 日付（YYYYMMDD）
 * @throws \LogicException
 */
function convertTicketingURL(\SimpleXMLElement $movie, $date) {
    global $result;

    if (isset($result['theater_code']) === false) {
        throw new \LogicException('required "theater_code"');
    }

    $theaterCode = $result['theater_code'];
    $movieCode = (string) $movie->movie_short_code;
    $movieBranchCode = (string) $movie->movie_branch_code;

    foreach ($movie->screen as $screen) {
        $screenCode = (string) $screen->screen_code;

        foreach ($screen->time as $time) {
            // 施設コード + 上映日 + 作品コード + 作品枝番 + スクリーンコード + 上映開始時刻
            $param = '0' . $theaterCode . $date . $movieCode . $movieBranchCode . $screenCode . (string) $time->start_time;
            $time->url = TICKETING_BASE_URL . '/purchase?id=' . $param;
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

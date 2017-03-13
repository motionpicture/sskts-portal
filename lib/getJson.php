<?php
require_once 'cache.php';

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



//
//劇場のxmlを取得
//エラーチェックもする
function targetTheater($theater) {
	global $schedules;
	global $result;

    $cacheKeyPrefix = '';

	if (isset($_GET['pre']) && $_GET['pre']) {
        $cacheKeyPrefix = 'pre_schedule_';
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
            'aira' => 'http://www1.cinemasunshine.jp/aira/schedule/xml/preSchedule.xml',
		);

	} else {
        $cacheKeyPrefix = 'schedule_';
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
            'aira' => 'http://www1.cinemasunshine.jp/aira/schedule/xml/schedule.xml',
		);
	}

    if(isset($theaterUrls[$theater]) === false) {
		$result["error"] ="222222";
		output($result);
		return false;
	}

    $url = $theaterUrls[$theater];
    $cacheKey = $cacheKeyPrefix . $theater;
    $cache = new CinesunCache();

    if ($cache->isHit($cacheKey)) {
        $schedules = @simplexml_load_string($cache->get($cacheKey), 'SimpleXMLElement', LIBXML_NOCDATA);
    } else {
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
        } else {
            // エラーが無い場合キャッシュ
            $cache->save($cacheKey, $data, CACHE_LIFETIME);
        }
    }

    // 正常終了
    $result["error"] ="$schedules->error";
    $result["attention"] ="$schedules->attention";
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
function getSchedule($date) {
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
//var_dump($result);
	output($result);

}

//指定作品のみ出力
function getScheduleMovie($date,$movie_code) {
	global $schedules;
	global $result;


	foreach ($schedules->schedule as $sKey =>$schedule) {
		if($schedule->date == $date) {
			foreach($schedule->movie as $mKey => $movie) {
				if($movie->movie_code == $movie_code) {

					//movieのみ格納
					$r_schedule['date'] ="$schedule->date";
					$r_schedule['usable'] ="$schedule->usable";
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

function outputArray($data){
	//echo json_encode(json_decode(json_encode($data), true));
}


function output($data) {
	echo json_encode($data);
}
?>
<?php

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
						"shimonoseki"=>"http://www1.cinemasunshine.jp/shimonoseki/schedule/xml/preSchedule.xml ",
						"okaido"=>"http://www1.cinemasunshine.jp/okaido/schedule/xml/preSchedule.xml",
						"kinuyama"=>"http://www1.cinemasunshine.jp/kinuyama/schedule/xml/preSchedule.xml",
						"shigenobu"=>"http://www1.cinemasunshine.jp/shigenobu/schedule/xml/preSchedule.xml",
						"ozu"=>"http://www1.cinemasunshine.jp/ozu/schedule/xml/preSchedule.xml",
						"kitajima"=>"http://www1.cinemasunshine.jp/kitajima/schedule/xml/preSchedule.xml",
						"masaki"=>"http://www1.cinemasunshine.jp/masaki/schedule/xml/preSchedule.xml"
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
						"masaki"=>"http://www1.cinemasunshine.jp/masaki/schedule/xml/schedule.xml"

		);
	}

	$schedules = @simplexml_load_file($theaterUrls[$theater], 'SimpleXMLElement', LIBXML_NOCDATA);


	if(!$schedules) {
		$result["error"] ="222222";
	}

	//エラーコードの場合
	if ($schedules->error!= "000000"){
		$result["error"] ="$schedules->error";
	} else {

		$result["error"] ="$schedules->error";
		$result["attention"] ="$schedules->attention";
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

function  getTimeFormat($time) {

	$h = substr($time, 0,2);
	$m = substr($time, 2,2);
	return $h.":".$m;

}

?>
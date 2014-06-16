<?php



//
//劇場のxmlを取得
//エラーチェックもする
function getDates2($theater,$preTicket=false,$preIsExist=false) {
	$schedules;
	$result;

	$theaterUrls;

	if ($preTicket){
		$theaterUrls= array(
						"ikebukuro"=>"http://www2.cinemasunshine.jp/ikebukuro/schedule/xml/preSchedule.xml",
						"heiwajima"=>"http://www1.cinemasunshine.jp/heiwajima/schedule/xml/preSchedule.xml",
						"tsuchiura"=>"http://www1.cinemasunshine.jp/tsuchiura/schedule/xml/preSchedule.xml",
						"kahoku"=>"http://www1.cinemasunshine.jp/kahoku/schedule/xml/preSchedule.xml",
						"numazu"=>"http://www1.cinemasunshine.jp/numazu/schedule/xml/preSchedule.xml",
						"yamatokoriyama"=>"http://www1.cinemasunshine.jp/yamatokoriyama/schedule/xml/preSchedule.xml",
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
						"okaido"=>"http://www1.cinemasunshine.jp/okaido/schedule/xml/schedule.xml",
						"kinuyama"=>"http://www1.cinemasunshine.jp/kinuyama/schedule/xml/schedule.xml",
						"shigenobu"=>"http://www1.cinemasunshine.jp/shigenobu/schedule/xml/schedule.xml",
						"ozu"=>"http://www1.cinemasunshine.jp/ozu/schedule/xml/schedule.xml",
						"kitajima"=>"http://www1.cinemasunshine.jp/kitajima/schedule/xml/schedule.xml",
						"masaki"=>"http://www1.cinemasunshine.jp/masaki/schedule/xml/schedule.xml"

		);
	}


	$schedules = @simplexml_load_file($theaterUrls[$theater], 'SimpleXMLElement', LIBXML_NOCDATA);

	if ($preIsExist) {
		$dateArr;
		//foreach ($schedules->schedule as $schedules) {
			//var_dump($schedules);

			$dateArr["error"] = "$schedules->error";
		//}
	} else {
		$dateArr;
		foreach ($schedules->schedule as $schedule) {
				$dateArr["$schedule->date"] ["val"]= "$schedule->date";
				if(is_object($schedule->movie[0])){
					$dateArr["$schedule->date"] ["flg"]= 1;
				}else{
					$dateArr["$schedule->date"] ["flg"]= 2;
				}
				
		}
	}
	
	return $dateArr;
}

//曜日
function getYoubi2($date){
	$sday = strtotime($date);
	$res = date("w", $sday);
	$day = array("日", "月", "火", "水", "木", "金", "土");
	return $day[$res];
}

//Md のみ
function getMd2($date){
	$sday = strtotime($date);
	$res = date("m/d", $sday);
	return $res;
}

//dateのみ
function getD2($date){
	$sday = strtotime($date);
	$res = date("d", $sday);
	return $res;
}

function getPreCode2($theater) {

}
?>
<?php
require 'DB.php';
$db = new DB();
$theater = htmlspecialchars($_GET["theater"]) ;

		$sql = "
			SELECT
			    *
			FROM
			    trailers
			WHERE
			del_flg = '0'
			";


		if (isset($theater)) {
			$sql .=" and ";

			$sql .= " FIND_IN_SET($theater, theater_ids)  ";

		}

//echo $sql;


$flv_datas = $db->select($sql);

/*
datas
	data
		image
		url
		flv
	/data
/datas
flvimage
180.222.178.152/theaters_image/flvimage
180.222.178.152/theaters_image/flv
*/

$flv_path = "http://www.cinemasunshine.co.jp/theaters_image/flv/";
$image_path = "http://www.cinemasunshine.co.jp/theaters_image/flvimage/";

$xml_str .= '<?xml version="1.0" encoding="UTF-8"?>'."\n";
$xml_str .= "<datas>"."\n";


foreach($flv_datas as $flv_data){
$xml_str .= "<data>"."\n";

$xml_str .= "<image>".$image_path. $flv_data['pic_path']. "</image>"."\n";

$xml_str .= "<url>".$flv_data['url']. "</url>"."\n";

$xml_str .= "<flv>".$flv_path.$flv_data['trailer_path']. "</flv>"."\n";


//	var_dump($flv_data);

$xml_str .= "</data>"."\n";
}

$xml_str .= "</datas>"."\n";

header('Content-type: text/xml');
echo $xml_str;
?>





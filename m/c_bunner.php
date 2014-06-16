<?php
function c_bunner(){
	$path_slash = substr_count($_SERVER["SCRIPT_NAME"],'/');
	$path_self = $_SERVER["SCRIPT_NAME"];

	$top_array = array(6,2);
	$ikebukuro_array = array(14,1);
	$heiwajima_array = array(14,1);
	$matsudo_array = array(14);
	$mobara_array = array(14,2);
	$iwai_array = array(14);
	$tsuchiura_array = array(14,1);
	$kahoku_array = array(14,1);
	$numazu_array = array(14,1);
	$okaido_array = array(14);
	$kinuyama_array = array(14,1);
	$shigenobu_array = array(14);
	$ozu_array = array(14,2);
	$imabari_array = array(14,2);
	$kitajima_array = array(14,1);
	$masaki_array = array(14,1);
	$yamatokoriyama_array = array(6,1);
	$path_self = $_SERVER["SCRIPT_NAME"];

	if($path_slash == 1){
		$path = "./";
		$path_minus = null;
	}else if($path_slash == 2){
		$path = "../";
		$path_minus = "./";
	}else if($path_slash == 3){
		$path = "../../";
		$path_minus = "../";
		$payh_theater ="./";
	}else if($path_slash == 4){
		$path = "../../../";
		$path_minus = "../../";
		$payh_theater ="../";
	}else if($path_slash == 5){
		$path = "../../../../";
		$path_minus = "../../../";
		$payh_theater ="../../";
	}

	if(strpos($path_self,'ikebukuro')){
			$column_num = $ikebukuro_array;
	}else if(strpos($path_self,'heiwajima')){
			$column_num = $heiwajima_array;
	}else if(strpos($path_self,'matsudo')){
			$column_num = $matsudo_array;
	}else if(strpos($path_self,'mobara')){
			$column_num = $mobara_array;
	}else if(strpos($path_self,'iwai')){
			$column_num = $iwai_array;
	}else if(strpos($path_self,'tsuchiura')){
			$column_num = $tsuchiura_array;
	}else if(strpos($path_self,'kahoku')){
			$column_num = $kahoku_array;
	}else if(strpos($path_self,'numazu')){
			$column_num = $numazu_array;;
	}else if(strpos($path_self,'okaido')){
			$column_num = $okaido_array;
	}else if(strpos($path_self,'kinuyama')){
			$column_num = $kinuyama_array;;
	}else if(strpos($path_self,'shigenobu')){
			$column_num = $shigenobu_array;;
	}else if(strpos($path_self,'ozu')){
			$column_num = $ozu_array;;
	}else if(strpos($path_self,'imabari')){
			$column_num = $imabari_array;;
	}else if(strpos($path_self,'kitajima')){
			$column_num = $kitajima_array;
	}else if(strpos($path_self,'masaki')){
			$column_num = $masaki_array;
	}else if(strpos($path_self,'yamatokoriyama')){
			$column_num = $yamatokoriyama_array;
	}else{
			$column_num = $top_array;
	}
	$column = array(
		1 => '<div id="newsImage" style="margin-bottom:5px;"><a href="' .$path. '3d"><img src="' . $path . 'images/3d_bnr_3.gif" width="252" height="92" alt="3D劇場のご案内" /></a><a href="' .$path_theater. 'schedule/"><img src="' .$path .'/images/ebox_bnr.gif" width="252" height="92"alt="上映中作品のインターネットチケット購入はこちら"  style="margin-left:9px;" /></a></div>',
		2 => '<div id="newsImage"><a href="' .$path. '3d"> <img src="' . $path . 'images/3d_bnr_2.gif" width="513" height="92" alt="3D劇場のご案内" /></a> </div>',
		3 => '<div id="newsImage" style="margin-bottom:5px;"><a href="' .$path. 'imax/"> <img src="' . $path . 'images/imaxcv_d2.jpg" width="513" height="92" alt="IMAXカーニバル" /></a> </div>',
		4 => '<div id="newsImage" style="margin-top:0px; margin-bottom:5px;"><a href="http://campaign.cinemasunshine.co.jp/tf3_movie/" target="_blank";> <img src="' . $path . 'images/trans.jpg" width="513" height="92" alt="「トランスフォーマー/ダークサイド・ムーン」プレゼントキャンペーン" /></a></div>',
		6 => '<div id="newsImage" style="margin-bottom:5px;"><a href="' .$path. 'imax/"> <img src="' . $path . 'images/imax_con.jpg" width="513" height="92" alt="コンテイジョン×IMAX 3D" /></a> </div>',
		7 => '<div id="newsImage" style="margin-bottom:5px;"><a href="' .$path. 'imax/campaign/index.php"> <img src="' . $path . 'images/40.jpg" width="513" height="92" alt="トランスフォーマー ダークサイド・ムーン" /></a> </div>',
		8 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://www.battlela.jp/" target="_blank"> <img src="' . $path . 'images/41.jpg" width="513" height="92" alt="世界侵略：ロサンゼルス決戦" /></a> </div>',
		9 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://campaign.cinemasunshine.co.jp/apes/" target="_blank"> <img src="' . $path . 'images/42.jpg" width="513" height="92" alt="猿の惑星：創世記(ジェネシス)" /></a> </div>',
		10 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://campaign.cinemasunshine.co.jp/cowboy-alien/" target="_blank"> <img src="' . $path . 'images/43.jpg" width="513" height="92" alt="カウボーイ＆エイリアン" /></a> </div>',
		11 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://www.cinemasunshine.co.jp/magazine/magazine.html" target="_blank"> <img src="' . $path . 'images/44.jpg" width="513" height="92" alt="会員様限定割引クーポン" /></a> </div>',
		12 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://tintin-movie.jp/imax/" target="_blank"> <img src="' . $path . 'images/cam_tintin.jpg" width="513" height="92" alt="タンタンプレゼント・キャンペーン" /></a> </div>',
		13 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://campaign.cinemasunshine.co.jp/migp/" target="_blank"> <img src="' . $path . 'images/mission.jpg" width="513" height="92" alt="タンタンプレゼント・キャンペーン" /></a> </div>',
		14 => '<div id="newsImage" style="margin-bottom:5px;"><a href="http://campaign.cinemasunshine.co.jp/time/" target="_blank"> <img src="' . $path . 'images/time.jpg" width="513" height="92" alt="「Time」プレゼント・キャンペーン" /></a> </div>',
	);

	foreach ($column_num as $value){
		echo $column[$value];
	}
}
?>
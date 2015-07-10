<?php

$ref = $_SERVER["HTTP_REFERER"];

//平和島
if(preg_match("/heiwajima/",$ref)){
	header('Location: http://www.facebook.com/sunshineheiwajima/app_390773837697032');

//池袋
}elseif(preg_match("/ikebukuro/",$ref)){
	header('Location: http://www.facebook.com/sunshineikebukuro/app_390773837697032');

//土浦
}elseif(preg_match("/tsuchiura/",$ref)){
	header('Location: http://www.facebook.com/sunshinetsuchiura/app_390773837697032');

//沼津
}elseif(preg_match("/numazu/",$ref)){
	header('Location: http://www.facebook.com/sunshinenumazu/app_390773837697032');

//かほく
}elseif(preg_match("/kahoku/",$ref)){
	header('Location: http://www.facebook.com/sunshinekahoku/app_390773837697032');

//大和郡山
}elseif(preg_match("/yamatokoriyama/",$ref)){
	header('Location: http://www.facebook.com/sunshineyamatokoriyama/app_390773837697032');

//大街道・衣山・重信・大洲・今治・松前(愛媛版に飛ばす)
}elseif(preg_match("/okaido/",$ref) ||
		preg_match("/kinuyama/",$ref) ||
		preg_match("/shigenobu/",$ref) ||
		preg_match("/ozu/",$ref) ||
		preg_match("/imabari/",$ref) ||
		preg_match("/masaki/",$ref)){
	header('Location: http://www.facebook.com/sunshineehime/app_390773837697032');

//北島
}elseif(preg_match("/kitajima/",$ref)){
	header('Location: http://www.facebook.com/sunshinekitajima/app_390773837697032');

//例外
}else{
	header('Location: http://www.facebook.com/sunshineikebukuro/app_390773837697032');
}

?>
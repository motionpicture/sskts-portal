<?php

$ref = $_SERVER["HTTP_REFERER"];

//���a��
if(preg_match("/heiwajima/",$ref)){
	header('Location: http://www.facebook.com/sunshineheiwajima/app_390773837697032');

//�r��
}elseif(preg_match("/ikebukuro/",$ref)){
	header('Location: http://www.facebook.com/sunshineikebukuro/app_390773837697032');

//�y�Y
}elseif(preg_match("/tsuchiura/",$ref)){
	header('Location: http://www.facebook.com/sunshinetsuchiura/app_390773837697032');

//����
}elseif(preg_match("/numazu/",$ref)){
	header('Location: http://www.facebook.com/sunshinenumazu/app_390773837697032');

//���ق�
}elseif(preg_match("/kahoku/",$ref)){
	header('Location: http://www.facebook.com/sunshinekahoku/app_390773837697032');

//��a�S�R
}elseif(preg_match("/yamatokoriyama/",$ref)){
	header('Location: http://www.facebook.com/sunshineyamatokoriyama/app_390773837697032');

//��X���E�ߎR�E�d�M�E��F�E�����E���O(���Q�łɔ�΂�)
}elseif(preg_match("/okaido/",$ref) ||
		preg_match("/kinuyama/",$ref) ||
		preg_match("/shigenobu/",$ref) ||
		preg_match("/ozu/",$ref) ||
		preg_match("/imabari/",$ref) ||
		preg_match("/masaki/",$ref)){
	header('Location: http://www.facebook.com/sunshineehime/app_390773837697032');

//�k��
}elseif(preg_match("/kitajima/",$ref)){
	header('Location: http://www.facebook.com/sunshinekitajima/app_390773837697032');

//��O
}else{
	header('Location: http://www.facebook.com/sunshineikebukuro/app_390773837697032');
}

?>
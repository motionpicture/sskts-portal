<?php

//出力文字の取得
$setstring = $_GET['setstring'];
if ($setstring == '') {
	$setstring = $_POST['setstring'];
}

$pathinfo = pathinfo($setstring);

$ext = $pathinfo['extension'];
//$ext = "jpg";

if ($ext == 'jpg' || $ext == 'jpeg') {


	//画像の作成
	$i = 100;

	$srcImage = imagecreatefromjpeg($setstring);
	$width = ImageSX($srcImage);
	$height = ImageSY($srcImage);
	//imagedestroy($img);

	$dstWidth = $width;
	$dstHeight = $height;

	while(true) {
		if ($dstWidth > 550) {
			$dstWidth = round($width*($i/100));
			$dstHeight = round($height*($i/100));

		} else {
			break;
		}
		$i= $i-3;
	}


	$dstImage = imagecreatetruecolor($dstWidth,$dstHeight);
	ImageCopyResampled($dstImage, $srcImage,    0,          0,      0,       0, $dstWidth, $dstHeight, $width, $height);
	header("Content-Type: image/jpeg");
	imagejpeg($dstImage,"",100);
	imagedestroy($srcImage);
	imagedestroy($dstImage);



} elseif ($ext == 'gif') {

	//画像の作成
	$srcImage = imagecreatefromgif($setstring);


	$width = ImageSX($srcImage);
	$height = ImageSY($srcImage);
	//imagedestroy($img);

	$dstWidth = $width;
	$dstHeight = $height;

	while(true) {
		if ($dstWidth > 550) {
			$dstWidth = round($width*($i/100));
			$dstHeight = round($height*($i/100));

		} else {
			break;
		}
		$i= $i-3;
	}


	$dstImage = imagecreatetruecolor($dstWidth,$dstHeight);
	ImageCopyResampled($dstImage, $srcImage,    0,          0,      0,       0, $dstWidth, $dstHeight, $width, $height);
	header("Content-Type: image/jpeg");
	imagejpeg($dstImage,"",100);
	imagedestroy($srcImage);
	imagedestroy($dstImage);


	//jpg gif png 以外はjpgに変換
} elseif ($ext == 'png') {

	//画像の作成
	$srcImage = imagecreatefrompng($setstring);
	$width = ImageSX($srcImage);
	$height = ImageSY($srcImage);
	//imagedestroy($img);

	$dstWidth = $width;
	$dstHeight = $height;

	while(true) {
		if ($dstWidth > 550) {
			$dstWidth = round($width*($i/100));
			$dstHeight = round($height*($i/100));

		} else {
			break;
		}
		$i= $i-3;
	}


	$dstImage = imagecreatetruecolor($dstWidth,$dstHeight);
	ImageCopyResampled($dstImage, $srcImage,    0,          0,      0,       0, $dstWidth, $dstHeight, $width, $height);
	header("Content-Type: image/jpeg");
	imagejpeg($dstImage,"",100);
	imagedestroy($srcImage);
	imagedestroy($dstImage);


} else {

}

?>

<?php

//o—Í•¶Žš‚ÌŽæ“¾
$setstring = $_GET['setstring'];
if ($setstring == '') {
	$setstring = $_POST['setstring'];
}

$pathinfo = pathinfo($setstring);

$ext = $pathinfo['extension'];
//$ext = "jpg";

if ($ext == 'jpg' || $ext == 'jpeg') {


	//‰æ‘œ‚Ìì¬
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

	//‰æ‘œ‚Ìì¬
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


	//jpg gif png ˆÈŠO‚Íjpg‚É•ÏŠ·
} elseif ($ext == 'png') {

	//‰æ‘œ‚Ìì¬
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

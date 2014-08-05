<?php


	$image_path = $_GET['image'];
	$image_wsize = $_GET['wsize'];
	$image_hsize = $_GET['hsize'];

	
	$src_name=$image_path;

	list($width, $height) = getimagesize($src_name);


	if (!$image_wsize && !$image_hsize) {
		$resize_width = 100;
		$resize_height = 100;
	} elseif ($image_wsize && !$image_hsize) {
	
		$resize_width = $image_wsize;
		$resize_height = floor(($image_wsize * $height) / $width);

	}else {
		$resize_width = $image_wsize;
		$resize_height = $image_hsize;
	}


	$image_name = $src_name;

	//var_dump($image_name);
	$source = imagecreatefromjpeg($image_name);

	//var_dump($source );
	$new_image = imagecreatetruecolor($resize_width, $resize_height);

	imagecopyresampled($new_image, $source, 0, 0, 0, 0, $resize_width, $resize_height, $width, $height);

	//exit;
	header('Content-type: image/jpeg');
	ImageJpeg($new_image, null, 50);


	ImageDestroy($new_image);
	ImageDestroy($source);




?>
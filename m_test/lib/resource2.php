<?php
/*
 * Emoji�ϊ��p�X�N���v�g
 * GET�l�ɑJ�ڐ�̃t�@�C���̊g���q���Ƃ������̂��w�肷���
 * resource�t�H���_����Ώۂ̃t�@�C����ǂݍ��݁A�e�L�����A�ɍ������G�����ɕϊ���o�͂��܂��B
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

include 'Rock/Emoji.php';
$emoji = new Rock_Emoji();

// Copyright 2009 Google Inc. All Rights Reserved.
$GA_ACCOUNT = "MO-8383230-29";
$GA_PIXEL = "/ga.php";

function googleAnalyticsGetImageUrl() {
	global $GA_ACCOUNT, $GA_PIXEL;
	$url = "http://www.cinemasunshine.co.jp/m";
	$url .= $GA_PIXEL . "?";
	$url .= "utmac=" . $GA_ACCOUNT;
	$url .= "&utmn=" . rand(0, 0x7fffffff);
	$referer = $_SERVER["HTTP_REFERER"];
	$query = $_SERVER["QUERY_STRING"];
	$path = $_SERVER["REQUEST_URI"];
	if (empty($referer)) {
	  $referer = "-";
	}
	$url .= "&utmr=" . urlencode($referer);
	if (!empty($path)) {
	  $url .= "&utmp=" . urlencode($path);
	}
	$url .= "&guid=ON";
	return str_replace("&", "&amp;", $url);
}

$googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
$googleatag= '<img src="' . $googleAnalyticsImageUrl . '" />';



$indexFileName = $resourcePath . 'index2.xhtml';
if (isset($_GET['p'])) {
	$fileName = $resourcePath . $_GET['p'] . '.xhtml';
	if (!file_exists($fileName)) {
		$fileName = $indexFileName;
	}
} else {
	$fileName = $indexFileName;
}

$buffer = file_get_contents($fileName);

header('Content-type: application/xhtml+xml');

if (empty($noEmojiHenkan)) {
    $buffer = $emoji->convert($buffer, 'd');
}

$buffer = str_replace('{$googleatag}', $googleatag, $buffer);

    echo $buffer;







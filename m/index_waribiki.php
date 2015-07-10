<?php
include("../lib/require.php");

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
?>
<?php echo '<?xml version="1.0" encoding="Shift_JIS"?>' ?>
<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/1.0) 1.0//EN" "i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=Shift_JIS"/>
<meta name="description" content="" />
<meta name="keywords" content="ｼﾈﾏｻﾝｼｬｲﾝ,映画,ｼﾈﾏ,映画検索,映画館,上映,ｼﾈｺﾝ,上映時間" />
<title>ｼﾈﾏｻﾝｼｬｲﾝ</title>
<style type="text/css">
a:link {color:#000000;}
a:visited {color:#000000;}

</style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a>
<h1><img style="" src="images/top_head.gif" alt="CINEMA SUNSHINE"/></h1>
<img src="images/sp.gif" alt=" " height="4"/><br />
<?php
	$define = get_defined_constants() ;
	$top_imgs=getTopImage('1000');

	$rand_top_img = array_rand($top_imgs,1);
	$top_imgs = $top_imgs[$rand_top_img];

	/*$blank="";
	if($top_imgs["url_flg"] == "1"){
		$blank = 'target="_blank"';
	}else{
		$blank = '';
	}*/


	if ($top_imgs['m_url'] != null) {
		echo "<a href='$top_imgs[m_url]'><img src='../image_crop.php?image=$define[GROBAL_TOP_URL]theaters_image/topimage/$top_imgs[pic_path]&wsize=240&hsize=97' alt='" . htmlspecialchars(mb_convert_encoding($top_imgs["name"],"SJIS","UTF-8"), ENT_QUOTES) . "' /></a><br />";
	} else {
		echo "<img src='../image_crop.php?image=$define[GROBAL_TOP_URL]theaters_image/topimage/$top_imgs[pic_path]&wsize=240&hsize=97' alt='" . htmlspecialchars(mb_convert_encoding($top_imgs["name"],"SJIS","UTF-8"), ENT_QUOTES) . "' /><br />";
	}



?>


<div style="margin-top:6px;"><img src="images/campaign/waribiki_a_bnr.gif" alt=" " height="85"/></div>

<hr size ="2" style="border-color:#e4e4e4"></hr>
<div style="font-size:x-small;text-align:left;">
<a href="theater/"><span style="color:#171c61;">劇場一覧</span></a><br />
<img src="images/sp4.gif" alt=" " height="8"/><br />
<a href="campaign/"><span style="color:#171c61;">ｷｬﾝﾍﾟｰﾝ一覧・ﾒｰﾙﾏｶﾞｼﾞﾝ</span></a><br />
<img src="images/sp4.gif" alt=" " height="8"/><br />
<a href="show/current/"><span style="color:#171c61;">上映中作品</span></a><br />
<img src="images/sp4.gif" alt=" " height="8"/><br />
<a href="show/future/"><span style="color:#171c61;">上映予定作品</span></a><br />
<img src="images/sp4.gif" alt=" " height="8"/><br />
<a href="news/"><span style="color:#171c61;">ﾆｭｰｽ&amp;ﾄﾋﾟｯｸｽ</span></a><br /></div>

<hr size ="2" style="border-color:#e4e4e4"></hr>
<div style="font-size:x-small;background-color:#FFFFFF;text-align:right;">
<img src="images/sp4.gif" alt=" " height="4"/><br />
<a href="#top" accesskey="2"><span style="color:#242c53;">▲ﾍﾟｰｼﾞTOPﾍ</span></a><br />
<img src="images/sp4.gif" alt=" " height="4"/><br />
</div>

<div style="font-size:x-small;background-color:#EFEFEF;text-align:left;">
<img src="images/sp5.gif" alt=" " height="8"/><br />
<a href="company"><span style="color:#888888;">会社概要</span></a><br />
<img src="images/sp5.gif" alt=" " height="8"/><br />
<a href="privacy"><span style="color:#888888;">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</span></a><br />
<img src="images/sp5.gif" alt=" " height="8"/><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=ご意見・ご感想"><span style="color:#888888;">ご意見・ご感想（ご利用劇場をお知らせください。尚、緊急のお問い合わせは、お電話にて直接劇場までご連絡ください。）</span></a><br />
<img src="images/sp5.gif" alt=" " height="8"/><br />
</div>


<div style="font-size:x-small;background-color:#171c61; color:#ffffff; text-align:center;">
<img src="./images/sp1.gif" alt=" " height="4"/><br />
(c)cinema sunshine<br />
<img src="./images/sp1.gif" alt=" " height="4"/><br />
</div>
<?php echo $googleatag ?>
</body>
</html>
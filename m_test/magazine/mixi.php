<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-8383230-1";
  $GA_PIXEL = "./ga.php";

  function googleAnalyticsGetImageUrl() {
    global $GA_ACCOUNT, $GA_PIXEL;
    $url = "";
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
?>

<?php
	$text = "シネマサンシャインメールマガジン会員サービス http://www.cinemasunshine.co.jp/m/magazine/magazine.php";
	$text = au($text);
	$t_text = "http://twtr.jp/status/create/?text=" . urlencode($text);

/*utf-8に変換(auのみ)*/
function au($text){
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match("/^KDDI\-/i", $agent) || preg_match("/UP\.Browser/i", $agent)){
		$text = mb_convert_encoding($text, "CP932", "utf-8");
	}
			return $text;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>mixiチェック</title>
<style type="text/css">
a:link {color:#000000;}
a:visited {color:#000000;}
</style>
</head>
<body>
<h1><img style="" src="../images/f_top.gif" alt="CINEMA SUNSHINE"/></h1>

<div style="font-size:x-small;background-color:#f4f3f8;text-align:left;color:#3E3A39">
<center>
<p style="display:inline;">ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙﾏｶﾞｼﾞﾝ会員ｻｰﾋﾞｽを</p>
</center>
</div>

<br><img src="images/spacer.gif" height="10"><br>

<center>
    <form action="http://m.mixi.jp/share.pl?guid=ON" method="POST" >
 	<input type="hidden" name="charset" value="utf-8" />
        <input type="hidden" name="check_key" value="85299bbd9429419f78b91172843176d05f04788b" />
        <input type="hidden" name="title" value="シネマサンシャインメールマガジン会員サービス" />
        <input type="hidden" name="description" value="シネマサンシャインメールマガジン会員サービス" />
        <input type="hidden" name="primary_url" value="http://www.cinemasunshine.co.jp/m/magazine/magazine.php" />
        <input type="hidden" name="mobile_url" value="http://www.cinemasunshine.co.jp/m/magazine/magazine.php" />
        <input type="submit" value="mixiﾁｪｯｸ"/>
    </form>
</div>
</center>

<br><img src="images/spacer.gif" height="10"><br>

<div style="font-size:x-small;background-color:#EFEFEF;text-align:left;">
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../company"><span style="color:#888888;">会社概要</span></a>
<br><img src="../images/sp5.gif" height="5"><br>
<a href="../privacy"><span style="color:#888888;">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</span></a>
<br><img src="../images/sp5.gif" height="5"><br>
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=ご意見・ご感想"><span style="color:#888888;">ご意見・ご感想（ご利用劇場をお知らせください。尚、緊急のお問い合わせは、お電話にて直接劇場までご連絡ください。）</span></a>
<br><img src="../images/sp5.gif" height="5"><br>
<a href="../index.swf"><span style="color:#171c61;">>>ｼﾈﾏｻﾝｼｬｲﾝﾓﾊﾞｲﾙTOPﾍ</span></a><br />
<img src="../images/sp5.gif" alt=" " height="4"/><br />
</div>
<div style="font-size:x-small;background-color:#171c61; color:#ffffff; text-align:center;">
<img src="../images/sp1.gif" alt=" " height="4"/><br />
(c)cinema sunshine<br />
<img src="../images/sp1.gif" alt=" " height="4"/><br />
</div><?php
  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>
</body>
</html>

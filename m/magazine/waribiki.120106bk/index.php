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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>メールマガジン会員様限定サービス 会員限定割引クーポン</title>
</head>
<body>
<center>
<img src="images/waribiki_top_img_m.gif" alt="ﾒｰﾙﾏｶﾞｼﾞﾝ感様限定ｻｰﾋﾞｽ 会員限定割引ｸｰﾎﾟﾝ" />
<br><img src="images/spacer.gif" height="10"><br>
<img src="images/waribiki_img_1_m.gif" alt="大人､大学生､高校生 300円引き　小･中学生､幼児 200円引き"/>
</center>
<br><img src="images/spacer.gif" height="10"><br>
<font size="1">
<p>
<span style="color:#1d2088">
ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙ
ﾏｶﾞｼﾞﾝ会員様限定で割引ｸｰﾎﾟﾝを
ﾌﾟﾚｾﾞﾝﾄしております｡このﾍﾟｰｼﾞ
を劇場窓口にお見せください｡
</span>
<br /><br />
<span style="color:#898989">
※割引券1枚で2名様まで有効です。
他の割引ｻｰﾋﾞｽとの併用はできません。
また、特別興行、大和郡山のIMAX作品には
ご利用いただけません。
※期間中何回でもご利用いただけます。
※松戸のみ､幼児は100円引きとなります｡
</span>
</p>
</font>
<br><img src="images/spacer.gif" height="10"><br>
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
<?php
  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>
</body>
</html>

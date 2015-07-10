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
<meta property="og:title" content="ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙﾏｶﾞｼﾞﾝ会員ｻｰﾋﾞｽ">
<meta property="og:type" content="movie">
<meta property="og:image" content="http://www.cinemasunshine.co.jp/images/news_images/mail.jpg">
<meta property="og:url" content="http://www.cinemasunshine.co.jp/m/magazine/magazine.php">
<meta property="og:site_name" content="シネマサンシャインメールマガジン会員サービス">
<meta property="fb:admins" content="100002450024833"/>
<title>ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙﾏｶﾞｼﾞﾝ会員ｻｰﾋﾞｽ</title>
<meta name="description" content="ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙﾏｶﾞｼﾞﾝ会員ｻｰﾋﾞｽ" />
</head>
<body>
<center>
<div><img src="images/tokusetsu_header.gif" alt=""/></div>
</center>
<br><img src="images/spacer.gif" height="10"><br>
<font size="2" style="color:#019fe8;">ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙ会員募集中</font><br />
<font size="1">
ｼﾈﾏｻﾝｼｬｲﾝのｷｬﾝﾍﾟｰﾝ情報や､新作映画情報などを一足早くお届けする無料ﾒｰﾙ配信ｻｰﾋﾞｽです｡
</font>
<br><img src="images/spacer.gif" height="10"><br>
<font size="2" style="color:#019fe8;">ﾒｰﾙﾏｶﾞｼﾞﾝはお得な3大特典</font><br />
<font size="1">
ｼﾈﾏｻﾝｼｬｲﾝのｷｬﾝﾍﾟｰﾝ情報や､新作映画情報などを一足早くお届けする無料ﾒｰﾙ配信ｻｰﾋﾞｽです｡
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【その1】会員登録料無料!もちろん年会費も無料!</span><br />
どなたでも無料でご利用頂けます。
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu1.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【その2】話題の最新映画情報をお届け!</span><br />
ｼﾈﾏｻﾝｼｬｲﾝの最新映画情報､劇場ﾆｭｰｽ･ｲﾍﾞﾝﾄ情報などをお届け致します｡
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu2.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【その3】会員様限定キャンペーン!</span><br />
会員様限定のキャンペーンや、プレゼントコンテンツをご利用頂けます。
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu3.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<br><img src="images/spacer.gif" height="10"><br>
<font size="2" style="color:#019fe8;">ﾒｰﾙﾏｶﾞｼﾞﾝ登録方法</font>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【STEP.1】</span><br />
下のﾎﾞﾀﾝより､会員登録ﾌｫｰﾑﾍﾟｰｼﾞへ進んでください｡
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu4.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【STEP.2】</span><br />
会員登録ﾌｫｰﾑﾍﾟｰｼﾞにて必要事項を記入して送信｡
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu5.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【STEP.3】</span><br />
返信ﾒｰﾙが送られてくるので､本文中に記載されたURLをｸﾘｯｸし､本登録完了ﾍﾟｰｼﾞへｱｸｾｽ｡
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu6.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:#1D2085;">【STEP.4】</span><br />
登録完了です｡次回ﾒｰﾙﾏｶﾞｼﾞﾝから､配信がｽﾀｰﾄします｡
<br><img src="images/spacer.gif" height="5"><br>
<center><img src="images/tokusetsu7.gif" alt=""/></center>
<br><img src="images/spacer.gif" height="5"><br>
<span style="color:red;">※割引券1枚で2名様まで有効。他の割引ｻｰﾋﾞｽとの併用はできません。<br>
※特別興行、IMAXﾃﾞｼﾞﾀﾙｼｱﾀｰではご利用頂けません。<br>
※ｲﾝﾀｰﾈｯﾄ購入（e-box、ﾑﾋﾞﾁｹ)ではご利用頂けません。 <br></span>
<img src="images/spacer.gif" height="5">
<center><a href="http://mm.cinemasunshine.co.jp/form_if.cgi?type=3&id=sunshine"><img src="images/tokusetsu_btn1.gif" alt=""/></a></center>
<br><img src="images/spacer.gif" height="10"><br>
</font>

<center>
<?php
echo "<a href=\"{$t_text}\"><img src=\"./images/btn_3.gif\" alt=\" \" height=\"\"/></a>"
?>
<br><img src="images/spacer.gif" height="1"><br>
<a href="http://m.facebook.com/sharer.php?u=http://www.cinemasunshine.co.jp/m/magazine/magazine.php&t=<?php echo urlencode("ｼﾈﾏｻﾝｼｬｲﾝﾒｰﾙﾏｶﾞｼﾞﾝ会員ｻｰﾋﾞｽ")?>"><img src="./images/btn_2.gif" alt="" height=""/></a>
<br /><img src="images/spacer.gif" height="1"><br>
<a href="./mixi.php"><img src="./images/btn_1.gif" alt="" height=""/></a>
</center><br />
</div>
</center>

<div>
<img src="../images/menu_bar.gif" alt=" "/><br />
</div>
<img src="../images/sp.gif" alt=" " height="4"/><br />
<div style="color:#000000;font-size:x-small;">
<a href="../campaign/"><span style="color:#171c61;">ｷｬﾝﾍﾟｰﾝ一覧・ﾒｰﾙﾏｶﾞｼﾞﾝ</span></a>
<span style="color:#000000;">|</span>
<a href="../theater/"><span style="color:#171c61;">劇場一覧</span></a>
<span style="color:#000000;">|</span>
<a href="../show/current/"><span style="color:#171c61;">上映中作品</span></a>
<span style="color:#000000;">|</span>
<a href="../show/future/"><span style="color:#171c61;">上映予定作品</span></a>
<span style="color:#000000;">|</span>
<a href="../news/"><span style="color:#171c61;">ﾆｭｰｽ&amp;ﾄﾋﾟｯｸｽ</span></a><br /></div>

<div style="font-size:x-small;background-color:#EFEFEF;text-align:left;">

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

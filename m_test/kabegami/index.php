<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-8383230-43";
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
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<!--<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=Shift_JIS"/>
<meta name="description" content="池袋、平和島、茨城、千葉、徳島、愛媛で映画を見るならｼﾈﾏｻﾝｼｬｲﾝ" />
<meta name="keywords" content="ｼﾈﾏｻﾝｼｬｲﾝ,映画,ｼﾈﾏ,映画検索,映画館,上映,ｼﾈｺﾝ,上映時間,壁紙ﾌﾟﾚｾﾞﾝﾄｷｬﾝﾍﾟｰﾝ" />
<title>ｼﾈﾏｻﾝｼｬｲﾝ|壁紙ﾌﾟﾚｾﾞﾝﾄｷｬﾝﾍﾟｰﾝ</title>-->
<style type="text/css">
a:link {color:#000000;}
a:visited {color:#000000;}
-a:hover{color: #ff0000;}

</style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a>
<h1><img src="images/kabegami.gif" alt="壁紙プレゼントキャンペーン"/></h1><br />



<div style="text-align:center">
<span style="color:#9d0000; font-size:12px;">「星を追う子ども」の壁紙プレゼント!!</span><br /><br />

<span style="font-size:10px;">↓↓↓↓↓</span><br /><br />

<img src="images/hoshi-o-kodomo.gif" width="156" height="208" alt="星を追う子ども"><br /><br />

<span style="font-size:10px; color:#999;"><a href="images/hoshi-kabegami.jpg">★ダウンロードはこちら★</a></span><br /><br />
<!--<a href="../images/campaign/hoshi-kabegami.jpg"><img src="../images/campaign/kabegami_btn.gif" alt="ダウンロードはこちら"/></a><br /><br />-->


<span style="color:#826524;font-size:10px;">※画像は、携帯電話のメニューの「画像を保存」を使って保存して下さい。</span><br />

<br />

</div>

<hr size ="2" style="border-color:#e4e4e4"></hr>


<div style="font-size:x-small;background-color:#FFFFFF;text-align:right;">
<img src="../images/sp4.gif" alt=" " height="4"/><br />
<a href="#top" accesskey="2"><span style="color:#171c61;">▲ﾍﾟｰｼﾞTOPﾍ</span></a><br />
<img src="../images/sp4.gif" alt=" " height="4"/><br />
</div>



<img src="../images/sp.gif" alt=" " height="4"/><br />



<img src="../images/sp.gif" alt=" " height="4"/><br />

<div style="font-size:x-small;background-color:#EFEFEF;text-align:left;">
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../company"><span style="color:#888888;">会社概要</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../privacy"><span style="color:#888888;">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=ご意見・ご感想"><span style="color:#888888;">お問い合わせ(※ご利用劇場をお知らせ下さい)</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../?p=index"><span style="color:#171c61;">>>ｼﾈﾏｻﾝｼｬｲﾝﾓﾊﾞｲﾙTOPﾍ</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
</div>



<div style="font-size:x-small;background-color:#171c61; color:#ffffff; text-align:center;">
<img src="../images/sp1.gif" alt=" " height="4"/><br />
(c)cinema sunshine<br />
<img src="../images/sp1.gif" alt=" " height="4"/><br />
</div>
<?php
  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>
</body>
</html>
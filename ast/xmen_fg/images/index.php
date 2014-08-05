
<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-8383230-48";
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=Shift_JIS"/>
<meta name="description" content="池袋、平和島、茨城、千葉、徳島、愛媛で映画を見るならｼﾈﾏｻﾝｼｬｲﾝ" />
<meta name="keywords" content="ｼﾈﾏｻﾝｼｬｲﾝ,映画,ｼﾈﾏ,映画検索,映画館,上映,ｼﾈｺﾝ,上映時間,ｷｬﾝﾍﾟｰﾝ" />
<title>ｼﾈﾏｻﾝｼｬｲﾝ|ｷｬﾝﾍﾟｰﾝ詳細</title>
<style type="text/css">
a:link {color:#000000;}
a:visited {color:#000000;}
a:hover{color: #ff0000;}



</style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a>
<h1><img style="" src="./images/campaign_bar.gif" alt="CINEMA SUNSHINE"/></h1>
<img src="./images/campaign/xmen_top.gif" alt="「X-MEN:ﾌｧｰｽﾄ･ｼﾞｪﾈﾚｰｼｮﾝ ﾌﾟﾚｾﾞﾝﾄｷｬﾝﾍﾟｰﾝ」"/><br />
<img src="./images/sp4.gif" alt=" " height="4"/><br />
<span style="font-size:x-small;">ﾒｰﾙﾏｶﾞｼﾞﾝ会員限定！抽選で「X-MEN:ﾌｧｰｽﾄ･ｼﾞｪﾈﾚｰｼｮﾝ」のｵﾘｼﾞﾅﾙｸﾞｯｽﾞをﾌﾟﾚｾﾞﾝﾄ!!まだ会員でない方も､ﾍﾟｰｼﾞ下の｢ﾒｰﾙﾏｶﾞｼﾞﾝの登録はこちら｣ﾎﾞﾀﾝよりご登録いただければﾌﾟﾚｾﾞﾝﾄ応募案内のﾒｰﾙを配信致します｡この機会にぜひご登録下さい!</span><br /></span><br />
<img src="./images/sp4.gif" alt=" " height="8"/><br />

<!--画像セットここから-->
<div style="" align="center">
<img src="./images/campaign/m_1.jpg" alt="X-MEN"/><br />
<img src="./images/sp4.gif" alt=" " height="4"/><br />
<span style="color:#1AD3C5; font-size:5;text-align:center;">
	「X-MEN:ﾌｧｰｽﾄ･ｼﾞｪﾈﾚｰｼｮﾝ」<br />6月11日（土）公開!!
</span>
</div>

<!--画像セットここまで-->

<img src="./images/sp4.gif" alt=" " height="10"/><br />

<div style="font-size:xx-small;background-color:#EFEFEF;color:#464243;text-align:center;" align="center">
	<span style= "text-align:center;" align="center">▼▼プレゼント▼▼</span>
</div>

<!--画像セットここから-->
<div style="">
<img src="./images/campaign/m_2.jpg" alt="プレゼント一覧"/><br />
<img src="./images/sp4.gif" alt=" " height="4"/><br />
<div style="margin-left:10px;">
<span style="color:#1AD3C5; font-size:5;">①ｶﾞｼﾞｪｯﾄﾘｽﾄﾁｬｰｼﾞｬｰ 【1名様】</span><br />
<span style="color:#1AD3C5; font-size:5;">②ﾍﾟﾝ型USB&ｶｰﾄﾞﾘｰﾀﾞｰｾｯﾄ 【2名様】</span><br />
<span style="color:#1AD3C5; font-size:5;">③Tｼｬﾂ(ｸﾞﾚｰ)M 【2名様】</span><br />
<span style="color:#1AD3C5; font-size:5;">④ｽﾃｰｼｮﾅﾘｰｾｯﾄ 【5名様】</span><br />
<span style="color:#1AD3C5; font-size:5;">⑤ﾒﾀﾘｯｸﾉｰﾄ【5名様】</span><br />
</div>
<!--画像セットここまで-->

<img src="./images/sp4.gif" alt=" " height="10"/><br />

<span style="color:#787878; font-size: xx-small;">
《ご注意》<br />
●お一人様一口のみのご応募とさせていただきます｡<br />
●当選権利の他人への譲渡･換金はできません｡<br />
●ご応募いただいた方の個人情報は本ｷｬﾝﾍﾟｰﾝの抽選及び賞品の発送以外には使用いたしません｡<br />
●15歳以下のお子様に関しては､親権者の方の同意を得たものとして個人情報を取り扱います｡</span><br />

<img src="./images/sp4.gif" alt=" " height="15"/><br />

<div style="text-align:center; clear:both"><img style="margin-top:6px; margin-bottom:6px;" src="./images/dl.gif" alt="line"/></div>

<img src="./images/sp4.gif" alt=" " height="15"/><br />

<span style="font-size:x-small; text-align:center;"><form action="http://www.cinemasunshine.co.jp/m/magazine/magazine.php" method="post"><input type="submit" value="ﾒｰﾙﾏｶﾞｼﾞﾝの登録はこちら"></input></form></span>

<br />

<hr size ="2" style="border-color:#e4e4e4"></hr>


<div style="font-size:x-small;background-color:#FFFFFF;text-align:right;">
<img src="./images/sp4.gif" alt=" " height="4"/><br />
<a href="#top" accesskey="2"><span style="color:#171c61;">▲ﾍﾟｰｼﾞTOPﾍ</span></a><br />
<img src="./images/sp4.gif" alt=" " height="4"/><br />
</div>

<div>
<img src="./images/menu_bar.gif" alt=" "/><br />
</div>

<img src="./images/sp.gif" alt=" " height="4"/><br />

<div style="color:#000000;font-size:x-small;">
<a href="../../campaign/"><span style="color:#171c61;">ｷｬﾝﾍﾟｰﾝ一覧・ﾒｰﾙﾏｶﾞｼﾞﾝ</span></a>
<span style="color:#000000;">|</span>
<a href="../../theater/"><span style="color:#171c61;">劇場一覧</span></a>
<span style="color:#000000;">|</span>
<a href="../../show/current/"><span style="color:#171c61;">上映中作品</span></a>
<span style="color:#000000;">|</span>
<a href="../../show/future/"><span style="color:#171c61;">上映予定作品</span></a>
<span style="color:#000000;">|</span>
<a href="../../news/"><span style="color:#171c61;">ﾆｭｰｽ&amp;ﾄﾋﾟｯｸｽ</span></a><br /></div>

<img src="./images/sp.gif" alt=" " height="4"/><br />

<div style="font-size:x-small;background-color:#EFEFEF;text-align:left;">
<img src="./images/sp5.gif" alt=" " height="8"/><br />
<a href="../../company"><span style="color:#888888;">会社概要</span></a><br />
<img src="./images/sp5.gif" alt=" " height="8"/><br />
<a href="../../privacy"><span style="color:#888888;">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</span></a><br />
<img src="./images/sp5.gif" alt=" " height="8"/><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=ご意見・ご感想"><span style="color:#888888;">ご意見・ご感想（ご利用劇場をお知らせください。尚、緊急のお問い合わせは、お電話にて直接劇場までご連絡ください。）</span></a><br />
<img src="./images/sp5.gif" alt=" " height="8"/><br />
<a href="../../?p=index"><span style="color:#171c61;">>>ｼﾈﾏｻﾝｼｬｲﾝﾓﾊﾞｲﾙTOPﾍ</span></a><br />
<img src="./images/sp5.gif" alt=" " height="8"/><br />
</div>

<!--
<div style="background-color:#0033cc; color:#ffffff; text-align:center;">
<img src="images/ttl_01.gif" alt=" " height="4"/><br />
ｷｬﾝﾍﾟｰﾝ<br />
<img src="images/ttl_01.gif" alt=" " height="4"/><br />
</div>

<img src="images/sp.gif" alt=" " height="4"/><br />
-->



<!--
<div style="text-align:center;">
<a href="https://campaign.cinemasunshine.co.jp/aiyomu/m/"><img src="images/index_banners/aiyomu.gif" width="177"  height="42" alt="「愛を読むひと」公開記念！キャンペーン実施中！" /></a>
</div>


<img src="images/sp.gif" alt=" " height="4"/><br />

<div style="text-align:right;">
<span style="color:#ff0000;"></span><a href="http://61.211.237.76/aiyomu/m/"><span style="color:#3399ff;">詳しくはこちら</span></a>
</div>
-->
<!--
<div style="text-align:center;">
<a href="/campaign/200904/oppai/"><img src="images/index_banners/oppai.gif" alt="「おっぱいバレー」初日舞台挨拶" /></a>
</div>

<img src="images/sp.gif" alt=" " height="4"/><br />

<div style="text-align:right;">
<span style="color:#ff0000;"></span><a href="/campaign/200904/oppai/"><span style="color:#3399ff;">詳しくはこちら</span></a>
</div>

<img src="images/sp.gif" alt=" " height="4"/><br />



-->

<div style="font-size:x-small;background-color:#171c61; color:#ffffff; text-align:center;">
<img src="./images/sp1.gif" alt=" " height="4"/><br />
(c)cinema sunshine<br />
<img src="./images/sp1.gif" alt=" " height="4"/><br />
</div>
<?php
  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>
</body>
</html>
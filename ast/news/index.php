<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>シネマサンシャイン&nbsp;cinema&nbsp;sunshine×immsound | 作品紹介</title>
<meta name="keywords" content="immsound,3D,imm,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間,平和島" />
<meta name="description" content="日本初、脅威のimm3Dsoundシアターがシネマサンシャイン平和島に上陸" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/fullscreen.js" type="text/javascript"></script>
<script src="../js/jquery-1.7.min.js" type="text/javascript"></script>
<script src="../js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
<script src="../js/jquery.coda-slider-2.0.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
<link href="../css/fullscreen.css" rel="stylesheet">
<style>
.movieSet{
	font-size:12px;
	padding:20px;
}

.leftArea{
	width:355px;
	float:left;
}

.rightArea{
	width:370px;
	float:right;
}

.leftArea .area01,
.leftArea .area02{
	margin:0 0 5px 0;
}

.leftArea .area03{
	margin:0 0 5px 0;
	line-height:1.8;
}

.leftArea .area04{
	font-size:8px;
}

.rightArea .area06{
    color: #0076D1;
    font-size: 14px;
    margin: 10px 0 0;
}

.rightArea .area07{
    margin: 10px 0 0;
}

.rightArea .area08{
    margin: 10px 0 0;
}

.rightArea .area09{
    margin: 10px 0 0;
    text-align: right;

}

.rightArea .area02,
.rightArea .area03{
    margin: 10px 0 0;
}

.blue_border {
    margin: 20px 0 0 20px;
}

P {
    font-family: "ＭＳ ゴシック","MS Gothic","Osaka－等幅",Osaka-mono,monospace;
    letter-spacing: 0.1em;
    line-height: 160%;
}

</style>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8383230-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="wrapper">
<img src="../img/main_bg.jpg" width="100%" height="100%" id="bg"  />
<div id="contents">
<div id="navi" class="transparent">
    <ul>
      <li class="nav_logo"><a href="../"><img class="transparent" src="../img/ast_logo.png"></a></li>
      <li><a href="../news/"><img class="" src="../img/btn03.png"></a></li>
      <li><a href="../about/ast.html"><img class="" src="../img/btn06.png"></a></li>
      <li><a href="../about/dolbyatmos.html"><img class="" src="../img/btn07.png"></a></li>
      <li><a href="../about/"><img class="" src="../img/btn01.png"></a></li>
      <li><a href="../movie/"><img class="transparent" src="../img/btn02.png"></a></li>
      <li><a href="http://www.facebook.com/sunshineheiwajima" target="_blank"><img class="" src="../img/btn04.png"></a></li>
      <li><a href="https://twitter.com/sunshine_imm" target="_blank"><img class="" src="../img/btn05.png"></a></li>
    </ul>
  </div>
  <div id="mainContents">
    <div class="section01" style="margin:0 0 25px;">
      <h1 class="area01" style="margin:20px 0 0 0; "><img src="../img/news_title.png" alt="NEWS" ></h1>
      <div class="clear"></div>
    </div>
    <div id="news_container">
		<?php
			$theaterId = 1002;

			$newsViews = getNewsViews($theaterId);
			$newsViews = explode(",",$newsViews['view']);


			$news = getNews($theaterId);
			if (count($newsViews) >= 1) {
				foreach ($newsViews as $view) {
					if(count($news) >= 1) {
						foreach($news as $nws){
							if($view==$nws['id']) {
		?>

	      <!--ニュースセットここから-->
	      <div class="news_set" style="margin:0;">
	        <p class="news_day"><?php echo date ('Y/m/d',strtotime($nws['start_date'])) ?></p>
	        <h3 class="news_title"><?php echo $nws['midasi'] ?></h3>
	        <p class="news_text"><?php echo $nws['txt'] ?></p>
	      </div>
	      <div class="news_blue_border"> <img src="../img/movie_info_section.gif"> </div>
	      <!--ニュースセットここまで-->

		<?php
							}
						}
					}
				}

			}
		?>
    </div>
  </div>
</div>
<div class="footerArea" style="_width:100%;">
  <p class="copyright">(C) 2001-2014 Cinema Sunshine Co., Ltd. All Rights Reserved.</p>
  <p class="link_top"><a href="http://www.cinemasunshine.co.jp/" target="_blank";>シネマサンシャインTOPへ</a></p>
</div>
</body>
</html>

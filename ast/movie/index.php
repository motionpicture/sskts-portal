<?php include("../../lib/require.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>シネマサンシャイン&nbsp;アメイジング・サウンドシアター | 作品紹介</title>
<meta name="keywords" content="アメイジング・サウンドシアター,3D,imm,DOLBY,DOLBY ATMOS,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間,平和島" />
<meta name="description" content="日本初、DOLBY ATMOSとimm soundを備えた最新音響シアター、“アメイジング・サウンドシアター”が誕生。客席を取り囲んで配置されたスピーカーによって体験したことのないような迫力で体感できるDOLBY ATMOS。
前後左右、スクリーンや天井にもスピーカーを設置し、観客を包み込むような音響で、まるでその場にいるような臨場感のある音響体験ができるimm sound。その二つの音響システムを兼ね備えた“アメイジング・サウンドシアター”がついに誕生です。" />
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

.leftArea .area01 img{
    border:1px solid #0074c0;
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
.rightArea .area10{
    margin: 10px 0 0;
	color:red;
}
.area10 a{
	color:red;
	text-decoration:underline;
}
.area10 a:hover{
	text-decoration:none;
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

.movieSet .rightArea .area06{
	font-size:16px;
	font-weight:bold;
}
.ast_icon{
	height:22px;
	margin:5px 0;
}
.ast_icon ul li{
	width:70px;
	height:22px;
	margin-right:10px;
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
		<h1 class="area01" style="margin:20px 0 0 0; "><img src="../img/movie_info_tittle.png" alt="作品情報" width="123" height="31" ></h1>
		<div class="clear"></div>
	</div>

          <?php
          $bnr = getSpecialastMovie();
          if(count($bnr[0]) > 0){
            echo "<div class=\"headline\">";
        	echo "<h2 class=\"area01\"><img src=\"../img/movie_info_bar2.gif\" alt=\"上映中作品\" width=\"790\" height=\"41\" ></h2>";
			echo "</div>";
          }

          foreach($bnr[0] as $key => $val){
            echo "<!-- Movie Set -->";
            echo "<div id=\"movies\">";
            echo "<div class=\"movieSet\">";
            echo "<div class=\"leftArea\">";
            echo "<p class=\"area01\"><img src=\"/theaters_image/special/$val[pic_path02]\" alt=\"$val[name]\" width=\"353\" height=\"190\" ></p>";
            echo "<p class=\"area04\">$val[credit]</p>";
            echo "</div>";
            echo "<div class=\"rightArea\">";
            echo "<p class=\"area05\"><span style=\"font-weight:bold;\">公開中</span></p>";
            echo "<div>";
            echo "<p class=\"area06\">『$val[name]』";
            echo "</div>";
            if($val['statu3'] == 1){
                echo "<div class=\"ast_icon\">";
                echo "<ul>";
                echo "<li><img src=\"../img/movie/dol_icon.gif\" alt=\"DOLBY\"/></li>";
                echo "</ul>";
                echo "</div>";
            }

            if($val['statu3'] == 2){
                echo "<div class=\"ast_icon\">";
                echo "<ul>";
                echo "<li><img src=\"../img/movie/imm_icon.gif\" alt=\"imm\"/></li>";
                echo "</ul>";
                echo "</div>";
            }

            echo "</p>";
            echo "<div>";
            echo "<p class=\"area10\">$val[midokoro1]<br />";
            echo "</div>";
            echo "<p class=\"area07\"><img src=\"../img/movie_info_story.png\" width=\"70\" height=\"15\" alt=\"ストーリー\" ></p>";
            echo "<p class=\"area08\">$val[midokoro2]</p>";
            echo "<p class=\"area03\">$val[cast]<br /></p>";
            echo "<div class=\"area09\" style=\"float:right;\">";
            echo "<div style=\"float:left;margin:0 10px 0 0;\"><a href=\"{$val['site']}\" target=\"_blank\"><img src=\"../img/movie_info_link_btn.gif\" width=\"119\" height=\"33\" alt=\"公式サイトへ\" ></a></div>";
            unset($theaters);
            $theaters = explode(",",$val["theater_ids"]);
            foreach($theaters as $key => $val2){
                if($val2 == 2){
                    echo "<div style=\"float:left;\"><a href=\"http://www.cinemasunshine.co.jp/theater/heiwajima/\" target=\"_blank\"><img src=\"../img/buy_link_btn.gif\" width=\"119\" height=\"33\" alt=\"チケット購入\" ></a></div>";
                }
            }

            echo "</div>";
            echo "</div>";
            echo "<div class=\"clear\"></div>";
            echo "<div class=\"news_blue_border\"> <img src=\"../img/movie_info_section.gif\"> </div>";
            echo "</div>";
            echo "</div>";
            echo "<!-- Movie Set -->";
          }
          ?>

          <?php
          if(count($bnr[1]) > 0){
            echo "<div class=\"headline\">";
            echo "<h2 class=\"area01\"><img src=\"../img/movie_info_bar.gif\" alt=\"上映予定作品\" width=\"790\" height=\"41\" ></h2>";
            echo "</div>";
          }

          foreach($bnr[1] as $key => $val){
            echo "<!-- Movie Set -->";
            echo "<div id=\"movies\">";
            echo "<div class=\"movieSet\">";
            echo "<div class=\"leftArea\">";
            echo "<p class=\"area01\"><img src=\"/theaters_image/special/$val[pic_path02]\" alt=\"$val[name]\" width=\"353\" height=\"190\" ></p>";
            echo "<p class=\"area04\">$val[credit]</p>";
            echo "</div>";
            echo "<div class=\"rightArea\">";
            echo "<p class=\"area05\"><span style=\"font-weight:bold;\">" . date("Y年n月j日公開",strtotime($val['start_date3'])) . "</span></p>";
            echo "<div>";
            echo "<p class=\"area06\">『$val[name]』";
            if($val['statu3'] == 1){
                echo "<div class=\"ast_icon\">";
                echo "<ul>";
                echo "<li><img src=\"../img/movie/dol_icon.gif\" alt=\"DOLBY\"/></li>";
                echo "</ul>";
                echo "</div>";
            }
            if($val['statu3'] == 2){
                echo "<div class=\"ast_icon\">";
                echo "<ul>";
                echo "<li><img src=\"../img/movie/imm_icon.gif\" alt=\"imm\"/></li>";
                echo "</ul>";
                echo "</div>";
            }
            echo "</p>";
            echo "</div>";
            echo "<div>";
            echo "<p class=\"area10\">$val[midokoro1]<br />";
            echo "</div>";
            echo "<p class=\"area07\"><img src=\"../img/movie_info_story.png\" width=\"70\" height=\"15\" alt=\"ストーリー\" ></p>";
            echo "<p class=\"area08\">$val[midokoro2]</p>";
            echo "<p class=\"area03\">$val[cast]<br /></p>";
            echo "<div class=\"area09\" style=\"float:right;\">";
            echo "<div style=\"float:left;margin:0 10px 0 0;\"><a href=\"{$val['site']}\" target=\"_blank\"><img src=\"../img/movie_info_link_btn.gif\" width=\"119\" height=\"33\" alt=\"公式サイトへ\" ></a></div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"clear\"></div>";
            echo "<div class=\"news_blue_border\"> <img src=\"../img/movie_info_section.gif\"> </div>";
            echo "</div>";
            echo "</div>";
            echo "<!-- Movie Set -->";
          }
          ?>

  </div>
</div>
<div class="footerArea" style="_width:100%;">
  <p class="copyright">(C) 2001-2014, Cinema Sunshine Co., Ltd. All Right Reserved.</p>
  <p class="link_top"><a href="http://www.cinemasunshine.co.jp/" target="_blank";>シネマサンシャインTOPへ</a></p>
</div>
</body>
</html>


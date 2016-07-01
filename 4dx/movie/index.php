<?php include("../../lib/require.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../img/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>作品紹介 | シネマサンシャイン&nbsp;cinema&nbsp;sunshine×4DX</title>
<meta name="keywords" content="4DX,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間,平和島,東京,沼津,静岡,エミフルMASAKI,愛媛" />
<meta name="description" content="シネマサンシャイン平和島、シネマサンシャイン沼津の4DX®シアターで上映中、上映予定の映画作品をご紹介。" />
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
	padding: 39px 20px 39px;
  border-bottom: 1px solid #490B0B;
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

.leftArea .area01{
    border:1px solid #979797;

}

.leftArea .area03{
	margin:0 0 5px 0;
	line-height:1.8;
}

.leftArea .area04{
	font-size:8px;
}

.rightArea .area06{
    color: white;
    font-size: 14px;
    margin: 10px 0 0;
    font-weight: bold;
}

.area05 span{
	background-color:#474747;
	padding: 3px;
	}

.rightArea .area07{
    margin: 10px 0 0;
}

.rightArea .area08{
    margin: 10px 0 0;
}

.rightArea .area09{
  width: 100%;
    margin: 10px 0 0;
    text-align: right;
}
.rightArea .area10{
  margin: 10px 0 0;
	color:#970303;
  font-weight: bold;
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
}
.area11{
  width:100%;
  height: 13px;
  margin: 10px 0;
}
.area11 img{
  width:78px;
  height: 13px;
  float: left;
}
.area12{
  width: 100%;
  height: 22px;
  margin-bottom: 10px;
}
.area12 ul li{
  display: inline-block;
}
.theater_btn{
  width:84px;
  height: 22px;
  margin-right: 10px; 
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
      <li><a href="../"><img class="transparent" src="../img/logo.png"></a></li>
      <li><a href="../movie/"><img class="" src="../img/btn03.png"></a></li>
      <li><a href="../news/"><img class="" src="../img/btn01.png"></a></li>
      <li><a href="../about/"><img class="transparent" src="../img/btn02.png"></a></li>
      <li><a href="../theater/"><img class="" src="../img/btn06.png"></a></li>
     </ul>
</div>
<div id="mainContents">
<div class="section01" style="margin:0 0 25px;">
  <h1 class="area01" style="margin:20px 0 0 0; "><img src="../img/movie_info_tittle.png" alt="作品情報" width="187" height="22" ></h1>
  <div class="clear"></div>
</div>
          <?php
          $bnr = getSpecial4dxMovie();
          if(count($bnr[0]) > 0){
            echo "<div class=\"headline\">";
        	echo "<h2 class=\"areatitle01\"><img src=\"../img/movie_info_bar.gif\" alt=\"上映中作品\" width=\"788\" height=\"27\" ></h2>";
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
            echo "<p class=\"area05\"><span style=\"font-weight:bold;\">上映中</span></p>";
            echo "<p class=\"area06\">『$val[name]』";
            if($val['statu2'] == 1){
            	echo "4DX版";
            }elseif($val['statu2'] == 2){
                echo "4DX3D版";
            }
            echo "</p>";
            echo "<p class=\"area10\">$val[midokoro1]</p>";
            echo "<p class=\"area07\"><img src=\"../img/movie_info_story.png\" width=\"143\" height=\"12\" alt=\"ストーリー\" ></p>";
            echo "<p class=\"area08\">$val[midokoro2]</p>";
            echo "<p class=\"area03\">$val[cast]<br /></p>";
            echo "<div class=\"area09\">";
            echo "<p class=\"area11\"><img src=\"../img/movie_info_theater.png\" width=\"78\" height=\"13\" alt=\"上映劇場\" ></p>";
            echo "<div class=\"area12\">";
            echo "<ul>";
            unset($theaters);
            $theaters = explode(",",$val["theater_ids"]);
            foreach($theaters as $key => $val2){
                if($val2 == 2){
                    echo "<li class=\"theater_btn\"><a href=\"http://www.cinemasunshine.co.jp/theater/heiwajima/\" target=\"_blank\"><img src=\"../img/4dx_theater_heiwajima.gif\" width=\"84\" height=\"22\" alt=\"平和島\" ></a></li>";
                }
                if($val2 == 6){
                    echo "<li class=\"theater_btn\"><a href=\"http://www.cinemasunshine.co.jp/theater/numazu/\" target=\"_blank\"><img src=\"../img/4dx_theater_numazu.gif\" width=\"84\" height=\"22\" alt=\"沼津\" ></a></li>";
                }
                if($val2 == 15){
                    echo "<li class=\"theater_btn\"><a href=\"http://www.cinemasunshine.co.jp/theater/masaki/\" target=\"_blank\"><img src=\"../img/4dx_theater_masaki.gif\" width=\"84\" height=\"22\" alt=\"エミフルMASAKI\" ></a></li>";
                }
            }
            echo "</ul>";
            echo "</div>";
            echo "<div style=\"margin:0 10px 0 0;\"><a href=\"{$val['site']}\" target=\"_blank\"><img src=\"../img/movie_info_link_btn.gif\" width=\"119\" height=\"33\" alt=\"公式サイトへ\" ></a></div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"clear\"></div>";
            echo "</div>";
            echo "</div>";
            echo "<!-- Movie Set -->";
          }
          ?>

          <?php
          if(count($bnr[1]) > 0){
            echo "<div class=\"headline\">";
            echo "<h2 class=\"areatitle01\"><img src=\"../img/movie_info_bar2.gif\" alt=\"上映予定作品\" width=\"788\" height=\"27\" ></h2>";
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
            echo "<p class=\"area05\"><span style=\"font-weight:bold;\">" . date("Y年n月j日公開",strtotime($val['start_date2'])) . "</span></p>";
            echo "<p class=\"area06\">『$val[name]』";
            if($val['statu2'] == 1){
            	echo "4DX版";
            }elseif($val['statu2'] == 2){
                echo "4DX3D版";
            }
            echo "</p>";
            echo "<p class=\"area10\">$val[midokoro1]</p>";
            echo "<p class=\"area07\"><img src=\"../img/movie_info_story.png\" width=\"143\" height=\"12\" alt=\"ストーリー\" ></p>";
            echo "<p class=\"area08\">$val[midokoro2]</p>";
            echo "<p class=\"area03\">$val[cast]<br /></p>";
            echo "<div class=\"area09\" style=\"float:right;\">";
            echo "<div style=\"float:left;margin:0 10px 0 0;\"><a href=\"{$val['site']}\" target=\"_blank\"><img src=\"../img/movie_info_link_btn.gif\" width=\"119\" height=\"33\" alt=\"公式サイトへ\" ></a></div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"clear\"></div>";
            echo "</div>";
            echo "</div>";
            echo "<!-- Movie Set -->";
          }

          ?>

</div>
<div class="footerArea" style="_width:100%;">
  <p class="copyright">(C) 2001-2016, Cinema Sunshine Co., Ltd. All Right Reserved.</p>
  <p class="link_top"><a href="http://www.cinemasunshine.co.jp/" target="_blank";>シネマサンシャインTOPへ</a></p>
</div>
</div>
</div>
<!-- リマーケティング タグの Google コード -->
<!--
リマーケティング タグは、個人を特定できる情報と関連付けることも、デリケートなカテゴリに属するページに設置することも許可されません。タグの設定方法については、こちらのページをご覧ください。
http://google.com/ads/remarketingsetup
-->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 881288241;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/881288241/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>


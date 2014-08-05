<?php
include("../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="img/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>シネマサンシャイン&nbsp;cinema&nbsp;sunshine×4DX</title>
<meta name="keywords" content="4DX,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間,平和島" />
<meta name="description" content="最先端の体感型シアターがシネマサンシャイン平和島に上陸" />
<!--ニュースティッカーここから-->
<script src="js/aScroller-1.0.js" type="text/javascript"></script>
<!--ニュースティッカーここまで-->
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/fullscreen.js" type="text/javascript"></script>
<script src="js/jquery-1.7.min.js" type="text/javascript"></script>
<script src="js/jquery.easing-1.3.pack.js" type="text/javascript"></script>
<script src="js/jquery.coda-slider-2.0.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
<link href="css/fullscreen.css" rel="stylesheet">


<script type="text/javascript">
$().ready(function() {
		$('#coda-slider').codaSlider({
			dynamicArrows: false,					 /* 前後移動ボタン自動表示無効 */
			dynamicTabs: false,						 /* タブ自動表示無効 */
            autoSlide: true,                        /* 自動再生有効 */
            autoSlideInterval: 5000,                /* 自動スライド間隔 */
            autoHeight:false,                        /* パネルの高さ自動調整の有無 */
            autoSlideStopWhenClicked: false,          /* パネルクリック時にスライドの自動再生を停止しない */
			slideEaseDuration: 500,					 /* 切替速度 */
			crossLinking: false
		});
});
</script>

<style type="text/css">
    /* Tab nav */

  	/* JavaScriptが使用不能なときでも、箱に含まれるスライダー内容を保つために、これを使ってください（yahoo翻訳にて） */
	.coda-slider-no-js .coda-slider { height: 200px; overflow: auto !important; padding-right: 20px }
  	/* スライドコンテンツの横幅と高さ */
  	.coda-slider, .coda-slider .panel { width: 900px ; height: 400px; }
	/* スライドコンテンツの大きさと表示位置 */
	.coda-slider-wrapper { padding: 0;  position:relative; width:900px; margin: 0; }
	/* ベース（触らない方が良い部分） */
	.coda-slider { float: left; overflow: hidden; position: relative; }
	.coda-slider .panel { display: block; float: left }
	.coda-slider .panel-container { position: relative; }
/*	.coda-nav-left, .coda-nav-right { float: left }
	.coda-nav-left a, .coda-nav-right a { display: block; text-align: center; text-decoration: none }*/

#navi{
	padding:12px 20px 20px 20px;
}

#navi ul li{
	margin:0 0 3px 0;
}

.footerArea{
	position:absolute;
	bottom:0;
	background:#fff ;
	width:100%;
	padding:3px 0;
	text-align:center;
	font-size:10px;
}

.pngs:hover img{
	filter:alpha(opacity=100);
	-moz-opacity:none!important;
	opacity:none!important;
}
#footer{
  height: 162px !important;
}
#footer ul {
    width: 760px;
}
/* .coda-nav{width: px;}   4個 */
/* .coda-nav{width: 182px;}   5個 */
/* .coda-nav{width: 206px;}   6個 */
/* .coda-nav{width: 230px;}   7個 */
.coda-nav{width:230px;}



/*  #slider_btn {width: 963px;}   4個 */
#slider_btn {width: 963px;}
#slider{margin-top: 90px !important;}

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
<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 934191191;
var google_conversion_label = "m2FiCPmNzAUQ18C6vQM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/934191191/?value=0&amp;label=m2FiCPmNzAUQ18C6vQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</head>
<body>
<img src="img/main_bg.jpg" width="100%" height="100%" id="bg"  />
<div id="contents">
  <div id="navi" class="transparent">
  <div class="transparentborder">
    <ul>
      <li><a href="./"><img class="transparent" src="img/logo.png"></a></li>
      <li><a href="movie/"><img class="" src="img/btn03.png"></a></li>
      <li><a href="news/"><img class="" src="img/btn01.png"></a></li>
      <li><a href="about/"><img class="transparent" src="img/btn02.png"></a></li>
      <li><a href="http://www.facebook.com/sunshineheiwajima" target="_blank"><img class="" src="img/btn04.png"></a></li>
      <li><a href="https://twitter.com/sunshine_imm" target="_blank"><img class="" src="img/btn05.png"></a></li>
    </ul>
    </div>
  </div>
   <div id="slider">
    <div class="coda-slider-wrapper">
      <div id="coda-slider" class="coda-slider">
        <!--<div class="panel bar1 transparent" style="display: block;"> <a class="pngs" href="./about/index.html"><img width="900" height="400" src="img/top/banner01.jpg" class="transparent" alt="4DXが東京に上陸！"></a> </div>-->

        <?php
        $banner = getSpecialMainBnr(1003);

        foreach($banner as $key => $val){
            unset($target);
            if($val["site_url_flg1"] == 1) $target = "target='_blank'";
            echo "<div class='panel bar1 transparent' style='display: block;'> <a class='pngs' href='$val[site_url1]' $target ><img width='900' height='400' src='/theaters_image/special_main_banner/$val[pic_path2]' class='transparent' alt='$val[name]'></a> </div>";
        }
        ?>
      </div>
      <div id="slider_btn">
        <div class="coda-nav" id="coda-nav-1">
          <ul id="thumb">
           <?php
                for($i=0;$i < count($banner);$i++ ){
                    echo "<li class='transparent'><a href='#$i'>$i</a></li>";
                }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="footer">


<!--ニュースティッカーここから-->

<div id="scrollbar_container_1">
  <div id="scrollbar_container">
    <h3><img src="img/top/news.gif" alt="news" /></h3>
    <div id="scrollbar" style="height: 12px; width: 832px; background-color:#f5f5f5;;">
		<?php
			$theaterId = 1003;

			$newsViews = getNewsViews($theaterId);
			$newsViews = explode(",",$newsViews['view']);


			$news = getNews($theaterId);
			if (count($newsViews) >= 1) {
				foreach ($newsViews as $view) {
					if(count($news) >= 1) {
						foreach($news as $nws){
							if($view==$nws['id']) {
		?>

			<div><a href="./news/"><?php echo date ('Y/m/d',strtotime($nws['start_date'])) ?>　<?php echo $nws['midasi'] ?></a></div>

		<?php
							}
						}
					}
				}

			}
		?>
    </div>
  </div>
  <script type="text/javascript">
divScroller("scrollbar", "v", 70, 2000);
//第2引数はvなら縦、hなら水平。第3引数はスピード、最後は時間間隔
</script>

<?php
    $bnr = getSpecialBottomBnr(1003);
    if(count($bnr) >= 4){
    	$width ="width:987px";
    }elseif(count($bnr) >= 3){
        $width ="width:718px";
    }elseif(count($bnr) >= 2){
        $width ="width:478px";
    }else{
        $width ="width:233px";
    }

    echo '<ul id="banner2" style="'.$width.'">';

    foreach($bnr as $key => $val){
        unset($target);
        if($val["url_flg"] == 1) $target = "target='_blank'";
    	echo "<li><a href='$val[url]' $target ><img src='/theaters_image/special_side_banner/$val[pic_path]'></a></li>";
    }
    echo '</ul>';

?>

 <div style="margin:60px 0 0 0;">
    <p id="copyright">(C) 2001-2014, Cinema Sunshine Co., Ltd. All Right Reserved.</p>
    <p class="link_top"><a href="http://www.cinemasunshine.co.jp/" target="_blank";>シネマサンシャインTOPへ</a></p>
  </div>
</div>
</body>
</html>

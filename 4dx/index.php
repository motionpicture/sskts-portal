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
<meta name="keywords" content="4DX,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間,平和島,東京,沼津,静岡,松前,愛媛,大和郡山,奈良,姶良,鹿児島" />
<meta name="description" content="4DX®は、3Dを遥かに超え、映画を「観る」から「体感する」ことに変えてしまう、五感を揺さぶる次世代の体感型プレミアムシアター。" />
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
<link href="css/top.css" rel="stylesheet">
<script type='text/javascript' src='./js/top.js'></script>

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
  <div id="wrapper">
<img src="img/main_bg.jpg" width="100%" height="100%" id="bg"  />
<div id="contents">
  <div id="navi" class="transparent">
  <div class="transparentborder">
    <ul>
      <li><a href="./"><img class="transparent" src="img/logo.png"></a></li>
      <li><a href="movie/"><img class="" src="img/btn03.png"></a></li>
      <li><a href="news/"><img class="" src="img/btn01.png"></a></li>
      <li><a href="about/"><img class="transparent" src="img/btn02.png"></a></li>
      <li><a href="theater/"><img class="" src="img/btn06.png"></a></li>
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
            echo "<div class='panel bar1 transparent' style='display: block;'> <a class='pngs' href='$val[site_url1]' $target ><img width='807' height='337' src='/theaters_image/special_main_banner/$val[pic_path2]' class='transparent' alt='$val[name]'></a> </div>";
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
    <p id="copyright">(C) 2001-2017, Cinema Sunshine Co., Ltd. All Right Reserved.</p>
    <p class="link_top"><a href="http://www.cinemasunshine.co.jp/" target="_blank";>シネマサンシャインTOPへ</a></p>
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
</div>
</body>
</html>

<?php
//include("../lib/require.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
<head>
	<meta name="description" content="シネマサンシャインにIMAXデジタルシアター誕生">
	<meta name="keywords" content="IMAX,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間">
	<title>シネマサンシャイン CHINEMA SUNSHINE×IMAX</title>
	<link rel="stylesheet" href="./css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="./css/common.css" type="text/css" />
	<link rel="stylesheet" href="./css/ac_gl_nav.css" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" >
	<script type='text/javascript' src='scripts/jquery-1.4.3.min.js'></script>
  <script type='text/javascript' src='./js/top.js'></script>
	<!--[if IE 6]>
		<script src="scripts/DD_belatedPNG.js"></script>
		<script>
			DD_belatedPNG.fix('images, .png_bg');
		</script>
	<![endif]-->

	<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-8383230-50']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

	</script>

	<script type="text/javascript">
	<!--
		var j$ = jQuery;

		j$(function(){

		function setBackground() {
			var $last = j$(".acc > li:last > a");
			if($last.hasClass("close"))
				$last.css("background-position", "left bottom");
			else
				$last.css("background-position", "left -30px");
		}

		j$(".acc").each(function(){
			j$("li > ul"			, this).wrap("<div></div>");
			j$("li > div:not(:last)", this).append("<div class='notlast'>&nbsp;</div>");
			j$("li > div:last"		, this).append("<div class='last'>&nbsp;</div>");

			j$("li > a", this).each(function(index){
				var $this = j$(this);

				if(index > 0)
					$this.addClass("close").next().hide();
				else
					$this.css("background-position", "left top");

				setBackground();

				var prms = {height:"toggle", opacity:"toggle"};
				$this.mouseover(function(){
					j$(this).toggleClass("close").next().animate(prms, {duration:"fast"})
						.parent().siblings().children("div:visible").animate(prms, {duration:"fast"}).prev().addClass("close");
					setBackground();
					return false;
				});
			});
		});
	});
	//-->
	</script>
</head>
<body class="png_bg">
	<div id="wrapper">
		<!--header▼-->
		<div class="header">
			<a name="copy"></a>
			<div class="copy"><a href="./"><img src="images/common/top_logo.gif" alt="IMAX" style="float:left;"></a></div>
			<div class="clear"></div>
			<div class="gl_nav">
				<div class="mainNav">
			<ul class="acc">
				<li class="tittle"><a href="./about"><img src="./images/common/navi1.gif" width="207" height="37" alt="IMAXデジタルシアターとは？"></a></li>
				<li class="tittle"><a href="./movie"><img src="./images/common/navi2.gif" width="92" height="37" alt="作品情報"></a></li>
				<li class="tittle">
					<a class="menu" href="http://www.cinemasunshine.co.jp/theater/yamatokoriyama/"><img src="./images/common/navi6.gif" width="112" height="37" alt="チケット購入"></a>
					<ul>
						<li class="open"><a href="http://www.cinemasunshine.co.jp/theater/tsuchiura/" target="_blank">土浦</a></li>
						<li class="open"><a href="http://www.cinemasunshine.co.jp/theater/yamatokoriyama/">大和郡山</a></li>
						<li class="open"><a href="http://www.cinemasunshine.co.jp/theater/kinuyama/" target="_blank">衣山</a></li>
					</ul>
				</li>
				<li class="tittle">
					<a class="menu" href="./theater/"><img src="./images/common/navi3.gif" width="100" height="37" alt="劇場情報"></a>
					<ul>
						<li class="open"><a href="./theater/#theater-tsuchiura">土浦</a></li>
						<li class="open"><a href="./theater/#theater-yamatokoriyama">大和郡山</a></li>
						<li class="open"><a href="./theater/#theater-kinuyama">衣山</a></li>
						<li class="open"><a href="./theater/#price_infomation">鑑賞料金</a></li>
					</ul>
				</li>
				<li class="tittle"><a href="./blog/"><img src="./images/common/navi5.gif" width="148" height="37" alt="オフシャルブログ"></a></li>
			</ul>
			</div>
		</div>
		</div>
		<!--header▲-->

		<!--content▼-->
		<div id="content">
			<div id="content_detail" style=" width:982px; min-height:970px; margin:0 auto; padding-top:40px;">

			 <!--バナーエリア▼-->
			<div id="slider-wrapper">
				<div id="slider" class="nivoSlider">
                    <?php
                    $banner = getSpecialMainBnr(1001);

                    foreach($banner as $key => $val){
                        unset($target);
                        if($val["url_flg"] == 1) $target = "target='_blank'";
                        echo "<a href='$val[url]' $target ><img src='/theaters_image/special_main_banner/$val[pic_path]' alt='$val[name]' /></a>";
                    }
                    ?>
				</div>
			</div>

			<?php
    			echo "<style>";
    			$loop = 0;
    			foreach($banner as $key => $val){
    			    echo ".nivo-controlNav .nivo-control$loop {";
    			    echo "background:url(/theaters_image/special_main_banner/$val[pic_thumb]) no-repeat";
    			    echo "}";
    			    $loop++;
    			}

    			if(count($banner) == 1){echo ".nivo-controlNav {left:425px};";
    			}elseif(count($banner) == 2){echo ".nivo-controlNav {left:355px};";
    			}elseif(count($banner) == 3){echo ".nivo-controlNav {left:305px};";
    			}elseif(count($banner) == 4){echo ".nivo-controlNav {left:255px};";
    			}elseif(count($banner) == 5){echo ".nivo-controlNav {left:205px};";
    			}elseif(count($banner) == 6){echo ".nivo-controlNav {left:155px};";
    			}elseif(count($banner) == 7){echo ".nivo-controlNav {left:95px};";
    			}elseif(count($banner) == 8){echo ".nivo-controlNav {left:45px};";
    			}
    			echo "</style>";

			?>
			<!--バナーエリア▲-->

		<div class="clear"></div>

		<div id="imax_bnr" style="margin-top:80px;"><a href="./about/"><img src="images/common/whatsimax.jpg" width="981" height="148" alt="世界を揺るがす脅威の臨場感。この冬ついに衣山と土浦に上陸。"></a></div>


		 <!--news movie cam▼-->
		<div id="contentsMenu">

		<!--左エリア▼-->
		<div id="news">
			<img src="images/common/news_bar.gif" width="567" height="28">
			<?php
				$theaterId = 1001;

				$newsViews = getNewsViews($theaterId);
				$newsViews = explode(",",$newsViews['view']);


				$news = getNews($theaterId);
				if (count($newsViews) >= 1) {
					foreach ($newsViews as $view) {
						if(count($news) >= 1) {
							foreach($news as $nws){
								if($view==$nws['id']) {
			?>

			<!--newstxtset▼-->
				<div class="news_txtarea">
					<p class="date">
						<?php echo date ('Y/m/d',strtotime($nws['start_date'])) ?><br />
						<?php echo $nws['midasi'] ?>
					</p>
					<p class="newstxt">
						<p><?php echo $nws['txt'] ?></p>
						<img src="images/common/news_boder.gif" width="553" height="3" style="margin:10px 0;">
					</p>
				</div>
			<!--newstxtset▲-->

			<?php
								}
							}
						}
					}

				}
			?>
		</div>
		<!--左エリア▲-->

		 <!--右エリア▼-->
		<div id="others" style="width:386px; float:right;">

			<!--キャンペーン情報▼-->
			<!--<div id="campaign"><img src="images/common/cam_bar.gif" width="372" height="27">
				<div class="cam_infoarea" style="margin:12px 0 10px 12px;">
				<div id="movie_info" style="width:360px; height:121px; margin-top:10px;"><a href="http://campaign.cinemasunshine.co.jp/2ticket/" ><img src="images/sidebnr_2ticket_imax.jpg" style="border:1px solid #fff;" width="360" height="121"></a></div>
				</div>-->



			<!--キャンペーン情報▲-->

          <!--作品情報▼-->
          <div id="movies"><img src="images/common/show_bar.gif" width="372" height="27">

          <div class="movie_infoarea" style="margin:10px 0 10px 15px;">
          <?php
          $bnr = getSpecialImaxMovie();
          if(count($bnr[0]) > 0){
            echo "<p class=\"date\">上映中作品</p>";
          }
          foreach($bnr[0] as $key => $val){
               if(!strstr($val['statu1'], '3')){
                   echo "<div class=\"movie_info\" style=\"background:url(/theaters_image/special/$val[pic_bnr]);\"><p id=\"movie_btn2\" style=\" width:123px; position:absolute; top:81px; left:223px;\">";
                   echo "<a href=\"./movie#$val[url]\"><img src=\"images/common/movie_btn.gif\" width=\"123\" height=\"30\" alt=\"詳細を見る\" border=\"0\" onmouseover=\"img_change(this,'images/common/movie_btn_om.gif');\" onmouseout=\"img_change(this,'images/common/movie_btn.gif');\" /></a></p></div>";
               }
          }

          if(count($bnr[1]) > 0){
              echo "<img src=\"images/common/show_boder.gif\" width=\"359\" height=\"3\">";
              echo "<p class=\"date\">上映予定作品</p>";
          }

          foreach($bnr[1] as $key => $val){
              if(!strstr($val['statu1'], '3')){
                  echo "<div class=\"movie_info\" style=\"background:url(/theaters_image/special/$val[pic_bnr]);\"><p id=\"movie_btn2\" style=\" width:123px; position:absolute; top:81px; left:223px;\">";
                  echo "<a href=\"./movie#$val[url]\"><img src=\"images/common/movie_btn.gif\" width=\"123\" height=\"30\" alt=\"詳細を見る\" border=\"0\" onmouseover=\"img_change(this,'images/common/movie_btn_om.gif');\" onmouseout=\"img_change(this,'images/common/movie_btn.gif');\" /></a></p></div>";
               }
          }

          ?>


          </div>

          </div>
          <!--作品情報▲-->

			<a href="./blog"><img src="images/common/blog_bnr.jpg" width="387" height="80" style="margin-top:20px;"></a>
			<div id="sns_area">
				<img src="images/common/sns_bar.gif" width="372" height="27">
				<div class="tsuchiura"style="height:21px; width:350px; margin:15px 0 5px 32px;">
					<ul>
						<li class="gekijyou"><img src="images/common/tsuchiura.gif"alt="土浦"></li>
						<li class="snslink"><a href="http://www.facebook.com/sunshinetsuchiura"target="_blank"><img src="images/common/facebook_btn.gif"alt="Facebook"></a></li>
						<li class="snslink"><a href="https://twitter.com/cs_tsuchiura" target="_blank"><img src="images/common/twi_btn.gif"alt="twitter"></a></li>
					</ul>
				 </div>

				<img width="359" height="3" src="images/common/show_boder.gif"style="margin-left:10px;">
				<div class="yamatokooriyama" style="height:21px; width:350px; margin:10px 0 5px 32px;">
					<ul>
						<li class="gekijyou"><img src="images/common/yamato.gif" alt="大和郡山"></li>
						<li class="snslink"><a href="http://www.facebook.com/sunshineyamatokoriyama"target="_blank"><img src="images/common/facebook_btn.gif" alt="Facebook"></a></li>
						<li class="snslink"><a href="https://twitter.com/sunshine_imax" target="_blank"><img src="images/common/twi_btn.gif"alt="twitter"></a></li>
					</ul>
				</div>

				<img width="359" height="3" src="images/common/show_boder.gif"style="margin-left:10px;">

                <div class="kinuyama"style="height:21px; width:350px; margin:10px 0 15px 32px;">
					<ul>
						<li class="gekijyou"><img src="images/common/kinuyama.gif"alt="衣山"></li>
						<li class="snslink"><a href="http://www.facebook.com/sunshineehime" target="_blank"><img src="images/common/facebook_btn.gif"alt="Facebook"></a></li>
						<li class="snslink"><a href="https://twitter.com/cs_ehime" target="_blank"><img src="images/common/twi_btn.gif"alt="twitter"></a></li>
					</ul>
				</div>
			</div>

			<p id="pagetop" style="float:right; margin-top:30px;"><a href="#copy">▲ページTOPへ</a></p>
		</div>
		<!--右エリア▲-->
	</div>
	<!--news movie cam ▲-->
</div>
</div>
<!--content▲-->

<div class="clear"></div>

<!--fotter▼-->
<div id="footer_info" style="background:url(images/common/footer_bg.gif) no-repeat scroll 50% 0; width:100%; background-color:#023764; height:48px; margin-top:40px;">
	<div id="footer_top" style="width:962px; height:28px; margin:0 auto; padding:10px;">
		 <ul id="footerNavigation">
			<li><a href="../" target="_blank">シネマサンシャインTOP</a> | </li>
			<li><a href="../company/" target="_blank">会社概要</a> | </li>
			<li><a href="../law/" target="_blank">特定商取引法に基づく表記</a> | </li>
			<li><a href="../sitepolicy/" target="_blank">利用規約</a> | </li>
			<li><a href="../privacy/" target="_blank">プライバシーポリシー</a></li>
		</ul>
	</div>
</div>

<div id="footer_bottom" style="background:#00070e; height:50px; width:962px; padding:10px; margin:0 auto;">
	<p style="font-size:10px; float:left;">Copyright (C) 2001-2016, Cinema Sunshine Co., Ltd. All Right Reserved. </p>
	<p style=" float:right; width:427px; height:16px;"><img src="images/common/imax_c.gif" width="427" height="16"></p>
</div>
</div>

<script type="text/javascript" src="scripts/om.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
</script>

<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 993895592;
var google_conversion_label = "pEYJCNittQQQqMn22QM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=0&amp;label=pEYJCNittQQQqMn22QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 994556079;
var google_conversion_label = "6zH7CNmKzAQQr_Ge2gM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/994556079/?value=0&amp;label=6zH7CNmKzAQQr_Ge2gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>

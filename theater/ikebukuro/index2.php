
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="池袋で映画を見るならシネマサンシャイン｜劇場TOP">
	<meta name="keywords" content="池袋,劇場TOP,シネマサンシャイン,サンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間">
	<title>シネマサンシャイン池袋</title>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/jquery.accordion.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/rollover.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/jquery.easing.1.3.min.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/jquery.sliderkit.1.9.2.pack.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/addons/sliderkit.delaycaptions.1.1.pack.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/sliderkit.counter.1.0.pack.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/sliderkit.timer.1.0.pack.js"></script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/sliderkit.imagefx.1.0.pack.js"></script>
	<script language="javascript">AC_FL_RunContent = 0;</script>
	<script type="text/javascript" src="http://testcinema.motionpictures.jp/js/AC_RunActiveContent4cache.js"></script>
	<script src="" language="javascript"></script>
	<link type="text/css" rel="stylesheet" href="http://testcinema.motionpictures.jp/css/reset.css" />
	<link type="text/css" rel="stylesheet" href="http://testcinema.motionpictures.jp/css/base.css" />
	<link type="text/css" rel="stylesheet" href="http://testcinema.motionpictures.jp/css/jquery.fancybox.css" />
	<link rel="stylesheet" type="text/css" href="http://testcinema.motionpictures.jp/css/sliderkit-core.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="http://testcinema.motionpictures.jp/css/sliderkit-demos.css" media="screen, projection" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="http://testcinema.motionpictures.jp/css/sliderkit-demos-ie6.css" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="http://testcinema.motionpictures.jp/css/sliderkit-demos-ie7.css" /><![endif]-->
	<!--[if IE 8]><link rel="stylesheet" type="text/css" href="http://testcinema.motionpictures.jp/css/sliderkit-demos-ie8.css" /><![endif]-->
	<link rel="stylesheet" type="text/css" href="http://testcinema.motionpictures.jp/css/lib/css/sliderkit-site.css" media="screen, projection" />
	<script type="text/javascript">
		$(window).load(function(){ //$(window).load() must be used instead of $(document).ready() because of Webkit compatibility

			// Photo gallery > Vertical
			$(".photosgallery-vertical").sliderkit({
				circular:true,
				mousewheel:false,
				shownavitems:5,
				verticalnav:true,
				navclipcenter:true,
				auto:true
			});


		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
		    $('.fancybox').fancybox();
		});
	</script><script type="text/javascript" src="../../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../../js/jquery.bxslider.js"></script>
<script type="text/javascript" src="../../js/util.js"></script>
<script type="text/javascript" src="../../js/theater_ajax.js"></script>
<script type="text/javascript">


		$(function(){
			$('.dayListBox ul').bxSlider({
				speed:700,
				 minSlides: 7,
				maxSlides: 7,
				nextSelector:'#cal_right',
				prevSelector:'#cal_left',
				prevText:'<img src="../../images/common/btn_prev.gif" alt="前へ">',
				nextText:'<img src="../../images/common/btn_next.gif" alt="次へ">',
				slideWidth: 75,
				slideMargin: 4,
				infiniteLoop:false,
				pager: false,
				useCSS:false
				});

			makeBlock();
			getJson('ikebukuro','20130204');


			$(".cal_date").click(function () {

				  $(".cal_date").each(function(){
					    $(this).addClass("notAvailable");
					});
				var class_name= $(this).attr('class');
				class_name = class_name.replace("cal_date ","");
				class_name = class_name.replace(" notAvailable","");

				$(this).removeClass("notAvailable");
				makeBlock();
				getJson('ikebukuro',class_name);
				//  console.log(class_name);
			});

		});



				</script>

	<link type="text/css" rel="stylesheet" href="../../css/base.css" />
</head>
<body>
	<!-- #wrapper start -->
	<div id="wrapper">


		<a id="pagrTop" name="pageTop"></a>
	<!-- #header start -->
	<div id="header">
		<div class="topArea">
			<div class="topWrap clearfix">
				<div class="left">
					<h1><a href="http://testcinema.motionpictures.jp/"><img src="http://testcinema.motionpictures.jp/images/common/logo_img01.gif"  alt="シネマサンシャイン" ></a></h1>
				</div>

				<div class="right">
					<ul>
						<li><a href="http://testcinema.motionpictures.jp/theater/"><img src="http://testcinema.motionpictures.jp/images/common/btn_headLis01_off.gif"  alt="劇場一覧" ></a></li>
						<li><a href="http://testcinema.motionpictures.jp/showing/"><img src="http://testcinema.motionpictures.jp/images/common/btn_headLis02_off.gif"  alt="上映中作品" ></a></li>
						<li><a href="http://testcinema.motionpictures.jp/next_showing/"><img src="http://testcinema.motionpictures.jp/images/common/btn_headLis03_off.gif"  alt="上映予定作品" ></a></li>
						<li><a href="http://testcinema.motionpictures.jp/question/"><img src="http://testcinema.motionpictures.jp/images/common/btn_headLis04_off.gif"  alt="よくあるご質問" ></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class='bottomArea'><div class='bottomWrap'><ul><li><img src='http://testcinema.motionpictures.jp/images/common/list_ikebukuro.gif' alt='' ></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn01_on.gif'  alt='上映スケジュールチケット購入' ></a></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/news/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn02_off.gif'  alt='ニュース' ></a></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/admission/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn03_off.gif'  alt='料金案内' ></a></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/advance_ticket/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn04_off.gif'  alt='前売情報' ></a></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/concession/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn05_off.gif'  alt='コンセッション' ></a></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/floor_guide/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn06_off.gif'  alt='劇場設備サービス' ></a></li><li><a href='http://testcinema.motionpictures.jp/theater/ikebukuro/access/'><img src='http://testcinema.motionpictures.jp/images/common/list_headBtn07_off.gif'  alt='アクセス' ></a></li></ul></div></div>
	</div>
	<!-- #header end -->		<!-- #container start -->
		<div id="container" class="clearfix">
			<div id="contents" class="clearfix">


				<div id="PankuzuArea">
		<ul><li><a href='http://testcinema.motionpictures.jp/'>ホーム</a>&nbsp;&gt;&nbsp;</li><li>池袋</li></ul>
	</div>

			<div id="topColumn"><div class="sliderkit photosgallery-vertical"><div class="sliderkit-nav"><div class="sliderkit-nav-clip"><ul><li><a href='#' rel='nofollow' title=''><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test8.jpg' width='106' heigh='52' alt='test8' /></a></li><li><a href='#' rel='nofollow' title=''><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test4.jpg' width='106' heigh='52' alt='test4' /></a></li><li><a href='#' rel='nofollow' title=''><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test3.jpg' width='106' heigh='52' alt='test3' /></a></li><li><a href='#' rel='nofollow' title=''><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test2.jpg' width='106' heigh='52' alt='test2' /></a></li><li><a href='#' rel='nofollow' title=''><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test1.jpg' width='106' heigh='52' alt='１２３４５６７８９０－qw&#039;sdefrgthyujkilo;p@:&quot;&quot;&quot;' /></a></li></ul></div><div class="btn-line-top"><img src="/images/common/slide-line.gif"></div><div class="btn-line-bottom"><img src="/images/common/slide-line.gif"></div><div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev"><a rel="nofollow" href="#" title="Previous photo"><span></span></a></div><div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next"><a rel="nofollow" href="#" title="Next photo"><span></span></a></div></div><div class="sliderkit-panels"><div class='sliderkit-panel'><a href='http://testcinema.motionpictures.jp/' target="_blank"><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test8.jpg' alt='test8' /></a></div><div class='sliderkit-panel'><a href='http://testcinema.motionpictures.jp/' ><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test4.jpg' alt='test4' /></a></div><div class='sliderkit-panel'><a href='http://testcinema.motionpictures.jp/' target="_blank"><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test3.jpg' alt='test3' /></a></div><div class='sliderkit-panel'><a href='http://testcinema.motionpictures.jp/' target="_blank"><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test2.jpg' alt='test2' /></a></div><div class='sliderkit-panel'><a href='http://testcinema.motionpictures.jp/' target="_blank"><img src='http://testcinema.motionpictures.jp/theaters_image/topimage/test1.jpg' alt='１２３４５６７８９０－qw&#039;sdefrgthyujkilo;p@:&quot;&quot;&quot;' /></a></div></div></div></div>				<div id="mainColumn" class="clearfix">

					<!-- ↓修正する部分はここから↓ -->
					<div class="leftColumn">
						<div class="MainArea">
							<h2 class="headlineImg">
								<img src="../../images/common/headline_Schedule.png"
									alt="上映スケジュール">
							</h2>
							<div class="whiteCanvas clearfix">
								<div class="scheduleBox">

									<!--<div class="topNotesBox">
										<p>
											インターネットでチケットを購入される方は、上映スケジュール内の購入ボタンをクリックして下さい。<br />
											※インターネットでチケットが売り切れの場合でも、当劇場チケット窓口にて当日券を販売しております。<br />
											※購入マークがない時間はインターネットでのチケット購入対象外となります。
										</p>
									</div>-->

									<div class="topTimeBox">
										<!--<p>【開場時間】</p>
										<p>-->

										<div class="topNotesBox">
<p>インターネットでチケットを購入される方は、上映スケジュール内の購入ボタンをクリックして下さい。<br />
※インターネットでチケットが売り切れの場合でも、当劇場チケット窓口にて当日券を販売しております。<br />
※購入マークがない時間はインターネットでのチケット購入対象外となります。<br />
&nbsp;</p>
</div>

<div class="topTimeBox">
<p>【開場時間】</p>

<p>1/30～1/31 9：15<br />
2/1～2/3 9：00<br />
2/4～2/8 9：15<br />
<br />
※混雑状況により変更になる場合があります。</p>
</div>
										<p class="notetxt">※混雑状況により変更になる場合があります。</p>
										<p class="exception">
											<a rel="popup" title="アイコン説明" data-fancybox-group="popup" href="../../images/common/fig_pop.jpg"  class="fancybox"><img src="../../images/common/btn_icon.gif"
												alt="アイコンの詳しい説明はこちら"> </a>
										</p>

										
									</div>
									<div class="dayListBox">
										<div id="cal_left"></div>

										<ul>
											<li style="cursor: pointer;" class="cal_date 20130204"><p class="day">02/04<span>(月)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130205 notAvailable"><p class="day">02/05<span>(火)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130206 notAvailable"><p class="day">02/06<span>(水)</span></p><p class="icon"><img alt="レディースデー" src="../../images/common/btn_ladies.png"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130207 notAvailable"><p class="day">02/07<span>(木)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130208 notAvailable"><p class="day">02/08<span>(金)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130208 notAvailable"><p class="day">02/08<span>(金)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130208 notAvailable"><p class="day">02/08<span>(金)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130208 notAvailable"><p class="day">02/08<span>(金)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li style="cursor: pointer;" class="cal_date 20130208 notAvailable"><p class="day">02/08<span>(金)</span></p><p class="icon"></p><p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p><p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p></li>
											<li><p class="day Sat">02/09<span>(土)</span></p><p class="icon"></p><p class="corner"></p></li>
											<li><p class="day Sun">02/10<span>(日)</span></p><p class="icon"></p><p class="corner"></p></li>
										</ul>

										<div id="cal_right">

										</div>

									</div>

									<div class="movieListBox">
									</div>

									<div class="notesBox">
										<p class="start">
											※終映時刻が夜23時を過ぎる作品につきましては、東京都青少年の健全な育成に関する条例により、18歳未満・高校生以下の方は保護者同伴でもご入場頂けません。<br />
											※上映時間・シアターなどは都合により変更になる場合がございます。詳細は劇場までお問合せください。<br />
											※予約可能期間は、鑑賞日2日前0時から上映開始1時間前までです。また、クレジット決済後のキャンセル・変更・払い戻しは一切致しません。<br />
											※メンバーズカードによる割引・各種割引券・前売券・招待券・高校生友情キャンペーンはご利用いただけません。<br />
											※学生料金やシニア料金・ハンディキャップ料金をご利用のお客様は、ご鑑賞当日、規約所定の証明書をお持ちください。<br />
											※当劇場のメンバーズカード会員のお客様は、カードによる割引はできませんが、ポイントの加算は致しますので、発券したチケットとメンバーズカードをチケットカウンターにお持ち下さいませ。<br />
											※3D作品をご覧になりますお客様は2歳以下のお子様でも3Dメガネを利用される場合、鑑賞料金をいただきます。2歳以下のお子様の3D鑑賞料金は1,400円です。
										</p>
										<p>
											＜重要なお知らせ＞ シネマサンシャインでは3Dメガネレンタル料金として新たに100円を頂くことになりました。<br />
											そのため、2010年11月1日より3D鑑賞料金が通常の鑑賞料金プラス400円となります。<br />
											何卒、ご理解賜りますようお願い申し上げます。<br /> ※3Dメガネ（MASTER IMAGE用）はお持ち帰り頂けます。<br />
											次回鑑賞時にお持ち頂ければ、3D鑑賞料金を100円引き（3D鑑賞料金400円→300円）させて頂きます。
										</p>
									</div>


								</div>
							</div>
						</div>
					</div>
					<!-- ↑修正する部分はここまで↑ -->



							<div class="rightColumn">
		<div class="trailArea">
			<h3 class="headlineImg"><img src="http://testcinema.motionpictures.jp/images/common/headline_Trail.png"  alt="おすすめ予告編" ></h3>
			<p>
				<script language="javascript">
					if (AC_FL_RunContent == 0) {
						alert("このページでは \"AC_RunActiveContent.js\" が必要です。");
					} else {
						AC_FL_RunContent(
							'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
							'width', '256',
							'height', '230',
							'src', 'http://testcinema.motionpictures.jp/flv_player',
							'quality', 'high',
							'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
							'align', 'middle',
							'play', 'true',
							'loop', 'true',
							'scale', 'showall',
							'wmode', 'window',
							'devicefont', 'false',
							'id', 'flv_player',
							'bgcolor', '#ffffff',
							'name', 'flv_player',
							'menu', 'true',
							'allowFullScreen', 'false',
							'allowScriptAccess','sameDomain',
							'movie', 'http://testcinema.motionpictures.jp/flv_player',
							'FlashVars', 'theater=1',
							'salign', ''
							); //end AC code
					}
				</script>
				<noscript>
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="256" height="230" id="flv_player" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="movie" value="flv_player.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="flv_player.swf" quality="high" bgcolor="#ffffff" width="300" height="243" name="flv_player" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
				</noscript>
			</p>
		</div>

		

		<div class="infoArea">
			<h3 class="headlineImg"><img src="http://testcinema.motionpictures.jp/images/common/headline_Info.png"  alt="インフォメーション" ></h3>
			<ul>
				<li><a href='http://www.cinemasunshine.co.jp/theater/ozu/access/' target="_blank"><img src='http://testcinema.motionpictures.jp/theaters_image/campaign/1.gif' width='258' alt='テスト' ></a></li><li><a href='http://www.cinemasunshine.co.jp/theater/ozu/access/' ><img src='http://testcinema.motionpictures.jp/theaters_image/campaign/2.gif' width='258' alt='テスト' ></a></li>
			</ul>
		</div>
	</div>					</div>
			</div>
		</div>
		<!-- #container end -->



				<!-- #footer start -->
	<div id="footer">
		<div id="footerMain">
			<div class="top">
				<div class="topMain clearfix">
					<ul class="ftrListTop">
						<li><a href="http://testcinema.motionpictures.jp/company/">会社概要</a></li>
						<li>|</li>
						<li><a href="http://testcinema.motionpictures.jp/sitemap/">サイトマップ</a></li>
						<li>|</li>
						<li><a href="http://testcinema.motionpictures.jp/law/">特定商取引法に基づく表記</a></li>
						<li>|</li>
						<li><a href="http://testcinema.motionpictures.jp/sitepolicy/">利用規約</a></li>
						<li>|</li>
						<li class="end"><a href="http://testcinema.motionpictures.jp/privacy/">プライバシーポリシー</a></li>
					</ul>

					<ul class="ftrListBottom">
						<li>ご意見・ご感想 （ご利用劇場をお知らせください） </li>
						<li><a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=%e3%81%94%e6%84%8f%e8%a6%8b%e3%83%bb%e3%81%94%e6%84%9f%e6%83%b3"><img src="http://testcinema.motionpictures.jp/images/common/btn_mail.gif"></a></li>
					</ul>
				</div>
			</div>

			<div class="bottom">
				<div class="bottomMain">
					<p>Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved. </p>
				</div>
			</div>
		</div>
	</div>
	<!-- #footer end -->

	<!-- #footerFixed start -->
    <div id="footerFixed">
		<div id="footerShade"></div>

		<div id="footerWrap">
			<div id="footerTop" class="clearfix">
				<div class="leftSection">
					<img src="http://testcinema.motionpictures.jp/images/common/fig_pickup.png" alt="PICK UP">
				</div>
			</div>

			<ul>
				<li><img width ='226' src='http://testcinema.motionpictures.jp/images/pickBnr/4.gif' alt='テストキャンペーン4' /></li><li><a href='http://www.cinemasunshine.co.jp/ref.php'  ><img width ='226' src='http://testcinema.motionpictures.jp/images/pickBnr/5.gif' alt='テストキャンペーン5' /></a></li>
			</ul>
	         <hr style="clear: left;visibility: hidden;"/>
		</div>
	</div>
	<!-- #footerFixed end -->

	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

		$(function(){
		});
	</script>		</div>
	<!-- #wrapper end -->
</body>
</html>

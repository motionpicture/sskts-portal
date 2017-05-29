<?php

include("../../lib/require.php");
$arr = getNowPage();
$theater = $arr["ename"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php getHeadInclude(); ?>
<script type="text/javascript" src="../../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../../js/jquery.bxslider.js"></script>
<script type="text/javascript" src="../../js/util.js"></script>
<script type="text/javascript" src="../../js/theater_ajax.js?20170529"></script>
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
			getJson('<?php echo $theater?>','<?php

			if ($_GET['pre']) {
				$value = reset(getDates2($theater,true));
				echo $value['val'];
			} else {
				echo date('Ymd');
			}
			 ?>');


				$(".cal_date").click(function () {

					  $(".dayListBox ul li").each(function(){
						    $(this).addClass("notAvailable");
						});
					var class_name= $(this).attr('class');
					class_name = class_name.replace("cal_date ","");
					class_name = class_name.replace(" notAvailable","");

					$(this).removeClass("notAvailable");
					makeBlock();
					getJson('<?php echo $theater?>',class_name);
					//  console.log(class_name);
				});

		});



				</script>
<link type="text/css" rel="stylesheet" href="../../css/base.css" />
<!--サンライズ社170417_tagA-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MSQSQ9V');</script>
<!-- End Google Tag Manager -->
<!--/サンライズ社170417_tagA-->
</head>
<body>
<!--サンライズ社170417_tagB-->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSQSQ9V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!--/サンライズ社170417_tagB-->
<!-- #wrapper start -->
<div id="wrapper">
	<?php getHeader(); ?>
	<!-- #container start -->
	<div id="container" class="clearfix">
		<div id="contents" class="clearfix">
			<?php getPankuzu(); ?>
			<?php getSlideBnr(); ?>
			<div id="mainColumn" class="clearfix">
				<!-- ↓修正する部分はここから↓ -->
				<div class="leftColumn">

							<!-- ↓adsense上部↓ -->
							<div class="adArea">
								<script type="text/javascript"><!--
								google_ad_client = "ca-pub-3891476404601512";
								/* シネサン（沼津上部） */
								google_ad_slot = "8234546167";
								google_ad_width = 468;
								google_ad_height = 60;
								//-->
								</script>
								<script type="text/javascript"
								src="//pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</div>
							<!-- ↑adsense上部↑ -->

					<div class="MainArea">
						<h2 class="headlineImg"> <img src="../../images/common/headline_Schedule.png"
									alt="上映スケジュール"> </h2>
						<div class="whiteCanvas clearfix">
							<div class="scheduleBox">
								<div class="topNotesBox">
									<p> インターネットでチケットを購入される方は、上映スケジュール内の購入ボタンをクリックして下さい。<br />
										※インターネットでチケットが売り切れの場合でも、当劇場チケット窓口にて当日券を販売しております。<br />
										※購入マークがない時間はインターネットでのチケット購入対象外となります。 </p>
								</div>
								<div class="topTimeBox">
									<p>
										<?php
												$theaterId=getTheaterId($theater);
												$open = getImportants($theaterId['id']);
												echo $open['open_txt'];
											?>
									</p>
									<p class="exception"> <a rel="popup" title="アイコン説明" data-fancybox-group="popup" href="../../images/common/fig_pop.jpg"  class="fancybox"><img src="../../images/common/btn_icon.gif"
												alt="アイコンの詳しい説明はこちら"> </a> </p>
									<?php
										$isPreExistCode = getDates2($theater,true,true);
										if($isPreExistCode['error']=="000000" && !$_GET['pre']) {
											echo '<p class="senkouclass">チケットの先行販売はこちらからお進み下さい。<br><a href="./?pre=ari"><img src="../../images/common/btn_res.gif" alt="先行予約あり"></a></p>';

										} else {
											if($isPreExistCode['error']=="000000") {
												echo '<p><a href="./"><img src="../../images/common/btn_sche.gif" alt="通常スケジュール"></a></p>';
											}
										}
										?>
								</div>
								<?php
//予約可能な日付取得

if ($_GET['pre']) {
	$dates=getDates2($theater,true);
} else {
	$dates=getDates2($theater);
}
$dates2=$dates;

//var_dump($dates);
//var_dump(getDates2($theater,true,true));
//$dates=array_reverse($dates);

//var_dump($dates);
//精査後のデーター格納
$calender_dates;

//7日足りない場合
if (count($dates) <7) {
	//7日を作成
	for ($i = 0; $i < 7; $i++) {
		//先行予約の場合
		if ($_GET['pre']) {
			$current_date = date("Ymd", strtotime($value['val']." +".$i." day"  ));
		} else {
			$current_date = date("Ymd", strtotime("+".$i." day"  ));
		}

		$equal=false;

		foreach($dates as $db_date) {
			$db_date['val'] = date("Ymd", strtotime($db_date['val'] ));


			if ($current_date == $db_date['val'] ) {
				unset($dates2[$db_date['val']]);
				$equal = true;
				$calender_dates[] = array("available"=>true,"date"=>$current_date);
				break;
			}
		}
		if (!$equal) {
			$calender_dates[] = array("available"=>false,"date"=>$current_date);
		}

	}
	//7日以上の日付がある場合はそれを出力
	if(count($dates2) > 0) {
		foreach($dates2 as $db_date) {
			$calender_dates[] = array("available"=>true,"date"=>$db_date['val']);
		}
	}



} else {
	foreach($dates as $db_date) {
		$db_date['val'] = date("Ymd", strtotime($db_date['val'] ));
		if($db_date['flg'] == 1){
			$calender_dates[] = array("available"=> true,"date"=>$db_date['val']);
		}else{
			$calender_dates[] = array("available"=> false,"date"=>$db_date['val']);
		}
	}

}

//foreach()

?>
								<div class="dayListBox">
									<div id="cal_left"></div>
									<ul>
										<?php
										$cal_cnt = 0;
										foreach($calender_dates as $cal_date) {

											if ($cal_date['available']) {
												if ($cal_cnt>0) {
													echo '<li style="cursor: pointer;" class="cal_date '.$cal_date['date']. ' notAvailable">';
												} else {
													echo '<li style="cursor: pointer;" class="cal_date '.$cal_date['date'].'">';
												}

											} else {
												echo '<li class="notAvailable">';
											}

											$weekend = getYoubi($cal_date['date']);

											$weekend_flg="";
											if ($weekend=="土") {
												$weekend_flg=" Sat";
											} else if ($weekend=="日") {
												$weekend_flg=" Sun";
											}



											echo '<p class="day'.$weekend_flg.'">'.getmd($cal_date['date']).'<span>('.$weekend.')</span></p>';

											$sale_flg="";
											if ($weekend=="水"){
												$sale_flg.='<img alt="レディースデー" src="../../images/common/btn_ladies.png">';
											}
											if (getD($cal_date['date'])=="01"){
												$sale_flg.='<img src="../../images/common/btn_first.png" alt="ファーストデー">';
											}
											if(array_key_exists($theater,getMensArray()) && $weekend=="木") {
												$sale_flg.='<img src="../../images/common/btn_members.png" alt="メンズデー">';
											}

											echo '<p class="icon">'.$sale_flg.'</p>';



											if ($cal_date['available']) {
												echo '<p class="corner"><img src="../../images/common/btn_corner.gif" alt=""></p>';
												echo '<p class="corner_white"><img src="../../images/common/btn_corner_white.gif" alt=""></p>';
											} else {
												echo '<p class="corner"></p>';
											}
											echo '</li>';

											$cal_cnt++;
										}
?>
									</ul>
									<div id="cal_right"> </div>
								</div>
								<div class="movieListBox"> </div>
								<div class="notesBox">
									<p class="start"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- ↑修正する部分はここまで↑ -->
				<?php getRightMenu(); ?>
			</div>
		</div>
	</div>
	<!-- #container end -->
	<?php getFooter(); ?>
</div>
<!-- #wrapper end -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 993895592;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>

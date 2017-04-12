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
            <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
			//getJson('<?php echo $theater?>','<?php

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
                    <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
					//getJson('<?php echo $theater?>',class_name);
				});

		});



				</script>
<link type="text/css" rel="stylesheet" href="../../css/base.css" />
</head>
<body>
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
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- シネサン(姶良上部) -->
                                <ins class="adsbygoogle"
                                     style="display:inline-block;width:468px;height:60px"
                                     data-ad-client="ca-pub-3891476404601512"
                                     data-ad-slot="3830220965"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
							</div>
							<!-- ↑adsense上部↑ -->

					<div class="MainArea">
						<h2 class="headlineImg"> <img src="../../images/common/headline_Schedule.png"
									alt="上映スケジュール"> </h2>
						<div class="whiteCanvas clearfix">
							<div class="scheduleBox">
                              <?php // 劇場オープン前の対応 ?>
<!--								<div class="topNotesBox">
									<p> インターネットでチケットを購入される方は、上映スケジュール内の購入ボタンをクリックして下さい。<br />
										※インターネットでチケットが売り切れの場合でも、当劇場チケット窓口にて当日券を販売しております。<br />
										※購入マークがない時間はインターネットでのチケット購入対象外となります。 </p>
								</div>-->
								<div class="topTimeBox">
									<p>
										<?php
												$theaterId=getTheaterId($theater);
												$open = getImportants($theaterId['id']);
												echo $open['open_txt'];
											?>
									</p>
									<!--姶良静的スケジュール-->
			<style type="text/css">
			  table , td, th {border: 1px solid #595959;border-collapse: collapse;}
			  .scadule{width:100%; font-size: 14px;margin-bottom:20px;}
			  h3{margin:10px 0px;font-size: 15px;font-weight:bold;}
			  td,th {padding: 3px;width: 30px;height: 25px;}
			  .time td{text-align:center;font-weight:bold;}
			  .note_lil{font-size:10px;font-weight:normal;}
			  .red_txt{color:red;}
			  /*リスト用CSS*/
			  .tittle{text-align:left;background-color:#e3e3e3;padding:5px;font-weight:bold;}
			  .time_scl ul{padding:5px;}
			  .time_scl ul li{list-style:none;padding:2px 0px;}
			  .time_scl{border-bottom: solid 1px #e3e3e3;border-bottom-style: dotted;}
			  .bd_top{border-top: solid 1px #e3e3e3;border-top-style: dotted;}
			  /*リスト用CSS*/
			</style>
			<h3>4/20(木)〜4/21(金)上映スケジュール</h3>
			<table class="scadule">
				<tbody>
						<tr>
							<td class="tittle" colspan="6">美女と野獣【4DX3D版吹替】</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:55</td>
							<td>12:50</td>
							<td>15:40</td>
							<td>21:10<br /><span class="note_lil">レイトショー</span></td>
							<td></td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">美女と野獣【吹替版】</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:35</td>
							<td>12:20</td>
							<td>15:05</td>
							<td>17:50</td>
							<td>20:35<br /><span class="note_lil">レイトショー</span></td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">バーニング・オーシャン【字幕版】</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:15</td>
							<td>11:35</td>
							<td>16:15</td>
							<td>20:50<br /><span class="note_lil">レイトショー</span></td>
							<td></td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">名探偵コナン　から紅の恋歌(ラブレター)</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>10:00</td>
							<td>12:30</td>
							<td>15:00</td>
							<td>17:35</td>
							<td>20:00<br /><span class="note_lil">レイトショー</span></td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:50</td>
							<td>12:30</td>
							<td>15:20</td>
							<td>17:45</td>
							<td>20:25<br /><span class="note_lil">レイトショー</span></td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">映画クレヨンしんちゃん 襲来!!宇宙人シリリ</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:30</td>
							<td>11:45</td>
							<td>14:00</td>
							<td>16:15</td>
							<td>18:35</td>
						</tr>
						<tr>
						<tr class="time">
							<td>21日</td>
							<td>9:40</td>
							<td>11:55</td>
							<td>13:55</td>
							<td>16:55</td>
							<td>18:35</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">ReLIFE リライフ</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>11:25</td>
							<td>14:20</td>
							<td>16:00</td>
							<td>20:35<br /><span class="note_lil">レイトショー</span></td>
							<td>&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:25</td>
							<td>12:25</td>
							<td>17:40</td>
							<td>19:10</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">ゴースト・イン・ザ・シェル【4DX3D版吹替】</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>10:10</td>
							<td>12:50</td>
							<td>15:20</td>
							<td>17:50</td>
							<td>20:50<br /><span class="note_lil">レイトショー</span></td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>18:30</td>
							<td colspan="4"></td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">ゴースト・イン・ザ・シェル【字幕版】</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>12:05</td>
							<td>17:05</td>
							<td colspan="3"></td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>11:45</td>
							<td>16:25</td>
							<td>21:05<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">レゴバットマン ザ・ムービー【吹替版】</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:45</td>
							<td>12:00</td>
							<td>16:50</td>
							<td>20:20<br /><span class="note_lil">レイトショー</span></td>
							<td>&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:30</td>
							<td>14:10</td>
							<td>18:45</td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">ラ・ラ・ランド【字幕版】</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:25</td>
							<td>14:25</td>
							<td>20:30<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>14:25</td>
							<td>20:10<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">SING／シング【吹替版】</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:35</td>
							<td>11:55</td>
							<td>14:15</td>
							<td>18:40</td>
							<td>&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>11:50</td>
							<td>16:25</td>
							<td>21:00</td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">モアナと伝説の海【吹替版】</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:50</td>
							<td>12:25</td>
							<td>14:50</td>
							<td>17:15</td>
							<td>&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>9:20</td>
							<td>14:00</td>
							<td>18:40</td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">この世界の片隅に</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>12:15</td>
							<td>17:30</td>
							<td>20:25<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>14:15</td>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">湯を沸かすほどの熱い愛</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:40</td>
							<td>14:55</td>
							<td>20:10<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>15:00</td>
							<td>20:00<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="3">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="6">ゆずの葉ゆれて</td>
						</tr>
						<tr class="time">
							<td>20日</td>
							<td>9:20</td>
							<td>13:55</td>
							<td>16:35</td>
							<td>18:30</td>
							<td>&nbsp;</td>
						</tr>
						<tr class="time">
							<td>21日</td>
							<td>10:00</td>
							<td>12:15</td>
							<td>17:55</td>
							<td colspan="2">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<h3>4/22(土)〜4/27(木)上映スケジュール</h3>
				<table class="scadule">
					<tbody>
						<tr>
							<td class="tittle" colspan="5">美女と野獣【4DX3D版吹替】</td>
						</tr>
						<tr class="time">
							<td>9:55</td>
							<td>12:50</td>
							<td>15:40</td>
							<td>21:10<br /><span class="note_lil">レイトショー</span></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">美女と野獣【吹替版】</td>
						</tr>
						<tr class="time">
							<td>9:35</td>
							<td>12:20</td>
							<td>15:05</td>
							<td>17:50</td>
							<td>20:35<br /><span class="note_lil">レイトショー</span></td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">バーニング・オーシャン【字幕版】</td>
						</tr>
						<tr class="time">
							<td>9:15</td>
							<td>11:35</td>
							<td>16:15</td>
							<td>20:50<br /><span class="note_lil">レイトショー</span></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">名探偵コナン　から紅の恋歌(ラブレター)</td>
						</tr>
						<tr class="time">
							<td>9:50</td>
							<td>12:30</td>
							<td>15:20</td>
							<td>18:00</td>
							<td>20:25<br /><span class="note_lil">レイトショー</span></td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">映画クレヨンしんちゃん 襲来!!宇宙人シリリ</td>
						</tr>
						<tr class="time">
							<td>9:25</td>
							<td>11:40</td>
							<td>13:55</td>
							<td>16:10</td>
							<td>18:35</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">ReLIFE リライフ</td>
						</tr>
						<tr class="time">
							<td>9:40</td>
							<td>12:10</td>
							<td>17:20</td>
							<td>20:05<br /><span class="note_lil">レイトショー</span></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">ゴースト・イン・ザ・シェル【4DX3D版吹替】</td>
						</tr>
						<tr class="time">
							<td>18:30</td>
							<td colspan="4">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">ゴースト・イン・ザ・シェル【字幕版】</td>
						</tr>
						<tr class="time">
							<td>11:45</td>
							<td>16:25</td>
							<td>21:05<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">レゴバットマン ザ・ムービー【吹替版】</td>
						</tr>
						<tr class="time">
							<td>9:30</td>
							<td>14:10</td>
							<td>18:45</td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">ラ・ラ・ランド【字幕版】</td>
						</tr>
						<tr class="time">
							<td>14:55</td>
							<td>20:30<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="3">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">SING/シング【吹替版】</td>
						</tr>
						<tr class="time">
							<td>11:50</td>
							<td>16:25</td>
							<td>21:00<br /><span class="note_lil">レイトショー</span></td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">モアナと伝説の海【吹替版】</td>
						</tr>
						<tr class="time">
							<td>9:20</td>
							<td>14:00</td>
							<td>18:40</td>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">この世界の片隅に</td>
						</tr>
						<tr class="time">
							<td>12:05</td>
							<td>17:40</td>
							<td colspan="3">&nbsp;</td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">湯を沸かすほどの熱い愛</td>
						</tr>
						<tr class="time">
							<td>14:55</td>
							<td>18:25※</td>
							<td colspan="3"><span class="note_lil red_txt">※26日(水)18:25の回休映</span></td>
						</tr>
						<tr>
							<td class="tittle" colspan="5">ゆずの葉ゆれて</td>
						</tr>
						<tr class="time">
							<td>10:00</td>
							<td>14:05</td>
							<td>21:10※</td>
							<td colspan="2"><span class="note_lil red_txt">※26日(水) 21:10の回休映</span></td>
						</tr>
					</tbody>
				</table>
			<!--/姶良静的スケジュール-->
                                    <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
									<!--<p class="exception"> <a rel="popup" title="アイコン説明" data-fancybox-group="popup" href="../../images/common/fig_pop.jpg"  class="fancybox"><img src="../../images/common/btn_icon.gif"
												alt="アイコンの詳しい説明はこちら"> </a> </p>-->
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
                                <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
								<!--<div class="dayListBox">
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
								</div>-->
                                <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
								<!--<div class="movieListBox"> </div>-->
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
<!-- 170406 姶良GDN追加 -->
<!-- リマーケティング タグの Google コード -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 856386322;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/856386322/?guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- /リマーケティング タグの Google コード -->
<!-- /170406 姶良GDN追加 -->
</body>
</html>

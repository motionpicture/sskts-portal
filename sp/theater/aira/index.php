<?php
include("../../../lib/require.php");

//theaterは固定
$arr = getNowPage();
$theater = $arr["ename"];

$p_date= date('Ymd');
if(!empty($_GET['date'])) {
	$p_date=date('Ymd',strtotime($_GET['date']));
}

if(!empty($_GET["pre"])) {
	$result = getScheduleSp($theater,$p_date,true);
} else {
	$result = getScheduleSp($theater,$p_date);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../css/theater.css">
	<script type="text/javascript" src="../../../js/jquery.bxslider.js"></script>
	<script type="application/javascript" charset="UTF-8">//a:hoverの設定
		$(function(){
			<?php if (!empty($_GET['date']) ) {?>
				 var p = $(".dayListBox").offset().top;
				 $('html,body').animate({ scrollTop: p }, 'slow');
			<?php } ?>
		});

		jQuery(function($){
		    $( 'a, input[type="button"], input[type="submit"], button' )
      		.bind( 'touchstart', function(){
      			  $( this ).addClass( 'hover' );
		    }).bind( 'touchend', function(){
		        $( this ).removeClass( 'hover' );
		    });

			$('.dayListBox ul').bxSlider({
				speed:700,
				minSlides: 4,
				maxSlides: 4,
				nextSelector:'#cal_right',
				prevSelector:'#cal_left',
				prevText:'<img src="../../images/common/btn_prev.gif" alt="前へ" width="10">',
				nextText:'<img src="../../images/common/btn_next.gif" alt="次へ" width="10">',
				slideWidth: 64,
				slideMargin: 2,
				infiniteLoop:false,
				pager: false
				//useCSS:false
			});

			$(".cal_date").click(function () {
				var class_name= $(this).attr('class');
				class_name = class_name.replace("cal_date ","");
				class_name = class_name.replace(" notAvailable","");
				<?php
					if (!empty($_GET['pre'])) {
						echo "window.location.href = './?date='+class_name+"."'&pre=ari';";
					} else {
						echo "window.location.href = './?date='+class_name;";
					}
				?>
			});
		});
	</script>
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<?php getSmartSlideBnr(); ?>
	<h2><div class="category_bar_p">上映スケジュール</div></h2>
	<div class="section">
		<div class="topNotes">
			<p class="ptblr10">
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
							<td colspan="3"></td>
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
							<td>14:55</td>
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
							<td>21:00<br /><span class="note_lil">レイトショー</span></td>
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
		</div>

		<?php
            // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携
            /*
			$isPreExistCode = getDates($theater,true,true);
			if($isPreExistCode['error']=="000000" && !$_GET['pre']) {
				//echo '<p><a href="./?pre=ari"><img src="../../images/common/btn_res.gif" alt="先行予約あり"></a></p>';
				echo '<p id="sche_btn"><a href="./?pre=ari"><img src="../../images/common/btn_res.gif" alt="先行予約あり"></a></p>';
			} else {
				if($isPreExistCode['error']=="000000") {
					echo '<p id="sche_btn"><a href="./"><img src="../../images/common/btn_sche.gif" alt="通常スケジュール"></a></p>';
					//echo '<p><a href="./">通常</a></p>';
				}
			}
            */
		?>

		<?php
            // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携
            /*
			//予約可能な日付取得

			//先行モードの場合
			if ($_GET['pre']) {
				$dates=getDates($theater,true);
			} else {
				$dates=getDates($theater);
			}
			$dates2=$dates;

			//精査後のデーター格納
			$calender_dates;

			//7日足りない場合
			if (count($dates) <7) {
				//7日を作成
				for ($i = 0; $i < 7; $i++) {
					//先行予約の場合
					if ($_GET['pre']) {
						$current_date = date("Ymd", strtotime(reset($dates)." +".$i." day"  ));
					} else {
						$current_date = date("Ymd", strtotime("+".$i." day"  ));
					}

					$equal=false;

					foreach($dates as $db_date) {
						$db_date = date("Ymd", strtotime($db_date ));
						if ($current_date == $db_date ) {
							unset($dates2[$db_date]);
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
						$calender_dates[] = array("available"=>true,"date"=>$db_date);
					}
				}
			} else {
				foreach($dates as $db_date) {
					$db_date = date("Ymd", strtotime($db_date ));
					$calender_dates[] = array("available"=>true,"date"=>$db_date);
				}
			}
			//var_dump($calender_dates);
			//foreach()
            */
		?>


		<!--スライダー-->
        <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
		<!--<div class="dayListBox">
			<div id="cal_left"></div>
			<ul>
				<?php
                    // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携
                    /*
					$cal_cnt = 0;
					foreach($calender_dates as $cal_date) {
						if ($cal_date['available']) {
							//日付を選択した場合は選択日付のみ白
							if (!empty($_GET['date'])) {
								if ($cal_date['date'] ==$_GET['date']) {
									echo '<li style="cursor: pointer; float: left; list-style: none outside none; width: 64px; margin-right: 2px;;" class="cal_date '.$cal_date['date'].'">';
								} else {
									echo '<li style="cursor: pointer; float: left; list-style: none outside none; width: 64px; margin-right: 2px;" class="cal_date '.$cal_date['date']. ' notAvailable">';
								}

							} else {
								//最初の接続のとき
								if ($cal_cnt>0) {
									echo '<li style="cursor: pointer; float: left; list-style: none outside none; width: 64px; margin-right: 2px;" class="cal_date '.$cal_date['date']. ' notAvailable">';
								} else {
									echo '<li style="cursor: pointer; float: left; list-style: none outside none; width: 64px; margin-right: 2px;;" class="cal_date '.$cal_date['date'].'">';
								}
							}


						} else {
							echo '<li class="notAvailable" style="float: left; list-style: none outside none; width: 64px; margin-right: 2px;">';
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
							$sale_flg.='レディースデイ';
						}
						if (getD($cal_date['date'])=="01"){
							$sale_flg.='ファーストデイ';
						}
						if(array_key_exists($theater,getMensArray()) && $weekend=="木") {
							$sale_flg.='メンバーズデイ';
						}

						echo '<p class="icon">'.$sale_flg.'</p>';



						if ($cal_date['available']) {
							echo '<p class="corner"><img src="../../images/common/btn_corner.gif" width="9" alt=""></p>';
							echo '<p class="cornerWhite"><img src="../../images/common/btn_corner_white.gif" width="9" alt=""></p>';
						} else {
							echo '<p class="corner"></p>';
						}
						echo '</li>';

						$cal_cnt++;
					}
                    */
				?>
			</ul>
			<div id="cal_right"></div>
		</div>-->
		<!--/スライダー-->

		<div class="bottomNotes">
			<p class="ptblr10">
				<?php
					//echo $open['open_txt'];
				?>

				<!-- インターネットでチケットを購入される方は、上映スケジュール内の購入ボタンをクリックして下さい。<br>
				※インターネットでチケットが売り切れの場合でも、当劇場チケット窓口にて当日券を販売しております。<br>
				※購入マークがない時間はインターネットでのチケット購入対象外となります。 -->
			</p>
		</div>

		<p class="date">
			<?php
                // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携
                /*
				if ($result["error"] == "000000") {
					echo date("Y年m月d日",strtotime($result["data"]->date))."(".getYoubi($result["data"]->date).")"; ;
				}
                */
			?>
		</p>
	</div>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->


	<!-- ↓adsense上部↓ -->
	<div class="section ptb10">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- シネサン(SP 姶良上部) -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:320px;height:50px"
             data-ad-client="ca-pub-3891476404601512"
             data-ad-slot="6783687364"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
	</div>
	<!-- ↑adsense上部↑ -->

	<?php
	echo getSmartTrailer();
	?>

	<div class="section ptb10">
		<?php
            // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携
            /*
			foreach($result["data"]->movie as $movie) {
				$comment="";
				//var_dump($movie);
				echo '<div class="basebox_lineblue"></div>';
					echo '<div class="schedulebox">';
					echo '<div class="title_bar">';
						echo '<table width="280">';
						echo '<tr>';
						echo '<td colspan="2"><span class="txt_bold"><a href="'.$movie->official_site.'">'.$movie->name.'</a></span></td>';
						echo '</tr>';
						echo '<tr>';
						if ($movie->comment!="") {
							$comment = '  /'.$movie->comment;
						}
						echo '<td>'.$movie->ename.$comment .'</td>';
						echo '<td class="screen_time">上映時間：'.$movie->running_time.'分</td>';
						echo '</tr>';
						echo '</table>';
						echo '</div>';
						echo '<table width="280" class="movie_schedule">';
				foreach ($movie->screen as $screen) {

					foreach ($screen->time as $time) {
						echo '<tr>';
						//var_dump($time);
						if ($time->late==2) {
							echo '<td width="150"><span class="time_bold">'.getTimeFormat($time->start_time).'</span>&#xFF5E;'.getTimeFormat($time->end_time).'★</td>';
						} elseif($time->late==1) {
							echo '<td width="150"><span class="time_bold">'.getTimeFormat($time->start_time).'</span>&#xFF5E;'.getTimeFormat($time->end_time).'<img src="../../images/common/icon_morning2_sp.png"></td>';
						}else {
							echo '<td width="150"><span class="time_bold">'.getTimeFormat($time->start_time).'</span>&#xFF5E;'.getTimeFormat($time->end_time).'</td>';
						}

						echo '<td width="49">'.$screen->name.'</td>';

						if($time->available==6) {
							echo '<td width="81"></td>';
						}else if ($time->available==1 || $time->available==4){
							echo '<td width="81"><img src="../../images/theater/btn_buyPtn1.gif" width="81" alt="窓口"></td>';
						}else if ($time->available==5) {
							echo '<td width="81"><img src="../../images/theater/btn_buyPtn5.gif" width="81" alt="満席"></td>';
						}else {
							echo '<td width="81"><a href="'.$time->url.'" target="_blank"><img src="../../images/theater/btn_buyPtn'.$time->available.'.gif" width="81" alt="購入"></a></td>';
						}

						echo '</tr>';

						echo '<tr>';
						echo '<td colspan="3" class=" table_line_02_p"><p class="table_line_02"></p></td>';
						echo '</tr>';
					}
				}
				echo '</table>';
				echo '</div>';
			}
            */
		?>
	</div>
	<div class="section">
		<p class="notice">
            <?php // TODO: SASAKI_TICKET-60 [鹿児島追加]スケジュール連携 ?>
			<?php //echo $result["attention"] ?>
		</p>
	</div>
	<div class="category_bar_p">ピックアップ</div>
	<div class="section ptb10">
		<ul class="pickupArea">
			<?php  getSmartPickUp(); ?>
		</ul>
	</div>

	<?php getSmartFooter(); ?>
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

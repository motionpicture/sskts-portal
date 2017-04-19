<?php
include("../../../lib/require.php");

//theaterは固定
$arr = getNowPage();
$theater = $arr["ename"];

if(!empty($_GET['date'])) {
	$p_date=date('Ymd',strtotime($_GET['date']));
} else if (time() < strtotime('2017-04-20')) { // SSKTS-267
    $p_date = date('Ymd', strtotime('2017-04-20'));
} else {
    $p_date = date('Ymd');
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
		<!--チケット照会バナー-->
		<div class="bnr_ticket_inquiry">
			<a href="<?php echo TICKETING_BASE_URL ?>/inquiry/login?theater=018">
				<img src="../../images/common/bnr_ticket_inquiry_sp.jpg" alt="オンラインチケット照会はこちら" width="100%">
			</a>
		</div>
		<!--/チケット照会バナー-->
		<div class="topNotes">
			<p class="ptblr10">
				<?php
					$theaterId=getTheaterId($theater);
					$open = getImportants($theaterId['id']);
					echo $open['open_txt'];
				?>
				インターネットでチケットを購入される方は、上映スケジュール内の購入ボタンをクリックして下さい。<br>
				※インターネットでチケットが売り切れの場合でも、当劇場チケット窓口にて当日券を販売しております。<br>
				※購入マークがない時間はインターネットでのチケット購入対象外となります。<br>
			</p>
		</div>

		<?php
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
		?>

		<?php
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
		?>


		<!--スライダー-->
		<div class="dayListBox">
			<div id="cal_left"></div>
			<ul>
				<?php
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
				?>
			</ul>
			<div id="cal_right"></div>
		</div>
		<!--/スライダー-->

		<p class="date">
			<?php
				if ($result["error"] == "000000") {
					echo date("Y年m月d日",strtotime($result["data"]->date))."(".getYoubi($result["data"]->date).")"; ;
				}
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
							echo '<td width="81"><a href="'.$time->url.'"><img src="../../images/theater/btn_buyPtn'.$time->available.'.gif" width="81" alt="購入"></a></td>';
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
		?>
	</div>
	<div class="section">
		<p class="notice">
			<?php echo $result["attention"] ?>
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

<?php
include("../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<script type="text/javascript" src="../js/sunshine_ajax_sp.js"></script>
	<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartSlideBnr(); ?>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->

	<div class="section schedule pt10">
		<form name="searchForm" enctype="multipart/form-data" method="post" action="./result.php">
			<img class="top_schedule" src="./images/top/top_schedule.gif" width="320" alt="上映スケジュールを調べる">
			<div class="schedule_box">
				<img class="schedule_txt" src="./images/top/img_search01.gif" height="15" alt="">
				<div class="disable_class">
					<select id="theaterSelect" name="theater">
					<?php
					//theater一覧取得
					$theaters = getTheaterList();

					foreach ($theaters as $theater) {
						//もし劇場が選択されている場合
						if (!empty($_GET['theater']) && $theater['ename'] == $_GET['theater']) {
								$option_tag = sprintf('<option value="%s" selected>%s</option>'."\r\n",$theater['ename'],$theater['name']);
							} else {
								$option_tag = sprintf('<option value="%s">%s</option>'."\r\n",$theater['ename'],$theater['name']);
							}

						echo $option_tag;
					}
					?>
					</select>
				</div>
			</div>
			<div class="schedule_box">
				<img class="schedule_txt" src="./images/top/img_search02.gif" height="15" alt="">
				<div class="disable_class">
					<select name="date" id="daySelect">
						<option value=""></option>
					</select>
				</div>
			</div>

			<div class="schedule_box">
				<img class="schedule_txt" src="./images/top/img_search03.gif" height="15" alt="">
				<div class="disable_class">
					<select name="movie" id="movieSelect">
						<option value=""></option>
					</select>
				</div>
			</div>

			<div>
			<p class="btn_submit"><input type="image" src="./images/top/btn_submit.gif" width="161" alt="検索する"></p>
			</div>
		</form>
	</div>


	<!-- ↓adsense上部↓ -->
	<div class="g_Ad_sp_content ptb10">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- シネサン（SPポータル上部） -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:320px;height:50px"
		data-ad-client="ca-pub-3891476404601512"
		data-ad-slot="3960953769"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!-- ↑adsense上部↑ -->


	<div class="category_bar_p">メニュー</div>
	<div class="section ptb10 linkList clearfix">
		<p><img src="./images/top/top_showingSearch.gif" width="320" alt="最寄りのシネマサンシャインで映画を見よう！！"></p>
		<ul>
			<li><a href="./theater/"><img src="./images/top/btn_menu01_off.gif" width="112" alt="劇場一覧"></a></li>
			<li><a href="./showing"><img src="./images/top/btn_menu02_off.gif" width="98" alt="上映中作品"></a></li>
			<li><a href="./next_showing"><img src="./images/top/btn_menu03_off.gif" width="110" alt="上映予定作品"></a></li>
		</ul>
	</div>
	<div class="category_bar_p">ランキング</div>
	<div class="section ptb10">
	<div class="basebox_lineblue"></div>
		<div class="rankingbox">
			<?php  getSmartRank(); ?>
		</div>
	</div>
	<div class="category_bar_p">ピックアップ</div>
	<div class="section ptb10">
		<ul class="pickupArea">
			<?php  getSmartPickUp(); ?>
		</ul>
	</div>

	<a id="news_link" name="news_link"></a>
	<div class="category_bar_p">ニュース&amp;トピックス</div>
	<div class="basebox2_ptrl">
		<div class="basebox2_lineblue"></div>
		<div class="basebox2 pt10">
			<?php
				$theaterId = 1000;

				$newsViews = getNewsViews($theaterId);
				$newsViews = explode(",",$newsViews['view']);

				$loop = 0;
				$news = getNews($theaterId);
				if (count($newsViews) >= 1) {
					foreach ($newsViews as $view) {
						if($loop > 7 && $_GET["p"] != "all") {
							echo '<p class="more"><a href="./?p=all#news_link"><img class="" src="./images/top/btn_more.gif" width="40" alt="more"></a></p>';
							break;
						}

						if(count($news) >= 1) {
							foreach($news as $nws){
								if($view==$nws['id']) {
									$loop++;
									$num[$loop] =$nws['id'];
			?>
									<div class="basebox2_line">
										<p><?php echo date ('Y/m/d',strtotime($nws['start_date'])) ?><br>
											<a href="./news/detail.php?p=<?php echo $loop ?>"><?php echo $nws['midasi'] ?></a></p>
									</div>
			<?php
								}
							}
						}
					}

				}
			?>
		</div>
	</div>
	<?php getSmartFooter(); ?>
</body>
</html>

<?php
include("../../../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../../css/concession.css">
	<link rel="stylesheet" type="text/css" href="../../../css/news.css">
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<?php getSmartSlideBnr(); ?>

<!--ページ内リンク-->
<div class="clearfix">
	<div class="newsbar">
		<table class="newsBnrTable">
			<tr>
				<td><img src="../../../images/theater/arrow.png" width="9" alt=""></td>
				<td><a href="#theatre_news">劇場ニュース</a></td>
			</tr>
		</table>
	</div>
</div>
<div class="clearfix" style="margin-top:-1px;">
	<div class="newsbar">
		<table class="newsBnrTable">
			<tr>
				<td><img src="../../../images/theater/arrow.png" width="9" alt=""></td>
				<td><a href="#info">インフォメーション<br />(キャンペーン情報など)</a></td>
			</tr>
		</table>
	</div>
</div>
<p class="ptblr10">
	<?php
		$arr = getNowPage();
		$theater = $arr["ename"];
		$theaterId=getTheaterId($theater);
		$open = getImportants($theaterId['id']);
		echo $open['open_txt'];
	?>
</p>
<a id="theatre_news"></a>
<!--/ページ内リンク-->
<h2 class="category_bar_p">劇場ニュース</h2>
<div class="basebox2_ptrl">
	<div class="basebox2_lineblue"></div>
	<div class="basebox2">
	<p class="newsbox_title">ニュース一覧</p>
		<?php
			$arr = getNowPage();
			$theaterName = $arr["ename"];
			$theaterId=getTheaterId($theaterName);
			$theaterId = $theaterId['id'];


			$newsViews = getNewsViews($theaterId);
			$newsViews = explode(",",$newsViews['view']);

			$loop = 0;
			$news = getNews($theaterId);
			if (count($newsViews) >= 1) {
				foreach ($newsViews as $view) {
					if($loop > 7 && $_GET["p"] != "all") {
						echo '<p class="more"><a href="./?p=all#news_link"><img class="" src="../../../images/top/btn_more.gif" width="40" alt="more"></a></p>';
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
										<a href="./detail.php?p=<?php echo $loop ?>"><?php echo $nws['midasi'] ?></a></p>
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
<div class="section">
</div>
<!-- footer -->
<a id="info"></a>
<div class="category_bar_p news_bar_mt">インフォメーション<br />(キャンペーン情報など)</div>
<div class="section ptb10">
	<ul class="campaignArea">
		<?php getSmartCampaign(); ?>
	</ul>
	<div class="category_bar_p">ピックアップ</div>
	<div class="section ptb10">
		<ul class="pickupArea">
			<?php  getSmartPickUp(); ?>
		</ul>
	</div>
</div>

	<?php getSmartFooter(); ?>

</body>
</html>
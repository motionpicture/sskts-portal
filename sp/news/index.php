<?php
include("../../lib/require.php");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../css/sitemap.css">
	<script type="text/javascript">
		$(document).ready(function(){
		$(".flip").click(function(){
			$(this).next().slideToggle("slow");
			$(this).toggleClass("selected");
		  });
		});
	</script>
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

<h2 class="category_bar_p">上映スケジュール</h2>
<!--ニュース-->
<div class="pt10">
<div class="basebox_lineblue"></div>
<div class="newsbox">
	<h3 class="newsbox_title">ニュース一覧</h3>
	<p class="basebox2_line">2012/5/24</p>
	<p class=" ptblr10">究極の臨場感を体験できる驚異の音響システム「imm sound」が、6月30日(土)シネマサンシャイン平和島に日本初上陸！こんどは、音が映画を変える。目を閉じてもこの衝撃からは逃れられない！</p>
	<div class=" plr10"><img src="../images/news/img_news_01.gif" width="280" alt=""></div>
	<p class="ptblr10"><a href="">詳細はコチラ＞</a></p>
</div>
</div></div>
<!--/ニュース-->
<div class="section pt10">
	<div class="news_return"><a href=""><img src="../images/common/btn_news_return.gif" width="64" alt="前へ"></a></div>
	<ul class="news_list">
		<li><a href="">1</a></li>
		<li>|</li>
		<li><a href="">2</a></li>
		<li>|</li>
		<li><a href="">3</a></li>
		<li>|</li>
		<li><a href="">4</a></li>
		<li>|</li>
		<li><a href="">5</a></li>
	</ul>
	<div class="news_next"><a href=""><img src="../images/common/btn_news_next.gif" width="64" alt="次へ"></a></div>
	<div style="clear:both"></div>
</div>
	<?php getSmartFooter(); ?>
</body>
</html>

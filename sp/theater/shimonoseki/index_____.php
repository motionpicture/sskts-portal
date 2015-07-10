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
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<?php getSmartSlideBnr(); ?>
	<h2><div class="category_bar_p">上映スケジュール</div></h2>
	<div class="section">
        <img src="../../images/img_info.png">
	</div>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->

	<div class="line_01"></div>


	<!-- ↓adsense上部↓ -->
	<div class="section ptb10">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- シネサン（SP重信上部） -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:320px;height:50px"
		data-ad-client="ca-pub-3891476404601512"
		data-ad-slot="7756868160"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!-- ↑adsense上部↑ -->


	<div class="section ptb10">

	</div>
	<div class="category_bar_p">ピックアップ</div>
	<div class="section ptb10">
		<ul class="pickupArea">
			<?php  getSmartPickUp(); ?>
		</ul>
	</div>

	<?php getSmartFooter(); ?>
</body>
</html>

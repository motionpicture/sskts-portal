<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../css/theater.css">
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->
	<h2 class="category_bar_p">劇場一覧</h2>

	<ul class="theatre_list_top">
		<li class="theatre_category"><h3>関東地区</h3></li>
		<li class="theatre_area"><a href="./ikebukuro">池袋</a></li>
		<li class="theatre_area"><a href="./heiwajima">平和島<span class="area_icon"><img src="../images/theater/icon_ast.png" width="65" alt="アメイジング・サウンドシアター"><img src="../images/theater/icon_4dx.png" width="65" alt="4dx"></span></a></li>
		<li class="theatre_area"><a href="./tsuchiura">土浦<span class="area_icon"><img src="../images/theater/icon_imax.png" width="48" alt="IMAX"></span></a></li>
	</ul>
	<ul class="theatre_list">
		<li class="theatre_category"><h3>中部地区</h3></li>
		<li class="theatre_area"><a href="./numazu">沼津</a></li>
		<li class="theatre_area"><a href="./kahoku">かほく</a></li>
	</ul>
	<ul class="theatre_list">
		<li class="theatre_category"><h3>関西地区</h3></li>
		<li class="theatre_area"><a href="./yamatokoriyama">大和郡山<span class="area_icon"><img src="../images/theater/icon_imax.png" width="48" alt="IMAX"></span></a></li>
	</ul>
	<ul class="theatre_list">
		<li class="theatre_category"><h3>中国・四国地区</h3></li>
		<li class="theatre_area"><a href="./shimonoseki">下関</a></li>
		<li class="theatre_area"><a href="./okaido">大街道</a></li>
		<li class="theatre_area"><a href="./kinuyama">衣山<span class="area_icon"><img src="../images/theater/icon_imax.png" width="48" alt="IMAX"></span></a></li>
		<li class="theatre_area"><a href="./shigenobu">重信</a></li>
		<li class="theatre_area"><a href="./masaki">エミフルMASAKI</a></li>
		<li class="theatre_area"><a href="./ozu">大洲</a></li>
		<li class="theatre_area"><a href="./kitajima">北島</a></li>
	</ul>

	<?php getSmartFooter(); ?>
</body>
</html>

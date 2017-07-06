<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->

	<h2 class="category_bar_p">サイトマップ</h2>
	<div class="basebox2_ptrl">
		<div class="basebox2_lineblue"></div>
		<div class="basebox2">
		<!--ここから-->		






		<!--/ここまで-->		
		</div>
	</div>

	<?php getSmartFooter(); ?>
</body>
</html>

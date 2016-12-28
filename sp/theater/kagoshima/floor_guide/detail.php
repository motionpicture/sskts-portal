<?php
include("../../../../lib/require.php");
$define = get_defined_constants() ;

//現在のUrlの取得
$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$arr = getNowPage();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../../css/floorguide.css">
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<p class="section">
		<?php if(!is_int($_GET["p"])){?>
			<img src="<?php echo $define["Images_URL"] . "common/$arr[ename]/fig$_GET[p].gif"; ?>" width="320" alt="<?php echo "$_GET[p]番館"; ?>">
		<?php }else{ ?>
			<img src="<?php echo $define["Images_URL"] . "common/$arr[ename]/fig1.gif"; ?>" width="320" alt="<?php echo "1番館"; ?>">
		<?php } ?>
	</p>

	<?php getSmartFooter(); ?>
</body>
</html>

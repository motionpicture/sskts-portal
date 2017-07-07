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
			<img src="<?php echo $define["Images_URL"] . "common/$arr[ename]/fig$_GET[p].gif"; ?>" width="100%" alt="<?php echo "$_GET[p]番館"; ?>">
		<?php }else{ ?>
			<img src="<?php echo $define["Images_URL"] . "common/$arr[ename]/fig1.gif"; ?>" width="100%" alt="<?php echo "1番館"; ?>">
		<?php } ?>
	</p>

	<?php getSmartFooter(); ?>
	<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 993895592;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>

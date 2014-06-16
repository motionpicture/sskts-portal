<?php
include("../../lib/require.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<?php getSmartHeadInclude(); ?>
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<h2 class="category_bar_p">ニュース詳細</h2>

	<!--ニュース-->
	<div class="pt10">
		<div class="basebox_lineblue"></div>
	<div class="newsbox">
			<?php
				$theaterId = 1000;

				$newsViews = getNewsViews($theaterId);
				$newsViews = explode(",",$newsViews['view']);

				$loop = 0;
				$news = getNews($theaterId);
				if (count($newsViews) >= 1) {
					foreach ($newsViews as $view) {
						if(count($news) >= 1) {
							foreach($news as $nws){
								if($view==$nws['id']) {
									$loop++;
									$num[$loop] =$nws['id'];
								}
							}
						}
					}
				}
			?>

		<?php
			$arries = getNewsDetail($num[$_GET["p"]]);
		?>
		<h3 class="newsbox_title"><?php echo $arries['midasi']; ?></h3>
		<p class="basebox2_line"><?php echo date('Y/m/d',strtotime($arries['start_date'])) ?></p>	
		<p class=" ptblr10"><?php echo $arries['txt']; ?></p>
</div>
</div></div>
<!--/ニュース-->
<div class="newsArea section pt10">
	<?php		
		$limit = count($num);//最大ページ数
		$page = empty($_GET["p"])? 1:$_GET["p"];//ページ番号
		paging($limit, $page);
	?>		
	<div style="clear:both"></div>
</div>
	<?php getSmartFooter(); ?>
</body>
</html>
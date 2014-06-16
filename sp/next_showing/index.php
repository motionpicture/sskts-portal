<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link href="../css/showing.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->

	<div class="category_bar_p">上映予定作品</div>
	<div class="section schedule ptb10"> <img src="../images/showing/public_now_showing.gif" width="320" alt="劇場ごとの上映作品を見る">
		<form name="SearchLisBoxForm" enctype="multipart/form-data" method="get" action="./">
			<select name="theaterSelect">
				<?php
				//theater一覧取得
				$theaters = getTheaterList();
				foreach ($theaters as $theater) {

					//もし劇場が選択されている場合
					if (!empty($_GET['theaterSelect']) && $theater['id'] == $_GET['theaterSelect']) {
							$option_tag = sprintf('<option value="%s" selected>%s</option>'."\r\n",$theater['id'],$theater['name']);
						} else {
							$option_tag = sprintf('<option value="%s">%s</option>'."\r\n",$theater['id'],$theater['name']);
						}
						//var_dump($_GET['theater']);
					echo $option_tag;
				}
				?>
			</select>
			<input class="submit" type="image" src="../images/showing/btn_submit.gif" width="101" alt="検索する">
		</form>
	</div>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->


	<!-- ↓adsense上部↓ -->
	<div class="section ptb10">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- シネサン（SP上映予定上部） -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:320px;height:50px"
		data-ad-client="ca-pub-3891476404601512"
		data-ad-slot="9314326565"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!-- ↑adsense上部↑ -->



	<?php
		if (!empty($_GET['theaterSelect'])){
			$showings = getNextRoadShow($_GET['theaterSelect']);
		} else {
			$showings = getNextRoadShow();
		}

		if(!$showings){
		}else{
			foreach ($showings as $showing) {
				echo "<!--映画スケジュール-->";
				echo "<div class='schedulebox_lineblue'></div>";
				echo "<div class='schedulebox'>";
				echo "<div class='title_bar'>";
				echo "<p class='txt_bold'>$showing[name]</p>";
				if($showing['ename'] !="" ) {
					echo "<p class='ename'>$showing[ename]</p>";
				}								
				echo "</div>";
				echo "<div class='basebox2_line'>";
				echo "<table width='280'>";
				echo "<tr>";
				if ($showing['picture'] != null){
					echo '<td rowspan="2" width="69" height="52"><img src="'. movie_picture . '/' . $showing['picture'] . '" width="69" /></td>';
				}else{
					echo '<td rowspan="2" width="69" height="52"><img src="../../images/common/image_none.gif" width="69" /></td>';
				}
				echo "<td width='11' height='31'></td>";
				echo "<td width='200' height='31' class='copyright'>" . date('Y/m/d',strtotime($showing['start_date'])) . "&nbsp;&nbsp;公開予定<br><br>$showing[credit]</td>";
				echo "</tr>";
				if($showing['site'] !="" ) {
					echo "<tr>";
					echo "<td width='11'></td>";
					echo "<td width='211' height='21'><a href='$showing[site]'><img src='../images/showing/btn_official.gif' width='112' alt='公式サイト'></a></td>";
					echo "</tr>";
				}else{
					echo "<tr>";
					echo "<td width='11'></td>";
					echo "<td width='211' height='21'></td>";
					echo "</tr>";
				}
				echo "<tr>";
				echo "<td colspan='3' height='10'></td>";
				echo "</tr>";
				if($showing['grade']){
					echo "<tr>";
					if($showing['grade'] == 1){
						echo "<td colspan='3' style='color:#E50307;'><img src='../../images/common/mark_R15.gif' width='27' /></td>";
					}elseif($showing['grade'] == 2){
						echo "<td colspan='3' style='color:#E50307;'><img src='../../images/common/mark_R18.gif' width='27' /></td>";
					}else{
						echo "<td colspan='3' style='color:#E50307;'><img src='../../images/common/mark_PG12.gif' width='27' /></td>";
					}
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='3' height='10'></td>";
					echo "</tr>";
				}
				if($showing['tuika']){
					$tuika = "";
					$tuika = preg_replace("/;/","<br />",$showing['tuika']);
					echo "<tr>";
					echo "<td colspan='3' style='color:#E50307;'>$tuika</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='3' height='10'></td>";
					echo "</tr>";
				}
				echo "<tr>";
				echo "<td colspan='3'>上映劇場</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
				echo "<ul class='theater_list'>";
				foreach ($theaters as $theater) {
					if ($showing['theater_ids'] != null) {
						$vals = explode(",",$showing['theater_ids']);
						$theater_judge=false;
						foreach ($vals as $val ) {
							if ($theater['id'] == $val ) {
								$theater_judge = true;
								echo '<li><a href="../theater/'.$theater['ename'].'/"><img src="../images/showing/link_'.$theater['ename'].'_on.gif" width="40" alt="'.$theater['name'].'"></a></li>';
							}
						}

						if(!$theater_judge) {
							echo '<li><img src="../images/showing/link_'.$theater['ename'].'_off.gif"  width="40" alt="'.$theater['name'].'"></li>';
						}

					//基本ここは絶対来ないコード
					}else {
						echo '<li><img src="../images/showing/link_'.$theater['ename'].'_off.gif"  width="40" alt="'.$theater['name'].'"></li>';
					}
				}
				echo "</ul>";
				echo "<div style='clear:both;'></div>";
				echo "</div>";
				echo "<!--映画スケジュール-->";
			}
		}
	?>

	<?php getSmartFooter(); ?>
</body>
</html>

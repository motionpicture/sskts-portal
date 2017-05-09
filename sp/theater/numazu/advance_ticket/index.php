<?php
include("../../../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../../css/advance_ticket.css">
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<div class="basebox2_ptrl">
		<?php
			$arr = getNowPage();
			$theaterName = $arr["ename"];
			$theaterId=getTheaterId($theaterName);
			$maeuri = getMaeuri($theaterId['id']);

			foreach($maeuri as $val){
				$movie = getMovieById($val['movie_code']);
				if(!$movie['name']){
					continue;
				}
			?>

			<!-- table -->
			<table cellpadding="0" cellspacing="0" class="advance_ticket_u">
				<thead>
					<tr>
						<th colspan="2" class="table_line_01"></th>
					</tr>
				</thead>
			</table>

			<table cellpadding="0" cellspacing="0" class="advance_ticket_t">
				<tbody>
					<tr class="first-child">
						<td colspan="2" class="table_top_01">
							<?php
								if($movie['site'] !="") {
									echo '<a href="'.$movie['site'].'" target="_blank">'.$movie['name'].'</a>';
								} else {
									echo $movie['name'];
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="table_wrapper regulation02">
				<table cellpadding="0" cellspacing="0" class="advance_ticket_u">
					<tbody>
						<tr>
							<td class="advance_ticket_tl">発売日</td>
							<td class="advance_ticket_tr">
								<?php
									if($val['roadshow_txt'] != ""){
										echo $val['roadshow_txt'];
									}else {
										if ($val['roadshow_date'] != "") {
											echo date ('Y/m/d',strtotime($val['roadshow_date']));
										}else {
											echo "";
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="table_line_02"></td>
						</tr>
						<tr>
							<td class="advance_ticket_tl">公開予定日</td>
							<td class="advance_ticket_tr">
								<?php
									if($val['end_date_txt'] != ""){
										echo $val['end_date_txt'];
									}else {
										if ($val['end_date'] != "") {
											echo date ('Y/m/d',strtotime($val['end_date']));
										}else {
											echo "";
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="table_line_02"></td>
						</tr>
						<tr>
							<td class="advance_ticket_tl">前売</td>
							<td class="advance_ticket_tr">
								<?php
									if ($val['price']!="") {
										$prices = explode(";",$val['price']);
										if (count($prices)>=1){
											foreach($prices as $price){
												if ($price != ""){
													echo "<p>".$price."</p>";
												}
											}
										} else {
											echo "<p>".$val['price']."</p>";
										}
									}
								?>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="table_line_02"></td>
						</tr>
						<tr>
							<td class="advance_ticket_tl">ムビチケ販売</td>
							<td class="advance_ticket_tr"><?php echo $val['movie_ticket_flg']==1 ? "有":"無" ?></td>
						</tr>
						<tr>
							<td colspan="2" class="table_line_02"></td>
						</tr>
						<tr>
							<td class="advance_ticket_tl">前売特典</td>
							<td class="advance_ticket_tr"><?php echo $val['note'] ?></td>
						</tr>
						<tr>
						<td colspan="2" class="table_line_02"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- table end -->

		<?php }?>
	</div>

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

<?php
include("../../../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../../css/access.css">
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<div class="basebox2_ptrl">
		<!-- table -->
		<table cellpadding="0" cellspacing="0" class="access_u">
			<thead>
				<tr>
					<th colspan="2" class="table_line_01"></th>
				</tr>
			</thead>
		</table>

		<table cellpadding="0" cellspacing="0" class="access_t">
			<tbody>
				<tr class="first-child">
					<td colspan="2" class="table_top_01">アクセス</td>
				</tr>
			</tbody>
		</table>

		<div class="table_wrapper">
			<table cellpadding="0" cellspacing="0" class="access_u">
				<tbody>
					<tr>
						<td colspan="2" class="access_map">
							<?php getSmartMap(); ?>
						</td>
					</tr>
					<tr>
						<td class="access_tl">住所</td>
						<td class="access_tr">山口県下関市竹崎町4-1-37 シーモール下関2F</td>
					</tr>
					<tr>
						<td colspan="2" class="table_line_02"></td>
					</tr>
					<tr>
						<td class="access_tl">電話番号</td>
						<td class="access_tr"><p>24時間上映案内<br />
							<span class="stand_out">083-235-3001</span><br />
						<span class="notice">※電話番号のお掛け間違いにご注意下さい</span></p></td>
					</tr>
					<tr>
						<td colspan="2" class="table_line_02"></td>
					</tr>
					<tr>
						<td class="access_tl">駐車場</td>
						<td class="access_tr">無料駐車場　台</td>
					</tr>
					<tr>
						<td colspan="2" class="table_line_02"></td>
					</tr>
					<tr>
						<td colspan="2" class="access_to"></td>
					</tr>
					<tr>
						<td colspan="2" class="table_line_02"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- table end -->
	</div>

	<?php getSmartFooter(); ?>

</body>
</html>

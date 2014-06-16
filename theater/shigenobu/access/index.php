<?php

include("../../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php getHeadInclude(); ?>
	</head>
	<body>
		<!-- #wrapper start -->
		<div id="wrapper">
			<?php getHeader(); ?>
			<!-- #container start -->
			<div id="container" class="clearfix">
				<div id="contents" class="clearfix">
					<?php getPankuzu(); ?>
					<?php getSlideBnr(); ?>
					<div id="mainColumn" class="clearfix">

						<!-- ↓修正する部分はここから↓ -->
						<div class="leftColumn">
							<div class="MainArea">
								<h2 class="headlineImg"><img src="../../../images/common/headline_Access.png"  alt="アクセス" ></h2>
								<div class="whiteCanvas clearfix">
									<table class="accessTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>住所</p></td>
											<td class="accessRight">
											 	<p class="top">愛媛県東温市野田3-1-13&nbsp;&nbsp;フジグラン重信3F</p>
											 	<p class="bottom">
											 		松山市駅より、伊予鉄バスと瀬戸内バスが運行している松山⇔新居浜特急線がフジグラン重信SC前（国道11号線バイパス沿い）に停車 
													伊予鉄道横河原線梅本駅より徒歩15分 <br />
													松山市内より、国道11号線を川内方面へ、東温市に入ってすぐ左側</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>電話番号</p></td>
											<td class="accessRight">
											 	<p>24時間上映時間案内</p>
											 	<p><span>089-990-1513</span></p>
											 	<p class="notes">※電話番号のお掛け間違いにご注意下さい</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>駐車場</p></td>
											<td class="accessRight"><p>無料駐車場 2,111台</p></td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
									</table>

									<div class="accessMap">
										<?php getMap(); ?>
									</div>
								</div>
							</div>
						</div>
						<!-- ↑修正する部分はここまで↑ -->

						<?php getRightMenu(); ?>
					</div>
				</div>
			</div>
			<!-- #container end -->

			<?php getFooter(); ?>
		</div>
		<!-- #wrapper end -->
	</body>
</html>
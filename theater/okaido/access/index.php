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
											 	<p class="top">愛媛県松山市大街道1-5-10 </p>
											 	<p class="bottom">
											 		伊予鉄道松山市駅より徒歩15分、大街道商店街右手。<br />
													市内電車で大街道口駅より徒歩５分、大街道商店街左手。
												</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>電話番号</p></td>
											<td class="accessRight">
											 	<p>24時間上映時間案内</p>
											 	<p><span>089-986-6633</span></p>
											 	<p class="notes">※電話番号のお掛け間違いにご注意下さい</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>駐車場</p></td>
											<td class="accessRight">
												<p>
													提携駐車場有り<br />
													キスケパーキング<br />
													※駐車券をチケット売場にてご提示いただき、捺印しますと駐車料金が100円割引になります。
												</p>
											</td>
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
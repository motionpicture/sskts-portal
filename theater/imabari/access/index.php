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
											 	<p class="top">愛媛県今治市東門町5-13-1&nbsp;&nbsp;フジグラン今治2F</p>
											 	<p class="bottom">
											 		JR今治駅より「瀬戸内バス営業所」行バスにて終点下車、徒歩10分。<br />
													県道38号線を今治城方面へ。今治城の案内のある交差点を左折し瀬戸内バス営業所先。<br />
													県道38号線を直進。喜田村のY字交差点を産業道路方面へ。今治城の交差点を右折し、瀬戸内バス営業所先。</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>電話番号</p></td>
											<td class="accessRight">
											 	<p>24時間上映時間案内</p>
											 	<p><span>0898-33-8882</span></p>
											 	<p class="notes">※電話番号のお掛け間違いにご注意下さい</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="accessLeft" valign="top"><p>駐車場</p></td>
											<td class="accessRight"><p>無料駐車場 1,200台</p></td>
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
<?php

include("../lib/require.php");
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
								<h2 class="headlineImg"><img src="../images/common/headline_Company.png"  alt="会社概要" ></h2>
								<div class="whiteCanvas clearfix">
									<table class="companyTable">
										<tr>
											<td class="menu"><p>会社名</p></td>
											<td class="object" ><p>佐々木興業株式会社</p></td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="menu"><p>所在地</p></td>
											<td class="object" >
												<p>
													〒170-0013<br />
													東京都豊島区東池袋1-14-3
												</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="menu"><p>Tel</p></td>
											<td class="object" ><p>03-3982-6101(代表)</p></td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="menu"><p>代表者</p></td>
											<td class="object" ><p>佐々木&nbsp;&nbsp;伸一</p></td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="menu"><p>事業内容</p></td>
											<td class="object" >
												<p>
													マルチプレックス方式による映画、演劇、音楽その他各種イベントの興行、<br />
													映画館に付属する各種遊戯施設、飲食店、売店などの営業等。
												</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../images/common/img_line.gif"></p></td>
										</tr>
									</table>
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
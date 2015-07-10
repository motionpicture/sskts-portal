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
								<h2 class="headlineImg"><img src="../images/common/headline_Ticket.png"  alt="シネマサンシャイン特別鑑賞券" ></h2>
								<div class="imageArea">
									<p><img src="../images/common/image_ticket.jpg"  alt="シネマサンシャイン特別鑑賞券" ></p>
								</div>
								<div class="whiteCanvas clearfix">
									<div class="textArea">
										<h3 class="redTitle">
												シネマサンシャイン特別鑑賞券絶賛発売中!!<br />
												シネマサンシャイン全館でご利用頂けます特別鑑賞券絶賛販売中!!<br />
												1枚 1,500円
										</h3>
										<p class="textUnity">・ご購入日の翌日よりご利用頂けます。</p>
										<p class="textUnity">・有効期限2ヶ月以上。</p>
										<p class="textUnity">・各種割引との併用はできません。</p>
										<p class="textUnity">・特別興行には、ご利用いただけません。</p>
										<p class="textUnity">・3D作品はプラス400円でご利用いただけます。</p>
										<p class="textUnity">・IMAXデジタルシアターでご利用の場合は、IMAX料金との差額を別途お支払い頂きます。</p>
										<p class="textUnity">・imm 3D sound シアターでご利用の場合は、別途プレミアム料金200円をお支払い頂きます。</p>
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
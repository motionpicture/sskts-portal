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
								<h2 class="headlineImg"><img src="../images/common/headline_Members.png"  alt="メンバーズカードのご案内" ></h2>
								<div class="imageArea">
									<p><img src="../images/common/image_card.jpg"  alt="メンバーズカードのご案内" ></p>
								</div>
								<div class="whiteCanvas clearfix">
									<div class="textArea">
										<h3 class="redTitle">
											観れば観るほどトクをするシネマサンシャイン共通メンバーズカード！<br />
											どうぞご入会下さい。
										</h3>
										<p class="textUnity">・鑑賞料金の10%がポイントとなります。(ご本人を含む4名様までポイント加算)</p>
										<p class="textUnity">・1500ポイントで1回鑑賞無料！(IMAX作品、特別興行にはご利用いただけません。3D作品は、<br />　3D鑑賞料金400円を別途お支払いただくことでご利用いただけます。)</p>
										<p class="textUnity">・入会時に200ポイントプレゼント(入会金1,000円)</p>
										<p class="textUnity">・カード提示で一般300円・大小200円割引(ご本人を含む4名様まで割引)</p>
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
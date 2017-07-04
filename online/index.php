<?php

include("../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php getHeadInclude(); ?>
	<link rel="stylesheet" href="/css/online.css">

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
							<h2 class="headlineImg"><img src="../images/online/headline_online.png" alt="オンラインチケット購入のメリット"></h2>
							<div class="whiteCanvas">
									<h3>オンラインチケット購入のメリット</h3>
								<div class="merit">
									<div class="merit-inner1">
										<h4>メリット１</h4>
										<p>
											スマートフォンでスマート入場!
										</p>
										<p>
											オンライン購入であれば、鑑賞日当日に発券機へ並ぶことなく入場用QRコードを スマートフォンでご提示するだけでスムーズに入場可能です。
										</p>
										<img src="../images/online/online_pc_01.gif" alt="スマート入場">
									</div>
									<div class="merit-inner02">
										<h4>メリット2</h4>
									</div>
								</div>
								<div class="purchase">
									<h3>オンラインチケット購入の流れ</h3>
									<div class="purchase-inner01">
									</div>
								</div>
								<div class="admission">
									<h3>入場までの流れ</h3>
									<div class="admission-inner01">
										<h4>スマートフォンをお持ちの方</h4>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
									</div>
									<div class="admission-inner02">
										<h4>スマートフォンをお持ちでない方</h4>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
									</div>
									<div class="admission-inner03">
										<h4>スマートフォン・プリンタをお持ちでない方</h4>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
										<div>
										</div>
									</div>
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
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
										<h3>
											スマートフォンでスマート入場!
										</h3>
										<p>
											オンライン購入であれば、鑑賞日当日に発券機へ並ぶことなく入場用QRコードを スマートフォンでご提示するだけでスムーズに入場可能です。
										</p>
										<img src="../images/online/online_pc_01.gif" width="100%" alt="スマートフォンでスマート入場!">
										<p>
											スマート入場とは?
										</p>
										<p>
											スマート入場とは、オンラインでチケットを購入していただきお手持ちのスマートフォンを使いQRコードで
											入場するペーパーレスな入場方法です。鑑賞日当日は劇場内発券機でのチケット発券が不要なため発券に掛かる
											時間を気にすることなくスムーズに入場して頂けます。
										</p>
										<p>
											スマート入場対応劇場
										</p>
										<div>
											・シネマサンシャイン姶良
										</div>
									</div>
									<div class="merit-inner02">
										<h4>メリット2</h4>
										<h3>上映日の2日前から予約可能！</h3>
										<p>
											オンライン購入は観たい作品を上映日前に座席指定で予約可能です。
										</p>
										<img src="../images/online/online_pc_02.gif" width="100%" alt="上映日の2日前から予約可能！">
									</div>
								</div>
								<div class="purchase">
									<h3>オンラインチケット購入の流れ</h3>
									<div class="purchase-inner01">
										<div>
											オンラインチケット購入の流れは下記になります。
										</div>
										<img src="../images/online/online_pc_03.gif" width="100%" alt="オンラインチケット購入の流れ">
										<p>
											※チケット照会時に予約番号と購入時に入力した電話番号が必要となりますので必ずお控えください。
										</P>
									</div>
								</div>
								<div class="admission">
									<h3>入場までの流れ</h3>
									<div class="admission-inner01">
										<h4>スマートフォンをお持ちの方</h4>
										<img src="../images/online/online_pc_04.gif" width="100%" alt="スマートフォンをお持ちの方">
										<div>
											<p>
												1. オンラインでチケットを購入
											</P>
											<div>
												オンラインチケット購入の流れに沿ってチケットを購入。
											</div>
										</div>
										<div>
											<p>
											</P>
										</div>
										<div>
											<p>
											</P>
											<p>
											</P>
											<div>
												<p>
												</P>
											</div>
											<div>
												<p>
												</P>
											</div>
											<div>
												<p>
												</P>
											</div>
										</div>
										<div>
											<p>
											</P>
											<p>
											</P>
										</div>
										
									</div>
									<div class="admission-inner02">
										<h4>スマートフォンをお持ちでない方</h4>
										<img src="../images/online/online_pc_05.gif" width="100%" alt="スマートフォンをお持ちでない方">
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
										<img src="../images/online/online_pc_06.gif" width="100%" alt="スマートフォン・プリンタをお持ちでない方">
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
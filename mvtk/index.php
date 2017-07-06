<?php

include("../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php getHeadInclude(); ?>
	<link rel="stylesheet" href="/css/mvtk.css">

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
							<h2 class="headlineImg"><img src="../images/mvtk/headline_mvtk.png" alt="ムビチケ券ご利用方法"></h2>
							<div class="whiteCanvas">
								
								<div class="about_mvtk1">
									<h3>ムビチケについて</h3>
									<div>
										<img class="mvtk_pg_logo" src="../images/mvtk/mvtk_pc_logo.gif" width="244" height="54" alt="ムビチケロゴ">
										<p class="content_text">ムビチケとは?</p>
										<p class="Lead_text">ムビチケとは、ネットで座席指定ができる映画前売券になります。<br>シネマサンシャインでのムビチケのご利用に関しましては下記よりご確認ください。</p>
										<a href="#howto">> ムビチケ券のご利用についてはこちら</a>
									</div>
								</div>
							
								<div class="about_mvtk2">
									<h3>オンラインチケット購入でのムビチケ券ご利用手順</h3>
										<p class="Lead_text center">オンラインチケット購入でのムビチケ券のご利用手順は下記になります。</p>

									<div class="step">
										<p class="step_title">STEP <span>1</span></p>
										<p class="content_text">上映スケジュールから鑑賞したい作品を選択してください。</p>
										<img src="../images/mvtk/mvtk_pc_1.gif" width="600" height="180" alt="">
									</div>
									
									<div class="step">
										<p class="step_title">STEP <span>2</span></p>
										<p class="content_text">鑑賞したい座席を選択し、利用規約の同意にチェックし「次へ」ボタンを押してください。</p>
										<img src="../images/mvtk/mvtk_pc_2.gif" width="600" height="180" alt="">
									</div>

									<div class="step">
										<p class="step_title">STEP <span>3</span></p>
										<p class="content_text">券種選択画面の上部にある、「ムビチケを利用する」ボタンを押してください。</p>
										<p class="Lead_text red">※ムビチケを利用される方は、事前に「ムビチケ購入番号」と「ムビチケ暗証番号」をご用意ください。</p>
										<img src="../images/mvtk/mvtk_pc_3.gif" width="600" height="180" alt="">
									</div>

									<div class="step">
										<p class="step_title">STEP <span>4</span></p>
										<p class="content_text">利用するムビチケ券の「ムビチケ購入番号」と「ムビチケ暗証番号」を入力し、「認証する」を押してください。</p>
										<p class="Lead_text red">※ムビチケ券によっては別途追加料金が発生する場合があります、差額が発生した場合は別途クレジットカードにて差額分をお支払いいただきます。</p>
										<img src="../images/mvtk/mvtk_pc_4.gif" width="600" height="180" alt="">
									</div>

									<div class="step">
										<p class="step_title">STEP <span>5</span></p>
										<p class="content_text">認証完了後、ムビチケ券の内容確認が表示されるので、問題なければ「券種選択へ戻る」ボタンを押してください。</p>
										<img src="../images/mvtk/mvtk_pc_5.gif" width="600" height="180" alt="">
									</div>

									<div class="step">
										<p class="step_title">STEP <span>6</span></p>
										<p class="content_text">再度、券種選択画面に戻ります。ムビチケ券は券種選択一覧に追加されていますので「券種を選択してください」ボタンを押して追加されたムビチケ券を選択し「次へ」ボタンを押してください。</p>
										<img src="../images/mvtk/mvtk_pc_6.gif" width="600" height="180" alt="">
									</div>

									<div class="step">
										<p class="step_title">STEP <span>7</span></p>
										<p class="content_text">後の手順は、画面に沿って手続きを進めていただきムビチケ券を利用してのオンラインチケット購入は完了となります。</p>
										<img src="../images/mvtk/mvtk_pc_7.gif" width="600" height="180" alt="">
									</div>
								</div>

								<a name="howto"></a> 
								<div class="about_mvtk3">
									<h3>ムビチケ券のご利用について</h3>
										<p class="Lead_text">シネマサンシャインでは、オンラインチケット購入でムビチケ券をご使用いただけます。<br>また、差額料金を追加でお支払い頂くことで、ムビチケ２Ｄ券を３Ｄ上映、4ＤX上映にご使用頂けます。<br>差額のお支払いは、オンラインチケット購入手続きの流れの中で追加料金分をお支払い頂きます。<br>（クレジット決済のみ）</p>
									
									<div>
										<p class="content_text">【追加料金参考】</p>
										<h4>| ムビチケ2D券をお持ちの方</h4>
										<p class="content_text">3D上映を鑑賞する場合</p>
										<p class="Lead_text">※3Dメガネを既にお持ちでご持参いただける方は、3Dメガネなしの追加料金でご購入いただけます。</p>
										<img src="../images/mvtk/mvtk_pc_8.gif" width="541" height="83" alt="">
										<p class="content_text">4DX上映を鑑賞する場合</p>
										<img src="../images/mvtk/mvtk_pc_9.gif" width="401" height="83" alt="">
									</div>

									<div>
										<h4>| ムビチケ3D券をお持ちの方</h4>
										<p class="content_text">4DX上映を鑑賞する場合</p>
										<img src="../images/mvtk/mvtk_pc_10.gif" width="401" height="83" alt="">
										<p class="Lead_text red">※ムビチケ3D券で2D上映の作品を鑑賞される場合、ムビチケ券のご利用は可能ですが差額分のご返金はございませんのでご注意ください。</p>
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
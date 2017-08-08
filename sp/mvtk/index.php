<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../sp/css/mvtk.css">
	<script type="text/javascript">
		$(document).ready(function(){
		$(".flip").click(function(){
			$(this).next().slideToggle("slow");
			$(this).toggleClass("selected");
		  });
		});
	</script>
</head>
<body>
	<?php getSmartHeader(); ?>
	<?php getSmartPankuzu(); ?>

	<!--ライン-->
	<div class="line_01"></div>
	<!--/ライン-->

	<h2 class="category_bar_p">ムビチケ券ご利用方法</h2>
	<div class="basebox2_ptrl">
		<div class="basebox2_lineblue"></div>
		<div class="basebox2">
		<!--ここから-->		

			<div class="about_mvtk1 pd10">
				<h3 class="mvtk_sp_h3">ムビチケについて</h3>
				<div>
					<img class="mvtk_pg_logo" src="../../sp/images/mvtk/mvtk_SP_logo.gif" width="239" alt="ムビチケロゴ">
					<p class="content_text">ムビチケとは?</p>
					<p class="Lead_text">ムビチケとは、ネットで座席指定ができる<br>映画前売券になります。<br>シネマサンシャインでのムビチケのご利用に関しましては<br>下記よりご確認ください。</p>
					<a href="#howto">> ムビチケ券のご利用についてはこちら</a>
				</div>
			</div>

			<div class="about_mvtk2 pd10">
				<h3 class="mvtk_sp_h3">オンラインチケット購入での<br>ムビチケ券ご利用手順</h3>

				<div class="step">
					<p class="step_title">STEP <span>1</span></p>
					<p class="content_text">上映スケジュールから鑑賞したい作品を選択してください。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_1.gif" width="100%" alt="">
				</div>
				
				<div class="step">
					<p class="step_title">STEP <span>2</span></p>
					<p class="content_text">鑑賞したい座席を選択し、利用規約の同意にチェックし「次へ」ボタンを押してください。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_2.gif" width="100%" alt="">
				</div>

				<div class="step">
					<p class="step_title">STEP <span>3</span></p>
					<p class="content_text">券種選択画面の上部にある、「ムビチケを利用する」ボタンを押してください。</p>
					<p class="Lead_text red">※ムビチケを利用される方は、事前に「ムビチケ購入番号」と「ムビチケ暗証番号」をご用意ください。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_3.gif" width="100%" alt="">
				</div>

				<div class="step">
					<p class="step_title">STEP <span>4</span></p>
					<p class="content_text">利用するムビチケ券の「ムビチケ購入番号」と「ムビチケ暗証番号」を入力し、「認証する」を押してください。</p>
					<p class="Lead_text red">※ムビチケ券によっては別途追加料金が発生する場合があります、差額が発生した場合は別途クレジットカードにて差額分をお支払いいただきます。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_4.gif" width="100%" alt="">
				</div>

				<div class="step">
					<p class="step_title">STEP <span>5</span></p>
					<p class="content_text">認証完了後、ムビチケ券の内容確認が表示されるので、問題なければ「券種選択へ戻る」ボタンを押してください。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_5.gif" width="100%" alt="">
				</div>

				<div class="step">
					<p class="step_title">STEP <span>6</span></p>
					<p class="content_text">再度、券種選択画面に戻ります。ムビチケ券は券種選択一覧に追加されていますので「券種を選択してください」ボタンを押して追加されたムビチケ券を選択し「次へ」ボタンを押してください。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_6.gif" width="100%" alt="">
				</div>

				<div class="step">
					<p class="step_title">STEP <span>7</span></p>
					<p class="content_text">後の手順は、画面に沿って手続きを進めていただきムビチケ券を利用してのオンラインチケット購入は完了となります。</p>
					<img src="../../sp/images/mvtk/mvtk_sp_7.gif" width="100%" alt="">
				</div>
			</div>

			<a name="howto"></a>
			<div class="about_mvtk3 pd10">
					<h3 class="mvtk_sp_h3">ムビチケ券のご利用について</h3>
						<p class="Lead_text">シネマサンシャインでは、オンラインチケット購入でムビチケ券をご使用いただけます。また、差額料金を追加でお支払い頂くことで、ムビチケ２Ｄ券を３Ｄ上映、4ＤX上映にご使用頂けます。差額のお支払いは、オンラインチケット購入手続きの流れの中で追加料金分をお支払い頂きます。<br>（クレジット決済のみ）</p>
					
					<div>
						<p class="content_text">【追加料金参考】</p>
						<h4 class="mvtk_sp_h4">| ムビチケ2D券をお持ちの方</h4>
						<p class="content_text">3D上映を鑑賞する場合</p>
						<p class="Lead_text">姶良では3Dメガネ(MASTER IMAGE用)はお持ち帰り頂けます。次回鑑賞時にお持ち頂ければ、3D鑑賞料金を100円引き(3D鑑賞料金400円→300円)させて頂きます。</p>
						<img src="../../sp/images/mvtk/mvtk_sp_8.gif" width="100%" alt="追加料金合計400円">
						<p class="content_text">4DX(2D)上映を鑑賞する場合</p>
						<img src="../../sp/images/mvtk/mvtk_sp_9.gif" width="100%" alt="追加料金合計1000円">
						<p class="Lead_text red">※4DX(3D)上映を鑑賞する場合は4DX鑑賞料金(+1000円)に3D鑑賞料金(+400円)を加算した金額となります。</p>
					</div>

					<div>
						<h4 class="mvtk_sp_h4">| ムビチケ3D券をお持ちの方</h4>
						<p class="content_text">4DX上映を鑑賞する場合</p>
						<img src="../../sp/images/mvtk/mvtk_sp_10.gif" width="100%" alt="追加料金合計1000円">
						<p class="Lead_text red">※ムビチケ3D券で2D上映の作品を鑑賞される場合、ムビチケ券のご利用は可能ですが差額分のご返金はございませんのでご注意ください。</p>
					</div>
				</div>


		<!--/ここまで-->		
		</div>
	</div>

	<?php getSmartFooter(); ?>
</body>
</html>

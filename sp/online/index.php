<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../../sp/css/online.css">
	<script type="text/javascript">
		$(document).ready(function () {
			$(".flip").click(function () {
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

	<h2 class="category_bar_p">オンラインチケット購入のメリット</h2>
	<div class="basebox2_ptrl">
		<div class="basebox2_lineblue"></div>
		<div class="basebox2">
			<!--ここから-->

			<h3>オンラインチケット購入のメリット</h3>
			<div>

				<div class="merit">
					<div class="merit-inner01">
						<h4>
							メリット１
						</h4>
						<p class="title thick">
							スマートフォンでスマート入場!
						</p>
						<p class="text01 thick">
							オンライン購入であれば、鑑賞日当日に発券機へ<br> 並ぶことなく入場用QRコードをスマートフォンで
							<br> ご提示するだけでスムーズに入場可能です。
						</p>
						<img src="../../sp/images/online/online_SP_01.gif" width="100%" alt="スマートフォンでスマート入場!">
						<p class="merit01_thick">スマート入場とは?</p>
						<p class="text03">スマート入場とは、オンラインでチケットを購入していただ<br> きお手持ちのスマートフォンを使いQRコードで入場するペー
							<br> パーレスな入場方法です。鑑賞日当日は劇場内発券機でのチケット発券が不要なため発券に掛かる時間を気にすることな
							<br> くスムーズに入場して頂けます。
						</p>
						<p class="merit01_thick">スマート入場対応劇場</p>
						<div class="process other">
							<a href="../theater/aira/">・シネマサンシャイン姶良</a>
							<a href="../theater/kitajima/">・シネマサンシャイン北島</a>
						</div>
					</div>
					<div class="merit-inner02">
						<h4>
							メリット2
						</h4>
						<p class="title thick">
							上映日の2日前から予約可能！
						</p>
						<p class="text01 thick">
							オンライン購入は観たい作品を<br>上映日前に座席指定で予約可能です。
						</p>
						<img src="../../sp/images/online/online_SP_02.gif" width="100%" alt="上映日の2日前から予約可能！">
					</div>
				</div>

				<!-- オンラインチケット購入の流れ -->
				<div class="purchase">
					<h3>オンラインチケット購入の流れ</h3>
					<div class="purchase-inner01">
						<div>
							<p class="text01">オンラインチケット購入の流れは下記になります。</p>
						</div>
						<img src="../../sp/images/online/online_SP_03.gif" width="100%" alt="オンラインチケット購入の流れ">
						<p class="redtext">
							※チケット照会時に予約番号と購入時に入力した電話番号が必要となりますので必ずお控えください。
						</p>
					</div>
				</div>

				<!-- 入場までの流れ -->
				<div class="admission">
					<h3>
						入場までの流れ
					</h3>
					<div class="admission-inner01">
						<div class="link_area">
							<ul>
								<li><a href="#sp_have"><img src="../../sp/images/online/online_SP_04.gif" width="100%" alt="オンラインチケット購入の流れ"></a></li>
								<li class="online_link_center"><a href="#sp_not_have"><img src="../../sp/images/online/online_SP_05.gif" width="100%" alt="オンラインチケット購入の流れ"></a></li>
								<li><a href="#not_have"><img src="../../sp/images/online/online_SP_06.gif" width="100%" alt="オンラインチケット購入の流れ"></a></li>
							</ul>
						</div>
						<a id="sp_have"></a>
						<h4>
							スマートフォンをお持ちの方
						</h4>
						<img src="../images/online/online_SP_07.gif" width="100%" alt="スマートフォンをお持ちの方">
						<div class="title02">
							<p class="text02">
								<span>1. </span>オンラインでチケットを購入
							</p>
							<div class="process">
								<p>
									オンラインチケット購入の流れに沿ってチケットを購入。
								</p>
							</div>
						</div>
						<div class="title02">
							<p class="text02">
								<span>2. </span>鑑賞する劇場へご来場ください
							</p>
						</div>
						<div>
							<p class="text02">
								<span>3. </span>入場の際に入場口スタッフにQRコードをご提示してご入場ください
							</p>
							<p class="text03">
								※QRコードは、鑑賞時間の24時間前からチケット情報ページに表示されます。</p>
							<div class="process">
								<p>
									<span class="thick01">手順 1</span><br> 購入完了メールに記載されているリンクもしくは、劇場ページにあるチケット照会バナーを押して チケット照会ページにアクセス。
								</p>
							</div>
							<div class="process">
								<p>
									<span class="thick01">手順 2</span><br> チケット情報照会画面にて予約番号と購入時に入力した電話番号を入力してチケット情報ページにアクセス。 掲載されているQRコードをスマートフォンの画面に表示してください。
								</p>
							</div>
							<div class="process">
								<p>
									<span class="thick01">手順 3</span><br> スマートフォンの画面で表示したQRコードを入場口スタッフにご提示していただくとご入場いただけます。
								</p>
							</div>
						</div>
						<div class="bluezone other">
							<p>
								オススメ<br> 入場用QRコードは鑑賞日時の24時間前から表示されるため、事前にチケット情報ページを「ホーム画面に 追加」していただくとスムーズにQRコードがご提示できるためオススメです。
							</p>
						</div>

					</div>
					<div class="admission-inner02">
						<a id="sp_not_have"></a>
						<h4>
							スマートフォンをお持ちでない方
						</h4>
						<img src="../images/online/online_SP_08.gif" width="100%" alt="スマートフォンをお持ちでない方">
						<div class="title02">
							<p class="text02">
								<span>1.</span> オンラインでチケットを購入
							</p>
							<div class="process">
								<p>
									オンラインチケット購入の流れに沿ってチケットを購入。
								</p>
							</div>
						</div>
						<div>
							<p class="text02">
								<span>2.</span> QRコードをご自宅で印刷
							</p>
							<p>
								※劇場内に設置されている発券機からも発券可能です
							</p>
							<div class="process">
								<p>
									<span class="thick01">手順 1</span><br> 購入完了メールに記載されているリンクもしくは、劇場ページにあるチケット照会バナーを押して チケット照会ページにアクセス。
								</p>
							</div>
							<div class="process">
								<p>
									<span class="thick01">手順 2</span><br> チケット情報照会画面にて予約番号と購入時に入力した電話番号を入力し、チケット情報ページにアクセス。 掲載されているQRコードをご自宅のプリンターで印刷しご持参ください。
								</p>
							</div>
						</div>
						<div class=" bluezone">
							<p>
								オススメ<br> 入場用QRコードは鑑賞日時の24時間前から表示されるため、事前にチケット情報ページを印刷していただ くとスムーズに入場していただけます。
							</p>
						</div>
						<div class="title02">
						</div>
						<div class="title02">
							<p class="text02">
								<span>3.</span> 鑑賞する劇場へご来場ください
							</p>
							<div class="process">
								<p>
									ご自宅で印刷したQRコードを忘れずにご持参ください。<br> ※劇場内に設置されている発券機からもチケットを発券していただけます。
								</p>
							</div>
							<p class="redtext">
								※発券機から発券する際は、予約番号と購入時に入力した電話番号が必要となります。
							</p>
						</div>
						<div>
							<p class="text02">
								<span>4.</span> 印刷したQRコード、または発券したチケットを入場時にご提示してご入場ください
							</p>
							<div class="process other">
								<p>
									ご自宅で印刷していただいたQRコード、または劇場の発券機から発券したチケットを入場時間になりました ら入場口スタッフにご提示していただきますとご入場いただけます。
								</p>
							</div>
						</div>
						<div>
						</div>
					</div>
					<div class="admission-inner03">
						<a id="not_have"></a>
						<h4>
							スマートフォン・プリンタをお持ちでない方
						</h4>
						<img src="../images/online/online_SP_09.gif" width="100%" alt="スマートフォン・プリンタをお持ちでない方">
						<div class="title02">
							<p class="text02">
								<span>1.</span> オンラインでチケットを購入
							</p>
							<div class="process">
								<p>
									オンラインチケット購入の流れに沿ってチケットを購入。
								</p>
							</div>
						</div>
						<div class="title02">
							<p class="text02">
								<span>2.</span> 鑑賞する劇場へご来場ください
							</p>
						</div>
						<div class="title02">
							<p class="text02">
								<span>3.</span> 劇場の発券機にてチケットを発券
							</p>
							<p class="text03">
								※発券機から発券する場合、予約番号と購入時に入力した電話番号が必要となります。
							</p>
							<div class="process">
								<p>
									予約番号と購入時に入力した電話番号をご用意の上、画面の指示に従って発券してください。
								</p>
							</div>
							<p class="redtext">
								※発券機から発券する際は、予約番号と購入時に入力した電話番号が必要となります。
							</p>
						</div>
						<div class="title02 process_last">
							<p class="text02">
								<span>4.</span> 発券したチケットを入場口スタッフにご提示してご入場ください
							</p>
							<div class="process other">
								<p>
									劇場で発券したチケットを入場口スタッフにご提示していただきますとご入場いただけます。
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>



			<!--/ここまで-->
		</div>
	</div>

	<?php getSmartFooter(); ?>
</body>

</html>
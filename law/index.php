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
								<h2 class="headlineImg"><img src="../images/common/headline_Specified.png"  alt="特定商取引に基づく表示" ></h2>
								<div class="whiteCanvas clearfix">
									<div class="bottomBorderArea">
										<p>「特定商取引に関する法律」第11条（通信販売についての広告）に基づき、商品の提供条件を次のとおり明示します。</p>
									</div>

									<h3 class="blackTitle">事業者</h3>
									<div class="textArea textMargin">
										<p class="textUnity"><span>販売事業者</span></p>
										<p class="textUnity">佐々木興業株式会社</p>
										<p class="textUnity"><span>お問合せ先</span></p>
										<p class="textUnity">
											〒170-0013&nbsp;&nbsp;東京都豊島区東池袋1-14-3<br />
											佐々木興業株式会社&nbsp;&nbsp;シネマサンシャイン運営部
										</p>
										<p class="textUnity"><span>電話</span></p>
										<p class="textUnity">03-3982-6101(月曜～金曜&nbsp;&nbsp;10:00～18:00、ただし祝日・年末年始は除く)</p>
									</div>

									<h3 class="blackTitle">ご購入に際して</h3>
									<div class="textArea">
										<p class="textUnity"><span>ご購入対象・価格・期間</span></p>
										<p class="textUnity">
											チケットの販売価格は、本サイトにおいて表示された価格となります。<br />
											その他お客様にご負担いただく費用消費税をご負担いただきます。なお、本サイト内の表示価格は、消費税込みの金額を表示しております。<br />
											チケットの引渡し方法・時期チケットの発券は、チケットご購入時にWEB上の確認画面または、弊社から送信させていただきます確認の電子メールに 記載された「シネマサンシャイン」に備え付けの自動発券機において、お客様は、「引換番号」および「購入チケット確認用暗証番号」を入力 いただくことによって行います。「引換番号」および「購入チケット確認用暗証番号」を失念された場合、発券することができないことがございます。 また、上映開始時刻を過ぎますと発券できません。予めご了承下さい。なお、郵便または宅配便等によるチケットの送付は行っておりません。<br />
											購入枚数の制限一回のご購入手続において購入いただけますチケット枚数の上限は、6枚までとさせていただきます。7枚以上購入される場合には、 再度お手続きをお願いいたします。<br />
											チケットは映画上映当日の上映開始1時間前までご購入いただけます。
										</p>
										<p class="textUnity"><span>お支払い方法</span></p>
										<p class="textUnity">
											クレジットカードによる決済のみとなっております。<br />
											利用可能なクレジットカード：MUFG、DC、UFJ、NICOS、Master、VISA、UC、JCB、American Express<br />
											お支払い時期：<br />
											クレジットカード決済画面におけるクレジットカード情報の送信完了時に各カード会社にお客様情報を送信し、決済させていただきます。なお、 ご請求日は各カード会社により異なります。<br />
											キャンセルおよび払い戻し：<br />
											ご購入手続完了後においては、上映中止または延期の場合を除き、お客様の不可抗力による来場遅延等の理由にかかわらず、ご鑑賞作品の変更、 他の上映時間または座席への変更、もしくはチケットの払い戻しは一切いたしません。また、ご購入されたチケットのお引き取りがない場合においても、払い戻しはいたしません。<br />
											弊社の事情により上映を中止または延期した場合、期間および場所を定めて当該中止にかかわるチケットの払い戻しを実施します。ただし、 払い戻しの期間を過ぎた場合、発券済のチケットを紛失・破損し、または甚だしく汚損し判読しがたい場合には、一切払い戻しはいたしません。また、 チケットの購入金額以外の費用（手数料、交通費、宿泊費、通信費、送付料等）はお支払いいたしません。<br />
											払い戻しの期間・場所：<br />
											原則として、チケットご購入時にWEB上の確認画面または、弊社から送信させていただきます確認の電子メールに記載された「劇場」において 払い戻しを行います。払い戻しの期間については、各「シネマサンシャイン」までお問い合わせ下さい。<br />
										</p>
										<p class="textUnity"><span>払い戻しの方法</span></p>
										<p class="textUnity">原則として、チケットとの交換による現金での払い戻しとなります。</p>
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
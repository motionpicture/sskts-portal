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
                              	<h2 class="headlineImg"><img src="../../../images/common/headline_Price.png"  alt="料金案内" ></h2>
								<div class="whiteCanvas clearfix">
									<h3 class="lightBlueTitle">料金案内</h3>
									<table class="priceTable">
										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>一般</p></td>
											<td class="priceNotes" ></td>
											<td class="priceAdd" >￥1,800</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>大学生</p></td>
											<td class="priceNotes" >※要学生証</td>
											<td class="priceAdd" >￥1,500</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>高校生・中学生・小学生</p></td>
											<td class="priceNotes" >※高校生は要学生証</td>
											<td class="priceAdd" >￥1,000</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>幼児(3歳以上)</p></td>
											<td class="priceNotes" ><p>※作品により2歳以上の場合がございます。</p></td>
											<td class="priceAdd" >￥1,000</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>シニア(60歳以上)</p></td>
											<td class="priceNotes" ></td>
											<td class="priceAdd" >￥1,100</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>ハンディキャップ</p></td>
											<td class="priceNotes" >
												<p>※障がい者手帳をお持ちのご本人様。</p>
												<p>※付き添いの方1名様まで同じ料金になります。</p>
											</td>
											<td class="priceAdd" >￥1,000</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
									</table>
									<!--4DX料金-->
									<h3 class="lightBlueTitle">4DX<sup>&reg;</sup>鑑賞料金<span style="color:red;font-size:0.8em;">&nbsp;[7/28(金)より]</span></h3>
									<table class="priceTable">
										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>4DX<sup>&reg;</sup>鑑賞料金</p></td>
											<td class="priceNotes" >
												<p>
													2D作品の場合<br />
													〈通常料金〉+〈4DX<sup>&reg;</sup>鑑賞料金1,000円〉<br /><br />
												</p>
												<p>
													3D作品の場合<br />
													〈通常料金〉+〈3D鑑賞料金400円〉+〈4DX<sup>&reg;</sup>鑑賞料金1,000円〉<br /><br />
													サービスデーの場合<br /></p>
													<p>〈サービスデー料金〉+〈4DX<sup>&reg;</sup>鑑賞料金1,000円〉<br /><br />
												</p>
												<p>※身長100cm未満の方、妊娠中の方、ご高齢の方、心臓・背中・腰・首などに障害のある方、特別な疾病のある方、乗り物酔いしやすい方、その他体調に不安のある方などは、４DX®をご利用いただけません。また、身長120cm未満のお子様は保護者の方と一緒にご鑑賞ください。</p>
											</td>
											<td class="priceAdd" >通常料金+1,000円</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
									</table>
									<!--/4DX料金-->

									<h3 class="lightBlueTitle">割引料金</h3>
									<table class="priceTable">
										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>ファーストデイ</p></td>
											<td class="priceNotes" >※毎月1日</td>
											<td class="priceAdd" >￥1,100</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>レディースデイ</p></td>
											<td class="priceNotes" >※毎週水曜日</td>
											<td class="priceAdd" >女性&nbsp;&nbsp;￥1,100</td>
										</tr>

									
      <tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>シネマサンシャインデイ</p></td>
											<td class="priceNotes" >※毎月15日</td>
											<td class="priceAdd" >￥1,100</td>
										</tr>
                                        	<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
										<tr>
											<td class="priceSubject">
												<p>レイトショー</p>
											</td>
											<td class="priceNotes" >
												<p>※連日20時以降に上映する回</p>
												<p>※上映終了が23時を過ぎる回は、18歳未満の方はご入場頂けません。</p>
												<p>※特別興行には適用されません。</p>
											</td>
											<td class="priceAdd" >￥1,300</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>夫婦50割引</p></td>
											<td class="priceNotes" >
												<p>※夫婦どちらかが50歳以上で同一の作品の同一時間の回をご覧になる場合に限ります。</p>
												<p>※要年齢証明書</p>
												<p>※どちらか一方の方が無料鑑賞の場合、同伴のお客様は通常料金となります。</p>
											</td>
											<td class="priceAdd" >お二人で&nbsp;&nbsp;￥2,200</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<!--<tr>
											<td class="priceSubject"><p>高校生友情プライス</p></td>
											<td class="priceNotes" >
												<p>※高校生3人以上。要学生証。</p>
											</td>
											<td class="priceAdd" >お一人様&nbsp;&nbsp;￥1,000</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>-->
                                        
										<tr>
											<td class="priceSubject"><p>メンバーズカード </p></td>
											<td class="priceNotes" >
												<p>※カード提示で本人を含む4名様まで。</p>
											</td>
											<td class="priceAdd" ><p>一般&nbsp;&nbsp;￥300引</p><p>学生・幼児&nbsp;&nbsp;￥200引</p></td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="priceSubject"><p>キッズメンバーズカード </p></td>
											<td class="priceNotes">
												<p>
													※3歳～12歳の方。<br />
													※会員様ご本人様のみ。
												</p>
											</td>
											<td class="priceAdd" >会員様&nbsp;&nbsp;￥200引</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
										<tr>
											<td class="priceSubject"><p>エフカ割引</p></td>
											<td class="priceNotes" >
												<p>※カード提示で本人を含む2名様まで。</p>
											</td>
											<td class="priceAdd" ><p>一般&nbsp;&nbsp;￥200引</p>
												<p>学生・幼児&nbsp;&nbsp;￥100引</p></td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
									</table>

									<h3 class="lightBlueTitle">3D鑑賞料金</h3>
									<table class="priceTable end">
										<tr class="line">
											<td valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr class="top">
											<td valign="middle">
												<p>通常の鑑賞料金プラス400円で3Ｄ作品をご鑑賞頂けます。</p>
											</td>
										</tr>

										<tr class="bottom">
											<td valign="middle">
												<p>※3Dメガネ費100円含む。</p>
												<p>※前売券、シネマサンシャインCINEMA TICKET（特別鑑賞券）、シネマサンシャインINVITATION TICKET（招待券）、メンバーズカードのポイントによる無料鑑賞、各種割引券もプラス400円でご利用頂けます。</p>
											<p>※3Ｄ作品をご覧になりますお客様は2歳以下のお子様でも3Ｄメガネを利用される場合、鑑賞料金をいただきます。予めご了承ください。なお、2歳以下のお子様の3Ｄ鑑賞料金は1,400円です</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
									</table>
								</div>
							<!-- / .MainArea --></div>
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
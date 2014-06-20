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
									<td class="priceNotes" ><p>※障がい者手帳をお持ちのご本人様。</p>
										<p>※付き添いの方1名様まで同じ料金になります。</p></td>
									<td class="priceAdd" >￥1,000</td>
								</tr>
								<tr class="line">
									<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
								</tr>
							</table>


							<h3 class="lightBlueTitle">ドルビーアトモス料金</h3>
							<table class="priceTable">
								<tr class="line">
									<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
								</tr>

								<tr>
									<td class="priceSubject"><p>ドルビーアトモス料金</p></td>
									<td class="priceNotes" >
    									<p>
	           								<span style="color:#e50307;">※8/31（日）まで追加料金無し。<br /><br /></span>
										</p>
	           						    <p>
	           							    通常（2D）作品の場合<br />
											(例)〈一般1,800円〉+〈ドルビーアトモス料金100円〉＝1,900円<br /><br />
										</p>
										<p>
											3D作品の場合<br />
											(例)〈一般1,800円〉+〈3D鑑賞料金400円〉+〈ドルビーアトモス料金100円〉＝2,300円<br /><br />
										</p>
										<p>
											レイトショーの場合<br />
											(例)〈レイトショー1,300円〉+〈ドルビーアトモス料金100円〉＝1,400円<br /><br />
										</p>
									</td>
									<td class="priceAdd">通常料金+100円</td>
								</tr>

								<tr class="line">
									<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
								</tr>
							</table>


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
									<td class="priceSubject"><p>夫婦50割引</p></td>
									<td class="priceNotes" ><p>※夫婦どちらかが50歳以上で同一の作品の同一時間の回をご覧になる場合に限ります。</p>
										<p>※要年齢証明書</p>
										<p>※どちらか一方の方が無料鑑賞の場合、同伴のお客様は通常料金となります。</p></td>
									<td class="priceAdd" >お二人で&nbsp;&nbsp;￥2,200</td>
								</tr>
								<tr class="line">
									<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
								</tr>
								<tr>
									<td class="priceSubject"><p>レイトショー</p></td>
									<td class="priceNotes" ><p>※連日20時以降に上映する回</p>
										<p>※上映終了が23時を過ぎる回は、18歳未満の方はご入場頂けません。</p>
										<p>※特別興行には適用されません。</p></td>
									<td class="priceAdd" >￥1,300</td>
								</tr>
								<tr class="line">
									<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
								</tr>
								<tr>
									<td class="priceSubject"><p>メンバーズカード </p></td>
									<td class="priceNotes" ><p>※カード提示で本人を含む4名様まで。</p></td>
									<td class="priceAdd" ><p> 一般&nbsp;&nbsp;￥300引<br>
											学生・幼児&nbsp;&nbsp;￥200引 </p></td>
								</tr>
								<tr class="line">
									<td colspan="3" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
								</tr>
								<tr>
									<td class="priceSubject"><p>キッズメンバーズカード </p></td>
									<td class="priceNotes" ><p>※3歳～12歳の方。</p>
										<p>※会員様ご本人様のみ。</p></td>
									<td class="priceAdd" ><p>会員様&nbsp;&nbsp;￥200引</p></td>
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
												<p>
													通常の鑑賞料金プラス400円で3D作品をご鑑賞頂けます。<br />
												</p>
											</td>
										</tr>

										<tr class="bottom">
											<td valign="middle">
												<p>※3Dメガネ費100円含む。</p>
												<p>※前売券、シネマサンシャインCINEMA TICKET（特別鑑賞券）、シネマサンシャインINVITATION TICKET（招待券）、メンバーズカードのポイントによる無料鑑賞、各種割引券もプラス400円でご利用頂けます。</p>
												<p>※3Ｄ作品をご覧になりますお客様は2歳以下のお子様でも3Ｄメガネを利用される場合、鑑賞料金をいただきます。予めご了承ください。 なお、2歳以下のお子様の3Ｄ鑑賞料金は1,400円です。</p>
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
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

						<!-- 池袋コンセッション -->
						<div class="leftColumn">
							<div class="MainArea">
								<h2 class="headlineImg"><img src="../../../images/common/headline_Conses.png"  alt="コンセッション" ></h2>
								<div class="whiteCanvas clearfix">
                                    Coming Soon<?php // 劇場オープン前の対応 ?>
<!--									<h3 class="lightBlueTitle">ソフトドリンク</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>コーラ・ジンジャーエール・ファンタメロン・カルピス・<br>カルピスソーダ・アイスティー・ウーロン茶</p></td>
											<td class="menuprice" >
												<p>
													Ｓサイズ&nbsp;&nbsp;250円<br />
													Ｍサイズ&nbsp;&nbsp;350円<br />
													Lサイズ&nbsp;&nbsp;450円<br />
												</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
									</table>

									<h3 class="lightBlueTitle">コーヒー</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>ホットコーヒー・アイスコーヒー</p></td>
											<td class="menuprice" ><p>350円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>カフェラテ・アイスラテ</p></td>
											<td class="menuprice" ><p>380円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>カフェモカ・アイスモカ</p></td>
											<td class="menuprice" ><p>380円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
									</table>

									<h3 class="lightBlueTitle">アルコール</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>缶ビール</p></td>
											<td class="menuprice" ><p>450円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>缶チューハイ</p></td>
											<td class="menuprice" ><p>400円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
									</table>

									<h3 class="lightBlueTitle">定番ドリンク</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="Name">ペットボトル</p>
											</td>
											<td class="menuprice" ></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">
													ミネラルウォーター・コーラZERO・爽健美茶・綾鷹上煎茶・QOOオレンジ
												</p>
											</td>
											<td class="menuprice" ><p>210円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
                                        <tr>
											<td class="menuName"><p>アイス</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">ココア</p>
											</td>
											<td class="menuprice" ><p>350円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">抹茶オレ</p>
											</td>
											<td class="menuprice" ><p>320円</p></td>
										</tr>


										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

                                        <tr>
											<td class="menuName"><p>ホット</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">ココア</p>
											</td>
											<td class="menuprice" ><p>350円</p></td>
										</tr>
                                        <tr>
											<td class="menuName">
												<p class="optionText">抹茶オレ</p>
											</td>
											<td class="menuprice" ><p>320円</p></td>
										</tr>


										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
									</table>



									<h3 class="lightBlueTitle">ポップコーン</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>塩</p></td>
											<td class="menuprice" >
												<p>
													Ｍサイズ&nbsp;&nbsp;300円<br />
													Ｌサイズ&nbsp;&nbsp;500円
												</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>キャラメル</p></td>
											<td class="menuprice" >
												<p>
													Ｍサイズ&nbsp;&nbsp;400円<br />
													Ｌサイズ&nbsp;&nbsp;700円
												</p>
											</td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>塩・キャラメル</p></td>
											<td class="menuprice" ><p>ハーフ&ハーフ&nbsp;&nbsp;600円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
									</table>

									<h3 class="lightBlueTitle">アイスクリーム</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>アイスクレープ</p></td>
											<td class="menuprice" ><p>360円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>ミニアイスクレープ</p></td>
											<td class="menuprice" ><p>310円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

									</table>

									<h3 class="lightBlueTitle">定番フード</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>


										<tr>
											<td class="menuName"><p>ベルギーワッフル</p></td>
											<td class="menuprice" ><p>450円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

									</table>

									<h3 class="lightBlueTitle">セット</h3>
									<table class="menuTable end">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>ポップコーン塩</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">ペア(ポップコーンL×1＋ドリンクM×2)</p>
											</td>
											<td class="menuprice" ><p>1,100円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">ドリンクM or コーヒーセット</p>
											</td>
											<td class="menuprice" ><p>600円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">カフェラテセット</p>
											</td>
											<td class="menuprice" ><p>630円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">LLセット(ポップコーンL×1＋ドリンクL)</p>
											</td>
											<td class="menuprice" ><p>850円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>ポップコーンキャラメル</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">ペア(ポップコーンL×1＋ドリンクM×2)</p>
											</td>
											<td class="menuprice" ><p>1,300円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">ドリンクM or コーヒーセット</p>
											</td>
											<td class="menuprice" ><p>700円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">カフェラテセット</p>
											</td>
											<td class="menuprice" ><p>730円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">LLセット(ポップコーンL×1＋ドリンクL)</p>
											</td>
											<td class="menuprice" ><p>1,050円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>ポップコーン塩/キャラメル(ハーフ&ハーフ)</p></td>
										</tr>
										<tr>
											<td class="menuName">
												<p class="optionText">ペア(ポップコーンL×1＋ドリンクM×2)</p>
											</td>
											<td class="menuprice" ><p>1,200円</p></td>
										</tr>

										<tr>
											<td class="menuName">
												<p class="optionText">LLセット(ポップコーンL×1＋ドリンクL)</p>
											</td>
											<td class="menuprice" ><p>950円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></span></p></td>
										</tr>
									</table>-->
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
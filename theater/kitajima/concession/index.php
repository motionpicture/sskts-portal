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

						<!-- 北島コンセッション -->
						<div class="leftColumn">
							<div class="MainArea">
								<h2 class="headlineImg"><img src="../../../images/common/headline_Conses.png"  alt="コンセッション" ></h2>
								<div class="whiteCanvas clearfix">
								
									<h3 class="lightBlueTitle">定番ドリンク</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>


                                        <tr>
											<td class="menuName"><p>ペットボトル</p></td>
											<td class="menuprice" ></td>
										</tr>
										<tr>
											<td class="menuName">
												<p class="optionText">コカ・コーラ・ファンタグレープ・Qooみかん・爽健美茶・いろはす天然水・ジョージアザ・プレミアム微糖・ジョージアヨーロピアンブラック</p>
											</td>
											<td class="menuprice" ><p>210円</p></td>
										</tr>
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

									<h3 class="lightBlueTitle">ポップコーン</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr>
											<td class="menuName"><p>キャラメル</p></td>
											<td class="menuprice" ><p>520円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
										<tr>
											<td class="menuName"><p>ショコラ</p></td>
											<td class="menuprice" ><p>520円</p></td>
										</tr>

										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>
										
										<tr>
											<td class="menuName"><p>MIX（キャラメル＆チーズ）</p></td>
											<td class="menuprice" ><p>520円</p></td>
										</tr>
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

									<h3 class="lightBlueTitle">定番フード</h3>
									<table class="menuTable">
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>


                                        <tr>
											<td class="menuName"><p>ドーナツ</p></td>
											<td class="menuprice" ></td>
										</tr>
										<tr>
											<td class="menuName">
												<p class="optionText">プレーン・チョコ・シナモン・キャラメル</p>
											</td>
											<td class="menuprice" ><p>230円</p></td>
										</tr>
										<tr class="line">
											<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>	

									</table>
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

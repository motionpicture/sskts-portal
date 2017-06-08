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
								<h2 class="headlineImg"><img src="../images/common/headline_Theater.png"  alt="劇場一覧" ></h2>
								<div class="whiteCanvas clearfix">
									<h3 class="borderHeadline">関東地区</h3>
									<ul class="theaterListArea clearfix">
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./ikebukuro" >シネマサンシャイン池袋</a></p>
											<p class="theaterPracce">東京都</p>
											<p class="theaterService">
												<a class="link" href="http://www.facebook.com/sunshineikebukuro" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_ikebukuro" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./heiwajima" >シネマサンシャイン平和島</a></p>
											<p class="theaterPracce">東京都</p>
											<p class="theaterService">
												<a class="link" href="../ast" rel="amazingsoudtheater" alt="amazingsoudtheater" ><img src="../images/common/btn_ast.gif"></a>
												<a class="link" href="../4dx" rel="4dx" alt="4dx" ><img src="../images/common/btn_4dx.gif"></a>
												<a class="link" href="http://www.facebook.com/sunshineheiwajima" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/#!/sunshine_imm" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./tsuchiura" >シネマサンシャイン土浦</a></p>
											<p class="theaterPracce">茨城県</p>
											<p class="theaterService">
												<a class="link" href="../imax" rel="imax" alt="imax" ><img src="../images/common/btn_imax.gif"></a>
												<a class="link" href="http://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6/340536766033858" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_tsuchiura" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
									</ul>

									<h3 class="borderHeadline">北陸・中部地区</h3>
									<ul class="theaterListArea clearfix">
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./numazu" >シネマサンシャイン沼津</a></p>
											<p class="theaterPracce">静岡県</p>
											<p class="theaterService">
												<a class="link" href="../4dx" rel="4dx" alt="4dx" ><img src="../images/common/btn_4dx.gif"></a>
												<a class="link" href="http://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5/488698254476149" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/cs_numazu" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./kahoku" >シネマサンシャインかほく</a></p>
											<p class="theaterPracce">石川県</p>
											<p class="theaterService">
												<a class="link" href="http://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%81%8B%E3%81%BB%E3%81%8F/333275446766491" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/cs_kahoku" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
									</ul>

									<h3 class="borderHeadline">関西地区</h3>
									<ul class="theaterListArea clearfix">
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./yamatokoriyama" >シネマサンシャイン大和郡山</a></p>
											<p class="theaterPracce">奈良県</p>
											<p class="theaterService">
                                                <a class="link" href="../4dx" rel="4dx" alt="4dx" ><img src="../images/common/btn_4dx.gif"></a>
												<a class="link" href="../imax" rel="imax" alt="imax" ><img src="../images/common/btn_imax.gif"></a>
												<a class="link" href="http://www.facebook.com/sunshineyamatokoriyama" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/sunshine_imax" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
									</ul>

									<h3 class="borderHeadline">中国・四国地区</h3>
									<ul class="theaterListArea clearfix">
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./shimonoseki" >シネマサンシャイン下関</a></p>
											<p class="theaterPracce">山口県</p>
											<p class="theaterService">
												<a class="link" href="https://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3-%E4%B8%8B%E9%96%A2/328210650636915" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/cs_shimonoseki" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./okaido" >シネマサンシャイン大街道</a></p>
											<p class="theaterPracce">愛媛県</p>
											<p class="theaterService">
												<a class="link" href="http://www.facebook.com/sunshineehime" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_ehime" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./kinuyama" >シネマサンシャイン衣山</a></p>
											<p class="theaterPracce">愛媛県</p>
											<p class="theaterService">
												<a class="link" href="../imax" rel="imax" alt="imax" ><img src="../images/common/btn_imax.gif"></a>
												<a class="link" href="http://www.facebook.com/sunshineehime" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_ehime" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./shigenobu" >シネマサンシャイン重信</a></p>
											<p class="theaterPracce">愛媛県</p>
											<p class="theaterService">
												<a class="link" href="http://www.facebook.com/sunshineehime" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_ehime" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./masaki" >シネマサンシャインエミフルMASAKI</a></p>
											<p class="theaterPracce">愛媛県</p>
											<p class="theaterService">
                                                <a class="link" href="../4dx" rel="4dx" alt="4dx" ><img src="../images/common/btn_4dx.gif"></a>
												<a class="link" href="http://www.facebook.com/sunshineehime" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_ehime" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./ozu" >シネマサンシャイン大洲</a></p>
											<p class="theaterPracce">愛媛県</p>
											<p class="theaterService">
												<a class="link" href="http://www.facebook.com/sunshineehime" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="http://twitter.com/cs_ehime" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./kitajima" >シネマサンシャイン北島</a></p>
											<p class="theaterPracce">徳島県</p>
											<p class="theaterService">
												<a class="link" href="../4dx" rel="4dx" alt="4dx" ><img src="../images/common/btn_4dx.gif"></a>
												<a class="link" href="http://www.facebook.com/sunshinekitajima" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/cs_kitajima" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
									</ul>


                                    <h3 class="borderHeadline">九州地区</h3>
                                    <ul class="theaterListArea clearfix">
										<li class="clearfix">
											<p class="theaterName"><img src="../images/common/btn_arrow.gif"><a href="./aira" >シネマサンシャイン姶良</a></p>
											<p class="theaterPracce">鹿児島県</p>
											<p class="theaterService">
                                                <a class="link" href="../4dx" rel="4dx" alt="4dx" ><img src="../images/common/btn_4dx.gif"></a>
                                                <a class="link" href="https://www.facebook.com/シネマサンシャイン姶良-1907815646120897/" rel="facebook" alt="facebook" target="_blank"><img src="../images/common/btn_facebook.gif"></a>
												<a href="https://twitter.com/aira_cs" rel="twitter" alt="twitter" target="_blank"><img src="../images/common/btn_twitter.gif"></a>
											</p>
										</li>
                                    </ul>
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
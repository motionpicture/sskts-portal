<?php

include("../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php getHeadInclude(); ?>
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
								<h2 class="headlineImg"><img src="../images/common/headline_SiteMap.png"  alt="サイトマップ" ></h2>
								<div class="whiteCanvas clearfix">
									<h3 class="borderHeadline">ホーム</h3>
									<ul class="sitemapLink">
										<li><a href="../theater/">劇場一覧</a></li>
										<li><a href="../showing/">上映中作品</a></li>
										<li><a href="../next_showing/">上映予定作品</a></li>
										<li class="end"><a href="../question/">よくあるご質問</a></li>
									</ul>

									<h3 class="borderHeadline">各劇場情報</h3>

									<div class="theaterLink">
										<div class="theaterLinkList">
											<p class="flip">池袋</p>
											<ul class="linkList">
												<li><a href="../theater/ikebukuro/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/ikebukuro/news/">ニュース</a></li>
												<li><a href="../theater/ikebukuro/admission/">料金案内</a></li>
												<li><a href="../theater/ikebukuro/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/ikebukuro/concession/">コンセッション</a></li>
												<li><a href="../theater/ikebukuro/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/ikebukuro/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">平和島</p>
											<ul class="linkList">
												<li><a href="../theater/heiwajima/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/heiwajima/news/">ニュース</a></li>
												<li><a href="../theater/heiwajima/admission/">料金案内</a></li>
												<li><a href="../theater/heiwajima/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/heiwajima/concession/">コンセッション</a></li>
												<li><a href="../theater/heiwajima/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/heiwajima/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">土浦</p>
											<ul class="linkList">
												<li><a href="../theater/tsuchiura/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/tsuchiura/news/">ニュース</a></li>
												<li><a href="../theater/tsuchiura/admission/">料金案内</a></li>
												<li><a href="../theater/tsuchiura/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/tsuchiura/concession/">コンセッション</a></li>
												<li><a href="../theater/tsuchiura/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/tsuchiura/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">かほく</p>
											<ul class="linkList">
												<li><a href="../theater/kahoku/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/kahoku/news/">ニュース</a></li>
												<li><a href="../theater/kahoku/admission/">料金案内</a></li>
												<li><a href="../theater/kahoku/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/kahoku/concession/">コンセッション</a></li>
												<li><a href="../theater/kahoku/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/kahoku/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">沼津</p>
											<ul class="linkList">
												<li><a href="../theater/numazu/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/numazu/news/">ニュース</a></li>
												<li><a href="../theater/numazu/admission/">料金案内</a></li>
												<li><a href="../theater/numazu/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/numazu/concession/">コンセッション</a></li>
												<li><a href="../theater/numazu/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/numazu/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">大和郡山</p>
											<ul class="linkList">
												<li><a href="../theater/yamatokoriyama/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/yamatokoriyama/news/">ニュース</a></li>
												<li><a href="../theater/yamatokoriyama/admission/">料金案内</a></li>
												<li><a href="../theater/yamatokoriyama/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/yamatokoriyama/concession/">コンセッション</a></li>
												<li><a href="../theater/yamatokoriyama/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/yamatokoriyama/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">下関</p>
											<ul class="linkList">
												<li><a href="../theater/shimonoseki/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/shimonoseki/news/">ニュース</a></li>
												<li><a href="../theater/shimonoseki/admission/">料金案内</a></li>
												<li><a href="../theater/shimonoseki/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/shimonoseki/concession/">コンセッション</a></li>
												<li><a href="../theater/shimonoseki/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/shimonoseki/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">大街道</p>
											<ul class="linkList">
												<li><a href="../theater/okaido/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/okaido/news/">ニュース</a></li>
												<li><a href="../theater/okaido/admission/">料金案内</a></li>
												<li><a href="../theater/okaido/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/okaido/concession/">コンセッション</a></li>
												<li><a href="../theater/okaido/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/okaido/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">衣山</p>
											<ul class="linkList">
												<li><a href="../theater/kinuyama/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/kinuyama/news/">ニュース</a></li>
												<li><a href="../theater/kinuyama/admission/">料金案内</a></li>
												<li><a href="../theater/kinuyama/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/kinuyama/concession/">コンセッション</a></li>
												<li><a href="../theater/kinuyama/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/kinuyama/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">重信</p>
											<ul class="linkList">
												<li><a href="../theater/shigenobu/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/shigenobu/news/">ニュース</a></li>
												<li><a href="../theater/shigenobu/admission/">料金案内</a></li>
												<li><a href="../theater/shigenobu/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/shigenobu/concession/">コンセッション</a></li>
												<li><a href="../theater/shigenobu/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/shigenobu/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">エミフルMASAKI</p>
											<ul class="linkList">
												<li><a href="../theater/masaki/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/masaki/news/">ニュース</a></li>
												<li><a href="../theater/masaki/admission/">料金案内</a></li>
												<li><a href="../theater/masaki/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/masaki/concession/">コンセッション</a></li>
												<li><a href="../theater/masaki/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/masaki/access/">アクセス</a></li>
											</ul>
										</div>

										<div class="theaterLinkList">
											<p class="flip">大洲</p>
											<ul class="linkList">
												<li><a href="../theater/ozu/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/ozu/news/">ニュース</a></li>
												<li><a href="../theater/ozu/admission/">料金案内</a></li>
												<li><a href="../theater/ozu/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/ozu/concession/">コンセッション</a></li>
												<li><a href="../theater/ozu/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/ozu/access/">アクセス</a></li>
											</ul>
										</div>


										<div class="theaterLinkList">
											<p class="flip">北島</p>
											<ul class="linkList">
												<li><a href="../theater/kitajima/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/kitajima/news/">ニュース</a></li>
												<li><a href="../theater/kitajima/admission/">料金案内</a></li>
												<li><a href="../theater/kitajima/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/kitajima/concession/">コンセッション</a></li>
												<li><a href="../theater/kitajima/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/kitajima/access/">アクセス</a></li>
											</ul>
										</div>

                                        <div class="theaterLinkList">
											<p class="flip">姶良</p>
											<ul class="linkList">
												<li><a href="../theater/aira/">上映スケジュール＆チケット購入</a></li>
												<li><a href="../theater/aira/news/">ニュース</a></li>
												<li><a href="../theater/aira/admission/">料金案内</a></li>
												<li><a href="../theater/aira/advance_ticket/">前売情報</a></li>
												<li><a href="../theater/aira/concession/">コンセッション</a></li>
												<li><a href="../theater/aira/floor_guide/">劇場設備＆サービス</a></li>
												<li><a href="../theater/aira/access/">アクセス</a></li>
											</ul>
										</div>
									</div>

									<h3 class="borderHeadline">会社情報</h3>
									<ul class="sitemapLink">
										<li><a href="../company/">会社概要</a></li>
										<li><a href="../law/">特定商取引に基づく表示</a></li>
										<li><a href="../sitepolicy/">利用規約</a></li>
										<li class="end"><a href="../privacy/">プライバシーポリシー</a></li>
									</ul>

									<h3 class="borderHeadline">その他</h3>
									<ul class="sitemapLink end">
										<li><a href="../members_card/">メンバーズカードのご案内</a></li>
										<li><a href="../special_ticket/">シネマサンシャイン特別鑑賞券</a></li>
										<li><a href="../online/">オンラインチケット購入のメリット</a></li>
										<li class="end"><a href="../mvtk/">ムビチケ券ご利用方法</a></li>
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
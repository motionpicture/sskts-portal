<?php
include("../../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php getSmartHeadInclude(); ?>
	<link rel="stylesheet" type="text/css" href="../css/sitemap.css">
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

	<h2 class="category_bar_p">サイトマップ</h2>
	<div class="basebox2_ptrl">
		<div class="basebox2_lineblue"></div>
		<div class="basebox2">
			<div class="basebox2_line border_n">
				<h3 class="tex01">ホーム</h3>
			</div>
			<ul class="LinkList">
				<li><a href="../theater/">劇場一覧</a></li>
				<li><a href="../showing/">上映中作品</a></li>
				<li><a href="../next_showing/">上映予定作品</a></li>
				<li><a href="../../question/">よくあるご質問</a></li>
			</ul>
			<div class="basebox2_line border_n">
				<h3 class="tex01">各劇場情報</h3>
			</div>
			<!-----各劇場-------------------------------------------------------------------------->
			<div class="theaterLink">
				<div class="theaterLinkList">
					<p class="flip"><a href="javascript:toggle1()">池袋</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content01">
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
					<p class="flip"><a href="javascript:toggle2()">平和島</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content02">
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
					<p class="flip"><a href="javascript:toggle3()">土浦</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content03">
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
					<p class="flip"><a href="javascript:toggle4()">かほく</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content04">
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
					<p class="flip"><a href="javascript:toggle5()">沼津</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content05">
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
					<p class="flip"><a href="javascript:toggle6()">大和郡山</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content06">
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
					<p class="flip"><a href="javascript:toggle7()">下関</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content07">
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
					<p class="flip"><a href="javascript:toggle8()">大街道</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content07">
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
					<p class="flip"><a href="javascript:toggle9()">衣山</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content08">
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
					<p class="flip"><a href="javascript:toggle10()">重信</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content09">
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
					<p class="flip"><a href="javascript:toggle11()">エミフルMASAKI</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content10">
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
					<p class="flip"><a href="javascript:toggle12()">大洲</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content11">
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
					<p class="flip"><a href="javascript:toggle13()">今治</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content12">
						<li><a href="../theater/imabari/">上映スケジュール＆チケット購入</a></li>
						<li><a href="../theater/imabari/news/">ニュース</a></li>
						<li><a href="../theater/imabari/admission/">料金案内</a></li>
						<li><a href="../theater/imabari/advance_ticket/">前売情報</a></li>
						<li><a href="../theater/imabari/concession/">コンセッション</a></li>
						<li><a href="../theater/imabari/floor_guide/">劇場設備＆サービス</a></li>
						<li><a href="../theater/imabari/access/">アクセス</a></li>
					</ul>
				</div>
				<div class="theaterLinkList">
					<p class="flip"><a href="javascript:toggle14()">北島</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content13">
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
					<p class="flip"><a href="javascript:toggle15()">姶良</a></p>
					<ul class="linkList" style="display: block; opacity: 1; display:none;" id="close_content15">
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
			<!-----各劇場-------------------------------------------------------------------------->

			<div class="basebox2_line border_n">
				<h3 class="tex01">会社情報</h3>
			</div>
			<ul class="LinkList">
				<li><a href="../company/">会社概要</a></li>
				<li><a href="../law/">特定商取引に基づく表示</a></li>
				<li><a href="../sitepolicy/">利用規約</a></li>
				<li><a href="../privacy/">プライバシーポリシー</a></li>
			</ul>
			<div class="basebox2_line border_n">
				<h3 class="tex01">その他</h3>
			</div>
			<ul class="LinkList">
				<li><a href="../../members_card/">メンバーズカードのご案内</a></li>
				<li><a href="../../special_ticket/">シネマサンシャイン特別鑑賞券</a></li>
				<li><a href="../../online/">オンラインチケット購入のメリット</a></li>
				<li><a href="../../mvtk/">ムビチケ券ご利用方法</a></li>
			</ul>
		</div>
	</div>

	<?php getSmartFooter(); ?>
</body>
</html>

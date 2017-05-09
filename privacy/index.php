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
								<h2 class="headlineImg"><img src="../images/common/headline_Privacy.png"  alt="プライバシーポリシー" ></h2>
								<div class="whiteCanvas clearfix">
									<h3 class="blackTitle">プライバシーポリシーについて</h3>
									<div class="textArea">
										<p class="textUnity">2009年4月15日</p>
										<p class="textUnity">当社はお客様の氏名・性別・生年月日・お住まい・職種のお申し込み内容等の個人情報の保護に関し、以下の取組みを実施いたしております。</p>
										<p class="textUnity">1.当社は、個人情報に関する法令おおびその他の規範を遵守し、お客さまの大切な個人情報の保護に万全を尽くします。</p>
										<p class="textUnity">
										    2.当社はお客さまの個人情報について、下記の目的の範囲内で適正に取り扱いさせていただきます。<br />
									        ・ご本人確認、ご利用サービスの停止・中止の通知並びにその他当社のサービスの提供に係わること。<br />
									        ・電子メールによる当社または提携先の提供するサービスに関する情報提供、販売の推奨、アンケート調査および景品等の送付あるいは提供を行うこと。<br />
									        ・集計、分析処理を行い、個人を認識できない形状に加工して利用または提携先等に提供すること。<br />
									        ・当社のサービス改善または新たなサービスの開発を行うこと。<br />
									        ・お問い合わせ、ご相談にお答えすること。<br />
										    なお、上記利用目的等を定める場合があります。また、お客さまとのお電話での対応時において、ご意見・ご要望等の正確な把握、 今後のサービス向上のために、通話を録音させていただく場合がございます。<br />
										    当社の提供するウェブサイトやサービスをより便利にご利用いただくために、クッキー等の技術を利用する場合があります。<br />
										    クッキー等を利用して取得したサービスの利用状況を個人を特定して利用する場合は、個人情報として取り扱います。
										</p>
										<p class="textUnity">3.当社は、お客さまの個人情報を適正に取扱うため、社内規定及び管理体制の整備、従業員の教育、並びに、個人情報への不正アクセスや 個人情報の紛失、破壊、改ざんおよび漏洩防止等に関する適切な措置を行ない、またその見直しを継続して図ることにより、個人情報の保護に 努めてまいります。</p>
										<p class="textUnity">4.当社は、お客さまの個人情報については、上記利用目的を達成するために、業務委託先または提携先に預託する場合がございます。その場合は個人情報保護の契約を締結する等の必要かつ適切な処置を実施いたします。なお法令等に基づき裁判所からの開示の要請があった場合については、当該公的機関に提供することがございます。</p>
										<p class="textUnity">
											5.当社は、本サービスをご利用のお客さまについて、利用目的の達成に必要な範囲でお客様の個人データを共同利用する場合があります。<br />
									        ・共同利用される個人データは、お客さまのお名前、生年月日、お住まい、性別、サービス利用状況等です。<br />
									        ・共同利用者の範囲は当社および当社関連会社です。<br />
									        ・共同利用における利用目的は、当社の利用目的と同じです。<br />
									        ・共同利用における管理責任者佐々木興業株式会社(会社概要)です。
        								</p>
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
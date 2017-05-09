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
								<h2 class="headlineImg"><img src="../images/common/headline_Policy.png"  alt="利用規約" ></h2>
								<div class="whiteCanvas clearfix">
									<h3 class="blackTitle">利用規約について</h3>
									<div class="textArea">
										<p class="textUnity">
											本規約は、佐々木興業株式会社（以下「当社」）が独自に規定するものであり、当社の運営する「シネマサンシャイン」が提供するサービスに提供されるものとします。<br />
											当社が提供するシネマサンシャインをご利用になる場合には、本規約に従っていただく必要があります。ご利用の皆様はシネマサンシャインの利用をもって、本規約の内容を承諾いただけたものとみなします。<br />
											本規約は必要に応じて適宜見直しを行ないますので、ご利用の際には本ページに掲載されている最新の利用規約をご確認下さい。
										</p>
										<p class="textUnity"><span>1.個人登録情報の取り扱いについて</span></p>
										<p class="textUnity">
											個人情報に関してはシネマサンシャインにて最大限の注意を払い管理いたします。個人情報の取り扱いについては、<a href="../privacy/">プライバシーポリシー</a>にまとめてありますので、そちらもご覧下さい。<br />
											またシネマサンシャインの営業譲渡が行なわれる際は、譲渡を受けた獲得者に移管いたします。なお、退会申請には速やかに応じ、個人情報を削除いたします。
										</p>
										<p class="textUnity"><span>2.ID及びパスワードの管理について</span></p>
										<p class="textUnity">
											ID及びパスワードの管理は、登録ユーザーの責任において行なっていただきます。ID及びパスワードを利用して行なわれた行為は、そのIDを保有している登録ユーザーの責任とみなします。<br />
											第三者への漏洩の疑いがある場合は、直ちにシネマサンシャインまでご連絡下さい。シネマサンシャインはID及びパスワードの不正使用などから生じた損害について一切責任を負いません。
										</p>
										<p class="textUnity"><span>3.登録事項の変更について</span></p>
										<p class="textUnity">
											ユーザー登録の必須項目に変更があった際には、速やかに情報の変更をお願いいたします。
										</p>
										<p class="textUnity"><span>4.禁止事項</span></p>
										<p class="textUnity">
											他の利用者や第三者を誹謗中傷する行為や、不当に足を引っ張ろうとする行為。<br />
											公正な場を不当に歪めようとする行為。<br />
											運営者が、不適切と判断した行為。
										</p>
										<p class="textUnity"><span>5.登録ユーザーの資格保留又は削除について</span></p>
										<p class="textUnity">
											シネマサンシャインは、上記禁止事項に違反した登録ユーザーに対し、資格を保留・削除する権利を保有します。また、コンテンツを削除する権利も保有します。その判断に関しては、運営者の裁量にて行使されます。これにより損害が発生した場合でもシネマサンシャインは責任を負いません。
										</p>
										<p class="textUnity"><span>6.サービスの中断</span></p>
										<p class="textUnity">
											シネマサンシャインは、設備的事情等のやむを得ない場合に限って、利用者に事前通知なくサービスを一時的に中断することがあります。その際に利用者に生じた不利益や損失などに対して、一切の責任を負わないものとします。
										</p>
										<p class="textUnity"><span>7.営業の中止について</span></p>
										<p class="textUnity">
											シネマサンシャインは、利用者にWebサイト上またはメールによる通知の上、サービスの全部または一部を中止できるものとします。サービスの終了に伴い生じる利用者の不利益や損害などに対して、一切の責任を負わないものとします。
										</p>
										<p class="textUnity"><span>8.免責事項</span></p>
										<p class="textUnity">
											シネマサンシャインは、本サイトの利用に際して利用者が生じた不利益や損害などに対して、一切の責任を負わないものとします。<br />
											利用者が本サイトから得る情報などについての一切は、その受け手の責任において判断するものとし、シネマサンシャインは、いかなる保証も行なわないものにします。<br />
											利用者が使用する機器・ソフトウェアについて、シネマサンシャインは、その動作保証は一切行なわないものとします。<br />
											シネマサンシャインをきっかけに契約に至った案件に関して、その後に生じたトラブルなど、シネマサンシャインでは一切の責任を負わないものとします。
										</p>
										<p class="textUnity"><span>9.準拠法および裁判管轄について</span></p>
										<p class="textUnity">
											本規約には、日本法が適用されます。また、本規約に関連する利用者とシネマサンシャイン間の紛争については、東京地方裁判所を第一審専属管轄裁判所とします。
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
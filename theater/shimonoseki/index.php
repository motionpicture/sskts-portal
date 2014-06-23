<?php

include("../../lib/require.php");
$arr = getNowPage();
$theater = $arr["ename"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php getHeadInclude(); ?>
<script type="text/javascript" src="../../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../../js/jquery.bxslider.js"></script>
<script type="text/javascript" src="../../js/util.js"></script>
<script type="text/javascript" src="../../js/theater_ajax.js"></script>
<script type="text/javascript">


		$(function(){
			$('.dayListBox ul').bxSlider({
				speed:700,
				 minSlides: 7,
				maxSlides: 7,
				nextSelector:'#cal_right',
				prevSelector:'#cal_left',
				prevText:'<img src="../../images/common/btn_prev.gif" alt="前へ">',
				nextText:'<img src="../../images/common/btn_next.gif" alt="次へ">',
				slideWidth: 75,
				slideMargin: 4,
				infiniteLoop:false,
				pager: false,
				useCSS:false
				});

			makeBlock();
			getJson('<?php echo $theater?>','<?php

			if ($_GET['pre']) {
				$value = reset(getDates2($theater,true));
				echo $value['val'];
			} else {
				echo date('Ymd');
			}
			 ?>');


				$(".cal_date").click(function () {

					  $(".dayListBox ul li").each(function(){
						    $(this).addClass("notAvailable");
						});
					var class_name= $(this).attr('class');
					class_name = class_name.replace("cal_date ","");
					class_name = class_name.replace(" notAvailable","");

					$(this).removeClass("notAvailable");
					makeBlock();
					getJson('<?php echo $theater?>',class_name);
					//  console.log(class_name);
				});

		});



				</script>
<link type="text/css" rel="stylesheet" href="../../css/base.css" />
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

							<!-- ↓adsense上部↓ -->
							<div class="adArea">
								<script type="text/javascript"><!--
								google_ad_client = "ca-pub-3891476404601512";
								/* シネサン（下関上部） */
								google_ad_slot = "4443474967";
								google_ad_width = 468;
								google_ad_height = 60;
								//-->
								</script>
								<script type="text/javascript"
								src="//pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</div>
							<!-- ↑adsense上部↑ -->

					<div class="MainArea">
						<h2 class="headlineImg"> <img src="../../images/common/headline_Schedule.png" alt="上映スケジュール"> </h2>
						<div class="whiteCanvas clearfix">
                            <img src="../../images/img_info.png">
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

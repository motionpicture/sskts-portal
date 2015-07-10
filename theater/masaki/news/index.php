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
								<h2 class="headlineImg"><img src="../../../images/common/headline_News.png"  alt="ニュース&amp;トピックス" ></h2>
								<div class="whiteCanvas clearfix">
									<table class="NewsBox">
									<?php
										$arr = getNowPage();
										$theaterName = $arr["ename"];
										$theaterId=getTheaterId($theaterName);
										$theaterId = $theaterId['id'];

										$newsViews = getNewsViews($theaterId);
										$newsViews = explode(",",$newsViews['view']);


										$news = getNews($theaterId);
										if (count($newsViews) >= 1) {
											foreach ($newsViews as $view) {

												if(count($news) >= 1) {
													foreach($news as $nws){
														if($view==$nws['id']) {
									?>

									<!-- News -->
									<tr>
										<td class="photo" valign="top">
											<?php
												if ($nws['pic_path'] != ""){
													echo '<p><img src="'.news_picture.'/'.$nws['pic_path'].'"  alt="ニュースイメージ" width="60"></p>';
												}
											?>
										</td>
										<td class="txt" valign="top" >
											<p class="NewsDay"><?php echo date ('Y/m/d',strtotime($nws['start_date'])) ?></p>
											<p class="NewsTitle"><span class="accordion_head"><?php echo $nws['midasi'] ?><img src="../../../images/common/btn_more.gif"></span></p>
											<div class="sentence"><?php echo $nws['txt'] ?></div>
										</td>
									</tr>
									<tr class="line">
										<td colspan="2" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
									</tr>
									<!-- News -->

									<?php
														}
													}
												}
											}

										}
									?>
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
	<!-- リマーケティング タグの Google コード -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 993895592;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=0&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	</body>

</html>
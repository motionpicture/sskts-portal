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
							<h2 class="headlineImg showListHeadLine"><img src="../images/common/headline_Future.png"  alt="上映予定作品" ></h2>

							<!-- ↓adsense上部↓ -->
							<div class="adArea">
								<script type="text/javascript"><!--
								google_ad_client = "ca-pub-3891476404601512";
								/* シネサン（上映予定上部） */
								google_ad_slot = "3745470960";
								google_ad_width = 468;
								google_ad_height = 60;
								//-->
								</script>
								<script type="text/javascript"
								src="//pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</div>
							<!-- ↑adsense上部↑ -->

							<div class="SearchListArea">
								<div class="SearchLisBox futureList clearfix">
									<form name="SearchListBoxForm" class="SearchListBoxForm" id="SearchListBoxForm" method="GET" action="./">
										<div class="searchMovieBox">
											<div class="Box">
												<select name="theaterSelect">
													<?php
													//theater一覧取得
													$theaters = getTheaterList();
													foreach ($theaters as $theater) {

														//もし劇場が選択されている場合
														if (!empty($_GET['theaterSelect']) && $theater['id'] == $_GET['theaterSelect']) {
																$option_tag = sprintf('<option value="%s" selected>%s</option>'."\r\n",$theater['id'],$theater['name']);
															} else {
																$option_tag = sprintf('<option value="%s">%s</option>'."\r\n",$theater['id'],$theater['name']);
															}
															//var_dump($_GET['theater']);


														echo $option_tag;
													}
													?>
												</select>
											</div>

											<div class="submitBox">
												<input type="image" src="../images/common/btn_submitSearch.gif" alt="検索する">

											</div>
										</div>
									</form>
								</div>

								<div class="whiteCanvas clearfix">


								<?php
								if (!empty($_GET['theaterSelect'])){
									$showings = getNextRoadShow($_GET['theaterSelect']);
								} else {
									$showings = getNextRoadShow();
								}

								if(!$showings){
									echo "<p>ご指定の検索条件に一致する作品はございません。 </p>";
								}else{
									$i= 0;
									foreach ($showings as $showing) {
										if($i == 0){
											echo "<div class=\"movieListArea clearfix start\">";
											$i++;
										}else{
											echo "<div class=\"movieListArea clearfix\">";
										}
									?>
										<div class="left">
											<p><?php
											if ($showing['picture'] != null){
												echo '<img src="'. movie_picture . '/' . $showing['picture'] . '" width="131" />';
											}else{
												echo '<img src="../images/common/image_none.gif" width="131" />';

											}
											?></p>
										</div>
										<div class="right">
											<p class="day"><?php echo date ('Y/m/d',strtotime($showing['start_date'])) ?>&nbsp;&nbsp;公開予定</p>
											<p class="name"><?php
											if($showing['site'] !="" ) {
												echo '<a href="'.$showing['site'].'" target="_blank">'.$showing['name'].'</a>';
											} else {
												echo $showing['name'];
											}
											?></p>
											<?php
												if($showing['ename'] !="" ) {
													echo "<p class='ename'>$showing[ename]</p>";
												}
											?>
											<p class="copy"><?php echo $showing['credit'] ?></p>
											<?php
												if($showing['grade']){
													if($showing['grade'] == 1){
														echo '<p class="mark"><img src="../images/common/mark_R15.gif" width="27" /></p>';
													}elseif($showing['grade'] == 2){
														echo '<p class="mark"><img src="../images/common/mark_R18.gif" width="27" /></p>';
													}else{
														echo '<p class="mark"><img src="../images/common/mark_PG12.gif" width="27" /></p>';
													}
												}
											?>
											<p class="tuika"><?php echo preg_replace("/;/","<br />",$showing['tuika']); ?></p>
											
											<ul class="clearfix">

												<?php
													foreach ($theaters as $theater) {
														if ($showing['theater_ids'] != null) {
															$vals = explode(",",$showing['theater_ids']);
															$theater_judge=false;
															foreach ($vals as $val ) {
																if ($theater['id'] == $val ) {
																	$theater_judge = true;
																	echo '<li><a href="../theater/'.$theater['ename'].'/"><img src="../images/common/link_'.$theater['ename'].'.gif" alt="'.$theater['name'].'"></a></li>';
																}
															}

															if(!$theater_judge) {
																echo '<li><img src="../images/common/link_'.$theater['ename'].'_No.gif" alt="'.$theater['name'].'"></li>';
															}
			//基本ここは絶対来ないコード
														}else {
															echo '<li><img src="../images/common/link_'.$theater['ename'].'_No.gif" alt="'.$theater['name'].'"></li>';
														}

													}
												?>
											</ul>
											<?php
											if($showing['site'] !="" ) echo '<p class="official"><img src="../images/common/btn_arrow.gif"><a href="'.$showing['site'].'" target="_blank">公式サイト</a></p>';
											?>

										</div>
									</div>

									<?php } ?>
								<?php } ?>


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
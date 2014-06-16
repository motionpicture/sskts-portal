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
								<h2 class="headlineImg"><img src="../../../images/common/headline_Advance.png"  alt="前売情報" ></h2>
								<div class="whiteCanvas clearfix">
									<div class="advanceNote">
										<p>・前売券の販売は、公開日の前日までとなっております。</p>
										<p>・前売券は通常、ご鑑賞日の２日前から窓口で当日券へのお引換えが可能ですが、作品によっては早まる場合がございますのでご了承下さい。</p>
										<p>・前売特典は数に限りがあり、なくなり次第終了となります。予めご了承ください。</p>
										<p>・前売特典が終了となっていない作品でも、ご来場時に終了している場合があります。予めご了承ください。</p>
                                        <p>・IMAX作品にはムビチケカードはご利用頂けません。</p>
									</div>

									<table class="advanceTable">
										<tr class="topColumn">
											<td class="movieName"><p>作品名</p></td>
											<td class="movieScheduledDay"><p>公開予定日</p></td>
											<td class="movieSellDay"><p>発売日</p></td>
											<td class="movieAdd"><p>前売</p></td>
											<td class="movieTicket"><p>ムビチケ<br />カード</p></td>
											<td class="movieBenefit"><p>前売特典</p></td>
										</tr>
<?php
$arr = getNowPage();
$theaterName = $arr["ename"];
$theaterId=getTheaterId($theaterName);
$maeuri = getMaeuri($theaterId['id']);


	foreach($maeuri as $val){
		//var_dump($val);
		$movie = getMovieById($val['movie_code']);
		if(!$movie['name']){
			continue;
		}

?>
										<tr class="line">
											<td colspan="6" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
										</tr>

										<tr class="movieColumn">
											<td class="movieName"><p>
											<?php
												if($movie['site'] !="" ) {
													echo '<a href="'.$movie['site'].'" target="_blank">'.$movie['name'].'</a>';
												} else {
													echo $movie['name'];
												}
											?>
											</p></td>
											<td class="movieScheduledDay"><p><?php

											if($val['end_date_txt'] != ""){
												echo $val['end_date_txt'];

											}else {
												if ($val['end_date'] != "") {
													echo date ('Y/m/d',strtotime($val['end_date']));
												}else {
													echo "";
												}

											}

											?></p></td>
											<td class="movieSellDay"><p>
											<?php
											if($val['roadshow_txt'] != ""){
												echo $val['roadshow_txt'];

											}else {
												if ($val['roadshow_date'] != "") {
													echo date ('Y/m/d',strtotime($val['roadshow_date']));
												}else {
													echo "";
												}

											}

											?></p></td>
											<td class="movieAdd">
												<?php

												if ($val['price']!="") {
													$prices = explode(";",$val['price']);
													if (count($prices)>=1){
														foreach($prices as $price){
															if ($price != ""){
																echo "<p>".$price."</p>";
															}
														}
													} else {
														echo "<p>".$val['price']."</p>";
													}


												}

												?>
											</td>
											<td class="movieTicket"><p><?php echo $val['movie_ticket_flg']==1 ? "○":"×" ?></td>
											<td class="movieBenefit"><p><?php echo $val['note'] ?></p></td>
										</tr>
<?php }?>

										<tr class="line">
											<td colspan="6" valign="middle"><p><img src="../../../images/common/img_line.gif"></p></td>
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
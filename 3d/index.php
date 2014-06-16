<?php
include("../lib/require.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="シネマサンシャイン 3D劇場のご案内">
	<meta name="keywords" content="シネマサンシャイン,映画,シネマ,映画館,シネコン,3D劇場のご案内">
	<title>3D劇場のご案内｜シネマサンシャイン</title>
	<?php //getHeadInclude(); ?>
	<link type="text/css" rel="stylesheet" href="../css/3dPublic.css" />
	<script language="javascript">AC_FL_RunContent = 0;</script>
	<script src="/js/AC_RunActiveContent4cache.js" language="javascript"></script>
	<script type="text/javascript" src="../js/rollover.js"></script>
	<script type="text/javascript" src="../js/back_to_top.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo">
				<script type="text/javascript">
					AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','1300','height','535','title','3D映画を見よう!!','src','fla/3d','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','fla/3d' ); //end AC code
				</script>
				<noscript>
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="1300" height="535" title="3D映画を見よう!!">
						<param name="movie" value="fla/3d.swf" />
						<param name="quality" value="high" />
						<embed src="fla/3d.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="1300" height="535"></embed>
					</object>
				</noscript>
			</div>
		</div>

		<div id="publicMain">
			<div id="threedMenu">
				<ul>
					<li><a href="#now"><img src="../images/3d/3dnow.gif" alt="3D上映作品" /></a></li>
					<li><a href="#future"><img src="../images/3d/3dfuture.gif" alt="3D上映予定" /></a></li>
					<li><a href="#3dtheater"><img src="../images/3d/3dtonyu.gif" alt="導入劇場" /></a></li>
				</ul>
			</div>
	        
			<a name="now" id="now"></a>
			<img src="../images/3d/nowMovieTitle.jpg" width="800" height="37" alt="上映中3D作品"  style="margin:30px 0 0 0"/>
			<div id="showingList" style="margin-bottom:10px">
				<div class="movieList">
					<?php
						//theater一覧取得
						$theaters = getTheaterList();
						$showings = getNowRoadShow3d();

						if(!$showings){
							echo "<p>ご指定の検索条件に一致する作品はございません。 </p>";
						}else{
							$i= 0;
							foreach ($showings as $showing) {
					?>
								<!--作品ボックス生成-->
								<div class="movie">
									<p class="movieImageBlock">
										<?php
											if($showing['picture'] != null){
												if($showing['site'] !="" ){
													echo '<a href="' . $showing['site'] . '"><img src="'. movie_picture . '/' . $showing['picture'] . '" width="131"  border="0"/></a>';
												}else{
													echo '<img src="'. movie_picture . '/' . $showing['picture'] . '" width="131"  border="0"/>';
												}
											}else{
												if($showing['site'] !="" ){
													echo '<a href="' . $showing['site'] . '"><img src="../images/common/image_none.gif" width="131"  border="0"/></a>';
												}else{
													echo '<img src="../images/common/image_none.gif" width="131"  border="0"/>';
												}
											}
										?>
									</p>
									<div class="movieInformation">
										<div class="movieDetailed">
											<div class="detailedBody">
												<h2>
													<?php
														if($showing['site'] !="" ){
															echo '<a href="' . $showing['site'] . '" target="_blank">' . $showing['name'] . '</a>';
														}else{
															echo $showing['name'];
														}
													?>
												</h2>
												<?php
													if($showing['ename'] !="" ) {
														echo "<p class='ename'>$showing[ename]</p>";
													}
												?>

												<p class="movieCopy"><?php echo $showing['credit'] ?></p>
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
											</div>
										</div>

										<div class="showingTheaters">
											<div class="theatersBody">
												<p class="tuika"><?php if($showing['tuika'])echo preg_replace("/;/","<br />",$showing['tuika']) . "<br />"; ?></p>
												<h3>上映劇場：</h3>
												<ul>
													<?php
														foreach ($theaters as $theater) {
															if ($showing['theater_ids'] != null) {
																$vals = explode(",",$showing['theater_ids']);
																$theater_judge=false;
																foreach ($vals as $val ) {
																	if ($theater['id'] == $val ) {
																		$theater_judge = true;
																		echo '<li><a href="../theater/'.$theater['ename'].'/">'.$theater['name'].'</a></li>';
																	}
																}
															}
														}
													?>
												</ul>
											</div>
										</div>
										<?php
											if($showing['site'] !="" ){
												echo '<p class="officialBlock"><a href="' . $showing['site'] . '" target="_blank"><img border="0" src="../images/3d/officialsite_btn.gif" width="94" height="24" alt="" /></a></p>';
											}
										?>
									</div>
									<hr/>
								</div>
								<!--作品ボックス生成　ここまで-->
							<?php } ?>
						<?php } ?>
				</div>
			</div>

		<a href="#" onclick="backToTop(); return false"><img src="../images/3d/3dpageTop.jpg" width="800" height="27" alt="ページのTOPへ"  style="margin:0 0 30px 0"/></a>
		<a name="future"  id="future"></a>
		<img src="../images/3d/futureMovieTitle.jpg" width="800" height="37" alt="上映中3D作品"  style="margin:0"/>
		<div id="showingList">
			<div class="movieList">
				<?php
					unset($showings);
					$showings = getNextRoadShow3d();

					if(!$showings){
						echo "<p>ご指定の検索条件に一致する作品はございません。 </p>";
					}else{
						$i= 0;
						foreach ($showings as $showing) {
				?>
							<!--作品ボックス生成-->
							<div class="movie">
								<p class="movieImageBlock">
									<?php
										if($showing['picture'] != null){
											if($showing['site'] !="" ){
												echo '<a href="' . $showing['site'] . '"><img src="'. movie_picture . '/' . $showing['picture'] . '" width="131"  border="0"/></a>';
											}else{
												echo '<img src="'. movie_picture . '/' . $showing['picture'] . '" width="131"  border="0"/>';
											}
										}else{
											if($showing['site'] !="" ){
												echo '<a href="' . $showing['site'] . '"><img src="../images/common/image_none.gif" width="131"  border="0"/></a>';
											}else{
												echo '<img src="../images/common/image_none.gif" width="131"  border="0"/>';
											}
										}
									?>
								</p>
								<div class="movieInformation">
									<div class="movieDetailed">
										<div class="detailedBody">
											<h2>
												<span><?php echo date ('Y/m/d',strtotime($showing['start_date'])) ?>&nbsp;&nbsp;公開予定<br />
												<?php
													if($showing['site'] !="" ){
														echo '<a href="' . $showing['site'] . '" target="_blank">' . $showing['name'] . '</a>';
													}else{
														echo $showing['name'];
													}
												?>
											</h2>
											<?php
												if($showing['ename'] !="" ) {
													echo "<p class='ename'>$showing[ename]</p>";
												}
											?>

											<p class="movieCopy"><?php echo $showing['credit'] ?></p>
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
										</div>
									</div>

									<div class="showingTheaters">
										<div class="theatersBody">
											<p class="tuika"><?php if($showing['tuika'])echo preg_replace("/;/","<br />",$showing['tuika']) . "<br />"; ?></p>
											<h3>上映劇場：</h3>
											<ul>
												<?php
													foreach ($theaters as $theater) {
														if ($showing['theater_ids'] != null) {
															$vals = explode(",",$showing['theater_ids']);
															$theater_judge=false;
															foreach ($vals as $val ) {
																if ($theater['id'] == $val ) {
																	$theater_judge = true;
																	echo '<li><a href="../theater/'.$theater['ename'].'/">'.$theater['name'].'</a></li>';
																}
															}
														}
													}
												?>
											</ul>
										</div>
									</div>
									<?php
										if($showing['site'] !="" ){
											echo '<p class="officialBlock"><a href="' . $showing['site'] . '" target="_blank"><img border="0" src="../images/3d/officialsite_btn.gif" width="94" height="24" alt="" /></a></p>';
										}
									?>
								</div>
								<hr/>
							</div>
							<!--作品ボックス生成　ここまで-->
						<?php } ?>
					<?php } ?>
			</div>
		</div>

				<a href="#" onclick="backToTop(); return false"><img src="../images/3d/3dpageTop.jpg" width="800" height="27" alt="ページのTOPへ"  style="margin:0 0 30px 0"/></a>
				<a name="3dtheater" id="3dtheater"></a>
				<img src="../images/3d/tonyuTitle.jpg" width="800" height="37" alt="導入劇場"  style="margin:0; clear:both" id="now"/>

				<div id="showingList">
					<div class="movieList2">
						<div id="tleft">
							<img src="../images/3d/xpand.jpg" />
							<div class="tileft">
								<img src="../images/3d/xpandp.jpg" />
							</div>

							<div class="ttright">
								<span class="ttsiro">【導入劇場】</span><br />
								<ul>
									<li><a href="http://www.cinemasunshine.co.jp/theater/tsuchiura/">シネマサンシャイン土浦</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/heiwajima/">シネマサンシャイン平和島</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/numazu/">シネマサンシャイン沼津</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/kahoku/">シネマサンシャインかほく</a></li>                            
									<li><a href="http://www.cinemasunshine.co.jp/theater/kinuyama/">シネマサンシャイン衣山</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/shigenobu/">シネマサンシャイン重信</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/masaki/">シネマサンシャインエミフルMASAKI</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/imabari/">シネマサンシャイン今治</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/ozu/">シネマサンシャイン大洲</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/kitajima/">シネマサンシャイン北島</a></li>
								</ul>
							</div>
							<div class="ttbtn">
								<a href="javascript:window.open('xpand.html', 'xpand', 'width=600, height=800, menubar=no, toolbar=no, scrollbars=yes');void(0);"> <img src="../images/3d/xpandb.jpg" /></a>
							</div>
						</div>
						
						<div id="tright">
							<img src="../images/3d/master.jpg" />
							<div class="tileft"><img src="../images/3d/masterp.jpg" /></div>
							<div class="ttright">
								<span class="ttsiro">【導入劇場】</span><br />
								<ul>
									<li><a href="http://www.cinemasunshine.co.jp/theater/ikebukuro/">シネマサンシャイン池袋</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/yamatokoriyama/">シネマサンシャイン大和郡山</a></li>
									<li><a href="http://www.cinemasunshine.co.jp/theater/okaido/">シネマサンシャイン大街道</a></li>							
								</ul>
							</div>
							<div class="ttbtn">
								<a href="javascript:window.open('master.html', 'master', 'width=600, height=800, menubar=no, toolbar=no, scrollbars=yes');void(0);"> <img src="../images/3d/masterb.jpg" /> </a>
							</div>
						</div>
					</div>
				</div>
				<a href="#" onclick="backToTop(); return false"><img src="../images/3d/3dpageTop.jpg" width="800" height="27" alt="ページのTOPへ"  style="margin:0 0 30px 0"/></a>
			</div>
		</div>
	</div>

	<div id="footer" style="width:auto;">
		<div id="footerTop" style="background-image:url(../images/3d/footers_bg.gif); background-repeat:repeat-x; width:auto;">
			<div id="footerTopWaku"><img src="../images/3d/footers.gif" width="1300" height="81"  style="margin-top:0px;"/></div>
		</div>
	
		<div id="footerBottom" style="width:1300px; margin:auto;">
			<div id="footerBottomWaku">
				<br />
				<div style="margin:auto; width:470px;">
					<a href="http://www.cinemasunshine.co.jp/"><img src="../images/3d/totop.jpg" height="54" style="width:470px;"/></a>
				</div>
				<ul id="footerNavigation" style="padding-top:15px;">
					<li><a href="../company/">会社概要</a> |</li>
					<li><a href="../sitemap/">サイトマップ</a> |</li>
					<li><a href="../law/">特定商取引法に基づく表記</a> |</li>
					<li><a href="../sitepolicy/">利用規約</a> |</li>
					<li><a href="../privacy/">プライバシーポリシー</a></li>
				</ul>
				<div id="credit"> Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved. </div>
			</div>
		</div>
	</div>
</body>
</html>
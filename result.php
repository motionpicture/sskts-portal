<?php
include("./lib/require.php");

$p_date=$_POST['date'];
$p_movie=$_POST['movie'];
$p_theater=$_POST['theater'];

if (empty($p_date)) {
	$p_date=date("Ymd");
}

$theaters = getTheaterList();
if (empty($p_theater)) {
	$p_theater=$theaters[0]["ename"];
}

$option_tag="";
$script_str="";
foreach ($theaters as $theater) {
	$script_str.=sprintf("'%s': '%s',",$theater['ename'],$theater['name']);

	//もし劇場が選択されている場合
	if (!empty($p_theater) && $theater['ename'] == $p_theater) {
		$option_tag .= sprintf('<option value="%s" selected>%s</option>'."\r\n",$theater['ename'],$theater['name']);
	} else {
		$option_tag .= sprintf('<option value="%s">%s</option>'."\r\n",$theater['ename'],$theater['name']);
	}
}

//最後のコンマ削除
$script_str=substr($script_str, 0, -1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php getHeadInclude(); ?>
	<script type="text/javascript" src="./js/util.js"></script>
	<script type="text/javascript" src="./js/sunshine_ajax.js"></script>
	<script type="text/javascript" src="./js/result_ajax.js?20170615"></script>
	<script type="text/javascript" src="./js/jquery.blockUI.js"></script>

<script type="text/javascript">
		postMovie = '<?php echo $p_movie ?>';
		postDate ='<?php echo $p_date ?>';
		postTheater ='<?php echo $p_theater ?>';


		var theaterList = { <?php echo $script_str ?> };


		$(function(){
			makeBlockResult();
			getJsonR(postTheater,postDate,postMovie);

			$("#search_submit").click(function () {
				makeBlockResult();
				getJsonR($(theaterSelect).val(),$(daySelector).val(),$(movieSelector).val());
				//  console.log(class_name);
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
							<div class="searchArea">
								<div class="searchBox clearfix">
										<div class="Box">
											<p id="searchTeaterImg"><img src="./images/common/img_search01.gif"  alt="劇場を選ぶ" ></p>
											<div class="disable_class">
											<select id="theaterSelect" name="theater">
											<?php
											//theater一覧取得
											echo $option_tag;

											?>
											</select>
											</div>
										</div>

										<div class="Box">
											<p id="searchDayImg"><img src="./images/common/img_search02.gif"  alt="日付を選ぶ" ></p>
											<div class="disable_class">
											<select id="daySelect" name="date">
												<option value=""></option>
											</select>
											</div>
										</div>

										<div class="Box">
											<p id="searchMovieImg"><img src="./images/common/img_search03.gif"  alt="作品を選ぶ" ></p>
											<div class="disable_class">
											<select id="movieSelect" name=movie>
												<option value=""></option>
											</select>
											</div>
										</div>

										<div class="submitBox disable_class">
											<img style="cursor: pointer;" id ="search_submit" src="./images/common/btn_submit.gif" alt="検索する" />
											<!-- <img id="result" src="./images/common/btn_submit.gif" alt="検索する"> -->
										</div>
								</div>
							</div>

							<div class="MainArea">
								<h2 class="headlineImg"><img src="./images/common/headline_scheduleSearch.png"  alt="スケジュール検索結果" ></h2>
								<div class="whiteCanvas clearfix">
									<div class="scheduleBox">
										<div class="movieListBox">
										</div>

										<div class="notesBox">
											<p class="start">
											</p>
										</div>


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
<?php
include("../lib/require.php");

$p_date=$_POST['date'];
$p_movie=$_POST['movie'];
$p_theater=$_POST['theater'];


if (empty($p_date)) {
	$p_date=date("Ymd");
}

$theaters = getTheaterList();
unset($theaters[13]); // SSKTS-455

if (empty($p_theater)) {
	$p_theater=$theaters[0]["ename"];
}

//とりあえずセット
$theaterName = $theaters[0]["name"];

//movie名がある場合はsimpleに配列を追加処理
if(!empty($p_movie)){
	$result =getScheduleMovieSp($p_theater,$p_date,$p_movie);
	$result_date =$result["data"]['date'];
	$result_data[] =$result["data"]['movie'];
	$result_attention = $result["attention"];
} else {
	$result = getScheduleSp($p_theater,$p_date);
	$result_date =$result["data"]->date;
	$result_data =$result["data"]->movie;
	$result_attention = $result["attention"];
}

//var_dump($result );
$option_tag="";
$script_str="";
foreach ($theaters as $theater) {
	$script_str.=sprintf("'%s': '%s',",$theater['ename'],$theater['name']);

	//もし劇場が選択されている場合
	if (!empty($p_theater) && $theater['ename'] == $p_theater) {
		$theaterName=$theater['name'];
		$option_tag .= sprintf('<option value="%s" selected>%s</option>'."\r\n",$theater['ename'],$theater['name']);
	} else {
		$option_tag .= sprintf('<option value="%s">%s</option>'."\r\n",$theater['ename'],$theater['name']);
	}
}

//最後のコンマ削除
$script_str=substr($script_str, 0, -1);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>検索結果&nbsp;|&nbsp;シネマサンシャイン</title>
<meta content="池袋、平和島、茨城、千葉、徳島、愛媛で映画を見るならシネマサンシャイン" name="description">
<meta content="検索結果,シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間" name="keywords">
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/result.css">
<link rel="stylesheet" type="text/css" href="./css/theater.css">
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/util.js"></script>
<script type="text/javascript" src="../js/sunshine_ajax_sp.js"></script>
<script type="application/javascript" charset="UTF-8">//a:hoverの設定
jQuery(function($){
    $( 'a, input[type="button"], input[type="submit"], button' )
      .bind( 'touchstart', function(){
        $( this ).addClass( 'hover' );
    }).bind( 'touchend', function(){
        $( this ).removeClass( 'hover' );
    });
});
</script>

<script type="text/javascript">
		postMovie = '<?php echo $p_movie ?>';
		postDate ='<?php echo $p_date ?>';
		postTheater ='<?php echo $p_theater ?>';


		//var theaterList = { <?php echo $script_str ?> };


		$(function(){
			//makeBlockResult();
			//getJsonR(postTheater,postDate,postMovie);

			$("#search_submit").click(function () {
				//makeBlockResult();
				//getJsonR($(theaterSelect).val(),$(daySelector).val(),$(movieSelector).val());
				//  console.log(class_name);
			});
		});
</script>

</head>
<body>
<!-- header -->
<div id="header"><a href="/sp"><img class="btn_return" src="./images/common/header_return.gif" width="27" height="24" alt="戻る"></a>
	<h1><img src="./images/common/header_rogo.gif" width="119" height="24" alt=""></h1>
</div>
<!-- /header -->
<h2 class="category_bar_p">スケジュール検索結果</h2>

<div class="section schedule pt10">
<form name="searchForm" enctype="multipart/form-data" method="post" action="./result.php">
	<img class="top_schedule" src="./images/top/top_schedule.gif" width="320" alt="上映スケジュールを調べる"> <img class="schedule_txt" src="./images/top/img_search01.gif" width="37" alt="">
	<div class="disable_class">
	<select id="theaterSelect" name="theater">
	<?php
	//theater一覧取得
	echo $option_tag;

	?>
	</select>
	</div>
	<br>
	<img class="schedule_txt" src="./images/top/img_search02.gif" width="37" alt="">
	<div class="disable_class">
	<select id="daySelect" name="date">
		<option value=""></option>
	</select>
	</div>
	<br>
	<img class="schedule_txt" src="./images/top/img_search03.gif" width="37" alt="">
	<div class="disable_class">
	<select id="movieSelect" name=movie>
		<option value=""></option>
	</select>
	</div>
	<div class="disable_class">
			<p class="btn_submit"><input width="161"  type="image" src="./images/top/btn_submit.gif" alt="検索する"></p>
	</div>
</form>
</div>

<p class="theatre_name"><?php echo "シネマサンシャイン".$theaterName ?><br><?php echo date("Y年m月d日",strtotime($result_date))."(".getYoubi($result_date).")"; ?></p>
<!--ライン-->
<div class="line_01"></div>
<!--/ライン-->




	<?php
	foreach($result_data as $movie) {
		$comment="";
		echo '<div class="basebox_lineblue"></div>';
			echo '<div class="schedulebox">';
			echo '<div class="title_bar">';
				echo '<table width="280">';
				echo '<tr>';
				echo '<td colspan="2"><span class="txt_bold"><a href="'.$movie->official_site.'">'.$movie->name.'</a></span></td>';
				echo '</tr>';
				echo '<tr>';
				if ($movie->comment!="") {
					$comment = '  /'.$movie->comment;
				}
				echo '<td>'.$movie->ename.$comment .'</td>';
				echo '<td class="screen_time">上映時間：'.$movie->running_time.'分</td>';
				echo '</tr>';
				echo '</table>';
				echo '</div>';
				echo '<table width="280" class="movie_schedule">';
				echo '';
				echo '';
				echo '';
				echo '';
				echo '';
				echo '';
				echo '';
		foreach ($movie->screen as $screen) {

			foreach ($screen->time as $time) {
				echo '<tr>';
				//var_dump($time);
				if ($time->late==2) {
					echo '<td width="150"><span class="time_bold">'.getTimeFormat($time->start_time).'</span>&#xFF5E;'.getTimeFormat($time->end_time).'★</td>';
				}elseif($time->late==1) {
					echo '<td width="150"><span class="time_bold">'.getTimeFormat($time->start_time).'</span>&#xFF5E;'.getTimeFormat($time->end_time).'<img src="./images/common/icon_morning2_sp.png"></td>';
				} else {
					echo '<td width="150"><span class="time_bold">'.getTimeFormat($time->start_time).'</span>&#xFF5E;'.getTimeFormat($time->end_time).'</td>';
				}

				echo '<td width="49">'.$screen->name.'</td>';


				if($time->available==6) {
					echo '<td width="81"></td>';
				}else if ($time->available==1 || $time->available==4){
					echo '<td width="81"><img src="./images/theater/btn_buyPtn1.gif" width="81" alt="窓口"></td>';
				}else if ($time->available==5) {
					echo '<td width="81"><img src="./images/theater/btn_buyPtn5.gif" width="81" alt="満席"></td>';
				}else {
                    echo '<td width="81">';

                    if ($p_theater === 'aira') {
                        echo '<a href="'.$time->url.'">';
                    } else {
                        echo '<a href="'.$time->url.'" target="_blank">';
                    }

                    echo '<img src="./images/theater/btn_buyPtn'.$time->available.'.gif" width="81" alt="購入"></a></td>';
				}

				echo '</tr>';

				echo '<tr>';
				echo '<td colspan="3" class=" table_line_02_p"><p class="table_line_02"></p></td>';
				echo '</tr>';
			}


		}

		echo '</table>';
		echo '</div>';

	}

	?>
	<div class="section">
	<p class="notice"><?php echo $result_attention ?></p>
</div>
<!-- footer -->
<div class="section">
<p class="return_home"><a href="./"><img src="./images/common/btn_home.gif" width="300" alt="HOME"></a></p>
	<p class="change_pc"><a href="/"><img src="./images/common/btn_pc.gif" width="160" alt="切り替えPC"></a></p>
</div>
<p class="pagetop"><a href="#header" ><img src="./images/common/btn_top.gif" alt="ページTOP" width="79" height="20"></a></p>
<!-- /footer -->
<div id="footer">
	<div id="footerMain">
		<ul>
			<li><a href="./company/">会社概要</a></li>
			<li>|</li>
			<li><a href="./sitemap/">サイトマップ</a></li>
			<li>|</li>
			<li><a href="./law/">特定商取引法に基づく表記</a></li>
		</ul>
		<ul>
			<li><a href="./sitepolicy/">利用規約</a></li>
			<li>|</li>
			<li><a href="./privacy/">プライバシーポリシー</a></li>
		</ul>
	</div>
</div>
<div id="footer_copyright"><img src="./images/common/copyright.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved." width="320"></div>
</body>
</html>

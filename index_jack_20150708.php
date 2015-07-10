<?php
include("./lib/require.php");
?>
<?php
/*//メールの作成
$data = date("Y-m-d");
$time = date("Y-m-d H:i:s");
$size = getDirsize('/var/www/vhosts/cinemasunshine.co.jp/httpdocs/');
$to      = 'hello@motionpicture.jp';
$subject = '【重要】cinemasunshine.co.jp:サーバ容量のお知らせ';
$message .= "サーバにて規定容量の超過が確認されました。\n\n";
$message .= "==検知時刻==\n";
$message .= $time;
$message .= "\n\n";
$message .= "==対象ドメイン==\n";
$message .= "cinemasunshine.co.jp\n\n";
$message .= "==サーバ容量==\n";
$message .= "$size byte\n";
$message = wordwrap($message, 70);
$headers = 'From: hello@motionpicture.jp' . "\r\n" .
    'Reply-To: hello@motionpicture.jp' . "\r\n" .
    'Content-Transfer-Encoding: 7bit' . "\r\n" .
	"Content-Type: text/plain;charset=utf-8\r\n";
    'X-Mailer: PHP/' . phpversion();

// CSVファイル名の設定
$csv_file = "check.csv";

// CSVデータの初期化
$csv_data = "";

// CSVデータの作成
$csv_data .= "$data \n";

// CSVデータを開く
$fp = fopen($csv_file, 'r');

//CSVデータの中身を取り出す
while ($field_array = fgetcsv($fp, 4096, ",", '"')) {
	foreach ($field_array as $value) {
		$val = htmlspecialchars($value, ENT_QUOTES);
		$val = date('Y-m-d',strtotime($val));
	}
}

fclose($fp);

//PHP4の場合、scandir関数がないので実装しておきます。
if (!function_exists(scandir)) {
  function scandir($dir_name, $order = '') {
    $dh = opendir($dir_name);
    while ( ($filename = readdir($dh)) !== false) {
      $file_list[] = $filename;
    }

    if ($order) {
      rsort($file_list);
    } else {
      sort($file_list);
    }
    return $file_list;
  }
}

//引数 $pathにはディレクトリ、またはファイルの絶対パスを指定。
function getDirSize($path) {
  $total_size = 0;

  //指定したのがファイルだった場合はサイズを返して終了。
  if (is_file($path)) {
    return filesize($path);

  } elseif (is_dir($path)) {
    $basename = basename($path);

    //カレントディレクトリと上位ディレクトリを指している場合はここで終了。
    if ($basename == '.' || $basename == '..') {
      return 0;
    }

    //ディレクトリ内のファイル一覧を入手。
    $file_list = scandir($path);

    foreach ($file_list as $file) {
      //ディレクトリ内の各ファイルを引数にして、自分自身を呼び出す。
      $total_size += getDirSize($path .'/'. $file);
    }
    return $total_size;

  } else {
    return 0;
  }
}
//CSVデータに本日の日付がないかチェック
if($val != $data){
//if($val == $data){
	if($size > 900000000){
		mb_language("uni");
		mb_internal_encoding("utf-8");

		//subjectエンコード
		$subject = mb_convert_encoding($subject, "utf-8");
		$subject = mb_encode_mimeheader($subject,"utf-8");

		mail($to, $subject, $message, $headers);
		// ファイルを追記モードで開く
		$fp = fopen($csv_file, 'ab');

		// ファイルを排他ロックする
		flock($fp, LOCK_EX);

		// ファイルの中身を空にする
		ftruncate($fp, 0);

		// データをファイルに書き込む
		fwrite($fp, $csv_data);

		// ファイルを閉じる
		fclose($fp);
	}

}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php getHeadInclude(); ?>
	<script type="text/javascript" src="./js/util.js"></script>
	<script type="text/javascript" src="./js/sunshine_ajax.js"></script>
	<script type="text/javascript" src="./js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="./js/pagejack.js"></script> 
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
								/* シネサン（ポータル上部） */
								google_ad_slot = "7884952569";
								google_ad_width = 468;
								google_ad_height = 60;
								//-->
								</script>
								<script type="text/javascript"
								src="//pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</div>
							<!-- ↑adsense上部↑ -->

							<div class="searchArea">
								<div class="searchBox clearfix">
									<form name="searchForm" enctype="multipart/form-data" method="post" action="./result.php">
										<div class="Box">
											<p id="searchTeaterImg"><img src="./images/common/img_search01.gif"  alt="劇場を選ぶ" ></p>
											<div class="disable_class">
											<select id="theaterSelect" name="theater">
											<?php
											//theater一覧取得
											$theaters = getTheaterList();
											foreach ($theaters as $theater) {
												//もし劇場が選択されている場合
												if (!empty($_GET['theater']) && $theater['ename'] == $_GET['theater']) {
														$option_tag = sprintf('<option value="%s" selected>%s</option>'."\r\n",$theater['ename'],$theater['name']);
													} else {
														$option_tag = sprintf('<option value="%s">%s</option>'."\r\n",$theater['ename'],$theater['name']);
													}
													//var_dump($_GET['theater']);


												echo $option_tag;
											}
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
											<input type="image" src="./images/common/btn_submit.gif" alt="検索する">
											<!-- <img id="result" src="./images/common/btn_submit.gif" alt="検索する"> -->
										</div>
									</form>
								</div>
							</div>

							<div class="theaterArea clearfix">
								<div class="theaterLinkBox">
									<div class="Box clearfix">
										<div class="kind"><p><img src="./images/common/theater_kanto.gif" alt="関東"></p></div>
										<ul>
											<li><a href="./theater/ikebukuro/">シネマサンシャイン池袋</a></li>
											<li><a href="./theater/heiwajima/">シネマサンシャイン平和島</a></li>
											<li><a href="./theater/tsuchiura/">シネマサンシャイン土浦</a></li>
										</ul>
									</div>

									<div class="Box clearfix">
										<div class="kind"><p><img src="./images/common/theater_chubu.gif" alt="北部・中部"></p></div>
										<ul>
											<li><a href="./theater/numazu/">シネマサンシャイン沼津</a></li>
											<li><a href="./theater/kahoku/">シネマサンシャインかほく</a></li>
										</ul>
									</div>

									<div class="Box clearfix">
										<div class="kind"><p><img src="./images/common/theater_kansai.gif" alt="関西"></p></div>
										<ul>
											<li><a href="./theater/yamatokoriyama/">シネマサンシャイン大和郡山</a></li>
										</ul>
									</div>

									<div class="Box clearfix">
										<div class="kind"><p><img src="./images/common/theater_chugoku_shikoku.gif" alt="中国・四国"></p></div>
										<ul>
											<li><a href="./theater/shimonoseki/">シネマサンシャイン下関</a></li>
											<li><a href="./theater/okaido/">シネマサンシャイン大街道</a></li>
											<li><a href="./theater/kinuyama/">シネマサンシャイン衣山</a></li>
											<li><a href="./theater/shigenobu/">シネマサンシャイン重信</a></li>
											<li><a href="./theater/masaki/">シネマサンシャインエミフルMASAKI</a></li>
											<li><a href="./theater/ozu/">シネマサンシャイン大洲</a></li>
											<li><a href="./theater/kitajima/">シネマサンシャイン北島</a></li>
										</ul>
									</div>

								</div>

							</div>

							<div class="MainArea">
								<h2 class="headlineImg"><img src="./images/common/headline_News.png"  alt="ニュース&amp;トピックス" ></h2>
								<div class="whiteCanvas clearfix">
									<table class="NewsBox">
									<?php
										$theaterId = 1000;

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


							<!-- ↓adsense下部↓ -->
							<div class="adAreaf">
								<script type="text/javascript"><!--
								google_ad_client = "ca-pub-3891476404601512";
								/* シネサン（ポータル下部） */
								google_ad_slot = "7972350968";
								google_ad_width = 468;
								google_ad_height = 60;
								//-->
								</script>
								<script type="text/javascript"
								src="//pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</div>
							<!-- ↑adsense下部↑ -->


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
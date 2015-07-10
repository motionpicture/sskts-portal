<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をとったものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合った絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

if (isset($_GET['i'])) {
	$BASE = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
	$resourcePath = $BASE . '/resource/theater/kinuyama/news/' . basename(dirname(__FILE__)) . '/';

	ob_start();
	include $BASE . '/lib/resource.php';
	$template = ob_get_contents();
	ob_end_clean();


	/*
	 * detail
	 * */
	$news = false;
	$lines = @file("{$BASE}/../data/kinuyama/news.csv");
	if (is_array($lines)) {
		$lines = array_reverse($lines);
		//表示数変更の場合下記
		$count = 10000;
		$size = sizeof($lines);
	for ($i = 0; ($i < $size) && ($i < $count -1) && empty($lines[$i][2]); $i++) {
	        if (strpos($lines[$i], $_GET['i']) !== false) {
		        $lines[$i] = str_replace('"', '', $lines[$i]);
		        $news = explode(',', $lines[$i]);
		        break;
	        }
		}
	}

	if ($news !== false) {
        $template = str_replace('{$newsTime}', $news[1], $template);
        $template = str_replace('{$newsTitle}', $news[2], $template);
		$template = str_replace('{$newsOutline}', $news[3], $template);
		$template = str_replace('{$newsText}', $news[4], $template);

	}



	echo $template;
}
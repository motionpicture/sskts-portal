<?php
include("../../lib/require.php");
/*
 * Emoji変換用スクリプト
* GET値に遷移先のファイルの拡張子をと・ｽものを指定すると
* resourceフォルダから対象のファイルを読み込み、各キャリアに合・ｽ絵文字に変換後出力します。
* @author     Sota Ogoh <s.ogoh@rock-partners.com>
*/

$BASE = dirname(dirname(__FILE__));
$resourcePath = $BASE . '/resource/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();


/*
 * public_news
* */
$cinemaList = array();
$lines = @file("{$BASE}/../data/public_news.csv");
if (is_array($lines)) {
	$lines = array_reverse($lines);
	//表示数変更の場合下記
	$count = 10000;
	$size = sizeof($lines);
	for ($i = 0; ($i < $size) && ($i < $count -1) && empty($lines[$i][2]); $i++) {
		$lines[$i] = str_replace('"', '', $lines[$i]);
		$cinemaList[] = explode(',', $lines[$i]);
	}
}

//var_dump($cinemaList);

$html = '';

$theaterId = 1000;

$newsViews = getNewsViews($theaterId);
$newsViews = explode(",",$newsViews['view']);


$news = getNews($theaterId);
if (count($newsViews) >= 1) {
	foreach ($newsViews as $view) {

		if(count($news) >= 1) {
			foreach($news as $nws){
				if($view==$nws['id']) {
					$html .= "<a href=\"./detail/?i=".$nws['id']."\"><span style=\"color:#7c6845;\">".mb_convert_encoding($nws['midasi'],"SJIS","UTF-8")."</span></a><br /><img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />
					<div style=\"text-align:center; clear:both\"><img style=\"margin-top:6px; margin-bottom:6px;\" src=\"../images/dl.gif\" alt=\"line\"/></div><img src=\"../images/sp.gif\" alt=\" \" height=\"4\"/><br />";

				}
			}
		}
	}

}

/*foreach ($cinemaList as $value) {
	if (!empty($value[2])) {
		$html .= "<a href=\"./detail/?i={$value[0]}\"><span style=\"color:#7c6845;\">{$value[2]}</span></a><br /><img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />
<div style=\"text-align:center; clear:both\"><img style=\"margin-top:6px; margin-bottom:6px;\" src=\"../images/dl.gif\" alt=\"line\"/></div><img src=\"../images/sp.gif\" alt=\" \" height=\"4\"/><br />";
	}
}*/

$template = str_replace('{$publicNewsList}', $html, $template);

echo $template;


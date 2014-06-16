<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をと・ｽものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合・ｽ絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

$BASE = dirname(dirname(dirname(__FILE__)));
$resourcePath = $BASE . '/resource/theater/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();

/*
 * news
 * */
$newsList = array();
$lines = @file("{$BASE}/../data/ikebukuro/news.csv");
if (is_array($lines)) {
    $lines = array_reverse($lines);
    //表示数変更の場合下記
    $count = 10000;
    $size = sizeof($lines);
    for ($i = 0; ($i < $size) && ($i < $count) && empty($lines[$i][2]); $i++) {
        $lines[$i] = str_replace('"', '', $lines[$i]);
        $newsList[] = explode(',', $lines[$i]);
    }
}
$html = '';
foreach ($newsList as $value) {
    if (!empty($value[2])) {
        $html .= "<a href=\"./news/detail/?i={$value[0]}\"><span style=\"color:#7c6845;\">{$value[2]}</span></a><br /><img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />
<div style=\"text-align:center; clear:both\"><img style=\"margin-top:6px; margin-bottom:6px;\" src=\"../../images/dl.gif\" alt=\"line\"/></div><img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />";
    }
}

$template = str_replace('{$newsList}', $html, $template);

/*
 * detail
 * */
$news = false;
$lines = @file("{$BASE}/../data/ikebukuro/advance.csv");
if (is_array($lines)) {
//	$lines = array_reverse($lines);
//	$lines = array($lines);
    //表示数変更の場合下記
    $count = 10000;
    $size = sizeof($lines);
    for ($i = 1; ($i < $size) && ($i < $count -1) && empty($lines[$i][2]); $i++) {
        $lines[$i] = str_replace(';', '/', $lines[$i]);
        $reservationList[] = explode('","', $lines[$i]);
    }
}

$html = '';
foreach ($reservationList as $value) {
    if (!empty($value[2])) {
        $html .= "<span style=\"color:#7c6854;\">{$value[2]}</span><br />
<span style=\"color:#3E3A39;\">{$value[1]}</span><br />";
        if (!empty($value[4])) {
            $html .= "<span style=\"color:#3E3A39;\">{$value[4]}</span><br />";
        }
        if (!empty($value[5])) {
            $html .= "<span style=\"color:#C30D23;\">{$value[5]}</span><br />";
        }
        $html .= "<img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />
<div style=\"text-align:center; clear:both\"><img style=\"margin-top:6px; margin-bottom:6px;\" src=\"../../images/dl.gif\" alt=\"line\"  width=\"240\"/></div>
<img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />";
    }
}

$template = str_replace('{$reservationList}', $html, $template);



echo $template;


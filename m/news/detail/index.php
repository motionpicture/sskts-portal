<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をとったものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合った絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

include("../../../lib/require.php");

$arr = getNowPage();
$theaterId=1000;

$newsViews = getNewsViews($theaterId);
$newsViews = explode(",",$newsViews['view']);

$theaterName = $arr["ename"];
$arries = getNewsDetail($_GET["i"]);if(!$arries['txt']){header('HTTP/1.0 404 Not Found');die(file_get_contents('http://www.cinemasunshine.co.jp/m/news404.html'));}

$BASE = dirname(dirname(dirname(__FILE__)));
$resourcePath = $BASE . '/resource/news/' . basename(dirname(__FILE__)) . '/';

ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();

$template = str_replace('{$newsTime}',date('Y/m/d',strtotime($arries['start_date'])), $template);
$template = str_replace('{$newsTitle}',mb_convert_encoding($arries['midasi'],"SJIS","utf-8"), $template);
$template = str_replace('{$newsOutline}',mb_convert_encoding($arries['midasi'],"SJIS","utf-8"), $template);
$template = str_replace('{$newsText}',mb_convert_encoding($arries['txt'],"SJIS","utf-8"), $template);

echo $template;
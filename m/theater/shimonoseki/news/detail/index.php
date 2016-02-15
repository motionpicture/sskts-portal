<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をと・ｽものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合・ｽ絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

include("../../../../../lib/require.php");

$arr = getNowPage();
$theater = $arr["ename"];
$theaterId=getTheaterId($theater);
$theaterId=$theaterId["id"];

$theaterName = $arr["ename"];

$newsViews = getNewsViews($theaterId);
$newsViews = explode(",",$newsViews['view']);

$BASE = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
$resourcePath = $BASE . '/resource/theater/' . $arr["ename"] . '/news/' . basename(dirname(__FILE__)) . '/';

ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();

if($_GET["i"] == "time"){
	$open = getImportants($theaterId);

	$txt = mb_convert_encoding($open['open_txt'],"SJIS","utf-8");
//	$txt = preg_replace("/^.*開場時間.*\n/u","",$txt);

	$template = str_replace('{$newsTime}',date('Y/m/d'), $template);
	$template = str_replace('{$newsTitle}',mb_convert_encoding("開場時間","SJIS","utf-8"), $template);
	$template = str_replace('{$newsOutline}',mb_convert_encoding("開場時間","SJIS","utf-8"), $template);
	$template = str_replace('{$newsText}',$txt, $template);

}else{
	$arries = getNewsDetail($_GET["i"]);if(!$arries['txt']){header("Location: ../../");}

	$template = str_replace('{$newsTime}',date('Y/m/d',strtotime($arries['start_date'])), $template);
	$template = str_replace('{$newsTitle}',mb_convert_encoding($arries['midasi'],"SJIS","utf-8"), $template);
	$template = str_replace('{$newsOutline}',mb_convert_encoding($arries['midasi'],"SJIS","utf-8"), $template);
	$template = str_replace('{$newsText}',mb_convert_encoding($arries['txt'],"SJIS","utf-8"), $template);
}

echo $template;

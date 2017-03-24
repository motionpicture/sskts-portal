<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をと・ｽものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合・ｽ絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

include("../../../lib/require.php");

$arr = getNowPage();
$theater = $arr["ename"];
$theaterId=getTheaterId($theater);

$theaterName = $arr["ename"];
$theaterId = $theaterId['id'];
$newsViews = getNewsViews($theaterId);
$newsViews = explode(",",$newsViews['view']);

$BASE = dirname(dirname(dirname(__FILE__)));
$resourcePath = $BASE . '/resource/theater/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();



$newsList = array();
//開館時間は手動で生成
$newsList[] = array(
	"time",
	date('Y/m/d'),
	mb_convert_encoding("開館時間","SJIS","utf-8"),
	mb_convert_encoding("開館時間","SJIS","utf-8"),
	"",
	""
);
$loop = 0;
$news = getNews($theaterId);
if(count($newsViews) >= 1){
	foreach($newsViews as $view){
		if(count($news) >= 1) {
			foreach($news as $nws){
				if($view==$nws['id']) {
					$loop++;
					$num[$loop] = $nws['id'];
			        $newsList[] = array($nws['id'],date('Y/m/d',strtotime($nws['start_date'])),mb_convert_encoding($nws['midasi'],"SJIS","utf-8"),mb_convert_encoding($nws['midasi'],"SJIS","utf-8"),mb_convert_encoding($nws['txt'],"SJIS","utf-8"),"");
				}
			}
		}
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

$news = false;

$theaterId=getTheaterId($theaterName);

$maeuri = getMaeuri($theaterId['id']);
//	var_dump($maeuri);
	foreach($maeuri as $val){
		$movie = getMovieById($val['movie_code']);
		if(!$movie['name']){
			continue;
		}

		if ($val['price']!="") {
			$prices = mb_convert_encoding($val['price'],"SJIS","utf-8");
			$prices = preg_replace("/;/","<br />",$prices);
		}

		if($val['end_date_txt']){
			$dateTxt = mb_convert_encoding($val['end_date_txt'],"SJIS","utf-8");
		}else{
			$dateTxt = date ('Y/m/d',strtotime($val['end_date'])) . "&nbsp;" . mb_convert_encoding("公開予定","SJIS","utf-8");
		}

		if($val['roadshow_txt']){
			$dateTxt .= "<br />" . mb_convert_encoding($val['roadshow_txt'],"SJIS","utf-8");
		}else{
			$dateTxt .= "<br />" . date ('Y/m/d',strtotime($val['roadshow_date'])) . "&nbsp;" . mb_convert_encoding("前売券発売","SJIS","utf-8");
		}


		$reservationList[] =
			array(
				"",
				$dateTxt,
				mb_convert_encoding($movie['name'],"SJIS","utf-8"),
				$movie['site'],
				$prices,
				mb_convert_encoding($val['note'],"SJIS","utf-8"),
				""
				);
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
<div style=\"text-align:center; clear:both\"><img style=\"margin-top:6px; margin-bottom:6px;\" src=\"../../images/dl.gif\" alt=\"line\"/></div>
<img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />";
    }
}

// 劇場オープン前の対応
if (count($reservationList) === 0) {
    $html = 'Coming Soon';
}

$template = str_replace('{$reservationList}', $html, $template);



echo $template;


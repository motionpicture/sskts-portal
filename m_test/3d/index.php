<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をとったものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合った絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

$BASE = dirname(dirname(__FILE__));
$resourcePath = $BASE . '/resource/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();


/*
 * 3d_news
 * */
	$html = '';
	if ($_GET['place'] == ikebukuro) {
		$html .= "<a href=\"../theater/ikebukuro/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;池袋の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == heiwajima) {
		$html .= "<a href=\"../theater/heiwajima/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;平和島の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == mobara) {
		$html .= "<a href=\"../theater/mobara/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;茂原の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == tsuchiura) {
		$html .= "<a href=\"../theater/tsuchiura/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;土浦の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == kahoku) {
		$html .= "<a href=\"../theater/kahoku/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;かほくの料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == numazu) {
		$html .= "<a href=\"../theater/numazu/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;沼津の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == kinuyama) {
		$html .= "<a href=\"../theater/kinuyama/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;衣山の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == shimonoseki) {
		$html .= "<a href=\"../theater/shimonoseki/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;下関の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}
	
	else if ($_GET['place'] == ozu) {
		$html .= "<a href=\"../theater/ozu/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;大洲の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == imabari) {
		$html .= "<a href=\"../theater/imabari/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;今治の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}
		
	else if ($_GET['place'] == kitajima) {
		$html .= "<a href=\"../theater/kitajima/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;北島の料金案内一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == masaki) {
		$html .= "<a href=\"../theater/masaki/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;text-align:right;\">&lt;ｴﾐﾌﾙMASAKIの料金案内<br />一覧に戻る</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}
	
	else {

		$template = str_replace('{$theater_back}', $html, $template);
	}		
	
	echo $template;


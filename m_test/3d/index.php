<?php
/*
 * Emoji�ϊ��p�X�N���v�g
 * GET�l�ɑJ�ڐ�̃t�@�C���̊g���q���Ƃ������̂��w�肷���
 * resource�t�H���_����Ώۂ̃t�@�C����ǂݍ��݁A�e�L�����A�ɍ������G�����ɕϊ���o�͂��܂��B
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
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;�r�܂̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == heiwajima) {
		$html .= "<a href=\"../theater/heiwajima/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;���a���̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == mobara) {
		$html .= "<a href=\"../theater/mobara/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;�Ό��̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == tsuchiura) {
		$html .= "<a href=\"../theater/tsuchiura/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;�y�Y�̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == kahoku) {
		$html .= "<a href=\"../theater/kahoku/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;���ق��̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == numazu) {
		$html .= "<a href=\"../theater/numazu/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;���Â̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == kinuyama) {
		$html .= "<a href=\"../theater/kinuyama/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;�ߎR�̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == shimonoseki) {
		$html .= "<a href=\"../theater/shimonoseki/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;���ւ̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}
	
	else if ($_GET['place'] == ozu) {
		$html .= "<a href=\"../theater/ozu/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;��F�̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == imabari) {
		$html .= "<a href=\"../theater/imabari/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;�����̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}
		
	else if ($_GET['place'] == kitajima) {
		$html .= "<a href=\"../theater/kitajima/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;\">&lt;�k���̗����ē��ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}

	else if ($_GET['place'] == masaki) {
		$html .= "<a href=\"../theater/masaki/?p=price\">
				  <span style=\"font-size:x-small;color:#3E3A39;text-align:right;\">&lt;����MASAKI�̗����ē�<br />�ꗗ�ɖ߂�</span></a><br />";
		$template = str_replace('{$theater_back}', $html, $template);
	}
	
	else {

		$template = str_replace('{$theater_back}', $html, $template);
	}		
	
	echo $template;


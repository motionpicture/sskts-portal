<?php
/*
 * Emoji�ϊ��p�X�N���v�g
 * GET�l�ɑJ�ڐ�̃t�@�C���̊g���q���Ƃ������̂��w�肷���
 * resource�t�H���_����Ώۂ̃t�@�C����ǂݍ��݁A�e�L�����A�ɍ������G�����ɕϊ���o�͂��܂��B
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

$BASE = dirname(dirname(dirname(dirname(__FILE__))));
$resourcePath = $BASE . '/resource/theater/ikebukuro/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();


/*
 * public_news
 * */
$newsList = array();
$lines = @file("{$BASE}/../data/ikebukuro/news.csv");
if (is_array($lines)) {
	$lines = array_reverse($lines);
	//�\�����ύX�̏ꍇ���L
	$count = 10000;
	$size = sizeof($lines);
	for ($i = 0; ($i < $size) && ($i < $count -1) && empty($lines[$i][2]); $i++) {
        $lines[$i] = str_replace('"', '', $lines[$i]);
        $newsList[] = explode(',', $lines[$i]);
	}
}

$html = '';
foreach ($newsList as $value) {
	if (!empty($value[2])) {
		$html .= "<span style=\"color:#3e3a39;\">{$value[1]}</span><br />
					<a href=\"./detail/?i={$value[0]}\"><span style=\"color:#7c6854;line-height:1.5;\">{$value[2]}</span></a><br /><br />";
	}
}

$template = str_replace('{$newsList}', $html, $template);

echo $template;


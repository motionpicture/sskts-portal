<?php

include("../../lib/require.php");
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

$campaignBnrs = getCampaign('1000');

$html="";
foreach ($campaignBnrs as $bnr) {
	//var_dump($bnr);
/*
	$blank="";
	if($bnr["url_flg"] == "1"){
		$blank = 'target="_blank"';
	}else{
		$blank = '';
	}
*/
$html .= '<img src="../images/sp4.gif" alt=" " height="4"/><br />';
$html .= '<div style="">';
if ($bnr[m_url] == null) {
	$html .= "<img src='../../image_crop.php?image=$define[GROBAL_TOP_URL]theaters_image/campaign/$bnr[pic_path]&wsize=258' alt='" . htmlspecialchars(mb_convert_encoding($bnr["midasi"],"SJIS","UTF-8"), ENT_QUOTES) . "' /><br />";
} else {
	$html .= "<a href='$bnr[m_url]' $blank><img src='../../image_crop.php?image=$define[GROBAL_TOP_URL]theaters_image/campaign/$bnr[pic_path]&wsize=240' alt='" . htmlspecialchars(mb_convert_encoding($bnr["midasi"],"SJIS","UTF-8"), ENT_QUOTES) . "' /></a><br />";
	//$html .= "<img src='../../image_crop.php?image=$define[GROBAL_TOP_URL]theaters_image/campaign/$bnr[pic_path]&wsize=258' alt='" . htmlspecialchars(mb_convert_encoding($bnr["midasi"],"SJIS","UTF-8"), ENT_QUOTES) . "' /><br />";
}

$html .= '</div>';
$html .= '<hr size ="2" style="border-color:#e4e4e4"></hr>';

}

$template = str_replace('{$campaignList}', $html, $template);
echo $template;
?>
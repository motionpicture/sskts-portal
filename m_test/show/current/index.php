<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をと・ｽものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合・ｽ絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

$BASE = dirname(dirname(dirname(__FILE__)));
$resourcePath = $BASE . '/resource/show/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();

include("../../../lib/require.php");

$showings = getNowRoadShow();
$theaters = getTheaterList();

$cinemaList = array();

$loop = 0;
foreach ($showings as $showing){
	$cinemaList[$loop] = 
		array(
			"id" => mb_convert_encoding($showing["id"],"SJIS","utf-8"),
			"code" => mb_convert_encoding($showing["movie_code"],"SJIS","utf-8"),
			"date" => mb_convert_encoding(date('Y/m/d',strtotime($showing['start_date'])),"SJIS","utf-8"),
			"name" => mb_convert_encoding($showing['name'],"SJIS","utf-8"),
			"credit" => mb_convert_encoding($showing['credit'],"SJIS","utf-8"),
			"url" => mb_convert_encoding($showing['site'],"SJIS","utf-8"),
		);
		
	//theater_idsがあれば中に
	if($showing['theater_ids'] != null) {
		//theater_idsを配列に分解
		$vals = explode(",",$showing['theater_ids']);

		//劇場の判定条件をfalseでリセット
		$theater_judge=false;

		//劇場でまわして中身を生成
		foreach ($theaters as $theater) {
			//劇場の判定条件をfalseでリセット
			$theater_judge=false;
			foreach ($vals as $val) {
				if($theater['id'] == $val){
					$theater_judge = true;
					$cinemaList[$loop][$theater["ename"]] = "1";
				}
			}

			if($theater_judge == false){
				$cinemaList[$loop][$theater["ename"]] = "";
			}
		}
	}

	$loop++;
}

$html = '';
foreach ($cinemaList as $value) {
	if (!empty($value["name"])) {
		$html .= "・<a href=\"../detail/?i={$value["id"]}&amp;mode=current\"><span style=\"font-size:x-small;color:#7c6854;\">{$value["name"]}</span></a><br />
					<img src=\"../../images/sp.gif\" alt=\" \" height=\"4\"/><br />";
	}
}

$template = str_replace('{$cinemaCurrentList}', $html, $template);

echo $template;


<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をとったものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合った絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

include("../../../lib/require.php");

$theaters = getTheaterList();

if (isset($_GET['i'])) {
	$BASE = dirname(dirname(dirname(__FILE__)));
	$resourcePath = $BASE . '/resource/show/' . basename(dirname(__FILE__)) . '/';

	ob_start();
	include $BASE . '/lib/resource.php';
	$template = ob_get_contents();
	ob_end_clean();

	$html = '';
	
	if ($_GET['mode'] == current) {
		//上映中の作品群を取得
		$showings = getNowRoadShow();
		$html .= "<a href=\"../current\"><span style=\"font-size:x-small;color:#3E3A39;\">&lt;上映中作品一覧に戻る</span></a><br />";
		$template = str_replace('{$backbutton}', $html, $template);
	}
	
	else if ($_GET['mode'] == future) {
		//上映予定の作品群を取得
		$showings = getNextRoadShow();
		$html .= "<a href=\"../future\"><span style=\"font-size:x-small;color:#3E3A39;\">&lt;上映予定作品一覧に戻る</span></a><br />";
		$template = str_replace('{$backbutton}', $html, $template);
	}else{
		//例外が来たら上映中の作品群を取得
		$showings = getNowRoadShow();
		$html .= "<a href=\"../current\"><span style=\"font-size:x-small;color:#3E3A39;\">&lt;上映中作品一覧に戻る</span></a><br />";
		$template = str_replace('{$backbutton}', $html, $template);	
	}

	$cinema = false;

	$number = $num[0]["movie_code"];

	foreach ($showings as $showing){
		if($_GET["i"] == $showing["id"]){
			$cinema = 
				array(
					"code" => mb_convert_encoding($showing["movie_code"],"SJIS","utf-8"),
					"date" => mb_convert_encoding(date('Y/m/d',strtotime($showing['start_date'])),"SJIS","utf-8"),
					"name" => mb_convert_encoding($showing['name'],"SJIS","utf-8"),
					"credit" => mb_convert_encoding($showing['credit'],"SJIS","utf-8"),
					"url" => mb_convert_encoding($showing['site'],"SJIS","utf-8"),
					"pic" => mb_convert_encoding($showing['picture'],"SJIS","utf-8"),
					"tuika" => mb_convert_encoding($showing['tuika'],"SJIS","utf-8")
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
							$cinema[$theater["ename"]] = "1";
						}
					}

					if($theater_judge == false){
						$cinema[$theater["ename"]] = "";
					}
				}
			}

			$loop++;
		}
	}


	if ($cinema !== false) {
		// PC画像をそのまま出力

		if ($cinema['pic'] != null){
			$tName = "/theaters_image/movie/{$cinema['pic']}";
		}else{
			$tName = "/images/common/image_none.gif";
		}
		
        $cinema[7] = str_replace(';', '<br />', $cinema[7]);

        $template = str_replace('{$cinemaTitle}', $cinema["name"], $template);
        $template = str_replace('{$cinemaCredit}', $cinema["credit"], $template);
		$template = str_replace('{$cinemaCode}', $cinema["code"], $template);
		$template = str_replace('{$cinemaImageName}', $tName, $template);

        if (!empty($cinema["credit"])) {
            //$cinemaUrlMbLink = "<span style=\"color:#ff0000;\">��</span><a href=\"{$cinema["credit"]}\"><span style=\"color:#ffffff;\">公式サイトへ</span></a><br />";
        } else {
            //$cinemaUrlMbLink = "";
        }
        $template = str_replace('{$cinemaUrlMbLink}', $cinemaUrlMbLink, $template);


		//先に備考をいれておく
		if($cinema[tuika]){
			$tuika = preg_replace("/;/","<br />",$cinema["tuika"]);
			$cord .= "<div style='font-size:x-small;'><span style='color:red;'>$tuika</span></div><br />";	
		}

		//劇場名でまわして中身を確認
		foreach ($theaters as $theater) {
			if($cinema[$theater["ename"]] == "1"){
				$cord .= "<a href=\"../../theater/{$theater["ename"]}/\"><span style=\"color:#999999;\">" . mb_convert_encoding($theater["name"],"SJIS","utf-8") . "{$finish}</span></a>";
				$cord .= "/";
			}
		}		

		//末尾の"/"を抜く
		$cord = preg_replace("!/$!","",$cord);
		$template = str_replace('{$cinemaTheater}', $cord, $template);
	}else{
		die('該当する作品が見つかりませんでした');
	}
	
	echo $template;
}
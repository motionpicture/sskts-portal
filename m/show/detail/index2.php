<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をとったものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合った絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

if (isset($_GET['i'])) {
	$BASE = dirname(dirname(dirname(__FILE__)));
	$resourcePath = $BASE . '/resource/show/' . basename(dirname(__FILE__)) . '/';

	ob_start();
	include $BASE . '/lib/resource.php';
	$template = ob_get_contents();
	ob_end_clean();

	$html = '';
	
	if ($_GET['mode'] == current) {
	$html .= "<a href=\"../current\"><span style=\"font-size:x-small;color:#3E3A39;\">&lt;上映中作品一覧に戻る</span></a><br />";
	$template = str_replace('{$backbutton}', $html, $template);
	}
	
	else if ($_GET['mode'] == future) {
	$html .= "<a href=\"../future\"><span style=\"font-size:x-small;color:#3E3A39;\">&lt;上映予定作品一覧に戻る</span></a><br />";
	$template = str_replace('{$backbutton}', $html, $template);
	}

	/*
	 * detail
	 * */
	$cinema = false;
	$futureLines = @file("{$BASE}/../data/future.csv");
	$currentLines = @file("{$BASE}/../data/current.csv");
	$lines = array_merge($futureLines, $currentLines);

	if (is_array($lines)) {
		//$lines = array_reverse($lines);
		//表示数変更の場合下記
		$count = 10000;
		$size = count($lines);
		//for ($i = 0; $i<=65; $i++) {
		for ($i = 0; ($i < $size) && ($i < $count -1); $i++) {
	        if (strpos($lines[$i], $_GET['i']) !== false) {
		        $lines[$i] = str_replace('"', '', $lines[$i]);
		        $cinema = explode(',', $lines[$i]);
		        break;
	        }
		}
	}

	if ($cinema !== false) {
		
		// 作品画像リサイズ
/*		$dir = "{$BASE}/../images";
		$rName = "{$cinema[0]}.jpg";
		$tName = "{$cinema[0]}_thumb.jpg";
		$path = "{$dir}/movie/";
		
		$p = "$path$tName";

		// サムネイル画像が存在するかどうか
		if(!is_file($p)){
			// 無ければ生成
			$imageP = imagecreatetruecolor(72, 50);
			$image = imagecreatefromjpeg("$path$rName");
			imagecopyresampled($imageP, $image, 0, 0, 0, 0, 72, 50, 131, 98);
			// 出力
			imagejpeg($imageP, $p, 100);
		}*/
		
		// PC画像をそのまま出力
		$tName = "{$cinema[0]}.jpg";
	
	
        $cinema[7] = str_replace(';', '<br />', $cinema[7]);

        $template = str_replace('{$cinemaTitle}', $cinema[2], $template);
        $template = str_replace('{$cinemaCredit}', $cinema[7], $template);
		$template = str_replace('{$cinemaCode}', $cinema[0], $template);
		$template = str_replace('{$cinemaImageName}', $tName, $template);

        if (!empty($cinema[9])) {
            $cinemaUrlMbLink = "<span style=\"color:#ff0000;\">��</span><a href=\"{$cinema[9]}\"><span style=\"color:#ffffff;\">公式サイトへ</span></a><br />
";
        } else {
            $cinemaUrlMbLink = "";
        }
        $template = str_replace('{$cinemaUrlMbLink}', $cinemaUrlMbLink, $template);

        $first = true;
        $theater = '';
	    $koumoku = explode(',', str_replace('"', '', $futureLines[0]));
		$koumokuCode = array(
            '池袋' => 'ikebukuro',
            '松戸' => 'matsudo',
            '柏' => '',
            '草加' => '',
            '茂原' => 'mobara',
            '岩井' => 'iwai',
            '平和島' => 'heiwajima',
            '沼津' => 'numazu',
            'かほく' => 'kahoku',
            '大街道' => 'okaido',
            '衣山' => 'kinuyama',
            '重信' => 'shigenobu',
            '今治' => 'imabari',
            '大洲' => 'ozu',
            '北島' => 'kitajima',
            '土浦' => 'tsuchiura',
            //MP yun masaki追加
             'エミフルMASAKI' => 'masaki',            
             '大和郡山' => 'yamato',                         
        );
        for ($i = 10; $i <= 25; $i++) {
			if ($cinema[$i] != '' && $cinema[$i] != '0') {
                if ($first == false) {
                    $theater .= "/";
                }
				$finish = (($cinema[$i] = trim($cinema[$i])) != '1') ? '('.$cinema[$i].')' : '';
                $theater .= "<a href=\"../../theater/{$koumokuCode[$koumoku[$i]]}/\"><span style=\"color:#999999;\">$koumoku[$i]{$finish}</span></a>";
                $first = false;
			}
		}
		$template = str_replace('{$cinemaTheater}', $theater, $template);
	}else{
		die('該当する作品が見つかりませんでした');
		//die(print_r($lines));
	}



	echo $template;
}
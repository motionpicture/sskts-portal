<?php
/**
 * PC、SPサイトで使用されている
 *
 * @todo スケジュール取得関係をひとつにまとめたい（getJson.php、getJsonSp.php、getSchedule.php）
 */

require_once 'const.php';
require_once APP_ROOT_DIR . '/vendor/autoload.php';

use Cinemasunshine\Schedule\Theater;

/**
 * 日付の一覧を取得
 *
 * といいつつ$isExistがtrueだとerror要素だけの配列になる。
 * SPサイトで使用している。
 *
 * @param string  $theaterName 劇場名
 * @param boolean $isPre       先行スケジュールフラグ
 * @param boolean $isExist     trueにすると配列にerror要素だけを入れて返す
 * @return array $isExistによって変わる
 * @todo $isExistの部分だけ別の関数として実装する
 * @todo getDates2()とまとめる
 */
function getDates($theaterName ,$isPre = false, $isExist = false) {
	$schedules;
	$result;

    // @todo ライブラリで判断したい
    $hasTestApiTheaterList = array(
        'kitajima', 'aira',
    );
    $useTestApi = (APP_ENV !== 'prod' && in_array($theaterName, $hasTestApiTheaterList));

    try {
        $theater = new Theater($theaterName, $useTestApi);

        $response = $isPre
                  ? $theater->fetchPreSchedule()
                  : $theater->fetchSchedule();

        /** @var \SimpleXMLElement */
        $schedules = $response->getContents();

    } catch (Exception $e) {
        // もともとエラー処理していなかったので、エラーコードを返しておく
        // @todo ログを出すなり、エラーコードを細かく設定するなり
        return array('error' => '222222');
    }

	if ($isExist) {
		$dateArr;
		//foreach ($schedules->schedule as $schedules) {
			//var_dump($schedules);
			$dateArr["error"] = "$schedules->error";
		//}
	} else {
		$dateArr;
		foreach ($schedules->schedule as $schedule) {
			//var_dump($schedules);
			$dateArr["$schedule->date"] = "$schedule->date";
		}
	}

	return $dateArr;
}

/**
 * 日付の一覧を取得
 *
 * といいつつ$isExistがtrueだとerror要素だけの配列になる。
 * PCサイトで使用している。
 *
 * @param string  $theaterName 劇場名
 * @param boolean $isPre       先行スケジュールフラグ
 * @param boolean $isExist     trueにすると配列にerror要素だけを入れて返す
 * @return array $isExistによって変わる
 * @todo $isExistの部分だけ別の関数として実装する
 * @todo getDates()とまとめる
 */
function getDates2($theaterName, $isPre = false, $isExist = false) {
    $schedules;
	$result;

	// @todo ライブラリで判断したい
    $hasTestApiTheaterList = array(
        'kitajima', 'aira',
    );
    $useTestApi = (APP_ENV !== 'prod' && in_array($theaterName, $hasTestApiTheaterList));

    try {
        $theater = new Theater($theaterName, $useTestApi);

        $response = $isPre
                  ? $theater->fetchPreSchedule()
                  : $theater->fetchSchedule();

        /** @var \SimpleXMLElement */
        $schedules = $response->getContents();

    } catch (Exception $e) {
        // もともとエラー処理していなかったので、エラーコードを返しておく
        // @todo ログを出すなり、エラーコードを細かく設定するなり
        return array('error' => '222222');
    }

	if ($isExist) {
		$dateArr;
		//foreach ($schedules->schedule as $schedules) {
			//var_dump($schedules);
			$dateArr["error"] = "$schedules->error";
		//}
	} else {
		$dateArr;
		foreach ($schedules->schedule as $schedule) {
			$dateArr["$schedule->date"]["val"]= "$schedule->date";
			if(is_object($schedule->movie[0])){
				$dateArr["$schedule->date"]["flg"]= 1;
			}else{
				$dateArr["$schedule->date"]["flg"]= 2;
			}
		}
	}

	return $dateArr;
}




//曜日
function getYoubi($date){
	$sday = strtotime($date);
	$res = date("w", $sday);
	$day = array("日", "月", "火", "水", "木", "金", "土");
	return $day[$res];
}

//Md のみ
function getMd($date){
	$sday = strtotime($date);
	$res = date("m/d", $sday);
	return $res;
}

//dateのみ
function getD($date){
	$sday = strtotime($date);
	$res = date("d", $sday);
	return $res;
}

function getPreCode($theater) {

}
?>

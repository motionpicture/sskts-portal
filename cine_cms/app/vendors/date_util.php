<?php

//システム用dateに変換

$errors;

function getDateFormat($target) {

	//データーがない場合は空白
	if(is_null($target )) {
		return "";
	}

	return date('Ymd',strtotime($target));
}
function getTimeFormat($target) {

	//11:11:00
	//データーがない場合は空白
	if(is_null($target )) {
		return "";
	}

	$hour = substr($target,0,2);
	$min = substr($target,3,2);

	return $hour.$min;
}

/**
* 今日が土曜日なら本日
* 土曜日以外なら直近の土曜日
* 2引数で指定があれば指定から
* Enter description here ...
*/
function getOneCircleDate($format = 'Ymd',$target_date = NULL) {

	//指定日付の直近の土曜日を取得
	if(!is_null($target_date )) {
		if (date('w',strtotime($target_date)) == 6) {
			return date($format,strtotime($target_date));
		} else {
			return date($format,strtotime ("last Saturday",strtotime($target_date)));
		}
	}

	//今日土曜日なら今日でいい
	if (date('w') == 6) {
		return date($format);
	} else {
		return date($format,strtotime ("last Saturday"));
	}
}

/**
 *  エラーを取得する
 * @return string
 */
function getErrors() {
	global $errors;
	return $errors;
}

/**
 *　必須じゃないdateをチェックする
 * @param unknown_type $target
 * @param unknown_type $var_name
 * @return boolean
 */
function arrayDateCheck($target,$var_name) {
	global $errors;
	$errors="";


	//全部""だったらパス
	if($target['year'] =="" && $target['month']=="" && $target['day']=="") {
		return true;
	}

	//一つでも入っていたらエラー
	if($target['year'] =="" ||  $target['month']=="" || $target['day']=="") {
		$errors = $var_name.'が無効です';
		return false;
	}

	if(!checkdate($target['month'],$target['day'],$target['year'])) {
		$errors = $var_name.'が存在しない日付です。';
		return false;
	}

	return true;
}

//データー、変数名、必須、実変数名
function datechecks($target_date,$requied = false,$var_name) {
	global $errors;
	$errors="";

	//必須ながら入力なし
	if ($requied && $target_date == "") {
		$errors = $var_name.'が入力されてません。';
		//$this->Session->setFlash(__($var_name.'が入力されてません。', true));
		return false;
	}

	//必須ではない入力なし
	if (!$requied && $target_date == "") {
		return true;
	}

	//入力があるのにおかしい場合
	if ($target_date != "" && strlen($target_date) < 8) {
		$errors = $var_name.'が無効です';
		//$this->Session->setFlash(__($var_name.'が無効です', true));
		return false;
	}

	$year = substr($target_date,0,4);
	$month = substr($target_date,4,2);
	$date = substr($target_date,6,2);

	if(!checkdate($month,$date,$date)) {
		$errors = $var_name.'が無効です';
		//$this->Session->setFlash(__($var_name.'が無効です', true));
		return false;
	}

	return true;
}

//データー、変数名、必須、実変数名
function timechecks($target_date,$requied = false,$var_name) {
	global $errors;
	$errors="";

	//必須ながら入力なし
	if ($requied && $target_date == "") {
		$errors = $var_name.'が入力されてません。';
		//$this->Session->setFlash(__($var_name.'が入力されてません。', true));
		return false;
	}

	//必須ではない入力なし
	if (!$requied && $target_date == "") {
		return true;
	}

	//入力があるのにおかしい場合
	if ($target_date != "" && strlen($target_date) < 4) {
		$errors = $var_name.'が無効です';
		//$this->Session->setFlash(__($var_name.'が無効です', true));
		return false;
	}

	$hour = substr($target_date,0,2);
	$min = substr($target_date,2,2);

	if($hour > 23 ) {
		$errors = $var_name.'が無効です';
		//$this->Session->setFlash(__($var_name.'が無効です', true));
		return false;
	}
	if($min > 59) {
		$errors = $var_name.'が無効です';
		//$this->Session->setFlash(__($var_name.'が無効です', true));
		return false;
	}
	if(!is_numeric($hour) && !is_numeric($min)) {
		$errors = $var_name.'が無効です';
		//$this->Session->setFlash(__($var_name.'が無効です', true));
		return false;
	}

	return true;
}

function getkadodate($target_date,$target_var) {

	if ($target_date == "") {
		return null;
	}
	$year = substr($target_date,0,4);
	$month = substr($target_date,4,2);
	$date = substr($target_date,6,2);
	if ($target_var != null) {

		return array (
							'month' => $month,
							'day' => $date,
							'year' => $year,
		);

	}
}

function gettime($target_time,$target_var) {

	if ($target_time == "") {
		return null;
	}
	$hour = substr($target_time,0,2);
	$min = substr($target_time,2,2);

	$meridian = "am";


	if ($target_var != null) {

		return array (
								'hour' => $hour,
								'min' => $min,
		//	'meridian' => $meridian,
		);

	}
}

function getcheckbox($targets) {

	//if ($target_time == "") {
	//	return null;
	//}

	$return_txt="";
	foreach ($targets as $k => $v) {

		if ($v != "0") {
			$return_txt.=$v.',';
		}
	}
	//最後のコロン削除
	if ($return_txt != "") {
		$return_txt= substr($return_txt, 0,-1);
	} else {
		$return_txt=null;
	}
	return $return_txt;

}
?>
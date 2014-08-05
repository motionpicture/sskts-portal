<?php
class Maeuri extends AppModel {
	var $name = 'Maeuri';
	var $validate = array(
	'movie_code' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => '作品名が入力されていません。',
	)
	),
	'start_date' => array(
								'rule' => array('datetime'),
								'message' => '更新日の日付が正しくありません。',
	),
	'end_date' => array(
									'rule' => array('datetime'),
									'message' => '公開予定日の日付が正しくありません。',
	),
	);

	/**
	* 日付チェック(Y-m-d H:i:s)
	* @param  $check
	* @return boolean
	*/
	public function datetime($check) {
		list ($key, $datetime) = each($check);
		if (is_null($datetime)) {
			return true;
		}
		// format check (Y-m-d H:i:s)
		$regex = '/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}:(\d{2}))$/';
		if (!preg_match($regex, $datetime)) {
			return false;
		}
		$list = explode(' ', $datetime);
		$date = explode('-', $list[0]);
		// date check (Y-m-d)
		if (!checkdate($date[1], $date[2], $date[0])) {
			return false;
		}
		$time = explode(':', $list[1]);
		// time check (H:i:s)
		if ($time[0] < 0 || $time[0] >=24 || $time[1] < 0 || $time[1] >=60 || $time[2] < 0 || $time[2] >=60) {
			return false;
		}
		return true;
	}
}

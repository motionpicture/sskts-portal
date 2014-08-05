<?php
class News extends AppModel {
	var $name = 'News';
	var $validate = array(
		'midasi' => array(
					'notempty' => array(
						'rule' => array('notempty'),
						'message' => '見出しが入力されていません。',
	),
					'maxLength' => array(
						'rule' => array('maxLength',100),
						'message' => '見出しが無効です。',
	),
	),

	'txt' => array(
						'maxLength' => array(
								'rule' => array('maxLength',5000),
								'message' => '本文は全角5000文字まで',
	)
	),
	'start_date' => array(
							'rule' => array('datetime'),
							'message' => '更新日の日付が正しくありません。',
	),
	'end_date' => array(
								'rule' => array('datetime'),
								'message' => '削除日の日付が正しくありません。',
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
/*
	function paginate($conditions, $fields, $order, $limit, $page, $recursive, $extra)
	{
		$offset = $page * $limit - $limit;
		 $sql = $conditions;
		 $sql .= " order by " . $order;
		 $sql .= " limit " . $limit;
		 if ($offset != 0) {
		 	$sql .= " , " . $offset;
		 }
		 return $this->query($sql);

	}

	function paginateCount($conditions, $recursive, $extra)
	{
		 $sql = $conditions;

		 $this->recursive = $recursive;

		 $results = $this->query($sql);

		 return count($results);

	}
*/
}

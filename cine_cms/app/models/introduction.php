<?php
class Introduction extends AppModel {
	var $name = 'Introduction';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '作品名が入力されていません。',
	),
			'maxLength' => array(
							'rule' => array('maxLength',64),
							'message' => '作品名は全角64文字まで',
	)
	),
	'pic_explain' => array(
					'maxLength' => array(
							'rule' => array('maxLength',128),
							'message' => '画像クレジットは半角128文字まで',
	)
	),
	'midokoro1' => array(
					'maxLength' => array(
							'rule' => array('maxLength',1500),
							'message' => 'みどころ1は全角1500文字まで',
	)
	),
	'midokoro2' => array(
					'maxLength' => array(
							'rule' => array('maxLength',1500),
							'message' => 'みどころ2は全角1500文字まで',
	)
	),
	'site' => array(
					'maxLength' => array(
							'rule' => array('maxLength',256),
							'message' => '公式サイトは半角256文字まで',
	)
	),
	'cast' => array(
						'maxLength' => array(
								'rule' => array('maxLength',1500),
								'message' => 'キャストは全角1500まで',
	)
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

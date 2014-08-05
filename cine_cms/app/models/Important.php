<?php
class Important extends AppModel {
	var $name = 'Important';
	var $validate = array(
	'txt' => array(
					'maxLength' => array(
							'rule' => array('maxLength',800),
							'message' => 'お知らせは800文字以内に入力してください。',
	)
	),
	'open_txt' => array(
					'maxLength' => array(
							'rule' => array('maxLength',1000),
							'message' => '開館時間は1000文字以内に入力してください。'
	)
	),
    'reserv_txt' => array(
            'maxLength' => array(
                    'rule' => array('maxLength',1000),
                    'message' => '開館時間(予約)は1000文字以内に入力してください。'
    )
    )
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

<?php
class Roadshow extends AppModel {
	var $name = 'Roadshow';

	var $validate = array(
		'movie_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '上映作品を選択してください。'
			),
		),

		'start_date' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => '上映期間・開始日が無効です。',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '上映期間・開始日が入力されていません。',
			),
		),
	);

	function isHaveAll($check){
		debug($check);
		return false;
	}
}

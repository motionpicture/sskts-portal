<?php
class Trailer extends AppModel {
	var $name = 'Trailer';

	var $validate = array(

		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'URLが入力されていません。',
	),
	),
	'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => 'タイトルが入力されていません。',
	),
	),
	);

}

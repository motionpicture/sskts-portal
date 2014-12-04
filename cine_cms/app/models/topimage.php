<?php
class Topimage extends AppModel {
	var $name = 'Topimage';
	var $validate = array(

		'orders' => array(
					'notempty' => array(
						'rule' => array('notempty'),
						'message' => '画像順番が入力されていません。',
	),
					'numeric' => array(
						'rule' => array('numeric'),
						'message' => '画像順番は数字のみです。',
	),
	),
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '画像外部リンクが入力されていません。',
	),
	),
	'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => '画像タイトルが入力されていません。',
	),
	),
	);

}

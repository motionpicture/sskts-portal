<?php
class SpecialSideBanner extends AppModel {
	var $name = 'SpecialSideBanner';
	var $validate = array(
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

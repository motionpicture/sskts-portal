<?php
class SpecialMainBanner extends AppModel {
	var $name = 'SpecialMainBanner';
	var $validate = array(
	'name' => array(
				'notempty' => array(
					'rule' => array('notempty'),
					'message' => '画像タイトルが入力されていません。',
	),
	),
	);

}

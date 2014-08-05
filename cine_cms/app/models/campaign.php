<?php
class Campaign extends AppModel {
	var $name = 'Campaign';
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
	/*'url' => array(
							'notempty' => array(
									'rule' => array('notempty'),
									'message' => 'リンクは必須です。',
	)
	),*/
	'txt' => array(
						'maxLength' => array(
								'rule' => array('maxLength',2000),
								'message' => '本文は全角512文字まで',
	)
	),
	);

}

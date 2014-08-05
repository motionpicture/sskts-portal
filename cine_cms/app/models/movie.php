<?php
class Movie extends AppModel {
	var $name = 'Movie';
	//var $displayField = 'name';
	var $validate = array(

	/*	'mo_code' => array(
					'notempty' => array(
						'rule' => array('notempty'),
						'message' => 'MOコードが入力されていません。',
	),
					'numeric' => array(
						'rule' => array('numeric'),
						'message' => 'MOコードは数字のみです。',
	),
					'minLength' => array(
						'rule' => array('minLength',5),
						'message' => 'MOコードが無効です。',
	),
					'maxLength' => array(
						'rule' => array('maxLength',5),
						'message' => 'MOコードが無効です。',
	),
					'isUnique' => array(
						//'on' => 'update',
						'rule' => array('myIsUnique'),
						'message' => 'ＭＯコードが重複してます。',

	),
	),*/
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
	'yomi' => array(
				'maxLength' => array(
						'rule' => array('maxLength',64),
						'message' => 'かなは全角64文字まで',
	)
	),
	'ename' => array(
					'maxLength' => array(
							'rule' => array('maxLength',128),
							'message' => '英名は半角128文字まで',
	)
	),
	'pic_explain' => array(
					'maxLength' => array(
							'rule' => array('maxLength',128),
							'message' => '画像クレジットは半角128文字まで',
	)
	),
	'midokoro' => array(
					'maxLength' => array(
							'rule' => array('maxLength',1500),
							'message' => 'みどころは全角1500文字まで',
	)
	),
	'midasi' => array(
					'maxLength' => array(
							'rule' => array('maxLength',1500),
							'message' => '見出しは全角1500文字まで',
	)
	),
	'komidasi' => array(
					'maxLength' => array(
							'rule' => array('maxLength',512),
							'message' => '小見出しは全角512文字まで',
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
		'product_company' => array(
						'maxLength' => array(
								'rule' => array('maxLength',128),
								'message' => '配給会社は全角128文字まで',
	)
	),
		'running_time' => array(
						'maxLength' => array(
								'rule' => array('maxLength',256),
								'message' => '上映時間は256文字まで',
	)
	),
	);



	function myIsUnique($check){
		if (isset($this->data['Movie']['act']) && $this->data['Movie']['act']=="edit") {

			return true;
		}

		$results = $this->find('list', array(
	        'conditions' => array(
	            'mo_code' => $this->data['Movie']['mo_code'],
				'del_flg' => 0,
		),
		));

		if(sizeof($results) == 0){
			return true;
		}else{
			return false;
		}
	}
}

<?php
class NewsView extends AppModel {
	var $name = 'NewsView';


	var $validate = array(

	'view' => array(
		/*		'notempty' => array(
					'rule' => array('notempty'),
					'last' => true,
					'message' => 'NEWS IDが入力されていません。',
	),*/
					'viewChecker' => array(
						'rule' => array('viewChecker'),
						'last' => true,
						'message' => '半角数字、半角コンマ以外が入力されているか、入力されていません。',
	)));

	function viewChecker($check){
		if (preg_match('/^[0-9,]+$/', $check['view'])) {
			return true;
			//echo "すべて半角英数である";
		} else {
			return false;
			//echo "すべて半角英数ではない";
		}


	}
}

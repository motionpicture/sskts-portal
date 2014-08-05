<?php
class TopsliderView extends AppModel {
	var $name = 'TopsliderView';


	var $validate = array(

	'view' => array(
					'viewChecker' => array(
						'rule' => array('viewChecker'),
						'last' => true,
						'message' => '半角数字、半角コンマ以外が入力されているか、入力されていません。',
	)));

	function viewChecker($check){
		if (preg_match('/^[0-9,]+$/', $check['view'])) {
			return true;
		} else {
			return false;
		}


	}
}

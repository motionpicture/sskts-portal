<?php
class ImportantsController extends AppController {

	var $name = 'Importants';
	var $uses = array(
								         'Important',
								         'Theater',
	);

	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。', true));
			$this->redirect(array('action' => 'search'));
		}
		if (!empty($this->data)) {

			if ($this->Important->save($this->data)) {

				$this->Session->setFlash(__('開館時間 id ['.$this->data['Important']['theater_id'].']を修正しました。', true));
				$this->redirect(array('action' => 'edit/'.$this->data['Important']['theater_id']));
			} else {
				$this->createErrors();
			}
		}
		if (empty($this->data)) {

			$this->data =  $this->Important->findByTheaterId($id);

			//劇場追加対応
			if(!$this->data) {
				$this->data['Important']['theater_id']=$id;
			}
		}

		$conditions = array(
												'Theater.del_flg'=>0
		);

		$theaters =  $this->Theater->find('list',array('conditions' => $conditions));



		$this->set('theater_name',$theaters[$this->data['Important']['theater_id']]);
		//$this->set('theaters',$import_data);

	}

	function lists() {

		if (!(honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type'))) {
			$conditions = array(
													'Theater.ename' => $this->Session->read('theater_type'),
													'Theater.del_flg'=>0,
			);
			$theaters = $this->Theater->find('list',array('conditions' => $conditions));
		} else {
			$conditions = array(
									//'Theater.auth'=>$this->Session->read('user.User.auth'),
									'Theater.del_flg'=>0,
			);
		}
		/*$conditions = array(
										'Theater.del_flg'=>0
		);*/


		$theaters =  $this->Theater->find('list',array('conditions' => $conditions));



		$import_data=array();
		foreach ($theaters as $k => $v) {
			$importants =  $this->Important->findByTheaterId($k);
			$txt="";
			$open_txt="";
			if($importants) {
				$txt=$importants['Important']['txt'];
				$open_txt=$importants['Important']['open_txt'];

			}
			$import_data[] = array (
				'theater_id' =>$k,
				'theater_name' =>$v,
				'txt' =>$txt,
				'open_txt' =>$open_txt,
			);
		}
		//debug($import_data);
		$this->set('theaters',$import_data);
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Important->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Important->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}
/*

	function beforeFilter(){
		//本番・仮用
		$fields = array(
						'id',
						'auth'
		);
		$conditions = array(
															'Theater.del_flg'=>0,
		);
		$theater_auths = $this->Theater->find('list',array('fields' => $fields,'conditions' => $conditions));
		$theater_auths['1000'] = "";
		$this->set('theater_auths',$theater_auths);

		//$this->set('subtitles', $this->CodeMaster->find('list',array('conditions' => array('type' => 'subtitles'),'fields' => array('code', 'value'))));
		parent::beforeFilter();
	}*/
}

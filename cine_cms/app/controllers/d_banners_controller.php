<?php
class DBannersController extends AppController {

	var $name = 'DBanners';

	var $uses = array(
				         'Movie',
				         'DBanner',
						 'Theater'
	);

	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}


	function beforeFilter(){
		if (!(honbu == $this->Session->read('theater_type')  || motion ==  $this->Session->read('theater_type'))) {
			$this->Session->setFlash(__('アクセス権限がございません。', true));
			$this->redirect(array('action' => '../users/lists'));
		}

		parent::beforeFilter();
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。	', true));
			$this->redirect(array('action' => 'select'));
		}
		if (!empty($this->data)) {

			if ($this->DBanner->save($this->data)) {
				$this->Session->setFlash(__('D Bannerが修正されました。', true));
				$this->redirect(array('action' => 'edit/'.$this->data['DBanner']['theater_id']));
			} else {
				$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
			}

		}

		//劇場名とID挿入
		if ($id == null) {
			$id =$this->data['DBanner']['theater_id'];
		}

		if (empty($this->data)) {
			$this->data =  $this->DBanner->findByTheaterId($id);

			//劇場追加対応
			if(!$this->data) {
				$this->data['DBanner']['theater_id']=$id;
			}
		}

		//劇場検索
		$theater = $this->Theater->findByIdAndDelFlg($id,0);

		//劇場トップ対応
		if ($id == "1000") {
			//劇場id
			$this->data['DBanner']['theater_id']=1000;

			//劇場名挿入
			$this->set('theaterName','シネマサンシャイン トップ');
		} else {
			//劇場id
			$this->data['DBanner']['theater_id']=$theater['Theater']['id'];

			//劇場名挿入
			$this->set('theaterName',$theater['Theater']['name']);
		}

	}
	function select() {

		if (honbu == $this->Session->read('theater_type')  || motion ==  $this->Session->read('theater_type')) {
			$conditions = array(
											'Theater.del_flg'=>0,
			);
			$theaters =  $this->Theater->find('list',array('conditions' => $conditions));
			$theaters = array_reverse($theaters, true);
			$theaters['1000'] = "シネマサンシャイントップ";
			$theaters = array_reverse($theaters, true);
			$this->set('theaters',$theaters);

		} else {

			$conditions = array(
										'Theater.ename' => $this->Session->read('theater_type'),
										'Theater.del_flg'=>0,
			);

			$theater_id = $this->Theater->find('list',array('conditions' => $conditions));

			$this->redirect(array('action' => 'edit/'.key($theater_id)));

		}


/*
		$conditions = array(
						'Theater.type'=>'kadokawa',
						'Theater.del_flg'=>0,
		);

		$this->set('theaters', $this->Theater->find('list',array('conditions' => $conditions)));*/
	}

}

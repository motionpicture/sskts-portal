<?php
class NowShowingsController extends AppController {

	var $name = 'NowShowings';

	var $uses = array(
				         'Movie',
				         'NowShowing',
						 'Theater'
	);

	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。	', true));
			$this->redirect(array('action' => 'select'));
		}
		if (!empty($this->data)) {

			if ($this->NowShowing->save($this->data)) {
				$this->Session->setFlash(__('Now Showingが修正されました。', true));
				$this->redirect(array('action' => 'edit/'.$this->data['NowShowing']['theater_id']));
			} else {
				$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
			}

		}

		//劇場名とID挿入
		if ($id == null) {
			$id =$this->data['NowShowing']['theater_id'];
		}

		if (empty($this->data)) {
			$this->data =  $this->NowShowing->findByTheaterId($id);

			//劇場追加対応
			if(!$this->data) {
				$this->data['NowShowing']['theater_id']=$id;
			}
		}

		$conditions["Movie.del_flg"] = 0;
		$order = array( 'Movie.modified desc' );

		$results = $this->Movie->find('list',array( 'conditions' => $conditions, 'order' =>$order));

		/*$results2 = array();
		foreach ($results as $k => $v ) {
			$result2[$v['Movie']['mo_code']] = '['.$v['Movie']['mo_code'].'] '.$v['Movie']['name'];
		}*/

		//mo_code
		$this->set('movie_code',$results);

		//劇場検索
		$theater = $this->Theater->findByIdAndDelFlg($id,0);

		//劇場トップ対応
		if ($id == "1000") {
			//劇場id
			$this->data['NowShowing']['theater_id']=1000;

			//劇場名挿入
			$this->set('theaterName','シネマサンシャイン トップ');
		} else {
			//劇場id
			$this->data['NowShowing']['theater_id']=$theater['Theater']['id'];

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

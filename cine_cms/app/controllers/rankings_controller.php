<?php
class RankingsController extends AppController {

	var $name = 'Rankings';

	var $uses = array(
			         'Movie',
			         'Ranking',
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
	function edit() {
		if (!empty($this->data)) {

			//debug($this->data);

			if ($this->Ranking->save($this->data)) {
				$this->Session->setFlash(__('ランキングが修正されました。', true));
				$this->redirect(array('action' => 'edit'));
			} else {
				$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ranking->read(null, "1");
		}
		$conditions["Movie.del_flg"] = 0;
		$order = array( 'Movie.modified desc' );

		$results = $this->Movie->find('all',array( 'conditions' => $conditions, 'order' =>$order));
		$results2 = array();
		foreach ($results as $k => $v ) {
			$result2[$v['Movie']['id']] = '['.$v['Movie']['id'].'] '.$v['Movie']['name'];
		}


		//debug($results);
		$this->set('movie_code1',$result2);
		/*$this->set('mo_code2',$results);
		$this->set('mo_code3',$results);
		$this->set('mo_code4',$results);*
		$this->set('mo_code5',$results);*/
	}

}

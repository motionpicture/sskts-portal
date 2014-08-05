<?php
class MaeurisController extends AppController {

	var $name = 'Maeuris';

	var $uses = array(
							         'Maeuri',
									'Movie',
							         'Theater',
	);

	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}

	function beforeFilter(){

		$conditions = array(
							'Theater.del_flg'=>0
		);

		$theaters =  $this->Theater->find('list',array('conditions' => $conditions));
		$this->set('theaters',$theaters);

		//beforeではこの方法でglobal化することが可能
		$this->theaters=$theaters;


		//登録、検索用生成
		if (!(honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type'))) {
			$conditions = array(
													'Theater.ename' => $this->Session->read('theater_type'),
													'Theater.del_flg'=>0,
			);
			$theaters = $this->Theater->find('list',array('conditions' => $conditions));
		}

		//検索・登録用
		$this->set('stheaters',$theaters);


		//作品
		$order = array( 'Movie.modified desc' );
		$conditions = array(
																			'del_flg'=>0,
		);
		$movies = $this->Movie->find('list',array('conditions' => $conditions, 'order' =>$order));
		//var_dump($movies);
		$this->set('movies',$movies);


		//$this->set('subtitles', $this->CodeMaster->find('list',array('conditions' => array('type' => 'subtitles'),'fields' => array('code', 'value'))));
		parent::beforeFilter();
	}


	//劇場選択画面
	function select() {

		if (honbu ==  $this->Session->read('theater_type') || motion ==  $this->Session->read('theater_type')) {
			$this->set('theaters', $this->theaters);
		} else {
			$conditions = array(
							'Theater.ename'=> $this->Session->read('theater_type'),
							'Theater.del_flg'=>0,
			);

			$theater_id = $this->Theater->find('list',array('conditions' => $conditions));
			$this->redirect(array('action' => 'add/'.key($theater_id)));

		}

	}


	function add($id = null) {
		App::import('vendor', 'date_util');

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。	', true));
			$this->redirect(array('action' => 'select'));
		}

		if (!empty($this->data)) {
			if (arrayDateCheck($this->data['Maeuri']['roadshow_date'],'発売日') ) {

				$this->Maeuri->create();
				if ($this->Maeuri->save($this->data)) {
					$this->Session->setFlash(__('前売券情報が登録されました。', true));
					$this->redirect(array('action' => 'search'));
				} else {
					$this->createErrors();
				}
			} else {
				$this->Maeuri->invalidate("roadshow_date",getErrors());
				$this->createErrors();
			}
		}
		//劇場名とID挿入
		if ($id == null) {
			$id =$this->data['Maeuri']['theater_id'];
		}

		//劇場検索
		$theater = $this->Theater->findByIdAndDelFlg($id,0);
// 		/var_dump($theater );
		$this->set('theaterName',$theater['Theater']['name']);
		$this->data['Maeuri']['theater_id']=$theater['Theater']['id'];
	}

	function search() {

	}

	function result() {
		App::import('vendor', 'date_util');
		$get = $this->params['url'];


		//$conditions = array();
		/*if (arrayDateCheck($get['start_date'],"")){
			if(($get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']) != "") {
				$conditions["start_date"] = $get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day'];
			}

		}*/

		/*$theater_ids = array();

		if (isset($get['theater_ids'])) {
			foreach ($get['theater_ids'] as $k =>$v ) {
				if ($v != '0') {
					$theater_ids[]=$v;
				}
			}
			if(count($theater_ids) > 0) {
				$conditions["theater_id"] = $theater_ids;
			}
		}


		if (isset($get['movie']) && $get['movie'] != "" ) {
			$conditions["movie_code"] = $get['movie'];
		}

		$conditions["del_flg"] = 0;



		$order = array( 'start_date desc,end_date desc,roadshow_date desc' );

		$results = $this->Maeuri->find('all',array( 'conditions' => $conditions, 'order' =>$order));*/


		$sql = "
				SELECT
				    *
				FROM
				    maeuris as Maeuri
				WHERE
				del_flg = '0'
				";

		//sql 動的生成
		if (isset($get['theater_ids'])) {
			$i=0;
			foreach ($get['theater_ids'] as $k =>$v ) {
				if ($v != '0') {
					if ($i==0) {
						$sql .=" and  theater_id in (";
					}
					if($i >0) {
						$sql .= "$v,";
					} else {
						$sql .= " $v,";
					}

					$i++;
				}
			}

			$sql = mb_substr($sql, 0, -1);
			if ($i>0) {
				$sql.=")";
			}
		}
		//if (arrayDateCheck($get['start_date'],"")){


		if (isset($get['movie']) && $get['movie'] != "" ) {
			//$conditions["movie_code"] = $get['movie'];
			$sql .= " and movie_code='".$get['movie']."' ";
		}

		if($get['start_date']['year']!="" && $get['start_date']['month'] != "" && $get['start_date']['day'] != "") {
			$sql .= " and start_date = '".$get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']."' ";
		} else if ($get['start_date']['year']!="" && $get['start_date']['month'] != "" ) {
			$sql .= " and start_date >= '".$get['start_date']['year'].$get['start_date']['month']."01' ";
			$sql .= " and start_date <= '".$get['start_date']['year'].$get['start_date']['month']."31' ";
		} else if ($get['start_date']['year']!=""){
			$sql .= " and start_date >= '".$get['start_date']['year']."0101' ";
			$sql .= " and start_date <= '".$get['start_date']['year']."1231' ";
		}
		//}

		$sql .= " order by start_date desc,end_date desc,roadshow_date desc";


		$results = $this->Maeuri->query($sql);

		$this->set('results',$results);

	}
	function edit($id = null) {
		App::import('vendor', 'date_util');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。', true));
			$this->redirect(array('action' => 'search'));
		}
		if (!empty($this->data)) {
			//削除の場合はこちら
			if ($this->params['form']['judge'] == "削除") {

				$conditions = array("Maeuri.id" => $this->data['Maeuri']['id'],"Maeuri.del_flg" => 0);
				$this->data = $this->Maeuri->find($conditions);
				$this->data['Maeuri']['del_flg']=1;

				//削除に成功したら
				if ($this->Maeuri->save($this->data)) {

					$this->Session->setFlash(__('前売 id '.$this->data['Maeuri']['id'].'か削除されました。', true));
					$this->data="";
					$this->redirect(array('action' => 'search'));
				}
			}

			if(arrayDateCheck($this->data['Maeuri']['roadshow_date'],"発売日")) {
				if ($this->Maeuri->save($this->data)) {

					$this->Session->setFlash(__('前売券情報 id ['.$this->data['Maeuri']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['Maeuri']['id']));
				} else {
					$this->createErrors();
				}
			} else {
				$this->Maeuri->invalidate("roadshow_date",getErrors());
				$this->createErrors();
			}
		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->Maeuri->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しない前売りか IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		//劇場検索
		$theater = $this->Theater->findByIdAndDelFlg($this->data['Maeuri']['theater_id'],0);

		$this->set('theaterName',$theater['Theater']['name']);

		$this->set('echo_id',$this->data['Maeuri']['id']);
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Maeuri->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Maeuri->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}
}

<?php
class CampaignsController extends AppController {

	var $name = 'Campaigns';


	var $uses = array(
						         'Campaign',
						         'CodeMaster',
						         'Theater',
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
		$this->set('layouts', $this->CodeMaster->find('list',array('conditions' => array('type' => 'layout'),'fields' => array('code', 'value'))));

		$conditions = array(
												'Theater.del_flg'=>0,
		);
		$theaters =  $this->Theater->find('list',array('conditions' => $conditions));

		//先頭に追加
		$theaters = array_reverse($theaters, true);
		$theaters['1000'] = "シネマサンシャイントップ";
		$theaters = array_reverse($theaters, true);
		$this->set('theaters',$theaters);

		parent::beforeFilter();
	}


	function add() {

		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
			//upload処理開始
			if ($this->data['Campaign']['pic_path']['name'] != "") {

				$uploaddir = campaign_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Campaign']['pic_path']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Campaign']['pic_path']['name'] = $file_name;
				}

				if( strlen($this->data['Campaign']['pic_path']['name']) != mb_strlen($this->data['Campaign']['pic_path']['name']) ){
					$this->Campaign->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['Campaign']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Campaign']['pic_path'] = $this->data['Campaign']['pic_path']['name'];

					} else {
						//失敗
						$this->Campaign->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				$this->Campaign->invalidate("pic_path","画像は必須です。");
				// DBにレコード登録
				//$this->data['Campaign']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			$this->data['Campaign']['theater_ids']=getcheckbox($this->data['Campaign']['theater_ids']);
			//debug($this->data);

			if (count($this->Campaign->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->Campaign->create();
				if ($this->Campaign->save($this->data)) {
					$this->Session->setFlash(__('Campaign ['.$this->Campaign->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Campaign->id));
				} else {
					$this->createErrors();
				}
			}
		}
	}

	function edit($id = null) {
		App::import('vendor', 'date_util');

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。', true));
			$this->redirect(array('action' => 'add'));
		}


		if (!empty($this->data)) {
			//削除の場合はこちら
			if ($this->params['form']['judge'] == "削除") {

				$conditions = array("Campaign.id" => $this->data['Campaign']['id'],"Campaign.del_flg" => 0);
				$this->data = $this->Campaign->find($conditions);
				$this->data['Campaign']['del_flg']=1;


				//削除に成功したら
				if ($this->Campaign->save($this->data)) {


					$uploadfile = campaign_picture.DS.basename($this->data['Campaign']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('Campaign ID ['.$this->data['Campaign']['id'].']が削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['Campaign']['pic_path']['name'] != "") {
				$uploaddir = campaign_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Campaign']['pic_path']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['Campaign']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['Campaign']['pic_path']['name']) != mb_strlen($this->data['Campaign']['pic_path']['name']) ){
					$this->Campaign->invalidate("pic_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['Campaign']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Campaign']['pic_path'] =$this->data['Campaign']['pic_path']['name'];

					} else {
						//失敗
						$this->Campaign->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->Campaign->invalidate("pic_path","画像は必須です。");

				$pic = $this->Campaign->findById($this->data['Campaign']['id']);
				//前のまま使う
				$this->data['Campaign']['pic_path'] = $pic['Campaign']['pic_path'];
			}

			//upload処理終了

			$this->data['Campaign']['theater_ids']=getcheckbox($this->data['Campaign']['theater_ids']);

			if (count($this->Campaign->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->Campaign->findById($this->data['Campaign']['id']);
				//前のまま使う
				$this->data['Campaign']['pic_path'] = $pic['Campaign']['pic_path'];

				$this->createErrors();

			} else {
				if ($this->Campaign->save($this->data)) {

					$this->Session->setFlash(__('Campaign id ['.$this->data['Campaign']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['Campaign']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->Campaign->findById($this->data['Campaign']['id']);
					//前のまま使う
					$this->data['Campaign']['pic_path'] = $pic['Campaign']['pic_path'];

					$this->createErrors();
				}
			}
		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->Campaign->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないCampaign IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['Campaign']['id']);

	}

	function search() {

	}

	function result() {
		App::import('vendor', 'date_util');
		$get = $this->params['url'];

		//debug($get);

		$sql = "
			SELECT
			    *
			FROM
			    campaigns
			WHERE
			del_flg = '0'


			";

		//sql 動的生成
		if (isset($get['theater_ids'])) {
			$i=0;
			foreach ($get['theater_ids'] as $k =>$v ) {
				if ($v != '0') {
					if ($i==0) {
						$sql .=" and (";
					}
					if($i >0) {
						$sql .= " OR FIND_IN_SET($v, theater_ids)  ";
					} else {
						$sql .= " FIND_IN_SET($v, theater_ids)  ";
					}

					$i++;
				}
			}
			if ($i>0) {
				$sql.=")";
			}
		}
		if (arrayDateCheck($get['start_date'],"")){
			if(($get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']) != "") {
				$sql .= " and start_date = '".$get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']."' ";
			}
		}

		$sql .= "order by midasi asc,end_date desc";

		/*			$this->paginate = array(
		 'conditions'=>$sql	,
		'order'=>'start_date DESC',
		'limit'=>5,
		'recursive'=>0,
		);

		debug($this->params);
		$query_string = $this->params['url'];

		unset($query_string['url']);

		$this->set('query_string',  '?'.http_build_query($query_string).'&');

		//	echo  '?'.http_build_query($query_string).'&';
		$this->set('searchs', $this->paginate());
		*/
		$results = $this->Campaign->query($sql);
		$this->set('results',$results);
		//debug($results);
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Campaign->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Campaign->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

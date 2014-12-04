<?php
class NewsController extends AppController {

	var $name = 'News';

	var $uses = array(
					         'News',
							 'NewsView',
					         'CodeMaster',
					         'Theater',
							// 'Movie',
	);

	//views用エラーを出す為のglobal宣言
	var $rTheaters;


	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}


	function beforeFilter(){

		$conditions = array(
							'Theater.del_flg'=>0,
		);

		$theaters =  $this->Theater->find('list',array('conditions' => $conditions));

		//先頭に追加
		$theaters = array_reverse($theaters, true);
		$theaters['1000'] = "シネマサンシャイントップ";

		$theaters = array_reverse($theaters, true);

		$theaters['1001']="IMAX 特設サイト表示用";
		$theaters['1002']="IMM 特設サイト表示用";
		$theaters['1003']="4DX 特設サイト表示用";
		$theaters['1004']="DOLBY 特設サイト表示用";

		$this->set('theaters',$theaters);


		//result画面用特集処理
		//imax,imm soundを追加
		//$rtheaters=$theaters;
		//$rtheaters['1001']="IMAX 特設サイト表示用";
		//$rtheaters['1002']="IMM 特設サイト表示用";
		//$this->set('rtheaters',$rtheaters);

		//beforeではこの方法でglobal化することが可能
		$this->rTheaters=$theaters;

		//登録、検索用生成
		if (!(honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type'))) {
			$conditions = array(
											'Theater.ename' => $this->Session->read('theater_type'),
											'Theater.del_flg'=>0,
			);
			$theaters = $this->Theater->find('list',array('conditions' => $conditions));
		}


		//検索・登録用 劇場IDなら劇場のみ
		$this->set('stheaters',$theaters);

		parent::beforeFilter();
	}

	//劇場選択画面
	function select() {
		$conditions = array(
				'Theater.del_flg'=>0,
		);

		$this->set('theaters', $this->Theater->find('list',array('conditions' => $conditions)));
	}




	//新規
	function add() {

		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
			//upload処理開始
			if ($this->data['News']['pic_path']['name'] != "") {

				$uploaddir = news_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['News']['pic_path']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['News']['pic_path']['name'] = $file_name;
				}



				if( strlen($this->data['News']['pic_path']['name']) != mb_strlen($this->data['News']['pic_path']['name']) ){
					$this->News->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['News']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['News']['pic_path'] = $this->data['News']['pic_path']['name'];

					} else {
						//失敗
						$this->News->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				// DBにレコード登録
				$this->data['News']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			$this->data['News']['theater_ids']=getcheckbox($this->data['News']['theater_ids']);
			//debug($this->data);

			if (count($this->News->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->News->create();
				if ($this->News->save($this->data)) {
					$this->Session->setFlash(__('NEWS ['.$this->News->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->News->id));
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

				$conditions = array("News.id" => $this->data['News']['id'],"News.del_flg" => 0);
				$this->data = $this->News->find($conditions);
				$this->data['News']['del_flg']=1;

				//複数劇場がある場合、本部のみ修正可能
				if (!(honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type'))) {
					if ($this->data['News']['theater_ids'] != "") {
						$theater_cnt = explode(",", $this->data['News']['theater_ids']);
						if (count($theater_cnt) > 1 ) {

							$this->News->invalidate("theater_ids","複数劇場が選択されてますので削除できません。本部に連絡してください。");

							$this->set('echo_id',$this->data['News']['id']);
							//エラーの場合の処理：前のやつをそのまま表示
							$pic = $this->News->findById($this->data['News']['id']);
							//前のまま使う
							$this->data['News']['pic_path'] = $pic['News']['pic_path'];

							$this->createErrors();
							return;
						}
					}
				}

				//削除に成功したら
				if ($this->News->save($this->data)) {

					$uploadfile = news_picture.DS.basename($this->data['News']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('News ID ['.$this->data['News']['id'].']か削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}


			$this->data['News']['theater_ids']=getcheckbox($this->data['News']['theater_ids']);

			//複数劇場がある場合、本部のみ修正可能
			if (!(honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type'))) {
				if ($this->data['News']['theater_ids'] != "") {
					$theater_cnt = explode(",", $this->data['News']['theater_ids']);
					if (count($theater_cnt) > 1 ) {

						$this->News->invalidate("theater_ids","複数劇場が選択されてますので削除できません。本部に連絡してください。");

						$this->set('echo_id',$this->data['News']['id']);
						//エラーの場合の処理：前のやつをそのまま表示
						$pic = $this->News->findById($this->data['News']['id']);
						//前のまま使う
						$this->data['News']['pic_path'] = $pic['News']['pic_path'];

						$this->createErrors();
						return;
					}
				}
			}

			//イメージ削除の場合は削除
			if ($this->data['News']['pic_del'] == '1') {

				//ファイル削除処理のみ
				if ($this->data['News']['pic_path']['name'] != "") {
					$uploadfile = news_picture.DS.basename($this->data['News']['pic_path']);
					unlink($uploadfile);
				} else {
					$pic = $this->News->findById($this->data['News']['id']);
					//前のまま使う
					$this->data['News']['pic_path'] = $pic['News']['pic_path'];
					$uploadfile = news_picture.DS.basename($this->data['News']['pic_path']);
					unlink($uploadfile);
				}
				$this->data['News']['pic_path'] = null;

			} else {
				//upload処理開始
				if ($this->data['News']['pic_path']['name'] != "") {
					$uploaddir = news_picture;
					$uploadfile = $uploaddir.DS.basename($this->data['News']['pic_path']['name']);

					// 同じ名前のファイルがすでに存在すれば、別名に変える
					$info = pathinfo($uploadfile);
					$i = 1;
					while( file_exists($uploadfile) ){
						$i++;
						$file_name = basename($info['basename'],'.'.$info['extension']).
																'_'.$i.'.'.$info['extension'];
						$uploadfile = $info['dirname'].DS.$file_name;

						$this->data['News']['pic_path']['name'] = $file_name;
					}


					if( strlen($this->data['News']['pic_path']['name']) != mb_strlen($this->data['News']['pic_path']['name']) ){
						$this->News->invalidate("pic_path","全角ファイル名は使えません。");

					}else {
						if (move_uploaded_file($this->data['News']['pic_path']['tmp_name'], $uploadfile)){
							chmod($uploadfile, 0666);

							// DBにレコード登録
							$this->data['News']['pic_path'] =$this->data['News']['pic_path']['name'];

						} else {
							//失敗
							$this->News->invalidate("pic_path","ファイルのアップロードに失敗しました。");
						}
					}

					//アップデーターがない場合
				} else {
					$pic = $this->News->findById($this->data['News']['id']);
					//前のまま使う
					$this->data['News']['pic_path'] = $pic['News']['pic_path'];
				}
			}

			//upload処理終了

			if (count($this->News->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->News->findById($this->data['News']['id']);
				//前のまま使う
				$this->data['News']['pic_path'] = $pic['News']['pic_path'];

				$this->createErrors();

			} else {

				if ($this->News->save($this->data)) {
					$this->Session->setFlash(__('News id ['.$this->data['News']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['News']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->News->findById($this->data['News']['id']);
					//前のまま使う
					$this->data['News']['pic_path'] = $pic['News']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->News->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないNEWS IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['News']['id']);

	}

	function search() {

	}

	function result() {

		App::import('vendor', 'date_util');
		$get = $this->params['url'];

		$sql = "
		SELECT
		    *
		FROM
		    news
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
			//if (arrayDateCheck($get['start_date'],"")){



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

			$sql .= "order by start_date desc,end_date desc";


			$results = $this->News->query($sql);

			$this->set('results',$results);

			//$this->params['query'] = http_build_query(Set::remove($this->params['url'],'url'),'','&');

			if(!empty($this->data)) {

				$sussess_flg=true;
				foreach ($this->data['News'] as $k => $v ){

					//IDを取得
					$id_array = explode('_', $k);

					//２番目がIDになる。
					$theaterId=$id_array[1];

					//まず検索
					$newsViewResult = $this->NewsView->findByTheaterIdAndDelFlg($theaterId,0);


					//存在すれば使う
					if($newsViewResult) {
						//半角スペースを取り除く
						$newsViewResult['NewsView']['view']=trim($v," ");
						//存在しないなら作成
					} else {
						$newsViewResult = array (
								'NewsView'=>array(
									'theater_id'=>$theaterId,
									'view'=>trim($v," "),
						));

						$this->NewsView->create();
					}
					if($this->NewsView->save($newsViewResult)) {
						$this->Session->setFlash(__('NEWS表示順を修正しました。', true));
					} else {
						//エラーに劇場名を渡す
						$this->createViewErrors($this->rTheaters[$newsViewResult['NewsView']['theater_id']]);
						break;
					}
				}



				//getクエリはそのままかえす
				//$this->redirect(array('action' => 'result?'.$this->Session->read('getquery')));
			}
			if (empty($this->data)) {
				$newsViewResult = $this->NewsView->find('all',array('conditions' => array('del_flg' => '0')));

				//表に返す配列
				$viewResultArray['News']=array();
				foreach ($newsViewResult as $k => $v) {
					$viewResultArray['News']['theater_'.$v['NewsView']['theater_id']] = $v['NewsView']['view'];

				}
				$this->data=$viewResultArray;

				//$this->set('view_results',$viewResultArray);
			}

			//$this->Session->write('getquery',http_build_query(Set::remove($this->params['url'],'url'),'','&'));
	}

	//New View用エラーを作成
	function createViewErrors($theaterName) {
		//validationエラー
		$errTxt = null;
		if (!$this->NewsView->validates()) {
			$errTxt='<ul>';
			foreach ($this->NewsView->validationErrors as $name) {
				$errTxt .= "<li>" .$theaterName."は". $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			//$this->Session->write('viewError',true);
			$this->Session->setFlash(__($errTxt, true));
		}
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->News->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->News->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

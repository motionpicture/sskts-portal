<?php
class PicksController extends AppController {

	var $name = 'Picks';


	var $uses = array(
		'Pick',
		'PickView',
		'CodeMaster',
		'Theater',
		'Movie',
	);

	//views用エラーを出す為のglobal宣言
	var $rTheaters;


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

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Pick', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Pick', $this->Pick->read(null, $id));
	}

	function add() {
		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
			//upload処理開始
			if ($this->data['Pick']['pic_path']['name'] != "") {
				$uploaddir = pick_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Pick']['pic_path']['name']);
				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Pick']['pic_path']['name'] = $file_name;
				}

				if( strlen($this->data['Pick']['pic_path']['name']) != mb_strlen($this->data['Pick']['pic_path']['name']) ){
					$this->Pick->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['Pick']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Pick']['pic_path'] = $this->data['Pick']['pic_path']['name'];

					} else {
						//失敗
						$this->Pick->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				$this->Pick->invalidate("pic_path","画像は必須です。");
				// DBにレコード登録
				//$this->data['Pick']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			$this->data['Pick']['theater_ids']=getcheckbox($this->data['Pick']['theater_ids']);
			//debug($this->data);

			if (count($this->Pick->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->Pick->create();
				if ($this->Pick->save($this->data)) {
					$this->Session->setFlash(__('Pick ['.$this->Pick->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Pick->id));
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

				$conditions = array("Pick.id" => $this->data['Pick']['id'],"Pick.del_flg" => 0);
				$this->data = $this->Pick->find($conditions);
				$this->data['Pick']['del_flg']=1;


				//削除に成功したら
				if ($this->Pick->save($this->data)) {

					$uploadfile = pick_picture.DS.basename($this->data['Pick']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('Pick ID ['.$this->data['Pick']['id'].']か削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['Pick']['pic_path']['name'] != "") {
				$uploaddir = pick_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Pick']['pic_path']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['Pick']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['Pick']['pic_path']['name']) != mb_strlen($this->data['Pick']['pic_path']['name']) ){
					$this->Pick->invalidate("pic_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['Pick']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Pick']['pic_path'] =$this->data['Pick']['pic_path']['name'];

					} else {
						//失敗
						$this->Pick->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->Pick->invalidate("pic_path","画像は必須です。");

				$pic = $this->Pick->findById($this->data['Pick']['id']);
				//前のまま使う
				$this->data['Pick']['pic_path'] = $pic['Pick']['pic_path'];
			}

			//upload処理終了

			$this->data['Pick']['theater_ids']=getcheckbox($this->data['Pick']['theater_ids']);

			if (count($this->Pick->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->Pick->findById($this->data['Pick']['id']);
				//前のまま使う
				$this->data['Pick']['pic_path'] = $pic['Pick']['pic_path'];

				$this->createErrors();

			} else {



				if ($this->Pick->save($this->data)) {

					//本番反映の場合
					if ($this->params['form']['judge'] == "本番サイトへ反映") {

						//モデル強制変更
						$this->data['Pickh'] = $this->data['Pick'];
						unset($this->data['Pick']);

						//本番化のときには本番用イメージファイルを作成
						//ファイル先頭に [hon_] をつける

						if (!is_null($this->data['Pickh']['pic_path']) && $this->data['Pickh']['pic_path'] != "") {

							//先にファイルコピー
							$uploaddir = pick_picture;
							$motofile = $uploaddir.DS.basename($this->data['Pickh']['pic_path']);
							$honfile = $uploaddir.DS.basename('hon_'.$this->data['Pickh']['pic_path']);

							copy($motofile, $honfile);

							$this->data['Pickh']['pic_path'] = 'hon_'.$this->data['Pickh']['pic_path'];
						}


						if ($this->Pickh->save($this->data)) {
							$this->Session->setFlash(__('Pick id ['.$this->data['Pickh']['id'].']を公開しました。', true));
							$this->redirect(array('action' => 'edit/'.$this->data['Pickh']['id']));
						} else {
							$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
						}

					}
					$this->Session->setFlash(__('Pick id ['.$this->data['Pick']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['Pick']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->Pick->findById($this->data['Pick']['id']);
					//前のまま使う
					$this->data['Pick']['pic_path'] = $pic['Pick']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->Pick->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないPick IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['Pick']['id']);

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
			    picks Picks
			WHERE
			del_flg = '0'


			";

		if (isset($get['name']) && $get['name'] != ""){
			$sql .= " and name like '%".$get['name']."%' ";
		}

		$sql .= "order by id";

		$results = $this->Pick->query($sql);
		$this->set('results',$results);

		if(!empty($this->data)) {

			$sussess_flg=true;
			foreach ($this->data['Pick'] as $k => $v ){

				//IDを取得
				$id_array = explode('_', $k);

				//２番目がIDになる。
				$theaterId=$id_array[1];

				//まず検索
				$PickViewResult = $this->PickView->findByTheaterIdAndDelFlg($theaterId,0);


				//存在すれば使う
				if($PickViewResult) {
					//半角スペースを取り除く
					$PickViewResult['PickView']['view']=trim($v," ");
					//存在しないなら作成
				} else {
					$PickViewResult = array (
							'PickView'=>array(
								'theater_id'=>$theaterId,
								'view'=>trim($v," "),
					));

					$this->PickView->create();
				}
				if($this->PickView->save($PickViewResult)) {
					$this->Session->setFlash(__('バナーの表示順を修正しました。', true));
				} else {
					//エラーに劇場名を渡す
					$this->createViewErrors($this->rTheaters[$PickViewResult['PickView']['theater_id']]);
					break;
				}
			}



			//getクエリはそのままかえす
			//$this->redirect(array('action' => 'result?'.$this->Session->read('getquery')));
		}
		if (empty($this->data)) {
			$PickViewResult = $this->PickView->find('all',array('conditions' => array('del_flg' => '0')));

			//表に返す配列
			$viewResultArray['Pick']=array();
			foreach ($PickViewResult as $k => $v) {
				$viewResultArray['Pick']['theater_'.$v['PickView']['theater_id']] = $v['PickView']['view'];

			}
			$this->data=$viewResultArray;

		}


	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Pick->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Pick->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

	//Pick View用エラーを作成
	function createViewErrors($theaterName) {
		//validationエラー
		$errTxt = null;
		if (!$this->PickView->validates()) {
			$errTxt='<ul>';
			foreach ($this->PickView->validationErrors as $name) {
				$errTxt .= "<li>" .$theaterName."は". $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

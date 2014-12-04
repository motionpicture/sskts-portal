<?php
class TopslidersController extends AppController {

	var $name = 'Topsliders';


	var $uses = array(
								'Topslider',
								'TopsliderView',
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
		$theaters2 =  $this->Theater->find('list',array('conditions' => $conditions,'fields'=>'ename'));

		//先頭に追加
		$theaters = array_reverse($theaters, true);
		$theaters['1000'] = "シネマサンシャイントップ";
		$theaters2['1000'] = "top";
		$theaters = array_reverse($theaters, true);
		$this->set('theaters',$theaters);
		$this->set('theaters2',$theaters2);

		parent::beforeFilter();
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Topslider', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Topslider', $this->Topslider->read(null, $id));
	}

	function add() {
		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
		    //upload処理開始
		    if ($this->data['Topslider']['pic_path']['name'] != "") {
		        $uploaddir = topslider_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Topslider']['pic_path']['name']);
				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Topslider']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['Topslider']['pic_path']['name']) != mb_strlen($this->data['Topslider']['pic_path']['name']) ){
					$this->Topslider->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['Topslider']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Topslider']['pic_path'] = $this->data['Topslider']['pic_path']['name'];

					} else {
						//失敗
						$this->Topslider->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				$this->Topslider->invalidate("pic_path","画像は必須です。");
				// DBにレコード登録
				//$this->data['Topslider']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			$this->data['Topslider']['theater_ids']=getcheckbox($this->data['Topslider']['theater_ids']);
			//debug($this->data);

			if (count($this->Topslider->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->Topslider->create();
				if ($this->Topslider->save($this->data)) {
					$this->Session->setFlash(__('Topslider ['.$this->Topslider->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Topslider->id));
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

				$conditions = array("Topslider.id" => $this->data['Topslider']['id'],"Topslider.del_flg" => 0);
				$this->data = $this->Topslider->find($conditions);
				$this->data['Topslider']['del_flg']=1;


				//削除に成功したら
				if ($this->Topslider->save($this->data)) {

					$uploadfile = topslider_picture.DS.basename($this->data['Topslider']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('Topslider ID ['.$this->data['Topslider']['id'].']か削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['Topslider']['pic_path']['name'] != "") {
				$uploaddir = topslider_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Topslider']['pic_path']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['Topslider']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['Topslider']['pic_path']['name']) != mb_strlen($this->data['Topslider']['pic_path']['name']) ){
					$this->Topslider->invalidate("pic_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['Topslider']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Topslider']['pic_path'] =$this->data['Topslider']['pic_path']['name'];

					} else {
						//失敗
						$this->Topslider->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->Topslider->invalidate("pic_path","画像は必須です。");

				$pic = $this->Topslider->findById($this->data['Topslider']['id']);
				//前のまま使う
				$this->data['Topslider']['pic_path'] = $pic['Topslider']['pic_path'];
			}

			//upload処理終了

			$this->data['Topslider']['theater_ids']=getcheckbox($this->data['Topslider']['theater_ids']);

			if (count($this->Topslider->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->Topslider->findById($this->data['Topslider']['id']);
				//前のまま使う
				$this->data['Topslider']['pic_path'] = $pic['Topslider']['pic_path'];

				$this->createErrors();

			} else {



				if ($this->Topslider->save($this->data)) {

					//本番反映の場合
					if ($this->params['form']['judge'] == "本番サイトへ反映") {

						//モデル強制変更
						$this->data['Topsliderh'] = $this->data['Topslider'];
						unset($this->data['Topslider']);

						//本番化のときには本番用イメージファイルを作成
						//ファイル先頭に [hon_] をつける

						if (!is_null($this->data['Topsliderh']['pic_path']) && $this->data['Topsliderh']['pic_path'] != "") {

							//先にファイルコピー
							$uploaddir = topslider_picture;
							$motofile = $uploaddir.DS.basename($this->data['Topsliderh']['pic_path']);
							$honfile = $uploaddir.DS.basename('hon_'.$this->data['Topsliderh']['pic_path']);

							copy($motofile, $honfile);

							$this->data['Topsliderh']['pic_path'] = 'hon_'.$this->data['Topsliderh']['pic_path'];
						}


						if ($this->Topsliderh->save($this->data)) {
							$this->Session->setFlash(__('Topslider id ['.$this->data['Topsliderh']['id'].']を公開しました。', true));
							$this->redirect(array('action' => 'edit/'.$this->data['Topsliderh']['id']));
						} else {
							$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
						}

					}
					$this->Session->setFlash(__('Topslider id ['.$this->data['Topslider']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['Topslider']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->Topslider->findById($this->data['Topslider']['id']);
					//前のまま使う
					$this->data['Topslider']['pic_path'] = $pic['Topslider']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->Topslider->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないTopslider IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['Topslider']['id']);

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
			    topsliders Topsliders
			WHERE
			del_flg = '0'


			";

		if (isset($get['name']) && $get['name'] != ""){
			$sql .= " and name like '%".$get['name']."%' ";
		}

		$sql .= "order by id";

		$results = $this->Topslider->query($sql);
		$this->set('results',$results);

		if(!empty($this->data)) {

			$sussess_flg=true;
			foreach ($this->data['Topslider'] as $k => $v ){

				//IDを取得
				$id_array = explode('_', $k);

				//２番目がIDになる。
				$theaterId=$id_array[1];

				//まず検索
				$TopsliderViewResult = $this->TopsliderView->findByTheaterIdAndDelFlg($theaterId,0);


				//存在すれば使う
				if($TopsliderViewResult) {
					//半角スペースを取り除く
					$TopsliderViewResult['TopsliderView']['view']=trim($v," ");
					//存在しないなら作成
				} else {
					$TopsliderViewResult = array (
							'TopsliderView'=>array(
								'theater_id'=>$theaterId,
								'view'=>trim($v," "),
					));

					$this->TopsliderView->create();
				}
				if($this->TopsliderView->save($TopsliderViewResult)) {
					$this->Session->setFlash(__('バナーの表示順を修正しました。', true));
				} else {
					//エラーに劇場名を渡す
					$this->createViewErrors($this->rTheaters[$TopsliderViewResult['TopsliderView']['theater_id']]);
					break;
				}
			}



			//getクエリはそのままかえす
			//$this->redirect(array('action' => 'result?'.$this->Session->read('getquery')));
		}
		if (empty($this->data)) {
			$TopsliderViewResult = $this->TopsliderView->find('all',array('conditions' => array('del_flg' => '0')));

			//表に返す配列
			$viewResultArray['Topslider']=array();
			foreach ($TopsliderViewResult as $k => $v) {
				$viewResultArray['Topslider']['theater_'.$v['TopsliderView']['theater_id']] = $v['TopsliderView']['view'];

			}
			$this->data=$viewResultArray;

		}


	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Topslider->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Topslider->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

	//Topslider View用エラーを作成
	function createViewErrors($theaterName) {
		//validationエラー
		$errTxt = null;
		if (!$this->TopsliderView->validates()) {
			$errTxt='<ul>';
			foreach ($this->TopsliderView->validationErrors as $name) {
				$errTxt .= "<li>" .$theaterName."は". $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

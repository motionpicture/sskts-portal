<?php
class TopimagesController extends AppController {

	var $name = 'Topimages';


	var $uses = array(
								'Topimage',
								'CodeMaster',
								'Theater',
								'Movie',
	);


	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}

	function beforeFilter(){
		//if (!(motion ==  $this->Session->read('theater_type'))) {
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
			$this->Session->setFlash(__('Invalid Topimage', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('Topimage', $this->Topimage->read(null, $id));
	}

	function add() {
		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
			//upload処理開始
			if ($this->data['Topimage']['pic_path']['name'] != "") {

				$uploaddir = topimage_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Topimage']['pic_path']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Topimage']['pic_path']['name'] = $file_name;
				}

				if( strlen($this->data['Topimage']['pic_path']['name']) != mb_strlen($this->data['Topimage']['pic_path']['name']) ){
					$this->Topimage->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['Topimage']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Topimage']['pic_path'] = $this->data['Topimage']['pic_path']['name'];

					} else {
						//失敗
						$this->Topimage->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				$this->Topimage->invalidate("pic_path","画像は必須です。");
				// DBにレコード登録
				//$this->data['Topimage']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			$this->data['Topimage']['theater_ids']=getcheckbox($this->data['Topimage']['theater_ids']);
			//debug($this->data);

			if (count($this->Topimage->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->Topimage->create();
				if ($this->Topimage->save($this->data)) {
					$this->Session->setFlash(__('Topimage ['.$this->Topimage->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Topimage->id));
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

				$conditions = array("Topimage.id" => $this->data['Topimage']['id'],"Topimage.del_flg" => 0);
				$this->data = $this->Topimage->find($conditions);
				$this->data['Topimage']['del_flg']=1;


				//削除に成功したら
				if ($this->Topimage->save($this->data)) {

					$uploadfile = topimage_picture.DS.basename($this->data['Topimage']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('Topimage ID ['.$this->data['Topimage']['id'].']か削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['Topimage']['pic_path']['name'] != "") {
				$uploaddir = topimage_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Topimage']['pic_path']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['Topimage']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['Topimage']['pic_path']['name']) != mb_strlen($this->data['Topimage']['pic_path']['name']) ){
					$this->Topimage->invalidate("pic_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['Topimage']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Topimage']['pic_path'] =$this->data['Topimage']['pic_path']['name'];

					} else {
						//失敗
						$this->Topimage->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->Topimage->invalidate("pic_path","画像は必須です。");

				$pic = $this->Topimage->findById($this->data['Topimage']['id']);
				//前のまま使う
				$this->data['Topimage']['pic_path'] = $pic['Topimage']['pic_path'];
			}

			//upload処理終了

			$this->data['Topimage']['theater_ids']=getcheckbox($this->data['Topimage']['theater_ids']);

			if (count($this->Topimage->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->Topimage->findById($this->data['Topimage']['id']);
				//前のまま使う
				$this->data['Topimage']['pic_path'] = $pic['Topimage']['pic_path'];

				$this->createErrors();

			} else {



				if ($this->Topimage->save($this->data)) {

					//本番反映の場合
					if ($this->params['form']['judge'] == "本番サイトへ反映") {

						//モデル強制変更
						$this->data['Topimageh'] = $this->data['Topimage'];
						unset($this->data['Topimage']);

						//本番化のときには本番用イメージファイルを作成
						//ファイル先頭に [hon_] をつける

						if (!is_null($this->data['Topimageh']['pic_path']) && $this->data['Topimageh']['pic_path'] != "") {

							//先にファイルコピー
							$uploaddir = topimage_picture;
							$motofile = $uploaddir.DS.basename($this->data['Topimageh']['pic_path']);
							$honfile = $uploaddir.DS.basename('hon_'.$this->data['Topimageh']['pic_path']);

							copy($motofile, $honfile);

							$this->data['Topimageh']['pic_path'] = 'hon_'.$this->data['Topimageh']['pic_path'];
						}


						if ($this->Topimageh->save($this->data)) {
							$this->Session->setFlash(__('Topimage id ['.$this->data['Topimageh']['id'].']を公開しました。', true));
							$this->redirect(array('action' => 'edit/'.$this->data['Topimageh']['id']));
						} else {
							$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
						}

					}
					$this->Session->setFlash(__('Topimage id ['.$this->data['Topimage']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['Topimage']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->Topimage->findById($this->data['Topimage']['id']);
					//前のまま使う
					$this->data['Topimage']['pic_path'] = $pic['Topimage']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->Topimage->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないTopimage IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['Topimage']['id']);

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
			    topimages Topimages
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
		if (isset($get['name']) && $get['name'] != ""){
			$sql .= " and name like '%".$get['name']."%' ";
		}

		$sql .= "order by orders";

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
		$results = $this->Topimage->query($sql);
		$this->set('results',$results);
		//debug($results);
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Topimage->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Topimage->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

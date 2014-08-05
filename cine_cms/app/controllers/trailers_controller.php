    <?php
class TrailersController extends AppController {

	var $name = 'Trailers';


	var $uses = array(
								'Trailer',
								'Theater',
	);



	function beforeFilter(){
		if (!(honbu == $this->Session->read('theater_type')  || motion ==  $this->Session->read('theater_type'))) {
			$this->Session->setFlash(__('アクセス権限がございません。', true));
			$this->redirect(array('action' => '../users/lists'));
		}
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
			if ($this->data['Trailer']['pic_path']['name'] != "" && $this->data['Trailer']['trailer_path']['name'] != "") {

				$uploaddir = flvimage_picture;
				$uploaddirflv = flv_picture;

				$uploadfile = $uploaddir.DS.basename($this->data['Trailer']['pic_path']['name']);
				$uploadfileflv = $uploaddirflv.DS.basename($this->data['Trailer']['trailer_path']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$infoflv = pathinfo($uploadfileflv);

				//画像のみ上書きしない
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Trailer']['pic_path']['name'] = $file_name;
				}


				$i = 1;
				while( file_exists($uploadfileflv) ){
					$i++;
					$file_name = basename($infoflv['basename'],'.'.$infoflv['extension']).
																							'_'.$i.'.'.$infoflv['extension'];
					$uploadfileflv = $infoflv['dirname'].DS.$file_name;

					$this->data['Trailer']['trailer_path']['name'] = $file_name;
				}

				if( ( strlen($this->data['Trailer']['pic_path']['name']) != mb_strlen($this->data['Trailer']['pic_path']['name'])) ||
				  (strlen($this->data['Trailer']['trailer_path']['name']) != mb_strlen($this->data['Trailer']['trailer_path']['name'])) ){
					$this->Trailer->invalidate("pic_path","全角ファイル名は使えません。");
				} else {
					//画像アップ
					if (move_uploaded_file($this->data['Trailer']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Trailer']['pic_path'] = $this->data['Trailer']['pic_path']['name'];

					} else {
						//失敗
						$this->Trailer->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}

					if (move_uploaded_file($this->data['Trailer']['trailer_path']['tmp_name'], $uploadfileflv)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Trailer']['trailer_path'] = $this->data['Trailer']['trailer_path']['name'];

					} else {
						//失敗
						$this->Trailer->invalidate("trailer_path","ファイルのアップロードに失敗しました。");

					}

				}

			} else {
				$this->Trailer->invalidate("pic_path","画像と動画は必須です。");
				// DBにレコード登録
				//$this->data['Trailer']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			//$this->data['Trailer']['theater_ids']=getcheckbox($this->data['Trailer']['theater_ids']);
			//debug($this->data);

			$this->data['Trailer']['theater_ids']=getcheckbox($this->data['Trailer']['theater_ids']);

			if (count($this->Trailer->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->Trailer->create();
				if ($this->Trailer->save($this->data)) {
					$this->Session->setFlash(__('Trailer ['.$this->Trailer->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Trailer->id));
				} else {
					$this->createErrors();
				}
			}
		}

	}

	function edit($id = null) {
		App::import('vendor', 'date_util');


		//exit;
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しないアクセスです。', true));
			$this->redirect(array('action' => 'add'));
		}


		if (!empty($this->data)) {
			//debug( $this->params['form']);
			//削除の場合はこちら
			if ($this->params['form']['judge'] == "削除") {

				$conditions = array("Trailer.id" => $this->data['Trailer']['id'],"Trailer.del_flg" => 0);
				$this->data = $this->Trailer->find($conditions);
				$this->data['Trailer']['del_flg']=1;


				//削除に成功したら
				if ($this->Trailer->save($this->data)) {


					$uploadfile = flvimage_picture.DS.basename($this->data['Trailer']['pic_path']);
					unlink($uploadfile);

					$uploadfileflv = flv_picture.DS.basename($this->data['Trailer']['trailer_path']);
					unlink($uploadfileflv);

					$this->Session->setFlash(__('Trailer ID ['.$this->data['Trailer']['id'].']が削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['Trailer']['pic_path']['name'] != "" ) {
				$uploaddir = flvimage_picture;

				$uploadfile = $uploaddir.DS.basename($this->data['Trailer']['pic_path']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['Trailer']['pic_path']['name'] = $file_name;
				}

				if( ( strlen($this->data['Trailer']['pic_path']['name']) != mb_strlen($this->data['Trailer']['pic_path']['name'])) ){
					$this->Trailer->invalidate("pic_path","全角ファイル名は使えません。");
				}else {
					//画像アップ
					if (move_uploaded_file($this->data['Trailer']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Trailer']['pic_path'] =$this->data['Trailer']['pic_path']['name'];

					} else {
						//失敗
						$this->Trailer->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->Trailer->invalidate("pic_path","画像は必須です。");

				$pic = $this->Trailer->findById($this->data['Trailer']['id']);
				//前のまま使う
				$this->data['Trailer']['pic_path'] = $pic['Trailer']['pic_path'];
			}

			if ($this->data['Trailer']['trailer_path']['name'] != "") {
				$uploaddirflv = flv_picture;

				$uploadfileflv = $uploaddirflv.DS.basename($this->data['Trailer']['trailer_path']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfileflv);
				$i = 1;
				while( file_exists($uploadfileflv) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
																			'_'.$i.'.'.$info['extension'];
					$uploadfileflv = $info['dirname'].DS.$file_name;

					$this->data['Trailer']['trailer_path']['name'] = $file_name;
				}

				if(	(strlen($this->data['Trailer']['trailer_path']['name']) != mb_strlen($this->data['Trailer']['trailer_path']['name'])) ){
					$this->Trailer->invalidate("trailer_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['Trailer']['trailer_path']['tmp_name'], $uploadfileflv)){
						chmod($uploadfileflv, 0666);

						// DBにレコード登録
						$this->data['Trailer']['trailer_path'] = $this->data['Trailer']['trailer_path']['name'];

					} else {
						//失敗
						$this->Trailer->invalidate("trailer_path","ファイルのアップロードに失敗しました。");

					}

				}


			} else {
				$pic = $this->Trailer->findById($this->data['Trailer']['id']);
				//前のまま使う
				$this->data['Trailer']['trailer_path'] = $pic['Trailer']['trailer_path'];
			}

			//upload処理終了


			$this->data['Trailer']['theater_ids']=getcheckbox($this->data['Trailer']['theater_ids']);
			if (count($this->Trailer->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->Trailer->findById($this->data['Trailer']['id']);
				//前のまま使う
				$this->data['Trailer']['pic_path'] = $pic['Trailer']['pic_path'];

				$this->createErrors();

			} else {

				if ($this->Trailer->save($this->data)) {

					$this->Session->setFlash(__('Trailer id ['.$this->data['Trailer']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['Trailer']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->Trailer->findById($this->data['Trailer']['id']);
					//前のまま使う
					$this->data['Trailer']['pic_path'] = $pic['Trailer']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->Trailer->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないTrailer IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['Trailer']['id']);

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
			    trailers trailers
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

		$sql .= " order by name";

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
		$results = $this->Trailer->query($sql);
		$this->set('results',$results);
		//debug($results);
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Trailer->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Trailer->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

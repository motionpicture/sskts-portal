
<?php
class MoviesController extends AppController {

	var $name = 'Movies';
	var $uses = array(
		         'Movie',
		         'CodeMaster',
				 'Roadshow'
	);
	//var $helpers = array('Form', 'UploadPack.Upload');


	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}
	function add() {


		if (!empty($this->data)) {
			//upload処理開始
			if ($this->data['Movie']['picture']['name'] != "") {

				$uploaddir = movie_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Movie']['picture']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Movie']['picture']['name'] = $file_name;
				}


				if( strlen($this->data['Movie']['picture']['name']) != mb_strlen($this->data['Movie']['picture']['name']) ){
					$this->Movie->invalidate("picture","全角ファイル名は使えません。");
				} else {
					if (move_uploaded_file($this->data['Movie']['picture']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Movie']['picture'] = $this->data['Movie']['picture']['name'];

					} else {
						//失敗
						$this->Movie->invalidate("picture","ファイルのアップロードに失敗しました。");
					}
				}

			} else {
				// DBにレコード登録
				$this->data['Movie']['picture'] = null;
			}


			//upload処理終了
			if (count($this->Movie->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->Movie->create();
				if ($this->Movie->save($this->data)) {
					$this->Session->setFlash(__('作品'.$this->data['Movie']['name'].'を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Movie->id));
				} else {
					$this->createErrors();
				}
			}

		}
	}

	function beforeFilter(){

		if (!(honbu == $this->Session->read('theater_type')  || motion ==  $this->Session->read('theater_type'))) {
			$this->Session->setFlash(__('アクセス権限がございません。', true));
			$this->redirect(array('action' => '../users/lists'));
		}



		$this->set('roadKinds', $this->CodeMaster->find('list',array('conditions' => array('type' => 'road_kinds'),'fields' => array('code', 'value'))));
		$this->set('grades', $this->CodeMaster->find('list',array('conditions' => array('type' => 'grade'),'fields' => array('code', 'value'))));
		//$this->set('subtitles', $this->CodeMaster->find('list',array('conditions' => array('type' => 'subtitles'),'fields' => array('code', 'value'))));
		parent::beforeFilter();
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しない作品です。', true));
			$this->redirect(array('action' => 'add'));
		}

		//データーの修正
		if (!empty($this->data)) {

			$this->data['Movie']['act']="edit";

			//削除の場合はこちら
			if ($this->params['form']['judge'] == "削除") {

				$conditions = array("Movie.id" => $this->data['Movie']['id'],"Movie.del_flg" => 0);
				$this->data = $this->Movie->find($conditions);

				$this->data['Movie']['del_flg']=1;
				$this->data['Movie']['act']="edit";

				//削除に成功したら
				if ($this->Movie->save($this->data)) {

					$uploadfile = movie_picture.DS.basename($this->data['Movie']['picture']);
					unlink($uploadfile);


					$this->Session->setFlash(__('作品['.$this->data['Movie']['name'].']が削除されました。。', true));
					$this->redirect(array('action' => 'add'));
				}

			}


			//upload処理開始
			if ($this->data['Movie']['picture']['name'] != "") {
				$uploaddir = movie_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Movie']['picture']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
																			'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Movie']['picture']['name'] = $file_name;
				}

				if( strlen($this->data['Movie']['picture']['name']) != mb_strlen($this->data['Movie']['picture']['name']) ){
					$this->Movie->invalidate("picture","全角ファイル名は使えません。");
					//$this->createErrors();
					//return;

				} else {

					if (move_uploaded_file($this->data['Movie']['picture']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Movie']['picture'] = $this->data['Movie']['picture']['name'];

					} else {
						//失敗
						$this->Movie->invalidate("picture","ファイルのアップロードに失敗しました。");
					}
				}
				//アップデーターがない場合
			} else {
				$pic = $this->Movie->findById($this->data['Movie']['id']);
				//前のまま使う
				$this->data['Movie']['picture'] = $pic['Movie']['picture'];
			}

			//upload処理終了

			if (count($this->Movie->validationErrors) > 0) {
				$pic = $this->Movie->findById($this->data['Movie']['id']);
				//前のまま使う
				$this->data['Movie']['picture'] = $pic['Movie']['picture'];
				$this->createErrors();
			} else {
				if ($this->Movie->save($this->data)) {
					$this->Session->setFlash(__('作品'.$this->data['Movie']['name'].'を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Movie->id));

				} else {
					//ほかのエラーがある場合も画像を戻す
					$pic = $this->Movie->findById($this->data['Movie']['id']);
					//前のまま使う
					$this->data['Movie']['picture'] = $pic['Movie']['picture'];

					$this->createErrors();
				}
			}

		}

		//初期表示
		if (empty($this->data)) {
			$conditions = array("Movie.id" => $id,"Movie.del_flg" => 0);
			$this->data = $this->Movie->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しない作品か削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}
	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Movie->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Movie->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}
	//検索画面
	function search() {

	}


	//検索結果用
	function result() {
		App::import('Vendor', 'Pager', array('file' => 'Pager.php'));

		//ワンページ表示数
		$pg_cnt=100;


		$get = $this->params['url'];

		$conditions = array();


		if (isset($get['no']) && $get['no'] != "" ) {
			$no=$get['no'];
		} else {
			$no=1;
		}
		if (isset($get['name']) && $get['name'] != "" ) {
			$conditions["Movie.name like"] = '%'.$get['name'].'%';
			$pager_name=$get['name'];
		} else {
			$pager_name="";
		}

		if (isset($get['yomi']) && $get['yomi'] != "" ) {
			$conditions["Movie.yomi like"] = '%'.$get['yomi'].'%';
			$pager_yomi =$get['yomi'];
		} else {
			$pager_yomi ="";
		}

		$conditions["Movie.del_flg"] = 0;
		$order = array( 'Movie.id ASC' );
		$cnt= $this->Movie->find('count',array( 'conditions' => $conditions, 'order' =>$order));

		$pager = new Pager(array(
		  'cur_no'       => $no,                                // 現ページ数
		  'total'        => $cnt,                               // 全ページ数
		  'num_per_page' => $pg_cnt,                               // ページ表示量
		  'path'         => '/cine_cms/movies/result/', // リンクに表示するパス
		  'query' => array('name' => $pager_name, 'yomi' =>$pager_yomi)      // パラメーター
		));

		//0件の場合offsetは0のままなので-1しない
		if ($pager->cur()->firstIndex() <= 0) {
			$offset = $pager->cur()->firstIndex();
		} else {
			$offset = $pager->cur()->firstIndex()-1;
		}
		$results = $this->Movie->find('all',array( 'conditions' => $conditions, 'order' =>$order,'limit'=>$offset.','.$pg_cnt));



		//結果セット
		$this->set('results',$results);

		//pagerセット
		$this->set('pager',$pager);



	}


}

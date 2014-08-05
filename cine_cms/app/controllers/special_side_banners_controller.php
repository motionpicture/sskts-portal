<?php
class SpecialSideBannersController extends AppController {

	var $name = 'SpecialSideBanners';


	var $uses = array(
								'SpecialSideBanner',
								'SpecialSideBannerView',
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

		//先頭に追加
		$theaters = array_reverse($theaters, true);
		$theaters['1001']="IMAX 特設サイト表示用";
		$theaters['1003']="4DX 特設サイト表示用";
		$theaters['1004']="DOLBY 特設サイト表示用";

		$theaters = array_reverse($theaters, true);
		$this->set('theaters',$theaters);


		parent::beforeFilter();
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid SpecialSideBanner', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('SpecialSideBanner', $this->SpecialSideBanner->read(null, $id));
	}

	function add() {
		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
		    //upload処理開始
		    if ($this->data['SpecialSideBanner']['pic_path']['name'] != "") {
		        $uploaddir = special_side_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['SpecialSideBanner']['pic_path']['name']);
				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['SpecialSideBanner']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['SpecialSideBanner']['pic_path']['name']) != mb_strlen($this->data['SpecialSideBanner']['pic_path']['name']) ){
					$this->SpecialSideBanner->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['SpecialSideBanner']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['SpecialSideBanner']['pic_path'] = $this->data['SpecialSideBanner']['pic_path']['name'];

					} else {
						//失敗
						$this->SpecialSideBanner->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				$this->SpecialSideBanner->invalidate("pic_path","画像は必須です。");
				// DBにレコード登録
				//$this->data['SpecialSideBanner']['pic_path'] = null;
			}
			//upload処理終了

			//exit;

			$this->data['SpecialSideBanner']['theater_ids']=getcheckbox($this->data['SpecialSideBanner']['theater_ids']);
			//debug($this->data);

			if (count($this->SpecialSideBanner->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->SpecialSideBanner->create();
				if ($this->SpecialSideBanner->save($this->data)) {
					$this->Session->setFlash(__('SpecialSideBanner ['.$this->SpecialSideBanner->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->SpecialSideBanner->id));
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

				$conditions = array("SpecialSideBanner.id" => $this->data['SpecialSideBanner']['id'],"SpecialSideBanner.del_flg" => 0);
				$this->data = $this->SpecialSideBanner->find($conditions);
				$this->data['SpecialSideBanner']['del_flg']=1;


				//削除に成功したら
				if ($this->SpecialSideBanner->save($this->data)) {

					$uploadfile = special_side_picture.DS.basename($this->data['SpecialSideBanner']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('SpecialSideBanner ID ['.$this->data['SpecialSideBanner']['id'].']か削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['SpecialSideBanner']['pic_path']['name'] != "") {
				$uploaddir = special_side_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['SpecialSideBanner']['pic_path']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['SpecialSideBanner']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['SpecialSideBanner']['pic_path']['name']) != mb_strlen($this->data['SpecialSideBanner']['pic_path']['name']) ){
					$this->SpecialSideBanner->invalidate("pic_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['SpecialSideBanner']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['SpecialSideBanner']['pic_path'] =$this->data['SpecialSideBanner']['pic_path']['name'];

					} else {
						//失敗
						$this->SpecialSideBanner->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->SpecialSideBanner->invalidate("pic_path","画像は必須です。");

				$pic = $this->SpecialSideBanner->findById($this->data['SpecialSideBanner']['id']);
				//前のまま使う
				$this->data['SpecialSideBanner']['pic_path'] = $pic['SpecialSideBanner']['pic_path'];
			}

			//upload処理終了

			$this->data['SpecialSideBanner']['theater_ids']=getcheckbox($this->data['SpecialSideBanner']['theater_ids']);

			if (count($this->SpecialSideBanner->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->SpecialSideBanner->findById($this->data['SpecialSideBanner']['id']);
				//前のまま使う
				$this->data['SpecialSideBanner']['pic_path'] = $pic['SpecialSideBanner']['pic_path'];

				$this->createErrors();

			} else {



				if ($this->SpecialSideBanner->save($this->data)) {

					//本番反映の場合
					if ($this->params['form']['judge'] == "本番サイトへ反映") {

						//モデル強制変更
						$this->data['SpecialSideBannerh'] = $this->data['SpecialSideBanner'];
						unset($this->data['SpecialSideBanner']);

						//本番化のときには本番用イメージファイルを作成
						//ファイル先頭に [hon_] をつける

						if (!is_null($this->data['SpecialSideBannerh']['pic_path']) && $this->data['SpecialSideBannerh']['pic_path'] != "") {

							//先にファイルコピー
							$uploaddir = special_side_picture;
							$motofile = $uploaddir.DS.basename($this->data['SpecialSideBannerh']['pic_path']);
							$honfile = $uploaddir.DS.basename('hon_'.$this->data['SpecialSideBannerh']['pic_path']);

							copy($motofile, $honfile);

							$this->data['SpecialSideBannerh']['pic_path'] = 'hon_'.$this->data['SpecialSideBannerh']['pic_path'];
						}


						if ($this->SpecialSideBannerh->save($this->data)) {
							$this->Session->setFlash(__('SpecialSideBanner id ['.$this->data['SpecialSideBannerh']['id'].']を公開しました。', true));
							$this->redirect(array('action' => 'edit/'.$this->data['SpecialSideBannerh']['id']));
						} else {
							$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
						}

					}
					$this->Session->setFlash(__('SpecialSideBanner id ['.$this->data['SpecialSideBanner']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['SpecialSideBanner']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->SpecialSideBanner->findById($this->data['SpecialSideBanner']['id']);
					//前のまま使う
					$this->data['SpecialSideBanner']['pic_path'] = $pic['SpecialSideBanner']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->SpecialSideBanner->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないSpecialSideBanner IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['SpecialSideBanner']['id']);

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
			    special_side_banners
			WHERE
			del_flg = '0'


			";

		if (isset($get['name']) && $get['name'] != ""){
			$sql .= " and name like '%".$get['name']."%' ";
		}

		$sql .= "order by id";

		$results = $this->SpecialSideBanner->query($sql);
		$this->set('results',$results);

		if(!empty($this->data)) {

			$sussess_flg=true;
			foreach ($this->data['SpecialSideBanner'] as $k => $v ){

				//IDを取得
				$id_array = explode('_', $k);

				//２番目がIDになる。
				$theaterId=$id_array[1];

				//まず検索
				$SpecialSideBannerViewResult = $this->SpecialSideBannerView->findByTheaterIdAndDelFlg($theaterId,0);


				//存在すれば使う
				if($SpecialSideBannerViewResult) {
					//半角スペースを取り除く
					$SpecialSideBannerViewResult['SpecialSideBannerView']['view']=trim($v," ");
					//存在しないなら作成
				} else {
					$SpecialSideBannerViewResult = array (
							'SpecialSideBannerView'=>array(
								'theater_id'=>$theaterId,
								'view'=>trim($v," "),
					));

					$this->SpecialSideBannerView->create();
				}
				if($this->SpecialSideBannerView->save($SpecialSideBannerViewResult)) {
					$this->Session->setFlash(__('バナーの表示順を修正しました。', true));
				} else {
					//エラーに劇場名を渡す
					$this->createViewErrors($this->rTheaters[$SpecialSideBannerViewResult['SpecialSideBannerView']['theater_id']]);
					break;
				}
			}



			//getクエリはそのままかえす
			//$this->redirect(array('action' => 'result?'.$this->Session->read('getquery')));
		}
		if (empty($this->data)) {
			$SpecialSideBannerViewResult = $this->SpecialSideBannerView->find('all',array('conditions' => array('del_flg' => '0')));

			//表に返す配列
			$viewResultArray['SpecialSideBanner']=array();
			foreach ($SpecialSideBannerViewResult as $k => $v) {
				$viewResultArray['SpecialSideBanner']['theater_'.$v['SpecialSideBannerView']['theater_id']] = $v['SpecialSideBannerView']['view'];

			}
			$this->data=$viewResultArray;

		}


	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->SpecialSideBanner->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->SpecialSideBanner->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

	//SpecialSideBanner View用エラーを作成
	function createViewErrors($theaterName) {
		//validationエラー
		$errTxt = null;
		if (!$this->SpecialSideBannerView->validates()) {
			$errTxt='<ul>';
			foreach ($this->SpecialSideBannerView->validationErrors as $name) {
				$errTxt .= "<li>" .$theaterName."は". $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

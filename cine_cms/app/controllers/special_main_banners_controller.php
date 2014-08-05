<?php
class SpecialMainBannersController extends AppController {

	var $name = 'SpecialMainBanners';


	var $uses = array(
								'SpecialMainBanner',
								'SpecialMainBannerView',
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
			$this->Session->setFlash(__('Invalid SpecialMainBanner', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('SpecialMainBanner', $this->SpecialMainBanner->read(null, $id));
	}

	function add() {
		App::import('vendor', 'date_util');
		if (!empty($this->data)) {
		    //upload処理開始
		    if ($this->data['SpecialMainBanner']['pic_path']['name'] != "") {
		        $uploaddir = special_main_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_path']['name']);
				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['SpecialMainBanner']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['SpecialMainBanner']['pic_path']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_path']['name']) ){
					$this->SpecialMainBanner->invalidate("pic_path","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['SpecialMainBanner']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['SpecialMainBanner']['pic_path'] = $this->data['SpecialMainBanner']['pic_path']['name'];

					} else {
						//失敗
						$this->SpecialMainBanner->invalidate("pic_path","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
			    unset($this->data["SpecialMainBanner"]["pic_path"]);
			    //$this->SpecialMainBanner->invalidate("pic_path","画像は必須です。");
				// DBにレコード登録
				//$this->data['SpecialMainBanner']['pic_path'] = null;
			}
			//upload処理終了

		    //upload処理開始
		    if ($this->data['SpecialMainBanner']['pic_path2']['name'] != "") {
		        $uploaddir = special_main_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_path2']['name']);
				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
											'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['SpecialMainBanner']['pic_path2']['name'] = $file_name;
				}

				if( strlen($this->data['SpecialMainBanner']['pic_path2']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_path2']['name']) ){
					$this->SpecialMainBanner->invalidate("pic_path2","全角ファイル名は使えません。");
					//$this->createErrors();
				} else {
					if (move_uploaded_file($this->data['SpecialMainBanner']['pic_path2']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['SpecialMainBanner']['pic_path2'] = $this->data['SpecialMainBanner']['pic_path2']['name'];

					} else {
						//失敗
						$this->SpecialMainBanner->invalidate("pic_path2","ファイルのアップロードに失敗しました。");

					}
				}

			} else {
				//$this->SpecialMainBanner->invalidate("pic_path2","画像は必須です。");
				// DBにレコード登録
				//$this->data['SpecialMainBanner']['pic_path'] = null;
			    unset($this->data["SpecialMainBanner"]["pic_path2"]);

			}
			//upload処理終了

			//upload処理開始
			if ($this->data['SpecialMainBanner']['pic_path3']['name'] != "") {
			    $uploaddir = special_main_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_path3']['name']);
			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;
			        //$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
			        $this->data['SpecialMainBanner']['pic_path3']['name'] = $file_name;
			    }

			    if( strlen($this->data['SpecialMainBanner']['pic_path3']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_path3']['name']) ){
			        $this->SpecialMainBanner->invalidate("pic_path2","全角ファイル名は使えません。");
			        //$this->createErrors();
			    } else {
			        if (move_uploaded_file($this->data['SpecialMainBanner']['pic_path3']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['SpecialMainBanner']['pic_path3'] = $this->data['SpecialMainBanner']['pic_path3']['name'];

			        } else {
			            //失敗
			            $this->SpecialMainBanner->invalidate("pic_path3","ファイルのアップロードに失敗しました。");

			        }
			    }

			} else {
			    //$this->SpecialMainBanner->invalidate("pic_path3","画像は必須です。");
			    // DBにレコード登録
			    //$this->data['SpecialMainBanner']['pic_path'] = null;
			    unset($this->data["SpecialMainBanner"]["pic_path3"]);

			}
			//upload処理終了

			//upload処理開始
			if ($this->data['SpecialMainBanner']['pic_thumb']['name'] != "") {
			    $uploaddir = special_main_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_thumb']['name']);
			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;
			        //$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
			        $this->data['SpecialMainBanner']['pic_thumb']['name'] = $file_name;
			    }

			    if( strlen($this->data['SpecialMainBanner']['pic_thumb']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_thumb']['name']) ){
			        $this->SpecialMainBanner->invalidate("pic_thumb","全角ファイル名は使えません。");
			        //$this->createErrors();
			    } else {
			        if (move_uploaded_file($this->data['SpecialMainBanner']['pic_thumb']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['SpecialMainBanner']['pic_thumb'] = $this->data['SpecialMainBanner']['pic_thumb']['name'];

			        } else {
			            //失敗
			            $this->SpecialMainBanner->invalidate("pic_thumb","ファイルのアップロードに失敗しました。");

			        }
			    }

			} else {
			    //$this->SpecialMainBanner->invalidate("pic_thumb","画像は必須です。");
			    // DBにレコード登録
			    //$this->data['SpecialMainBanner']['pic_path'] = null;
			    unset($this->data["SpecialMainBanner"]["pic_thumb"]);
			}
			//upload処理終了


			$this->data['SpecialMainBanner']['theater_ids']=getcheckbox($this->data['SpecialMainBanner']['theater_ids']);
			//debug($this->data);
			//var_dump($this->data["SpecialMainBanner"]["pic_path"]);

			if (count($this->SpecialMainBanner->validationErrors) > 0) {
				$this->createErrors();
			} else {
				$this->SpecialMainBanner->create();
				if ($this->SpecialMainBanner->save($this->data)) {
					$this->Session->setFlash(__('SpecialMainBanner ['.$this->SpecialMainBanner->id.']を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->SpecialMainBanner->id));
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

				$conditions = array("SpecialMainBanner.id" => $this->data['SpecialMainBanner']['id'],"SpecialMainBanner.del_flg" => 0);
				$this->data = $this->SpecialMainBanner->find($conditions);
				$this->data['SpecialMainBanner']['del_flg']=1;


				//削除に成功したら
				if ($this->SpecialMainBanner->save($this->data)) {

					$uploadfile = special_main_picture.DS.basename($this->data['SpecialMainBanner']['pic_path']);
					unlink($uploadfile);

					$this->Session->setFlash(__('SpecialMainBanner ID ['.$this->data['SpecialMainBanner']['id'].']か削除されました。', true));
					$this->redirect(array('action' => 'search'));
				}
			}

			//upload処理開始

			if ($this->data['SpecialMainBanner']['pic_path']['name'] != "") {
				$uploaddir = special_main_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_path']['name']);


				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;

					$this->data['SpecialMainBanner']['pic_path']['name'] = $file_name;
				}


				if( strlen($this->data['SpecialMainBanner']['pic_path']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_path']['name']) ){
					$this->SpecialMainBanner->invalidate("pic_path","全角ファイル名は使えません。");

				}else {
					if (move_uploaded_file($this->data['SpecialMainBanner']['pic_path']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['SpecialMainBanner']['pic_path'] =$this->data['SpecialMainBanner']['pic_path']['name'];

					} else {
						//失敗
						$this->SpecialMainBanner->invalidate("pic_path","ファイルのアップロードに失敗しました。");
					}
				}

				//アップデーターがない場合
			} else {
				//$this->SpecialMainBanner->invalidate("pic_path","画像は必須です。");

				$pic = $this->SpecialMainBanner->findById($this->data['SpecialMainBanner']['id']);
				//前のまま使う
				$this->data['SpecialMainBanner']['pic_path'] = $pic['SpecialMainBanner']['pic_path'];
			}

			//upload処理終了

			//upload処理開始

			if ($this->data['SpecialMainBanner']['pic_path2']['name'] != "") {
			    $uploaddir = special_main_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_path2']['name']);


			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;

			        $this->data['SpecialMainBanner']['pic_path2']['name'] = $file_name;
			    }


			    if( strlen($this->data['SpecialMainBanner']['pic_path2']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_path2']['name']) ){
			        $this->SpecialMainBanner->invalidate("pic_path2","全角ファイル名は使えません。");

			    }else {
			        if (move_uploaded_file($this->data['SpecialMainBanner']['pic_path2']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['SpecialMainBanner']['pic_path2'] =$this->data['SpecialMainBanner']['pic_path2']['name'];

			        } else {
			            //失敗
			            $this->SpecialMainBanner->invalidate("pic_path2","ファイルのアップロードに失敗しました。");
			        }
			    }

			    //アップデーターがない場合
			} else {
			    //$this->SpecialMainBanner->invalidate("pic_path","画像は必須です。");

			    $pic = $this->SpecialMainBanner->findById($this->data['SpecialMainBanner']['id']);
			    //前のまま使う
			    $this->data['SpecialMainBanner']['pic_path2'] = $pic['SpecialMainBanner']['pic_path2'];
			}

			//upload処理終了

			//upload処理開始

			if ($this->data['SpecialMainBanner']['pic_path3']['name'] != "") {
			    $uploaddir = special_main_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_path3']['name']);


			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;

			        $this->data['SpecialMainBanner']['pic_path3']['name'] = $file_name;
			    }


			    if( strlen($this->data['SpecialMainBanner']['pic_path3']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_path3']['name']) ){
			        $this->SpecialMainBanner->invalidate("pic_path3","全角ファイル名は使えません。");

			    }else {
			        if (move_uploaded_file($this->data['SpecialMainBanner']['pic_path3']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['SpecialMainBanner']['pic_path3'] =$this->data['SpecialMainBanner']['pic_path3']['name'];

			        } else {
			            //失敗
			            $this->SpecialMainBanner->invalidate("pic_path3","ファイルのアップロードに失敗しました。");
			        }
			    }

			    //アップデーターがない場合
			} else {
			    //$this->SpecialMainBanner->invalidate("pic_path","画像は必須です。");

			    $pic = $this->SpecialMainBanner->findById($this->data['SpecialMainBanner']['id']);
			    //前のまま使う
			    $this->data['SpecialMainBanner']['pic_path3'] = $pic['SpecialMainBanner']['pic_path3'];
			}

			//upload処理終了

			//upload処理開始

			if ($this->data['SpecialMainBanner']['pic_thumb']['name'] != "") {
			    $uploaddir = special_main_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['SpecialMainBanner']['pic_thumb']['name']);


			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;

			        $this->data['SpecialMainBanner']['pic_thumb']['name'] = $file_name;
			    }


			    if( strlen($this->data['SpecialMainBanner']['pic_thumb']['name']) != mb_strlen($this->data['SpecialMainBanner']['pic_thumb']['name']) ){
			        $this->SpecialMainBanner->invalidate("pic_thumb","全角ファイル名は使えません。");

			    }else {
			        if (move_uploaded_file($this->data['SpecialMainBanner']['pic_thumb']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['SpecialMainBanner']['pic_thumb'] =$this->data['SpecialMainBanner']['pic_thumb']['name'];

			        } else {
			            //失敗
			            $this->SpecialMainBanner->invalidate("pic_thumb","ファイルのアップロードに失敗しました。");
			        }
			    }

			    //アップデーターがない場合
			} else {
			    //$this->SpecialMainBanner->invalidate("pic_path","画像は必須です。");

			    $pic = $this->SpecialMainBanner->findById($this->data['SpecialMainBanner']['id']);
			    //前のまま使う
			    $this->data['SpecialMainBanner']['pic_thumb'] = $pic['SpecialMainBanner']['pic_thumb'];
			}

			//upload処理終了

			$this->data['SpecialMainBanner']['theater_ids']=getcheckbox($this->data['SpecialMainBanner']['theater_ids']);

			if (count($this->SpecialMainBanner->validationErrors) > 0) {

				//エラーの場合の処理：前のやつをそのまま表示
				$pic = $this->SpecialMainBanner->findById($this->data['SpecialMainBanner']['id']);
				//前のまま使う
				$this->data['SpecialMainBanner']['pic_path'] = $pic['SpecialMainBanner']['pic_path'];

				$this->createErrors();

			} else {



				if ($this->SpecialMainBanner->save($this->data)) {

					//本番反映の場合
					if ($this->params['form']['judge'] == "本番サイトへ反映") {

						//モデル強制変更
						$this->data['SpecialMainBannerh'] = $this->data['SpecialMainBanner'];
						unset($this->data['SpecialMainBanner']);

						//本番化のときには本番用イメージファイルを作成
						//ファイル先頭に [hon_] をつける

						if (!is_null($this->data['SpecialMainBannerh']['pic_path']) && $this->data['SpecialMainBannerh']['pic_path'] != "") {

							//先にファイルコピー
							$uploaddir = special_main_picture;
							$motofile = $uploaddir.DS.basename($this->data['SpecialMainBannerh']['pic_path']);
							$honfile = $uploaddir.DS.basename('hon_'.$this->data['SpecialMainBannerh']['pic_path']);

							copy($motofile, $honfile);

							$this->data['SpecialMainBannerh']['pic_path'] = 'hon_'.$this->data['SpecialMainBannerh']['pic_path'];
						}


						if ($this->SpecialMainBannerh->save($this->data)) {
							$this->Session->setFlash(__('SpecialMainBanner id ['.$this->data['SpecialMainBannerh']['id'].']を公開しました。', true));
							$this->redirect(array('action' => 'edit/'.$this->data['SpecialMainBannerh']['id']));
						} else {
							$this->Session->setFlash(__('予測できない理由で保存に失敗しました。もう一度試してください。', true));
						}

					}
					$this->Session->setFlash(__('SpecialMainBanner id ['.$this->data['SpecialMainBanner']['id'].']を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->data['SpecialMainBanner']['id']));
				} else {

					//エラーの場合の処理：前のやつをそのまま表示
					$pic = $this->SpecialMainBanner->findById($this->data['SpecialMainBanner']['id']);
					//前のまま使う
					$this->data['SpecialMainBanner']['pic_path'] = $pic['SpecialMainBanner']['pic_path'];

					$this->createErrors();
				}
			}


		}
		if (empty($this->data)) {
			$conditions = array("id" => $id,"del_flg" => 0);
			$this->data = $this->SpecialMainBanner->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しないSpecialMainBanner IDか削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}

		$this->set('echo_id',$this->data['SpecialMainBanner']['id']);

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
			    special_main_banners SpecialMainBanners
			WHERE
			del_flg = '0'


			";

		if (isset($get['name']) && $get['name'] != ""){
			$sql .= " and name like '%".$get['name']."%' ";
		}

		$sql .= "order by id";

		$results = $this->SpecialMainBanner->query($sql);
		$this->set('results',$results);

		if(!empty($this->data)) {

			$sussess_flg=true;
			foreach ($this->data['SpecialMainBanner'] as $k => $v ){

				//IDを取得
				$id_array = explode('_', $k);

				//２番目がIDになる。
				$theaterId=$id_array[1];

				//まず検索
				$SpecialMainBannerViewResult = $this->SpecialMainBannerView->findByTheaterIdAndDelFlg($theaterId,0);


				//存在すれば使う
				if($SpecialMainBannerViewResult) {
					//半角スペースを取り除く
					$SpecialMainBannerViewResult['SpecialMainBannerView']['view']=trim($v," ");
					//存在しないなら作成
				} else {
					$SpecialMainBannerViewResult = array (
							'SpecialMainBannerView'=>array(
								'theater_id'=>$theaterId,
								'view'=>trim($v," "),
					));

					$this->SpecialMainBannerView->create();
				}
				if($this->SpecialMainBannerView->save($SpecialMainBannerViewResult)) {
					$this->Session->setFlash(__('バナーの表示順を修正しました。', true));
				} else {
					//エラーに劇場名を渡す
					$this->createViewErrors($this->rTheaters[$SpecialMainBannerViewResult['SpecialMainBannerView']['theater_id']]);
					break;
				}
			}



			//getクエリはそのままかえす
			//$this->redirect(array('action' => 'result?'.$this->Session->read('getquery')));
		}
		if (empty($this->data)) {
			$SpecialMainBannerViewResult = $this->SpecialMainBannerView->find('all',array('conditions' => array('del_flg' => '0')));

			//表に返す配列
			$viewResultArray['SpecialMainBanner']=array();
			foreach ($SpecialMainBannerViewResult as $k => $v) {
				$viewResultArray['SpecialMainBanner']['theater_'.$v['SpecialMainBannerView']['theater_id']] = $v['SpecialMainBannerView']['view'];

			}
			$this->data=$viewResultArray;

		}


	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->SpecialMainBanner->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->SpecialMainBanner->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

	//SpecialMainBanner View用エラーを作成
	function createViewErrors($theaterName) {
		//validationエラー
		$errTxt = null;
		if (!$this->SpecialMainBannerView->validates()) {
			$errTxt='<ul>';
			foreach ($this->SpecialMainBannerView->validationErrors as $name) {
				$errTxt .= "<li>" .$theaterName."は". $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

}

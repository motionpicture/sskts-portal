
<?php
class IntroductionsController extends AppController {

	var $name = 'Introductions';
	var $uses = array(
		         'Introduction',
		         'CodeMaster',
        	      'Theater',
        	      'Roadshow'
	);

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
	    $theaters['1003']="4DX 特設サイト表示用";
	    $theaters['1004']="DOLBY 特設サイト表示用";

	    $this->set('theaters',$theaters);

	    $statu1['1'] = "IMAX";
	    $statu1['2'] = "IMAX3D";
	    $statu2['1'] = "4DX";
	    $statu2['2'] = "4DX3D";
	    $statu3['1'] = "DOLBY ATMOS";
	    $statu3['2'] = "imm";
	    $this->set('statu1',$statu1);
	    $this->set('statu2',$statu2);
	    $this->set('statu3',$statu3);

	    //検索・登録用 劇場IDなら劇場のみ
	    $this->set('stheaters',$theaters);

	    if (!(honbu == $this->Session->read('theater_type')  || motion ==  $this->Session->read('theater_type'))) {
	        $this->Session->setFlash(__('アクセス権限がございません。', true));
	        $this->redirect(array('action' => '../users/lists'));
	    }

	    $this->set('roadKinds', $this->CodeMaster->find('list',array('conditions' => array('type' => 'road_kinds'),'fields' => array('code', 'value'))));
	    $this->set('grades', $this->CodeMaster->find('list',array('conditions' => array('type' => 'grade'),'fields' => array('code', 'value'))));
	    //$this->set('subtitles', $this->CodeMaster->find('list',array('conditions' => array('type' => 'subtitles'),'fields' => array('code', 'value'))));
	    parent::beforeFilter();
	}

	function createErrors() {
	    //validationエラー
	    $errTxt = null;
	    if (count($this->Introduction->validationErrors) > 0) {
	        $errTxt='<ul>';
	        foreach ($this->Introduction->validationErrors as $name) {
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
	    $sql = "
		SELECT
		    *
		FROM
		    introductions
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

	    $sql .= "order by start_date desc,end_date desc";
	    $results = $this->Introduction->query($sql);

	    $this->set('results',$results);

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
	        $conditions["Introduction.name like"] = '%'.$get['name'].'%';
	        $pager_name=$get['name'];
	    } else {
	        $pager_name="";
	    }

	    $conditions["Introduction.del_flg"] = 0;
	    $order = array( 'Introduction.id ASC' );
	    $cnt= $this->Introduction->find('count',array( 'conditions' => $conditions, 'order' =>$order));

	    $pager = new Pager(array(
	            'cur_no'       => $no,                                // 現ページ数
	            'total'        => $cnt,                               // 全ページ数
	            'num_per_page' => $pg_cnt,                               // ページ表示量
	            'path'         => '/cine_cms/Introductions/result/', // リンクに表示するパス
	            'query' => array('name' => $pager_name, 'yomi' =>$pager_yomi)      // パラメーター
	    ));

	    //0件の場合offsetは0のままなので-1しない
	    if ($pager->cur()->firstIndex() <= 0) {
	        $offset = $pager->cur()->firstIndex();
	    } else {
	        $offset = $pager->cur()->firstIndex()-1;
	    }
	    $results = $this->Introduction->find('all',array( 'conditions' => $conditions, 'order' =>$order,'limit'=>$offset.','.$pg_cnt));



	    //結果セット
	    $this->set('results',$results);

	    //pagerセット
	    $this->set('pager',$pager);
	}

	function add() {
	    App::import('vendor', 'date_util');
		if (!empty($this->data)) {
		    //upload処理開始
			if ($this->data['Introduction']['pic_path01']['name'] != "") {

				$uploaddir = special_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Introduction']['pic_path01']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;

				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
															'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Introduction']['pic_path01']['name'] = $file_name;
				}



				if( strlen($this->data['Introduction']['pic_path01']['name']) != mb_strlen($this->data['Introduction']['pic_path01']['name']) ){
					$this->Introduction->invalidate("pic_path01","全角ファイル名は使えません。");
				} else {
					if (move_uploaded_file($this->data['Introduction']['pic_path01']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Introduction']['pic_path01'] = $this->data['Introduction']['pic_path01']['name'];

					} else {
						//失敗
						$this->Introduction->invalidate("pic_path01","ファイルのアップロードに失敗しました。");
					}
				}

			} else {
				// DBにレコード登録
				$this->data['Introduction']['pic_path01'] = null;
			}

			//upload処理開始
			if ($this->data['Introduction']['pic_path02']['name'] != "") {

			    $uploaddir = special_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['Introduction']['pic_path02']['name']);


			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;
			        //$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
			        $this->data['Introduction']['pic_path02']['name'] = $file_name;
			    }


			    if( strlen($this->data['Introduction']['pic_path02']['name']) != mb_strlen($this->data['Introduction']['pic_path02']['name']) ){
			        $this->Introduction->invalidate("pic_path02","全角ファイル名は使えません。");
			    } else {
			        if (move_uploaded_file($this->data['Introduction']['pic_path02']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['Introduction']['pic_path02'] = $this->data['Introduction']['pic_path02']['name'];

			        } else {
			            //失敗
			            $this->Introduction->invalidate("pic_path02","ファイルのアップロードに失敗しました。");
			        }
			    }

			} else {
			    // DBにレコード登録
			    $this->data['Introduction']['pic_path02'] = null;
			}

			//upload処理開始
			if ($this->data['Introduction']['pic_bnr']['name'] != "") {

			    $uploaddir = special_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['Introduction']['pic_bnr']['name']);


			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;
			        //$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
			        $this->data['Introduction']['pic_bnr']['name'] = $file_name;
			    }


			    if( strlen($this->data['Introduction']['pic_bnr']['name']) != mb_strlen($this->data['Introduction']['pic_bnr']['name']) ){
			        $this->Introduction->invalidate("pic_bnr","全角ファイル名は使えません。");
			    } else {
			        if (move_uploaded_file($this->data['Introduction']['pic_bnr']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['Introduction']['pic_bnr'] = $this->data['Introduction']['pic_bnr']['name'];

			        } else {
			            //失敗
			            $this->Introduction->invalidate("pic_bnr","ファイルのアップロードに失敗しました。");
			        }
			    }

			} else {
			    // DBにレコード登録
			    $this->data['Introduction']['pic_bnr'] = null;
			}


			$this->data['Introduction']['theater_ids']=getcheckbox($this->data['Introduction']['theater_ids']);
			$this->data['Introduction']['statu1']=getcheckbox($this->data['Introduction']['statu1']);
			$this->data['Introduction']['statu2']=getcheckbox($this->data['Introduction']['statu2']);
			$this->data['Introduction']['statu3']=getcheckbox($this->data['Introduction']['statu3']);

			//upload処理終了
			if (count($this->Introduction->validationErrors) > 0) {
				$this->createErrors();
			} else {
			    $this->Introduction->create();
				if ($this->Introduction->save($this->data)) {
					$this->Session->setFlash(__('作品'.$this->data['Introduction']['name'].'を登録しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Introduction->id));
				} else {
					$this->createErrors();
				}
			}

		}
	}

	function edit($id = null) {
	    App::import('vendor', 'date_util');

	    if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('存在しない作品です。', true));
			$this->redirect(array('action' => 'add'));
		}

		//データーの修正
		if (!empty($this->data)) {

			$this->data['Introduction']['act']="edit";

			//削除の場合はこちら
			if ($this->params['form']['judge'] == "削除") {

				$conditions = array("Introduction.id" => $this->data['Introduction']['id'],"Introduction.del_flg" => 0);
				$this->data = $this->Introduction->find($conditions);

				$this->data['Introduction']['del_flg']=1;
				$this->data['Introduction']['act']="edit";

				//削除に成功したら
				if ($this->Introduction->save($this->data)) {

					$uploadfile = special_picture.DS.basename($this->data['Introduction']['pic_path01']);
					unlink($uploadfile);


					$this->Session->setFlash(__('作品['.$this->data['Introduction']['name'].']が削除されました。。', true));
					$this->redirect(array('action' => 'add'));
				}

			}

			//upload処理開始
			if ($this->data['Introduction']['pic_path01']['name'] != "") {
				$uploaddir = special_picture;
				$uploadfile = $uploaddir.DS.basename($this->data['Introduction']['pic_path01']['name']);

				// 同じ名前のファイルがすでに存在すれば、別名に変える
				$info = pathinfo($uploadfile);
				$i = 1;
				while( file_exists($uploadfile) ){
					$i++;
					$file_name = basename($info['basename'],'.'.$info['extension']).
																			'_'.$i.'.'.$info['extension'];
					$uploadfile = $info['dirname'].DS.$file_name;
					//$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
					$this->data['Introduction']['pic_path01']['name'] = $file_name;
				}

				if( strlen($this->data['Introduction']['pic_path01']['name']) != mb_strlen($this->data['Introduction']['pic_path01']['name']) ){
					$this->Introduction->invalidate("pic_path01","全角ファイル名は使えません。");
					//$this->createErrors();
					//return;

				} else {

					if (move_uploaded_file($this->data['Introduction']['pic_path01']['tmp_name'], $uploadfile)){
						chmod($uploadfile, 0666);

						// DBにレコード登録
						$this->data['Introduction']['pic_path01'] = $this->data['Introduction']['pic_path01']['name'];

					} else {
						//失敗
						$this->Introduction->invalidate("pic_path01","ファイルのアップロードに失敗しました。");
					}
				}
				//アップデーターがない場合
			} else {
				$pic = $this->Introduction->findById($this->data['Introduction']['id']);
				//前のまま使う
				$this->data['Introduction']['pic_path01'] = $pic['Introduction']['pic_path01'];
			}
			//upload処理終了

			//upload処理開始
			if ($this->data['Introduction']['pic_path02']['name'] != "") {
			    $uploaddir = special_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['Introduction']['pic_path02']['name']);

			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;
			        //$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
			        $this->data['Introduction']['pic_path02']['name'] = $file_name;
			    }

			    if( strlen($this->data['Introduction']['pic_path02']['name']) != mb_strlen($this->data['Introduction']['pic_path02']['name']) ){
			        $this->Introduction->invalidate("pic_path02","全角ファイル名は使えません。");
			        //$this->createErrors();
			        //return;

			    } else {

			        if (move_uploaded_file($this->data['Introduction']['pic_path02']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['Introduction']['pic_path02'] = $this->data['Introduction']['pic_path02']['name'];

			        } else {
			            //失敗
			            $this->Introduction->invalidate("pic_path02","ファイルのアップロードに失敗しました。");
			        }
			    }
			    //アップデーターがない場合
			} else {
			    $pic = $this->Introduction->findById($this->data['Introduction']['id']);
			    //前のまま使う
			    $this->data['Introduction']['pic_path02'] = $pic['Introduction']['pic_path02'];
			}
			//upload処理終了

			//upload処理開始
			if ($this->data['Introduction']['pic_bnr']['name'] != "") {
			    $uploaddir = special_picture;
			    $uploadfile = $uploaddir.DS.basename($this->data['Introduction']['pic_bnr']['name']);

			    // 同じ名前のファイルがすでに存在すれば、別名に変える
			    $info = pathinfo($uploadfile);
			    $i = 1;
			    while( file_exists($uploadfile) ){
			        $i++;
			        $file_name = basename($info['basename'],'.'.$info['extension']).
			        '_'.$i.'.'.$info['extension'];
			        $uploadfile = $info['dirname'].DS.$file_name;
			        //$this->log('アップロードファイル名を再作成：'.$uploadfile, LOG_DEBUG);
			        $this->data['Introduction']['pic_bnr']['name'] = $file_name;
			    }

			    if( strlen($this->data['Introduction']['pic_bnr']['name']) != mb_strlen($this->data['Introduction']['pic_bnr']['name']) ){
			        $this->Introduction->invalidate("pic_bnr","全角ファイル名は使えません。");
			        //$this->createErrors();
			        //return;

			    } else {

			        if (move_uploaded_file($this->data['Introduction']['pic_bnr']['tmp_name'], $uploadfile)){
			            chmod($uploadfile, 0666);

			            // DBにレコード登録
			            $this->data['Introduction']['pic_bnr'] = $this->data['Introduction']['pic_bnr']['name'];

			        } else {
			            //失敗
			            $this->Introduction->invalidate("pic_bnr","ファイルのアップロードに失敗しました。");
			        }
			    }
			    //アップデーターがない場合
			} else {
			    $pic = $this->Introduction->findById($this->data['Introduction']['id']);
			    //前のまま使う
			    $this->data['Introduction']['pic_bnr'] = $pic['Introduction']['pic_bnr'];
			}
			//upload処理終了



			$this->data['Introduction']['theater_ids']=getcheckbox($this->data['Introduction']['theater_ids']);
			$this->data['Introduction']['statu1']=getcheckbox($this->data['Introduction']['statu1']);
			$this->data['Introduction']['statu2']=getcheckbox($this->data['Introduction']['statu2']);
			$this->data['Introduction']['statu3']=getcheckbox($this->data['Introduction']['statu3']);



			if (count($this->Introduction->validationErrors) > 0) {
				$pic = $this->Introduction->findById($this->data['Introduction']['id']);
				//前のまま使う
				$this->data['Introduction']['pic_path01'] = $pic['Introduction']['pic_path01'];
				$this->data['Introduction']['pic_path02'] = $pic['Introduction']['pic_path02'];
				$this->data['Introduction']['pic_bnr'] = $pic['Introduction']['pic_bnr'];
				$this->createErrors();

			} else {
				if ($this->Introduction->save($this->data)) {
					$this->Session->setFlash(__('作品'.$this->data['Introduction']['name'].'を修正しました。', true));
					$this->redirect(array('action' => 'edit/'.$this->Introduction->id));

				} else {
					//ほかのエラーがある場合も画像を戻す
					$pic = $this->Introduction->findById($this->data['Introduction']['id']);
					//前のまま使う
					$this->data['Introduction']['picture'] = $pic['Introduction']['picture'];

					$this->createErrors();
				}
			}

		}

		//初期表示
		if (empty($this->data)) {
			$conditions = array("Introduction.id" => $id,"Introduction.del_flg" => 0);
			$this->data = $this->Introduction->find($conditions);

			if (!$this->data) {
				$this->Session->setFlash(__('存在しない作品か削除されたデーターです。', true));
				$this->redirect(array('action' => 'add'));
			}
		}
	}







}

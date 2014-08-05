<?php
class RoadshowsController extends AppController {

	var $name = 'Roadshows';

	var $uses = array(
			         'Roadshow',
			         'Theater',
					 'Movie',
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
		$conditions = array(
					'Theater.del_flg'=>0,
		);

		$theaters =  $this->Theater->find('list',array('conditions' => $conditions));


		//先頭に追加
		//$theaters = array_reverse($theaters, true);
		//$theaters['1000'] = "シネマサンシャイントップ";
		//$theaters = array_reverse($theaters, true);
		$this->set('theaters',$theaters);

		$order = array( 'Movie.modified desc' );
		$conditions = array(
																	'del_flg'=>0,
		);
		$movies = $this->Movie->find('list',array('conditions' => $conditions, 'order' =>$order));


		$this->set('movies',$movies);

		$this->MovieList=$movies;
		parent::beforeFilter();
	}

	//劇場選択画面
	function select() {

		$conditions = array(
								'Theater.type'=> $this->Session->read('theater_type'),
								'Theater.del_flg'=>0,
		);

		$this->set('theaters', $this->Theater->find('list',array('conditions' => $conditions)));

		/*
		if (honbu == $this->Session->read('user.User.auth')) {

		} else {

			$conditions = array(
						'Theater.del_flg'=>0,
			);

			$theater_id = $this->Theater->find('list',array('conditions' => $conditions));

			$this->redirect(array('action' => 'add/'.key($theater_id)));

		}*/

	}


	function add($id = null) {
		App::import('vendor', 'date_util');
		if (!empty($this->data)) {

			$this->data['Roadshow']['theater_ids']=getcheckbox($this->data['Roadshow']['theater_ids']);
			if (arrayDateCheck($this->data['Roadshow']['end_date'],"上映期間・終了日")) {

				if (count($this->Roadshow->validationErrors) > 0) {
					$this->createErrors();
				} else {
					$this->Roadshow->create();
					if ($this->Roadshow->save($this->data)) {
						$this->Session->setFlash(__('上映作品['.$this->getMovieName($this->data['Roadshow']['movie_code']).']を登録しました。',true));
						$this->redirect(array('action' => 'edit/'.$this->Roadshow->id));
					} else {

					}
				}

			} else {
				$this->Session->setFlash(__(getErrors(), true));
			}

		}

		//劇場名表示
		if (empty($this->data)) {

		}

	}
	function getMovieName($movie_id) {
		return $this->MovieList[$movie_id];
	}

	function edit($id = null) {
		App::import('vendor', 'date_util');

		if (!$id && empty($this->data)) {

			$this->Session->setFlash(__('存在しないアクセスです。', true));
			$this->redirect(array('action' => 'search'));
		}

		//データー修正の場合
		if (!empty($this->data)) {

			//削除の場合はこちら
			if ($this->params['form']['judge'] == "削除") {

				$conditions = array("Roadshow.id" => $this->data['Roadshow']['id'],"Roadshow.del_flg" => 0);
				$this->data = $this->Roadshow->find($conditions);
				$this->data['Roadshow']['del_flg']=1;

				//削除に成功したら
				if ($this->Roadshow->save($this->data)) {
					$this->redirect(array('action' => 'search'));
				}
			}

			if(arrayDateCheck($this->data['Roadshow']['end_date'],"上映期間・終了日")) {
				$this->data['Roadshow']['theater_ids']=getcheckbox($this->data['Roadshow']['theater_ids']);
				 if ($this->Roadshow->save($this->data)) {
				 	$this->Session->setFlash(__('上映作品['.$this->getMovieName($this->data['Roadshow']['movie_code']).']を修正しました。',true));
					$this->redirect(array('action' => 'edit/'.$this->data['Roadshow']['id']));
				} else {
					$this->createErrors();
				}
			} else {
				$this->Session->setFlash(__(getErrors(), true));
			}
		}

		if (empty($this->data)) {

		}
		//初期表示
		$conditions = array("id" => $id,"del_flg" => 0);
		$this->data = $this->Roadshow->find($conditions);


		//back処理対応
		if(!$this->data) {
			$this->Session->setFlash(__('削除されたデーターです。', true));
			$this->redirect(array('action' => 'search'));
		}
		$weekjp_array = array('日', '月', '火', '水', '木', '金', '土');
		$this->set('weekjp', $weekjp_array);


	}

	function createErrors() {
		//validationエラー
		$errTxt = null;
		if (count($this->Roadshow->validationErrors) > 0) {
			$errTxt='<ul>';
			foreach ($this->Roadshow->validationErrors as $name) {
				$errTxt .= "<li>" . $name . "</li>";
			}
			$errTxt.="</ul>";
		}
		if ($errTxt != null) {
			$this->Session->setFlash(__($errTxt, true));
		}
	}

	//システム用dateに変換
	function search() {
		App::import('vendor', 'date_util');

	}


	//検索結果
	/**
	 * Enter description here ...
	 */
	function result() {
		App::import('vendor', 'date_util');
		App::import('Vendor', 'Pager', array('file' => 'Pager.php'));

		//ワンページ表示数
		$pg_cnt=100;

		$get = $this->params['url'];

		$no=1;
		if (isset($get['no']) && $get['no'] != "" ) {
			$no=$get['no'];
		}

		$pager_theaters="";
		if (isset($get['theater']) &&$get['theater'] != "") {
			$pager_theaters=$get['theater'];
		}

		$pager_movie_name="";
		if (isset($get['movie_name']) &&$get['movie_name'] != "") {
			$pager_movie_name=$get['movie_name'];
		}

		$pager_movie_kana="";
		if (isset($get['movie_kana']) &&$get['movie_kana'] != "") {
			$pager_movie_kana=$get['movie_kana'];
		}

		$pager_movie_year = "";
		$pager_movie_month = "";
		$pager_movie_date = "";
		if (isset($get['start_date'])) {
			if (arrayDateCheck($get['start_date'],"")){
				if(($get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']) != "") {
					$pager_movie_year = $get['start_date']['year'];
					$pager_movie_month = $get['start_date']['month'];
					$pager_movie_date = $get['start_date']['day'];
				}
			}
		}
		$results_cnt = $this->Roadshow->query($this->getSql("count", $get));

		$pager = new Pager(array(
				  'cur_no'       => $no,                                // 現ページ数
				  'total'        => $results_cnt[0][0]['roadshow__cnt'],                               // 全ページ数
				  'num_per_page' => $pg_cnt,                               // ページ表示量
				  'path'         => '/cine_cms/roadshows/result/', // リンクに表示するパス
				  'query' => array('theater'=>$pager_theaters,'movie_name' => $pager_movie_name, 'movie_kana' =>$pager_movie_kana, 'start_date[year]' =>$pager_movie_year, 'start_date[month]' =>$pager_movie_month, 'start_date[day]' =>$pager_movie_date)      // パラメーター
		));

		//0件の場合offsetは0のままなので-1しない
		if ($pager->cur()->firstIndex() <= 0) {
			$offset = $pager->cur()->firstIndex();
		} else {
			$offset = $pager->cur()->firstIndex()-1;
		}
		$results = $this->Roadshow->query($this->getSql("no_count", $get,$offset,$pg_cnt));

		$weekjp_array = array('日', '月', '火', '水', '木', '金', '土');

		$this->set('weekjp', $weekjp_array);
		$this->set('pager', $pager);
		$this->set('results', $results);

	}

	//sqlを動的に取得 pagerを入れるため
	function getSql($judge,$get,$offset = 0,$pg_cnt=10) {
		$sql = "SELECT ";
		if($judge=="count") {
			$sql.=" count(roadshow.id ) as roadshow__cnt ";
		} else {
			$sql.=" roadshow.id as roadshow__id,
						roadshow.theater_ids as theater__ids,
					    movies.name as roadshow__movie_name,
					    movies.yomi as roadshow__movie_yomi,
					    roadshow.start_date as roadshow__start_date,
					    roadshow.end_date as roadshow__end_date";
		}

		$sql.=" FROM
					    movies,
					    roadshows as roadshow
					WHERE
					    roadshow.movie_code = movies.id AND
					    roadshow.del_flg = 0 AND
					    movies.del_flg = 0";

		if (isset($get['theater']) && $get['theater'] != "") {
			$sql .= " and FIND_IN_SET(".$get['theater'].", roadshow.theater_ids)  ";
		}

		if (isset($get['movie_name']) &&$get['movie_name'] != "") {
			$sql .= " and movies.name like '%".$get['movie_name']."%'";
		}

		if (isset($get['movie_kana']) &&$get['movie_kana'] != "") {
			$sql .= " and movies.yomi like '%".$get['movie_kana']."%' ";
		}

		if (isset($get['start_date'])) {
			if (arrayDateCheck($get['start_date'],"")){
				if(($get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']) != "") {
					$sql .= " and roadshow.start_date = '".$get['start_date']['year'].$get['start_date']['month'].$get['start_date']['day']."' ";
				}
			}
		}

		$sql .= " ORDER BY
					    roadshow.start_date desc,
					    roadshow.end_date desc";
		if($judge !="count") {
			$sql .=" limit $offset,$pg_cnt";
		}
		return $sql;


	}

	//システム用dateに変換
	function getDateFormat($target) {

		//データーがない場合は空白
		if(is_null($target )) {
			return "";
		}

		return date('Ymd',strtotime($target));
	}
	//データー、変数名、必須、実変数名
	function datechecks($target_date,$requied = false,$var_name) {

		//必須ながら入力なし
		if ($requied && $target_date == "") {
			$this->Session->setFlash(__($var_name.'が入力されてません。', true));
			return false;
		}

		//必須ではない入力なし
		if (!$requied && $target_date == "") {
			return true;
		}

		//入力があるのにおかしい場合
		if ($target_date != "" && strlen($target_date) < 8) {
			$this->Session->setFlash(__($var_name.'が無効です', true));
			return false;
		}

		$year = substr($target_date,0,4);
		$month = substr($target_date,4,2);
		$date = substr($target_date,6,2);

		if(!checkdate($month,$date,$date)) {
			$this->Session->setFlash(__($var_name.'が無効です', true));
			return false;
		}

		return true;
	}


	function getdate($target_date,$target_var) {

		if ($target_date == "") {
			return null;
		}
		$year = substr($target_date,0,4);
		$month = substr($target_date,4,2);
		$date = substr($target_date,6,2);
		if ($target_var != null) {

			return array (
						'month' => $month,
						'day' => $date,
						'year' => $year,
			);

		}

	}
}

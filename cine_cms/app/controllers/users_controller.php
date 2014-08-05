<?php
class UsersController extends AppController {
	var $name = 'Users';


	function login(){
		$this->layout = 'login';
		if($this->Auth->user()){
			$this->Session->write('user', $this->Auth->user());

			$this->Session->write('theater_type', $this->Session->read('user.User.theater'));
			$this->redirect("/users/lists");

		} else {
			if(!empty($this->data)){
				$this->set("error", "ログインIdとpasswordが不正です。");
			} else {
				$this->set("error", "");
			}

			$this->set('title_for_layout', 'ログインページ');
			$this->render("/users/login");
		}
	}

	function logout(){
		$this->Auth->logout();
		$this->redirect("/users/login");
	}

	function lists(){
		$this->set('title_for_layout', 'メニュー選択ページ');
		$this->render("/users/lists");
	}

}

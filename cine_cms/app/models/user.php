<?php
class User extends AppModel {
	var $name = 'User';

	function hashPasswords($data){
	    return $data;
	}


}

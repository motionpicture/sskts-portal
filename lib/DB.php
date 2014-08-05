<?php
class DB{
	function DB() {
		//$dbHost = 'cinemasunshine.co.jp';
		$dbHost = 'localhost';

		//local用
		/*$dbUser = 'root';
		$dbPass = 'yun1210';
		$dbName = 'cinema_cms';*/
		//remote用
		$dbUser = 'root';
		$dbPass = 'hN35G2QlK9sg0YqE';
		$dbName = 'sasaki';
		$dbPass = 'osashimi';
		$dbName = 'cinema_cms';
		$this->db = mysql_connect("{$dbHost}", "{$dbUser}", "{$dbPass}");
		//if(!$this->db) exit("Could not connect!");
		mysql_select_db($dbName, $this->db);
		mysql_query("set names utf8",$this->db);
	}

	function dbClose() {
		mysql_close($this->db);
	}

	function startTransaction() {
		$result = $this->execSQL("BEGIN");
	}

	function commit() {
		$result = $this->execSQL("COMMIT");
	}

	function rollback() {
		$result = $this->execSQL("ROLLBACK");
	}


	//INSERT
	/*function insert($tableName,$data) {
		mysql_query("set names utf8",$this->db);

		if(!$data)
			print "Data is Null";
		$columns = implode('`,`',array_keys($data));
		foreach($data as $value) {
			if(is_array($value)) {
				$value = implode(',',$value);
			}
			$values .= $this->quote_smart($value) . ',';
		}
		$values = substr($values,0,strlen($values) - 1);
		$result = $this->execSQL("insert into $tableName (`$columns`) values ($values);");
		return mysql_insert_id($this->db);
	}


	//UPDATE
	function update($tableName,$data,$condition) {
		if(!$data)
			print "Data is Null";
		foreach($data as $column=>$value) {
			if(is_array($value)) {
				$value = implode(',',$value);
			}
			$values .= '`' . $column . '`=' . $this->quote_smart($value) . ',';
		}
		$values = substr($values,0,strlen($values) - 1);
		$result = $this->execSQL("update $tableName set $values where $condition;");
		return $result;
	}

	//DELETE
	function delete($tableName,$condition) {
		$result = $this->execSQL("delete from $tableName where $condition;");
		return $result;
	}*/

	//SELECT
	function select($sql) {
		$data = Array();
		$result = $this->execSQL($sql);
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}


	//SQL
	function execSQL($sql) {
		//print $sql;
		$result = mysql_query($sql,$this->db);
		if(!$result) {
			print $sql . "<BR/>";
			print mysql_error($this->db) . "\n";
		} else {
			echo mysql_error();
		}
		return $result;
	}

	function quote_smart($value)
	{
		// Stripslashes
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		//
		if (!is_numeric($value)) {
			$value = "'" . mysql_real_escape_string($value) . "'";
		}
		return $value;
	}
}
?>

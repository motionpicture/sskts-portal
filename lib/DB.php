<?php
class DB{
	function DB() {
		if (APP_ENV === 'prod') {
			$dbHost = 'localhost';
			$dbUser = 'cinesun_cms';
			$dbPass = 'cine_sun_px';
			$dbName = 'cinema_cms';
		} else if (APP_ENV === 'stg') {
			$dbHost = 'ja-cdbr-azure-east-a.cloudapp.net';
			$dbUser = 'b68a3a830cc797';
			$dbPass = 'c9e1bde9';
			$dbName = 'testsasakidb';
		} else {
			$dbHost = 'ja-cdbr-azure-east-a.cloudapp.net';
			$dbUser = 'b68a3a830cc797';
			$dbPass = 'c9e1bde9';
			$dbName = 'testsasakidb';
		}

        $this->db = mysqli_connect($dbHost, $dbUser, $dbPass);

        if (mysqli_connect_errno() > 0) {
            exit("Could not connect!");
        }

        mysqli_select_db($this->db, $dbName);
        mysqli_query($this->db, 'set names utf8');
        mysqli_query($this->db, "SET SESSION time_zone = '+09:00';"); // Azure環境対策。Asia/Tokyoは使えず
	}

	function dbClose() {
		mysqli_close($this->db);
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

		while ($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}

		return $data;
	}

	//SQL
	function execSQL($sql) {
        $result = mysqli_query($this->db, $sql);

		if (!$result) {
			print $sql . "<BR/>";
			print mysqli_error($this->db) . "\n";
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
			$value = "'" . mysqli_real_escape_string($value) . "'";
		}

		return $value;
	}
}

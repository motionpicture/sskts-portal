<?php
class DB{
	function DB() {
		//$dbHost = 'localhost';
		$dbHost = 'campaign.cinemasunshine.co.jp';
		$dbUser = 'mopix';
		$dbPass = 'mstylepxdbs';
		$dbName = 'eigakannavi';
		$this->db = mysql_connect("{$dbHost}", "{$dbUser}", "{$dbPass}");
		if(!$this->db) exit("Could not connect!");
		mysql_select_db($dbName, $this->db);
		mysql_query("set names utf8",$this->db);
		//mysql_query("set names sjis",$this->db);
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
	function insert($tableName,$data) {
		mysql_select_db('96hours_campaign', $this->db);
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
	}

	//SELECT
/*	function select($sql) {
		$data = Array();
		$result = $this->execSQL($sql);
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}*/
	function select($sql) {
		$data = Array();
		$result = $this->execSQL($sql);
		
		$weekdayLabel = array('日','月','火','水','木','金','土');
		
		//ターゲット日付
		//$targetYear = date('Y',strtotime($row['start_time']));
		

					
		
		while($row = mysql_fetch_assoc($result)){
			
			
		$targetMonth = date('n',strtotime($row['start_time']));
		
		$targetDay = date('j',strtotime($row['start_time']));
		
		//ターゲット曜日
		$weekDay = $weekdayLabel[date('w',strtotime($row['start_time']))];
		
		//ターゲット時間
		$targetHTime = date('H',strtotime($row['start_time']));

		$targetITime = date('i',strtotime($row['start_time']));
			
			//最後の3桁を取り除く
			$data[] = array($row['movie_name'],$targetMonth.'月 '.$targetDay.'日 '.$weekDay.'曜日 '.$targetHTime.'時 '.$targetITime.'分 ' );
//			/mb_substr($row['start_time'],0,strlen($row['start_time']) - 3)
		}
		
		return $data;
	}
		
	
	//LECT
	function selectById($sql) {
		$result = $this->execSQL($sql);
		while($row = mysql_fetch_assoc($result)){
			$data = $row;
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
		//if (!is_numeric($value)) {
			$value = "'" . mysql_real_escape_string($value) . "'";
		//}
		return $value;
	}

	function  create_getMovie($theater){
		$db_date = date('Y-n-j'); //今日の日付取得
		$creators = 'select start_time,movie_name  from schedule_temp where '. 
	    'end_time >= DATE_FORMAT("'.$db_date.'", GET_FORMAT(DATE, "JIS")) and movie_name in ('.
	    '"シャーロック・ホームズ"' //映画名をコンマ区切りでセット
		.') and screen_id in (select id from screen where theater_id ="'.$theater.'")';
		return $creators;
	}
}
?>

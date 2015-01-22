<?php

class FormAction{
		
	private $forms;
	private $validates;	
	private $items;
	private $parameters;
	private $action;
	private $errors;
	
	private $mobile;
	
	
	// コンストラクタ
	public function __construct($mobile = false){
		
		// 入力項目定義
		$this->forms = array(
			array(
				'items' => array(
					'name', 'furigana', 'gender', 'age',
					'zip1', 'zip2', 'pref', 'address1', 'address2',
					'tel', 'mail1', 'mail2', 'occupation','present' ,'agreement',
				),
				'itemJNames' => array(
					'お名前', 'お名前(フリガナ)', '性別', '年齢',
					'郵便番号1', '郵便番号2', '都道府県', '住所1', '住所2',
					'電話番号', 'メールアドレス', 'メールアドレス(確認用)', '職業','プレゼント' ,'同意する',
				)
			)
		);
		
		// 各項目の検証用定義
		$this->validates = array(
			'message' => array(
				'not_null',
				'within' => 250
			),
			'to_name' => array(
				'not_null',
				'within' => 40
			),
			'to_furigana' => array(
				'not_null',
				'within' => 40
			),
			'to_zip1' => array(
				'not_null',
				'regexp' => '/^\\d{3}$/'
			),
			'to_zip2' => array(
				'not_null',
				'regexp' => '/^\\d{4}$/'
			),
			'to_pref' => array(
				'not_null',
			),
			'to_address1' => array(
				'not_null',
				'within' => 100
			),
			'to_tel' => array(
				'not_null',
				'within' => 20
			),
			'name' => array(
				'not_null',
				'within' => 40
			),
			'furigana' => array(
				'not_null',
				'within' => 40
			),
			'gender' => array(
				'not_null',
				'regexp' => '/^[12]$/',
			),
			'age' => array(
				'not_null',
				'regexp' => '/^[1-9]+\\d*$/'
			),
			'zip1' => array(
				'not_null',
				'regexp' => '/^\\d{3}$/'
			),
			'zip2' => array(
				'not_null',
				'regexp' => '/^\\d{4}$/'
			),
			'pref' => array(
				'not_null',
			),
			'address1' => array(
				'not_null',
				'within' => 100
			),
			'tel' => array(
				'not_null',
				'within' => 20
			),
			'mail1' => array(
				'not_null',
				'regexp' => '/^[-\\w\\+\\|?\\.]+@([a-zA-Z0-9]+(-+[a-zA-Z0-9]+)*\\.)+[a-zA-Z0-9]+(-+[a-zA-Z0-9]+)*$/',
				'within' => 60,
				'same' => 'mail2'
			),
			'occupation' => array(
				'not_null',
			),
			'present' => array(
				'not_null',
			),

		);	
	
	
	
		setlocale(LC_ALL,'ja_JP');
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		mb_language('Japanese');
		mb_internal_encoding('UTF-8');
		
		session_start();
		
		$this->mobile = $mobile;
		
		$this->items = array();
		foreach ($this->forms as $form){
			$this->items = array_merge($this->items, $form['items']);
		}
		
		// パラメータ値初期化
		$this->initParameters();
		// 入力値検証
		$this->validate();
		
		$parameters = $this->parameters;
		$this->action = $parameters['action'];
		if(!empty($this->action) && !empty($this->errors))
			$this->action = 'error';
		
		if($this->action == 'confirm'){
			// 確認ページならパラメータをセッションに代入
			$this->setSessionParams();
		}elseif($this->action == 'submit'){
			// 決定ページならDBへ代入
			$this->insertDb();
			if(!empty($this->errors))
				$this->action = 'error';
		}
	}
	
	
	// 入力パラメータの初期化
	private function initParameters(){
		$values = array();
		if(is_array($_SESSION)){
			foreach ($_SESSION as $key => $value){
				$values[$key] = $this->formatValue($value);
			}
		}
		if(is_array($_POST)){
			foreach ($_POST as $key => $value){
				$values[$key] = $this->formatValue($value);
			}	
		}	
		
		// 例外処理をする場合は以下に
		
		// 例外処理: 都道府県名
//		if (array_key_exists('pref', $values))
//		{
//			$values['pref_name'] = $this->prefs[$values['pref']];
//		}
		
		$this->parameters = $values;
	}
	private function formatValue($value) {
		if (is_array($value)) {
			foreach ($value as $key => $val) {
				$value[$key] = $this->formatValue($val);
			}
			return $value;
		}
		
		if($this->mobile){
			$value = mb_convert_encoding($value, 'UTF-8', 'SJIS');
		}
		// magic_quotes_gpc値がONならクォートを取り除く
		if (get_magic_quotes_gpc()) $value = stripslashes($value);
		// 空白を取り除く
		$value = trim($value);
		// 半角カナを全角に、濁点付きの文字を一文字に、全角英数を半角に
		$value = mb_convert_kana($value, 'KVa');
		return $value;
	}
	
	private function setSessionParams(){
		foreach($this->parameters as $key => $value){
			if($key == 'action') continue;
		
			if($this->mobile){
				$value = mb_convert_encoding($value, 'SJIS', 'UTF-8');
			}
			
			$_SESSION[$key] = $value;
		}
	}
	
	// 入力値の検証
	private function validate(){
		$parameters = $this->parameters;
		
		$errors = array();
		
		foreach ($this->items as $name){
			$item = $this->validates[$name];
			// 検証対象にないものは飛ばす
			if (is_null($item)) { continue; }
			
			// 空かどうか
			$has_value = array_key_exists($name, $parameters) && $parameters[$name] != '';
			
			
			$not_null = in_array('not_null', $item);
			$regexp = $item['regexp'];
			$within = $item['within'];
			$either = $item['either'] ? explode(',', $item['either']) : array();
			$same = array_key_exists('same', $item) ? $item['same'] : null;
			
			$has_value_alter = FALSE;
			// どちらかの入力が必須
			if (count($either) > 0)
			{
				$not_null = TRUE;
				if (!$has_value)
					foreach ($either as $alter_name)
					{
						if (array_key_exists($alter_name, $parameters) && $parameters[$alter_name] != '')
						{
							$has_value_alter = TRUE;
							break;
						}
					}
			}
			
			// 入力必須
			if ($not_null && !$has_value && !$has_value_alter)
			{
				$errors[] = '[' . $this->forms[0]['itemJNames'][array_search($name, $this->items)] . ']は、入力又は選択必須項目です';
			}
			// 入力が正規表現にマッチしてるか
			elseif ($has_value && $regexp && !preg_match($regexp, $parameters[$name]))
			{
				$errors[] = '[' . $this->forms[0]['itemJNames'][array_search($name, $this->items)] . ']の入力値が正しくありません';
			}
			// 入力文字数が超えていないか
			elseif ($has_value && $within && mb_strlen($parameters[$name]) > $within)
			{
				$errors[] = '[' . $this->forms[0]['itemJNames'][array_search($name, $this->items)] . ']の入力文字数が制限値を超えています';
			}
			// 入力が同じか
			elseif ($same && $parameters[$same] != $parameters[$name])
			{
				$errors[] = '[' . $this->forms[0]['itemJNames'][array_search($name, $this->items)] . ']に同じ内容が入っていません';
			}
		}
		
		if (count($errors) > 0){
			$this->errors = $errors;
		}
	}
	
	private function insertDb(){
		require_once("DB.php");
		
		$db = new DB();
		$db->startTransaction();
		
		$applicant = array();
		
		foreach($this->items as $value){
			if($value == 'agreement') continue;
			if($value == 'mail2') continue;
			
			$apKey = $value;
			if($apKey == 'mail1') $apKey = 'mail';
			
			$parameters = $this->parameters;
			$applicant[$apKey] = $parameters[$value];
		}
		
		$applicant['remote_host'] = $_SERVER['REMOTE_HOST'];
		$applicant['reg_date'] = date("Y-m-d H:i:s");
		
		$ret = $db->insert("p_naganeko", $applicant);
	
		if(!$ret) {
			$db->rollback();
			$this->errors = array("データの送信に失敗しました");
			return;
		}
		
		$db->commit();
	}
	
	public function getAction(){
		return $this->action;
	}
	
	public function getParameters(){
		return $this->parameters;
	}
	
	public function getErrors(){
		return $this->errors;
	}
}

?>
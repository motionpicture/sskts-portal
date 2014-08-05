<?php

require_once('./Template.inc.php');
require("./PHPMailer/class.phpmailer.php");


class ReservationForm
{
	var $salon_data_file = './salons.csv';

	var $tmpl_dir = './rsv_lp/';

	var $choose_area_tmpl  = 'choose_area.tmpl';
	var $choose_salon_tmpl = 'choose_salon.tmpl';
	var $salon_tmpl        = 'salon.tmpl';
	var $confirm_tmpl      = 'confirm.tmpl';
	var $finish_tmpl       = 'finish.tmpl';

	// 申し込み者宛メール設定
	var $customer_mail_tmpl    = 'customer_mail.tmpl';
	var $customer_mail_sender  = 'バイオテック発毛・育毛無料体験予約';
	var $customer_mail_from    = 'taikenyoyaku@biotech.ne.jp';
	var $customer_mail_from    = 'takanashi@motionpicture.jp';
	var $customer_mail_subject = 'バイオテック発毛・育毛無料体験予約のお申し込み';

	// 管理者宛メール設定
	var $admin_mail_tmpl    = 'admin_mail.tmpl';
	//var $admin_mail_to      = 'sakakibara@fuseeds.co.jp';
	var $admin_mail_to      = 'kariyoyaku@biotech.ne.jp';
	var $admin_mail_to      = 'takanashi@motionpicture.jp';
	//var $admin_mail_to      = 'yun@motionpicture.jp';
	var $admin_mail_sender  = 'ＰＣ%LP%予約';
	var $admin_mail_from    = 'taikenyoyaku@biotech.ne.jp';
	var $admin_mail_from    = 'takanashi@motionpicture.jp';
	var $admin_mail_subject = 'ＰＣ%LP%予約';

	//var $server_admin_mail_to = 'yun@motionpicture.jp';
	var $server_admin_mail_to = 'taikenyoyaku@biotech.ne.jp';
	var $server_admin_mail_to = 'takanashi@motionpicture.jp';

	//9時処理
	var $hours;

	var $anytime = '何時でもOK';
	// 入力項目定義
	var $forms = array(
		array(
			'template' => 'form.tmpl',
			'items' => array(
				//-------------------------------------------------- 081127 Kensuke Sakakibara
				'ppa', 'name_sei','name_mei', 'name_kana_sei', 'name_kana_mei', 'age', 'sex', 'email', 'email_check', 'phone', 'mobile_phone',// 'zip_code', 'pref', 'address',
				//'ppa', 'name', 'name_kana', 'bday_ye', 'bday_mo', 'bday_da', 'sex', 'email', 'email_check', 'phone', 'mobile_phone', 'zip_code', 'pref', 'address',
				//----------------------------------------------------------------------------
				'salon_id', 'date_list',// 'confirm_type', 'confirm_time',
				'enquete_know', 'enquete_know_alt', 'note'
			)
		)
	);

	// 各項目の検証用定義
	var $validates = array(
		'ppa' => array(
			'not_null',
			'regexp' => '/^1$/'
		),
		'name_sei' => array(
			'not_null'
		),
		'name_mei' => array(
			'not_null'
		),
		'name_kana_sei' => array(
			'not_null',
			'mb_regex' => '^[ァ-ヶーｱ-ﾝﾞﾟ]+$'
		),
		'name_kana_mei' => array(
			'not_null',
			'mb_regex' => '^[ァ-ヶーｱ-ﾝﾞﾟ]+$'
		),
		//-------------------------------------------------- 081201 Kensuke Sakakibara
		'age' => array(
			'not_null',
			'regexp' => '/^[1-9]+\\d*$/'
		),
		//----------------------------------------------------------------------------
		'sex' => array(
			'not_null',
			'regexp' => '/^[12]$/'
		),
		'email' => array(
			'not_null',
			'regexp' => '/^[-\\w\\+\\|?\\.]+@([a-zA-Z0-9]+(-+[a-zA-Z0-9]+)*\\.)+[a-zA-Z0-9]+(-+[a-zA-Z0-9]+)*$/',
			'same' => 'email_check'
		),
		'phone' => array(
			'either' => 'mobile_phone',
			'regexp' => '/^[0-9]{10,13}$/'
		),
		'mobile_phone' => array(
			'regexp' => '/^[0-9]{10,13}$/'
		)//,
		//'zip_code' => array(
		//	'not_null',
		//	'regexp' => '/^\\d{3}-?\\d{4}$/'
		//),
		//'pref' => array(
		//	'not_null'
		//),
		//'address' => array(
		//	'not_null'
		//),
		//'confirm_type' => array(
		//	'not_null',
		//	'regexp' => '/^[1234]$/'
		//)//,
		//'enquete_know' => array(
		//	'not_null'
		//)
	);

	var $as_array = array('enquete_know');

	var $date_format = 'm月d日 H時i分s秒';

	var $areas = array(
		1 => '北海道・東北',
		2 => '関東',
		3 => '甲信越・北陸',
		4 => '東海',
		5 => '近畿',
		6 => '中国・四国',
		7 => '九州'
	);

	var $areas_ad_trak_ids = array(
		1 => 'shokai',
		2 => 'skanto',
		3 => 'shoku',
		4 => 'stokai',
		5 => 'skinki',
		6 => 'schugo',
		7 => 'skyu'
	);

	var $prefs = array(
		1 => '北海道',
		2 => '青森県',
		3 => '岩手県',
		4 => '宮城県',
		5 => '秋田県',
		6 => '山形県',
		7 => '福島県',
		8 => '茨城県',
		9 => '栃木県',
		10 => '群馬県',
		11 => '埼玉県',
		12 => '千葉県',
		13 => '東京都',
		14 => '神奈川県',
		15 => '山梨県',
		16 => '長野県',
		17 => '新潟県',
		18 => '富山県',
		19 => '石川県',
		20 => '福井県',
		21 => '岐阜県',
		22 => '静岡県',
		23 => '愛知県',
		24 => '三重県',
		25 => '滋賀県',
		26 => '京都府',
		27 => '大阪府',
		28 => '兵庫県',
		29 => '奈良県',
		30 => '和歌山県',
		31 => '鳥取県',
		32 => '島根県',
		33 => '岡山県',
		34 => '広島県',
		35 => '山口県',
		36 => '徳島県',
		37 => '香川県',
		38 => '愛媛県',
		39 => '高知県',
		40 => '福岡県',
		41 => '佐賀県',
		42 => '長崎県',
		43 => '熊本県',
		44 => '大分県',
		45 => '宮崎県',
		46 => '鹿児島県',
		47 => '沖縄県'
	);

	var $confirm_times = array(
		1 => 'いつでもOK',
		2 => '12-13時',
		3 => '13-14時',
		4 => '14-15時',
		5 => '15-16時',
		6 => '16-17時',
		7 => '17-18時',
		8 => '18-19時',
		9 => '19-20時',
		10 => '20-21時'
	);

	var $parameters = array();
	var $items = array();


	// コンストラクタ
	function ReservationForm()
	{

		setlocale(LC_ALL,'ja_JP');
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		mb_language('Japanese');
		mb_internal_encoding('SJIS');

		$today = getdate();
		$this->hours=$today['hours'];

		$this->items = array();
		foreach ($this->forms as $form)
		{
			$this->items = array_merge($this->items, $form['items']);
			$this->items[] = 'type';
			$this->items[] = 'lp';
			$this->items[] = 'link_id';
		}

		$this->init_parameters();

		$this->validate();

		$parameters = &$this->parameters;
		$page = $parameters['page'];

		$go_page = -1;

		// サロン選択画面へのショートカット
		if (array_key_exists('area', $parameters))
		{
			$area = $parameters['area'];
			if (array_key_exists($area, $this->areas))
			{
				$page = 'area';
				$parameters['area-'. $area] = TRUE;
			}
		}
		// サロン詳細画面へのショートカット
		elseif (array_key_exists('salon', $parameters))
		{
			$salons = $this->get_salons();
			foreach ($salons as $salon)
			{
				if ($salon['salon_id'] === $parameters['salon'] ||
					$salon['salon_id'] === $parameters['salon_id'])
				{
					if (preg_match('/^[0-9]+$/', $page))
					{
						$parameters['from_form'] = TRUE;
						$parameters['before_form'] = $page;
					}
					$page = 'choose_salon';
					$parameters['salon-'. $salon['salon_id']] = TRUE;
					$this->selected_salon = $salon;
					break;
				}
			}
		}
		elseif (array_key_exists('back_to_form', $parameters))
		{
			$page = 'form';
			$go_page = $parameters['before_form'];
		}


		// エリア選択
		if ($page === 'area')
		{
			foreach ($this->areas as $code => $name)
			{
				if (array_key_exists('area-'. $code, $parameters))
				{
					$go_page = 'choose_salon';
					$area_code = $code;
					break;
				}
			}
		}

		// サロン選択
		elseif ($page === 'choose_salon' || $page === 'salon')
		{
			$salons = $this->get_salons();
			foreach ($salons as $salon)
			{
				if (array_key_exists('salon-'. $salon['salon_id'], $parameters))
				{
					$go_page = 'salon';
					$salon_id = $salon['salon_id'];
					$this->selected_salon = $salon;
					break;
				}
				elseif (array_key_exists('salon-rsv-'. $salon['salon_id'], $parameters))
				{
					$go_page = 0;
					$parameters['salon_id'] = $salon['salon_id'];
					$this->selected_salon = $salon;
					break;
				}
			}
		}

		// フォーム遷移
		else
		{
			$next = $parameters['next'];
			$prev = $parameters['prev'];
			if ($next || $prev)
			{
				$page = $parameters['page'];
				if ($page == 'confirm')
				{
					$go_page = $next ? 'finish' : count($this->forms) - 1;
				}
				elseif (preg_match('/^[0-9]+$/', $page))
				{
					$go_page = $next ? ($page + 1 >= count($this->forms) ? 'confirm' : $page + 1) : max(-1, $page - 1);
				}
			}
		}

		// 遷移実行
		if ($go_page === 'finish')
		{
			$this->finish();
		}
		elseif ($go_page === 'confirm')
		{
			$this->confirm();
		}
		elseif ($go_page === 'choose_salon')
		{
			$this->choose_salon($area_code);
		}
		elseif ($go_page === 'salon')
		{
			$this->salon($salon_id);
		}
		elseif ($go_page === -1)
		{
			$this->choose_area();
		}
		else {
			$this->form($go_page);
		}
	}


	// 入力パラメータの初期化 バックした時も
	function init_parameters()
	{
		$values = array();
		foreach ($_GET as $key => $value)
		{
			if (substr($key, strlen($key) - 2) == '_x') {
				$key = substr($key, 0, strlen($key) - 2);
			}
			if (substr($key, strlen($key) - 2) == '_y') {
				continue;
			}

			$values[$key] = $this->format_value($value);

		}
		foreach ($_POST as $key => $value)
		{
			if (substr($key, strlen($key) - 2) == '_x') {
				$key = substr($key, 0, strlen($key) - 2);
			}
			if (substr($key, strlen($key) - 2) == '_y') {
				continue;
			}
			$values[$key] = $this->format_value($value);
		}

		if ($values['sdata']) {
			$values = array_merge($this->unserialize_array($values['sdata']), $values);
			unset($values['sdata']);
		}

		// 例外処理: 都道府県名
		if (array_key_exists('pref', $values))
		{
			$values['pref_name'] = $this->prefs[$values['pref']];
		}

		// 例外処理: ご予約確認希望時間
		if (array_key_exists('confirm_time', $values))
		{
			$values['confirm_time_label'] = $this->confirm_times[$values['confirm_time']];
		}

		// 例外処理: 予約希望サロンの処理
		if (array_key_exists('salon_id', $values))
		{
			$salons = $this->get_salons();
			foreach ($salons as $salon)
			{
				if ($salon['salon_id'] === $values['salon_id'])
				{
					$this->selected_salon = $salon;
					$values['salon_name'] = $salon['salon_name'];
					break;
				}
			}
		}

		// 例外処理: 希望日時の処理
		$dates = $values['dates'];
		if (is_array($dates))
		{
			$date_list = array();
			foreach ($dates as $date)
			{
				$date_list[] = implode('-', $date);
			}
			$date_list = implode('%', $date_list);
			$values['date_list'] = $date_list;
		}
		elseif ($values['date_list'])
		{
			$date_list = explode('%', $values['date_list']);
			$dates = array();
			foreach ($date_list as $date)
			{
				$dates[] = explode('-', $date);
			}
			$values['dates'] = $dates;
		}
		if ($values['dates'])
		{
			for ($i = 0; $i < count($values['dates']); $i++)
			{
				$date = $values['dates'][$i];
				//yun 何時でもOK
				if ($date[2] == $this->anytime) {
					$values['date'. $i] = sprintf('%d月%d日 %s', $date[0], $date[1], $date[2]);
				} else {
					$values['date'. $i] = sprintf('%d月%d日 %s:%s', $date[0], $date[1], substr($date[2], 0, 2), substr($date[2], 2, 2));
				}

			}
		}

		//-------------------------------------------------------------------------------fujii
		if($this->is_mobile()){
			$get_parameters = "";
			if(!empty($_GET)){
				foreach ($_GET as $key => $value)
				{
					if (substr($key, strlen($key) - 2) == '_x') {
						$key = substr($key, 0, strlen($key) - 2);
					}
					if (substr($key, strlen($key) - 2) == '_y') {
						continue;
					}

					$get_parameters .= $key."=".$this->format_value($value)."&";
				}
				//$get_parameters = substr($get_parameters,0,strlen($get_parameters) - 1);
				header("Location: http://www.biotech.ne.jp/cgi-bin/sp.php?".$get_parameters."from=rsv_lp");
				exit;
			}
			header("Location: http://www.biotech.ne.jp/cgi-bin/sp.php?from=rsv_lp");
			exit;
		}
		//-------------------------------------------------------------------------------

		$this->parameters = $values;
	}

	//データがある場合はデータをセット
	function format_value($value) {
		if (is_array($value)) {
			foreach ($value as $key => $val) {
				$value[$key] = $this->format_value($val);
			}
			return $value;
		}

		$value = mb_convert_encoding($value, 'SJIS');
		if (get_magic_quotes_gpc()) $value = stripslashes($value);
		$value = rtrim($value);
		$value = trim($value);
		$value = mb_convert_kana($value, 'KVa');
		return $value;
	}


	// アウトプット
	function output($html) {
		header('Content-Type: text/html; charset=Shift_JIS');
		echo $html;
		exit;
	}


	// 共通テンプレート処理
	function common_template_process(&$template, $deny_list = null)
	{
		$template->param('HTTP_HOST', $_SERVER['HTTP_HOST']); //081117 Kensuke Sakakibara
		if ((false === empty($_SERVER['HTTPS']))&&('off' !== $_SERVER['HTTPS']))
			$template->param('SSL', TRUE);

		$template->param($this->parameters);
		$template->param('SDATA', $this->serialize_array($this->parameters, $deny_list));

		$template->param('IMG_EXT', '.jpg');

		// 携帯端末キャリア判別（モバイル版のみ）
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if (preg_match("/^(UP.Browser|KDDI)/", $agent))
		{
			$template->param('MOBILE_TYPE', 'e');
			$template->param('MOBILE_TYPE2', 'ez');
			$template->param('IMG_EXT', '.png');
		}
		elseif (preg_match("/^(J-PHONE|Vodafone|SoftBank)/", $agent))
		{
			$template->param('MOBILE_TYPE', 's');
			$template->param('MOBILE_TYPE2', 'sbm');
			$template->param('IMG_EXT', '.png');
		}
		//elseif (preg_match("/^DoCoMo/", $agent))
		else
		{
			$template->param('MOBILE_TYPE', 'i');
			$template->param('MOBILE_TYPE2', 'i');
			$template->param('IMG_EXT', '.gif');
		}
	}


	// View: エリア選択
	function choose_area()
	{
		$template = new Template($this->tmpl_dir. $this->choose_area_tmpl);
		$this->common_template_process($template);
		$this->output($template->output());
	}


	// View: サロン選択
	function choose_salon($area_code)
	{


		$all_salons = $this->get_salons();
		$salons = array();

		//ループ回数
		$i = 0;

		foreach ($all_salons as $key => $salon)
		{
			if ($salon['salon_area_code'] == $area_code){
				$salons[] = $salon;

				//$salonsに県名記載の判定条件を追加
				if ($i == 0 || $salons[$i]['salon_pref'] != $salons[$i-1]['salon_pref']){
					$salons[$i]['print_pref'] = 1;
				}else{
					$salons[$i]['print_pref'] = 0;
				}
			$i++;
			}
		}

		$template = new Template($this->tmpl_dir. $this->choose_salon_tmpl);
		$this->common_template_process($template);
		$template->param('area_name', $this->areas[$area_code]);
		$template->param('salons', $salons);
		$template->param('area_ad_trak_id', $this->areas_ad_trak_ids[$area_code]);

		//yun

		if ($area_code == 1) {
			$template->param('title',"北海道・東北（北海道・岩手・宮城・福島）エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"北海道・東北,北海道,岩手,宮城,福島,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"北海道・東北エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");
		}elseif($area_code == 2){
			$template->param('title',"関東（東京・神奈川・埼玉・千葉・栃木・群馬・茨城）エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"関東,東京,神奈川,埼玉,千葉,栃木,群馬,茨城,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"関東エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");

		}elseif($area_code == 3){
			$template->param('title',"甲信越・北陸(長野・山梨・新潟・石川)エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"甲信越・北陸,長野,山梨,新潟,石川,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"甲信越・北陸エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");
		}elseif($area_code == 4){
			$template->param('title',"東海(愛知・岐阜・三重・静岡)エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"東海,愛知,岐阜,三重,静岡,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"東海エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");
		}elseif($area_code == 5){
			$template->param('title',"近畿(大阪・京都・兵庫)エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"近畿,大阪,京都,兵庫,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"近畿エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");
		}elseif($area_code == 6){
			$template->param('title',"中国・四国(岡山・広島・徳島・愛媛)エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"中国・四国,岡山,広島,徳島,愛媛,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"中国・四国エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");
		}elseif($area_code == 7){
			$template->param('title',"九州(福岡・長崎・熊本・大分)エリア - W無料体験全国サロン検索 | 発毛・育毛サロン「バイオテック」");
			$template->param('keywords',"九州,福岡,長崎,熊本,大分,W無料体験全国サロン検索,発毛,育毛");
			$template->param('description',"九州エリアのサロンを検索します。日夜研究と努力を続けてきたバイオテックは、発毛・育毛分野における日本初の特許取得、高い発毛・育毛技術と信頼をモットーにトータルケアを実現してまいります。");
		} else {
			$template->param('title',"発毛・育毛“無料体験”が試せる発毛・育毛専門サロン「バイオテック」 | W無料体験全国サロン検索");
			$template->param('keywords',"バイオテック,バイオテックヘアー,育毛,育毛サロン,発毛,育毛剤,育毛シャンプー");
			$template->param('description',"バイオテックのW無料体験全国サロン検索ページ");
		}
		$this->output($template->output());
	}


	// View: サロン詳細
	function salon($salon_id)
	{
		$all_salons = $this->get_salons();
		foreach ($all_salons as $salon)
		{
			if ($salon['salon_id'] == $salon_id)
			{
				$match_salon = $salon;
			}
		}
		if (!$match_salon)
		{
			$this->choose_area();
			return;
		}


		$conversion ="";
		switch ($this->parameters['lp'])
		{
			case 'y':
				$conversion ="salon_yahoo";
				break;
			case 'g':
				$conversion ="salon_adw";
				break;
			case 'ys':
				$conversion ="salon_yahoo_satellite";
				break;
			case 'gs':
				$conversion ="salon_google_satellite";
				break;
		}

		$template = new Template($this->tmpl_dir. $this->salon_tmpl);
		$this->common_template_process($template);
		$template->param('conversion', $conversion);
		$template->param($match_salon);
		$this->output($template->output());
	}


	// View: 入力画面
	function form($index, $errors = null)
	{
		$form = $this->forms[$index];

		$template = new Template($this->tmpl_dir. $form['template']);
		$this->common_template_process($template, $form['items']);

		$conversion ="";
		switch ($this->parameters['lp'])
		{
			case 'y':
				$conversion ="entry_yahoo";
				break;
			case 'g':
				$conversion ="entry_adw";
				break;
			case 'ys':
				$conversion ="entry_yahoo_satellite";
				break;
			case 'gs':
				$conversion ="entry_google_satellite";
				break;
		}

		//-------------------------------------------------- 081127 Kensuke Sakakibara
		$template->param('bday_ye', $this->create_bday_ye());
		$template->param('bday_mo', $this->create_bday_mo());
		$template->param('bday_da', $this->create_bday_da());
		//----------------------------------------------------------------------------

		if (in_array('pref', $form['items']))
		{
			$template->param('prefs', $this->create_prefs());
		}
		if (in_array('salon_id', $form['items']))
		{
			$template->param('areas', $this->get_areas());
		}
		if (in_array('date_list', $form['items']))
		{
			$this->create_date($template, 0);
			$this->create_date($template, 1);
			//$this->create_date($template, 2);
		}
		if (in_array('confirm_time', $form['items']))
		{
			$template->param('confirm_times', $this->create_confirm_times());
		}

		if ($errors)
		{
			$template->param('errors', $errors);
			$template->param($errors);
		}

		if ($this->hours >= 9) {
				//明日
			//$template->param('ninehours1', '※当日ご希望の方は朝9時までにご予約をお済ませください。');
			$template->param('ninehours2', '<p>※本日ご希望の方は、フリーダイヤル<span class="free-dial-318255">0120-318255</span>にてご予約を承ります。</p>');
			$template->param('ninehours3', '明日');

		} else {
				//本日
			$template->param('ninehours1', '※本日ご希望の場合、当予約フォームでの予約受付は朝9時までとなっております。<br>朝9時以降は、直接フリーダイヤル<span class="free-dial-318255">0120-318255</span>にてご予約を承ります。');
			$template->param('ninehours3', '本日');

		}




		$template->param('conversion', $conversion);

		$this->output($template->output());
	}

	//-------------------------------------------------- 081127 Kensuke Sakakibara
	function create_bday_ye() {
		$results = array();
		$current_year = date("Y");
		for ($i = 1935; $i <= $current_year - 3; $i++) {
			$results[] = array(
				'value' => $i,
				'name' => $i,
				'selected' => $this->parameters['bday_ye'] == $i
			);
		}
		return $results;
	}

	function create_bday_mo() {
		$results = array();
		for ($i = 1; $i <= 12; $i++) {
			$results[] = array(
				'value' => $i,
				'name' => $i,
				'selected' => $this->parameters['bday_mo'] == $i
			);
		}
		return $results;
	}

	function create_bday_da() {
		$results = array();
		for ($i = 1; $i <= 31; $i++) {
			$results[] = array(
				'value' => $i,
				'name' => $i,
				'selected' => $this->parameters['bday_da'] == $i
			);
		}
		return $results;
	}
	//----------------------------------------------------------------------------

	function create_prefs()
	{
		$prefs = $this->prefs;
		$results = array();
		foreach ($prefs as $value => $pref)
		{
			$results[] = array(
				'value' => $value,
				'name' => $pref,
				'selected' => array_key_exists('pref', $this->parameters) ? ($this->parameters['pref'] == $value)
					: ($this->selected_salon ? ($pref == $this->selected_salon['salon_pref']) : FALSE)
			);
		}
		return $results;
	}
	function create_confirm_times()
	{
		$confirm_times = $this->confirm_times;
		$results = array();
		foreach ($confirm_times as $value => $confirm_time)
		{
			$results[] = array(
				'value' => $value,
				'label' => $confirm_time,
				'selected' => $this->parameters['confirm_time'] == $value
			);
		}
		return $results;
	}

	//予約情報の日付の生成
	function create_date(&$template, $index)
	{
		$dates = $this->parameters['dates'];

		$nearest_reservable_date = strtotime('+1 days');

		//yun
		if ($this->hours >=9 ) {
			//翌日
			$nearest_reservable_date = strtotime('+1 days');
		} else {
			//本日
			$nearest_reservable_date = strtotime('+0 days');
		}

		$date = is_array($dates) ? $dates[$index] :
			array(date('m', $nearest_reservable_date), date('d', $nearest_reservable_date));

		$MON_LIST = array();
		for ($i = 1; $i <= 12; $i++)
		{
			$MON_LIST[] = array(
				'VALUE' => $i,
				'LABEL' => $i,
				'SELECTED' => $date[0] == $i
			);
		}
		$template->param('DATE'. $index. '0_LIST', $MON_LIST);

		$DATE_LIST = array();
		for ($i = 1; $i <= 31; $i++)
		{
			$DATE_LIST[] = array(
				'VALUE' => $i,
				'LABEL' => $i,
				'SELECTED' => $date[1] == $i
			);
		}
		$template->param('DATE'. $index. '1_LIST', $DATE_LIST);

		$HOUR_LIST = array();

		//yun 追加
		$HOUR_LIST[] = array(
			'VALUE' => $this->anytime,
			'LABEL' => $this->anytime,
			'SELECTED' => $date[2] == $this->anytime
		);
		for ($i = 10; $i <= 19.5; $i += .5)	{
			$value = intval($i). (intval($i) == $i ? '00' : '30');
			$label = intval($i). ':'. (intval($i) == $i ? '00' : '30');
			$HOUR_LIST[] = array(
				'VALUE' => $value,
				'LABEL' => $label,
				'SELECTED' => $date[2] == $value
			);
		}
		$template->param('DATE'. $index. '2_LIST', $HOUR_LIST);
	}



	// View: 確認画面
	function confirm()
	{

		$conversion ="";
		switch ($this->parameters['lp'])
		{
			case 'y':
				$conversion ="conf_yahoo";
				break;
			case 'g':
				$conversion ="conf_adw";
				break;
			case 'ys':
				$conversion ="conf_yahoo_satellite";
				break;
			case 'gs':
				$conversion ="conf_google_satellite";
				break;
		}

		$template = new Template($this->tmpl_dir. $this->confirm_tmpl);
		$template->param('conversion', $conversion);
		$this->common_template_process($template);
		$this->output($template->output());
	}


	// View: 完了画面
	function finish()
	{
		$kubun = "19";
		// ランディングページ処理
		$lp = '';
		$conversion ="";
		switch ($this->parameters['lp'])
		{
			case 'y':
				$lp = "Yahoo リスティング";
				$kubun="12";
				$conversion ="finish02";
				break;
			case 'g':
				$lp = "Google リスティング";
				$kubun="13";
				$conversion ="finish03";
				break;
			case 'ys':
				$lp = "Yahoo サテライト";
				$kubun="30";
				$conversion ="finish08";
				break;
			case 'gs':
				$lp = "Google サテライト";
				$kubun="31";
				$conversion ="finish09";
				break;
		}

//		$url = 'https://biotech.secure.force.com/WebToLeadAndReturn';

//fuji追加
$sex = '';
$enquete_know = '';

if($this->parameters['sex'] == '1'){
	$sex = '男性';
}else if($this->parameters['sex'] == '2'){
	$sex = '女性';
}

if($this->parameters['enquete_know'] == '1'){
	$enquete_know = 'ＴＶ';
}else if($this->parameters['enquete_know'] == '2'){
	$enquete_know = 'インターネット';
}else if($this->parameters['enquete_know'] == '3'){
	$enquete_know = '雑誌・フリーペーパー';
}else if($this->parameters['enquete_know'] == '4'){
	$enquete_know = '新聞';
}else if($this->parameters['enquete_know'] == '5'){
	$enquete_know = 'その他';
}

		//fuji追加
		$datas = array(
		    'last_name' => $this->parameters['name_sei'],
		    'first_name' => $this->parameters['name_mei'],
		    'last_name_local' =>  $this->parameters['name_kana_sei'],
		    'first_name_local' => $this->parameters['name_kana_mei'],
		    '00N10000001dSLb' => $this->parameters['age'],
		    '00N10000001dSOL' => $sex,
		    'email' => $this->parameters['email'],
//		    'email_check' => $this->parameters['email_check'],
		    'phone' => $this->parameters['phone'],
		    'mobile' => $this->parameters['mobile_phone'],
		    'company' =>  $this->parameters['salon_name'],
		    '00N10000001dcOT' => $this->parameters['dates'][0][0],
		    '00N10000001dcOY' => $this->parameters['dates'][0][1],
		    '00N10000001dSKj' => $this->parameters['dates'][0][2],
		    '00N10000001dcOd' => $this->parameters['dates'][1][0],
		    '00N10000001dcOi' => $this->parameters['dates'][1][1],
		    '00N10000001dSPE' => $this->parameters['dates'][1][2],
		    '00N10000001dcOs' => $enquete_know,
		    '00N10000001dcOn' => $this->parameters['note'],
		    '00N10000001dc0y' => $kubun,
		    'oid' => '00D10000000IPl4',
		);
		//fuji追加
//		$ez_result =$this->postRequest($url, $datas,5);

		//phpmailer
		$mail = new PHPMailer();
		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = "54.249.43.16:25";  // specify main and backup server
		$mail->SMTPAuth = false;     // turn on SMTP authentication
		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(false);                                  // set email format to HTML
		$mail->From = $this->admin_mail_from;
		$mail->FromName =  mb_encode_mimeheader($this->customer_mail_from);

		//yun
		// 管理者宛メール送信
		$mail_template = new Template($this->tmpl_dir. $this->admin_mail_tmpl);
		$this->common_template_process($mail_template);
		$mail_template->param('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);
		$mail_template->param('REMOTE_HOST', gethostbyaddr($_SERVER['REMOTE_ADDR']));
		$mail_template->param('USER_AGENT', $_SERVER['HTTP_USER_AGENT']);
		$mail_template->param('DATE', date("Y")."年".date($this->date_format));

		$this->admin_mail_sender = str_replace("%LP%", $lp, $this->admin_mail_sender);

		$mail->AddAddress($this->admin_mail_to);
		$mail->Subject = str_replace("%LP%", $lp, $this->admin_mail_subject);
		$mail->Body    = mb_convert_encoding($mail_template->output(),"ISO-2022-JP","SJIS");
		$mail->Send();

		//ezbis start
		if ($ez_result == 000000 || !$ez_result) {

			// ezbisの連携が失敗した場合
			$mail_template = new Template($this->tmpl_dir. $this->admin_mail_tmpl);
			$this->common_template_process($mail_template);
			$mail_template->param('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);
			$mail_template->param('REMOTE_HOST', gethostbyaddr($_SERVER['REMOTE_ADDR']));
			$mail_template->param('USER_AGENT', $_SERVER['HTTP_USER_AGENT']);
			$mail_template->param('DATE', date("Y")."年".date($this->date_format));

			$mail->AddAddress($this->server_admin_mail_to);
			$mail->Subject = mb_encode_mimeheader(str_replace("%LP%", $lp, $bc ? $this->admin_mail_subject_bioclub : $this->admin_mail_subject)."の申し込みはsales forceとの連携に失敗しました。");
			$mail->Body    = mb_convert_encoding($mail_template->output(),"ISO-2022-JP","SJIS");
			$mail->Send();
		}
		//ezbis end

		// 申し込み者宛メール送信
		$mail_template = new Template($this->tmpl_dir. $this->customer_mail_tmpl);
		$this->common_template_process($mail_template);
		$mail_template->param('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);
		$mail_template->param('REMOTE_HOST', gethostbyaddr($_SERVER['REMOTE_ADDR']));
		$mail_template->param('USER_AGENT', $_SERVER['HTTP_USER_AGENT']);
		$mail_template->param('DATE', date("Y")."年".date($this->date_format));

		$mail->AddAddress($this->parameters['email']);
		$mail->Subject = mb_encode_mimeheader($this->customer_mail_subject);
		$mail->Body    = mb_convert_encoding($mail_template->output(),"ISO-2022-JP","SJIS");
		$mail->Send();


		$template = new Template($this->tmpl_dir. $this->finish_tmpl);
		//プレイヤーズライフ対応 2009 12 13

		$template->param('temp_reservation_id', $ez_result);

		$template->param('playerlife', urlencode($this->parameters['email']));
		$template->param('conversion', $conversion);
		$template->param('lp', $this->parameters['lp']);
		$this->common_template_process($template);
		$this->output($template->output());
	}

   /**
     * POSTリクエストを送信する (プロトコルは http のみに対応)
     *
     * for PHP 4
     *
     * @param string $uri 送信先URI (http://～)
     * @param array $data 送信するデータ array('name'=>'value', ...)
     * @param float $timeout タイムアウト秒
     * @return boolean
     * @access public
     * @static
     */
    function postRequest($uri, $data, $timeout = 60)
    {
        $elem = parse_url($uri);
        $host = $elem['host'];
        $path = $elem['path'];
        $scheme = $elem['scheme'];

        if (strtolower($scheme) !== 'https') {
            return false;
        }

        $sock = fsockopen('ssl://'.$host, 443, $errno, $errstr, $timeout);
        if ( ! $sock) {
            //return "$errstr ($errno)\n";
            return false;
        }

        $params = array();
        foreach ($data as $k => $v) {
            $params[] = $k . '=' . urlencode(mb_convert_encoding($v, "UTF-8", "SJIS"));
        }
        $param = implode('&', $params);

                  $ret = fwrite($sock, "POST $path HTTP/1.0\r\n");
        if ($ret) $ret = fwrite($sock, "Host: $host\r\n");
        if ($ret) $ret = fwrite($sock, "Content-type: application/x-www-form-urlencoded\r\n");
        if ($ret) $ret = fwrite($sock, "Content-length: " . strlen($param) . "\r\n");
        if ($ret) $ret = fwrite($sock, "Accept: */*\r\n");
        if ($ret) $ret = fwrite($sock, "\r\n");
        if ($ret) $ret = fwrite($sock, "$param\r\n");
        if ($ret) $ret = fwrite($sock, "\r\n");

	    while (!feof($sock)) {
	       $result=fgets($sock, 4028);
	    }

        fclose($sock);


        return $result;
    }





	// 入力値の検証
	function validate()
	{
		$parameters = $this->parameters;
		if (!$parameters['next']) return;

		$errors = array();

		$items = array();
		$page = $this->parameters['page'];
		$is_form = TRUE;

		if (preg_match('/^[0-9]+$/', $page) && $page >= 0 && $page < count($this->forms))
		{
			$form = $this->forms[$page];
			$items = $form['items'];
			$is_form = TRUE;
		}
		else
		{
			$items = array();
			foreach ($this->forms as $form)
			{
				$items = array_merge($items, $form['items']);
			}
			$is_form = FALSE;
		}

		foreach ($items as $name)
		{
			//for文で検証定義を取得し、検証し、ない場合はエラーを格納する。
			$item = $this->validates[$name];
			$has_value = array_key_exists($name, $parameters) && $parameters[$name] != '';

			//-------------------------------------------------- 081127 Kensuke Sakakibara
			//if (is_null($item)) { continue; }
			//----------------------------------------------------------------------------

			$not_null = in_array('not_null', $item);
			$regexp = $item['regexp'];
			$mb_regex = $item['mb_regex'];
			$either = $item['either'] ? explode(',', $item['either']) : array();
			$same = $is_form && array_key_exists('same', $item) ? $item['same'] : null;

			$has_value_alter = FALSE;
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

			if ($not_null && !$has_value && !$has_value_alter)
			{
				$errors[$name. ':null'] = TRUE;
				$errors['error:'. $name] = TRUE;
			}
			elseif ($has_value && $regexp && !preg_match($regexp, $parameters[$name]))
			{
				$errors[$name. ':invalid'] = TRUE;
				$errors['error:'. $name] = TRUE;
			}
			elseif ($has_value && $mb_regex)
			{
				mb_regex_encoding('sjis');

				if (!mb_ereg($mb_regex, $parameters[$name])) {
					$errors[$name. ':invalid'] = TRUE;
					$errors['error:'. $name] = TRUE;
				}
			}
			elseif ($same && $parameters[$same] != $parameters[$name])
			{
				$errors[$name. ':same_check'] = TRUE;
				$errors['error:'. $name] = TRUE;
			}

			//-------------------------------------------------- 081127 Kensuke Sakakibara
			/*
			// 生年月日
			$bday_ye = $parameters['bday_ye'];
			$bday_mo = $parameters['bday_mo'];
			$bday_da = $parameters['bday_da'];
			if (!$bday_ye || !$bday_mo || !$bday_da) {
				$errors['bday:null'] = TRUE;
			}
			elseif (!checkdate($bday_mo, $bday_da, $bday_ye)) {
				$errors['bday:invalid'] = TRUE;
				$errors['error:bday'] = TRUE;
			}
			*/
			//---------------------------------------------------------------------------

			// サロン
			elseif ($name == 'salon_id')
			{
				$salons = $this->get_salons();
				$found_salon = FALSE;
				foreach ($salons as $salon)
				{
					if ($salon['salon_id'] == $parameters[$name])
					{
						$found_salon = TRUE;
						break;
					}
				}
				if (!$found_salon)
				{
					$errors[$name. ':invalid'] = TRUE;
					$errors['error:'. $name] = TRUE;
				}
			}


			// 日付
			elseif ($name == 'date_list')
			{

				if ($this->hours >=9 ) {
					$from = date('Ymd', strtotime("+1 days")); // 1日後から
				} else {
					$from = date('Ymd', strtotime("+0 days")); // 1日後から
				}
				$to = date('Ymd', strtotime("+1 month")); // 1ヶ月後まで

				$dates = $parameters['dates'];
				for ($i = 0; $i < count($dates); $i++)
				{
					$date = $dates[$i];
					$mon = $date[0];
					$mday = $date[1];
					$hours = $date[2];
					$date = sprintf('%02d%02d%04d', $mon, $mday, $hours);

					$now_month = date('m');
					//$year = intval(date('Y'. $date)) >= $now ? date('Y') : (intval(date('Y')) + 1);

					if ($now_month == "12" && $mon != "12") {
						$year = date('Y', strtotime("+1 month"));
					} else {
						$year = date('Y');
					}


					$date = $year. $date;
					$date = substr($date, 0, 8);
					if (!checkdate($mon, $mday, $year))
					{
						$errors['date'. $i. ':invalid'] = TRUE;
						$errors['error:date'. $i] = TRUE;
					}
					elseif (!($from <= $date && $date <= $to))
					{
						$errors['date'. $i. ':range'] = TRUE;
						$errors['error:date'. $i] = TRUE;
					}
				}
			}
		}

		if (count($errors) > 0)
		{
			$this->form($is_form ? $page : 0, $errors);
		}
	}


	// サロンを取得
	function get_salons()
	{
		if ($this->salons) return $this->salons;
		$salons = array();
		$fp = fopen($this->salon_data_file, 'r');
		$count = 0;
		while (($data = $this->fgetcsv_reg($fp)) !== FALSE)
		{
			if ($count++ == 0) continue;

			// ACTIVE,SALON_ID(AD-TRAK-ID),VISIONALIST_ID,NAME,AREA-CODE,ZIP-CODE,PREF,ADDRESS,PHONE,ACCESS,EMAIL,REGULARY-HOLIDAY,BIZ-HOURS,STATION,LANDMARK

			$salon = array(
				active => $data[0],
				ad_trak_id => sprintf('%05d', intval($data[1])),
				salon_id => sprintf('%03d', intval($data[2])),
				salon_name => $data[3],
				salon_area_code => $data[4],
				salon_zip_code => $data[5],
				salon_pref => $data[6],
				salon_address => $data[7],
				salon_phone => $data[8],
				salon_access => $data[9],
				salon_email => $data[10],
				salon_regular_holiday => $data[11],
				salon_biz_hours => $data[12],
				salon_station => $data[13],
				salon_landmark => $data[14],
				salon_info1 => $data[15],
				salon_info2 => $data[16],
				salon_map => $data[18]
			);
			if (!$salon['active']) continue;
			$salons[] = $salon;
		}
		fclose($fp);
		$this->salons = $salons;
		return $salons;
	}


	// サロンエリアを取得
	function get_areas()
	{
		$tmp_areas = array();
		foreach ($this->areas as $area_code => $area_name)
		{
			$tmp_areas[$area_code] = array(
				'name' => $area_name,

				'salons' => array()
				);
		}

		$salons = $this->get_salons();
		foreach ($salons as $salon)
		{
			$tmp_areas[$salon['salon_area_code']]['salons'][] = array(
				'salon_id' => $salon['salon_id'],
				'salon_name' => $salon['salon_name'],
				'selected' => $this->parameters['salon_id'] == $salon['salon_id']
			);
		}

		$areas = array();
		foreach ($tmp_areas as $area)
		{
			$areas[] = $area;
		}

		return $areas;
	}

	// シリアライズ、デシリアライズ
	function serialize_array($array, $deny_list = null)
	{
		if (!is_array($array)) return;
		$data_array = array();

		if (count(array_keys($array)) > 0) 	{
			foreach ($array as $key => $value)	{
				if (!in_array($key, $this->items)) {
					continue;
				}
				if ($deny_list && in_array($key, $deny_list)) {
					continue;
				}

				$data_array[] = $key;
				//チェックボックスのみ
				//if (in_array($key, $this->as_array)) {
				//	$value = implode(':', $value);
				//}

				$data_array[] = $value;
			}
		}
		$contents = array();
		if (count($data_array)) foreach($data_array as $content)
		{
			$content = str_replace('"', '""', $content);
			if(preg_match('/[",\r\n]/', $content)) $content = '"'. $content. '"';
			$contents[] = $content;
		}
		return join(',', $contents);
	}
	function unserialize_array($str)
	{
		$data_array = array();
		$str = preg_replace('/(?:\r\n|[\r\n])?$/', ',', $str);
		while(preg_match('/("[^"]*(?:""[^"]*)*"|[^,]*),/', $str, $match))
		{
			$data_array[] = str_replace('""', '"', preg_replace('/^"(.*)"$/s', '$1', $match[1]));
			$str = preg_replace('/(?:"[^"]*(?:""[^"]*)*"|[^,]*),/', '', $str, 1);
		}
		$result_array = array();
		for ($i = 0; $i < count($data_array); $i += 2)
		{
			$key = $data_array[$i];
			$value = $data_array[$i + 1];
			//チェックボックスのみ
			//if (in_array($key, $this->as_array)) $value = explode(':', $value);
			$result_array[$key] = $value;
		}
		return $result_array;
	}


	function fgetcsv_reg (&$handle, $length = null, $d = ',', $e = '"') {
		$d = preg_quote($d);
		$e = preg_quote($e);
		$_line = "";
		while ($eof != true) {
			$_line .= (empty($length) ? fgets($handle) : fgets($handle, $length));
			$itemcnt = preg_match_all('/'.$e.'/', $_line, $dummy);
			if ($itemcnt % 2 == 0) $eof = true;
		}
		$_csv_line = preg_replace('/(?:\r\n|[\r\n])?$/', $d, trim($_line));
		$_csv_pattern = '/('.$e.'[^'.$e.']*(?:'.$e.$e.'[^'.$e.']*)*'.$e.'|[^'.$d.']*)'.$d.'/';
		preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
		$_csv_data = $_csv_matches[1];
		for($_csv_i=0;$_csv_i<count($_csv_data);$_csv_i++){
			$_csv_data[$_csv_i]=preg_replace('/^'.$e.'(.*)'.$e.'$/s','$1',$_csv_data[$_csv_i]);
			$_csv_data[$_csv_i]=str_replace($e.$e, $e, $_csv_data[$_csv_i]);
		}
		return empty($_line) ? false : $_csv_data;
	}
	//-------------------------------------------------------------------------------fujii
	function is_mobile(){
	    $useragents = array(
	      'iPhone',         // Apple iPhone
	      'iPod',           // Apple iPod touch
	      'Android',        // 1.5+ Android
	      'dream',          // Pre 1.5 Android
	      'CUPCAKE',        // 1.5+ Android
	      'blackberry9500', // Storm
	      'blackberry9530', // Storm
	      'blackberry9520', // Storm v2
	      'blackberry9550', // Storm v2
	      'blackberry9800', // Torch
	      'webOS',          // Palm Pre Experimental
	      'incognito',      // Other iPhone browser
	      'webmate'         // Other iPhone browser
	    );
	    $pattern = '/'.implode('|', $useragents).'/i';
	    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
	}
	//-------------------------------------------------------------------------------
}

new ReservationForm();

?>
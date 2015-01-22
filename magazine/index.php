<?php
if($_GET["uid"] != null && $_GET["p"] == "confirm" && $_GET["t"] != "1"){

	//DBへの接続
	$url = "localhost";
	$user = "root";
	$pass = "osashimi";
	$dbname = "cam_mailmagazine";

	// MySQLへ接続する
	$link = mysql_connect($url,$user,$pass) or die("MySQLへの接続に失敗しました。");

	// DBを選択する
	$select = mysql_select_db($dbname,$link) or die("DBの選択に失敗しました。");

	//x日前の時間を取得
	$future  = mktime(date("H"), date("i"), 0, date("m"), date("d")-2, date("Y"));

	//現在時刻の取得
	$time = date("Y-m-d H:i:s",$future);

	//$flg == 0 ? "登録済み":"何もしない";
	$flg = 0;

	//対象となるidを取得
	$sql = "SELECT
				id,
				confirmed,
				uniqid,
				date_format(entered,'%Y-%m-%d %k:%i:%s') dt
			FROM
				phplist_user_user
			WHERE
				uniqid = \"$_GET[uid]\" AND
				confirmed = 1";

	$result = mysql_query($sql,$link) or die("クエリの送信に失敗しました。");

	while($data = mysql_fetch_array($result)){
		 $res[] = $data;
	}

	//対象となるidの最新の修正情報を取得
	/*$sql2 = "SELECT
				summary,
				date_format(date,'%Y-%m-%d %k:%i:%s') dt
			FROM
				phplist_user_user_history
			WHERE
				userid  = \"" . $res[0]['id'] . "\" AND
				summary = \"Confirmation\" OR
				summary = \"Re-Subscription\" OR 
				summary = \"Unsubscription\" 
				ORDER BY date DESC
				";*/

	$sql2 = "SELECT
				summary,
				date_format(date,'%Y-%m-%d %k:%i:%s') dt
			FROM
				phplist_user_user_history
			WHERE
				userid  = \"" . $res[0]['id'] . "\"
				ORDER BY date DESC";

	$result2 = mysql_query($sql2,$link) or die("クエリの送信に失敗しました。");

	while($data2 = mysql_fetch_array($result2)){
		 $res2[] = $data2;
	}

	$date2 = strtotime($res2[0]['dt']);

	$time2 = date("Y-m-d H:i:s",$date2);
	
	if($time < $time2){
		if($res2[0]['summary'] == "Confirmation")
		$flg = 1;
	}
}



if($flg == 1){
	$is_mobile;
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match("/^DoCoMo/i", $agent) || preg_match("/^(J\-PHONE|Vodafone|MOT\-[CV]|SoftBank)/i", $agent) || preg_match("/^KDDI\-/i", $agent) || preg_match("/UP\.Browser/i", $agent)){
		$is_mobile=true;
	} else {
		$is_mobile=false;
	}

if($is_mobile == false){
echo  <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="池袋、平和島、茨城、千葉、徳島、愛媛で映画を見るならシネマサンシャイン">
<meta name="keywords" content="シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間,メールマガジン">
<title>メールマガジン | シネマサンシャイン</title>
<script type="text/javascript" src="https://campaign.cinemasunshine.co.jp/js/rollover.js"></script>
<script type="text/javascript" src="https://campaign.cinemasunshine.co.jp/js/minmax-1.0.js"></script>
<script type="text/javascript" src="https://campaign.cinemasunshine.co.jp/magazine/js/jquery-1.2.6.pack.js"></script>
<link type="text/css" rel="stylesheet" href="https://campaign.cinemasunshine.co.jp/css/public.css" />
<link type="text/css" rel="stylesheet" href="https://campaign.cinemasunshine.co.jp/css/magazine.css" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8383230-44']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="container">
	<div id="header">
			<div id="logo"><a href="http://www.cinemasunshine.co.jp/"><img src="/images/logo.gif" width="64" height="39" alt="logo" /></a></div>
			<ul id="subNavigation">
					<li> <a href="http://www.cinemasunshine.co.jp/showing/"> <img src="https://campaign.cinemasunshine.co.jp/images/public_global_navi_showing.gif" width="113" height="34" alt="上映中作品" onMouseOver="ImgChange('globalNavi1','https://campaign.cinemasunshine.co.jp/images/public_global_navi_showing_om.gif')"
	onMouseOut="ImgBack('globalNavi1')" id="globalNavi1"/> </a> </li>

					<li> <a href="http://www.cinemasunshine.co.jp/next_showing/"> <img src="https://campaign.cinemasunshine.co.jp/images/public_global_navi_next_showing.gif" width="113" height="34" alt="上映予定作品" onMouseOver="ImgChange('globalNavi2','https://campaign.cinemasunshine.co.jp/images/public_global_navi_next_showing_om.gif')"
	onMouseOut="ImgBack('globalNavi2')" id="globalNavi2"/> </a> </li>

			</ul>
	</div>

 <div id="m_logo"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/pc_title_1.gif" alt="メールマガジン登録" /></div>
 <div id="finish_container">
 <p id="finish2">既に登録が完了しております｡</p>
 </div>

</div>

	<div id="footer" style="padding-top:15px;">
		<div id="footerTop">
			<div id="footerTopWaku">
				<span>劇場一覧</span><br />

					<ol id="theatersNavigation">
					<li ><a href="theater/ikebukuro">シネマサンシャイン池袋(東京都)</a></li>
					<li ><a href="theater/heiwajima">シネマサンシャイン平和島(東京都)</a></li>

					<li ><a href="theater/matsudo">シネマサンシャイン松戸(千葉県)</a></li>
					<li ><a href="theater/mobara">シネマサンシャイン茂原(千葉県)</a></li>
					<li ><a href="theater/iwai">シネマサンシャイン岩井(茨城県)</a></li>

					<li ><a href="theater/tsuchiura">シネマサンシャイン土浦(茨城県)</a></li>
					<li ><a href="theater/numazu">シネマサンシャイン沼津(静岡県)</a></li>
					<li ><a href="theater/kahoku">シネマサンシャインかほく(石川県)</a></li>

					<li ><a href="theater/masaki">シネマサンシャインエミフルMASAKI(愛媛県)</a></li>
					<li ><a href="theater/okaido">シネマサンシャイン大街道(愛媛県)</a></li>
					<li ><a href="theater/kinuyama">シネマサンシャイン衣山(愛媛県)</a></li>

					<li ><a href="theater/shigenobu">シネマサンシャイン重信(愛媛県)</a></li>
					<li ><a href="theater/ozu">シネマサンシャイン大洲(愛媛県)</a></li>
					<li ><a href="theater/imabari">シネマサンシャイン今治(愛媛県)</a></li>
					<li ><a href="theater/kitajima">シネマサンシャイン北島(徳島県)</a></li>
				</ol>
				<a href="#"><img src="https://campaign.cinemasunshine.co.jp/images/public_page_top_btn.gif" id="toTheTop"/></a>
			</div>

		</div>
		<div id="footerBottom">
			<div id="footerBottomWaku">
			  <ul id="footerNavigation">
				<li> <a href="company">会社概要</a> | </li>

				<li> <a href="sitemap">サイトマップ</a> | </li>

				<li> <a href="law">特定商取引法に基づく表記</a> | </li>
				<li> <a href="sitepolicy">利用規約</a> | </li>

				<li> <a href="privacy">プライバシーポリシー</a></li>
			  </ul>

				 <br />
				 <p id="footermail">ご意見・ご感想 （ご利用劇場をお知らせください）

<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=%82%B2%88%D3%8C%A9%81E%82%B2%8A%B4%91z"><br /><img src="https://campaign.cinemasunshine.co.jp/images/mail_btn.gif" width="285" height="12" /></a></p>
<br /><br />
	      <div id="credit"> Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved. </div>

				 </p>

			</div>
		</div>
	</div>
</body>
</html>
EOF;
exit();

}else if($is_mobile == true){
echo  <<<EOF

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メールマガジン登録完了 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/header.gif" alt="シネマサンシャインメールマガジン会員サービス入会申込"/></div>
</center>
<br><img src="images/spacer.gif" height="10"><br>
<font size="1">
<font size="2" style="color:#019fe8;">既に登録が完了しております｡</font><br />
</font>
<br><img src="images/spacer.gif" height="10"><br>
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
</body>
</html>
EOF;
exit();

}
}

ob_start();
$er = error_reporting(0);
require_once dirname(__FILE__) .'/admin/commonlib/lib/unregister_globals.php';
require_once dirname(__FILE__) .'/admin/commonlib/lib/magic_quotes.php';
require_once dirname(__FILE__).'/admin/init.php';
## none of our parameters can contain html for now
$_GET = removeXss($_GET);
$_POST = removeXss($_POST);
$_REQUEST = removeXss($_REQUEST);
$_SERVER = removeXss($_SERVER);

//var_dump($_POST);
//var_dump($_REQUEST);
//exit;
  $GA_ACCOUNT = "MO-8383230-44";
  $GA_PIXEL = "http://campaign.cinemasunshine.co.jp/ga.php";



	$is_mobile;
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(preg_match("/^DoCoMo/i", $agent) || preg_match("/^(J\-PHONE|Vodafone|MOT\-[CV]|SoftBank)/i", $agent) || preg_match("/^KDDI\-/i", $agent) || preg_match("/UP\.Browser/i", $agent)){
		$is_mobile=true;
	} else {
		$is_mobile=false;
	}

if (isset($_SERVER["ConfigFile"]) && is_file($_SERVER["ConfigFile"])) {
#  print '<!-- using '.$_SERVER["ConfigFile"].'-->'."\n";
  include $_SERVER["ConfigFile"];
} elseif (isset($_ENV["CONFIG"]) && is_file($_ENV["CONFIG"])) {
#  print '<!-- using '.$_ENV["CONFIG"].'-->'."\n";
  include $_ENV["CONFIG"];
} elseif (is_file("config/config.php")) {
#  print '<!-- using config/config.php -->'."\n";
  include "config/config.php";
} else {
  print "Error, cannot find config file\n";
  /*exit;*/
}
if (0) {#isset($GLOBALS["developer_email"]) && $GLOBALS['show_dev_errors']) {
  error_reporting(E_ALL);
} else {
  error_reporting(0);
}

require_once dirname(__FILE__).'/admin/'.$GLOBALS["database_module"];

# load default english and language
require_once dirname(__FILE__)."/texts/english.inc";
include_once dirname(__FILE__)."/texts/".$GLOBALS["language_module"];
# Allow customisation per installation
if (is_file($_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS["language_module"])) {
  include_once $_SERVER['DOCUMENT_ROOT'].'/'.$GLOBALS["language_module"];
}

require_once dirname(__FILE__)."/admin/defaultconfig.inc";
require_once dirname(__FILE__).'/admin/connect.php';
include_once dirname(__FILE__)."/admin/languages.php";
include_once dirname(__FILE__)."/admin/lib.php";
$I18N= new phplist_I18N();

if ($require_login || ASKFORPASSWORD) {
  # we need session info if an admin subscribes a user
  if (!empty($GLOBALS["SessionTableName"])) {
    require_once dirname(__FILE__).'/admin/sessionlib.php';
  }
  @session_start(); # it may have been started already in languages
}

if (!isset($_POST) && isset($HTTP_POST_VARS)) {
    require "admin/commonlib/lib/oldphp_vars.php";
}

/*
  We request you retain the inclusion of pagetop below. This will add invisible
  additional information to your public pages.
  This not only gives respect to the large amount of time given freely
  by the developers  but also helps build interest, traffic and use of
  PHPlist, which is beneficial to it's future development.

  Michiel Dethmers, Tincan Ltd 2000,2006
*/

if (isset($_GET['id'])) {
  $id = sprintf('%d',$_GET['id']);
} else {
  $id = 0;
}
// What is id,
// What is uid
// What is userid
// Why is there GET(id) and REQUEST(id)?

if (isset($_GET['uid']) && $_GET["uid"]) {
  $req = Sql_Fetch_Row_Query(sprintf('select subscribepage,id,password,email from %s where uniqid = "%s"',
    $tables["user"],$_GET["uid"]));
  $id = $req[0];
  $userid = $req[1];
  $userpassword = $req[2];
  $emailcheck = $req[3];
} elseif (isset($_GET["email"])) {
  $req = Sql_Fetch_Row_Query(sprintf('select subscribepage,id,password,email from %s where email = "%s"',
    $tables["user"],$_GET["email"]));
  $id = $req[0];
  $userid = $req[1];
  $userpassword = $req[2];
  $emailcheck = $req[3];
} elseif (isset($_REQUEST["unsubscribeemail"])) {
  $req = Sql_Fetch_Row_Query(sprintf('select subscribepage,id,password,email from %s where email = "%s"',
    $tables["user"],$_REQUEST["unsubscribeemail"]));
  $id = $req[0];
  $userid = $req[1];
  $userpassword = $req[2];
  $emailcheck = $req[3];
/*
} elseif ($_SESSION["userloggedin"] && $_SESSION["userid"]) {
  $req = Sql_Fetch_Row_Query(sprintf('select subscribepage,id,password,email from %s where id = %d',
    $tables["user"],$_SESSION["userid"]));
  $id = $req[0];
  $userid = $req[1];
  $userpassword = $req[2];
  $emailcheck = $req[3];
*/
} else {
  $userid = "";
  $userpassword = "";
  $emailcheck = "";
}

if (isset($_REQUEST['id']) && $_REQUEST["id"]){
  $id = sprintf('%d',$_REQUEST["id"]);
}
# make sure the subscribe page still exists
$req = Sql_fetch_row_query(sprintf('select id from %s where id = %d',$tables["subscribepage"],$id));
$id = $req[0];
$msg = "";

if (!empty($_POST["sendpersonallocation"])) {
  if (isset($_POST['email']) && $_POST["email"]) {
    $uid = Sql_Fetch_Row_Query(sprintf('select uniqid,email,id from %s where email = "%s"',
      $tables["user"],$_POST["email"]));
    if ($uid[0]) {
      sendMail ($uid[1],getConfig("personallocation_subject"),getUserConfig("personallocation_message",$uid[2]),system_messageheaders(),$GLOBALS["envelope"]);
      $msg = $GLOBALS["strPersonalLocationSent"];
      addSubscriberStatistics('personal location sent',1);
    } else {
      $msg = $GLOBALS["strUserNotFound"];
    }
  }
}

if (isset($_GET['p']) && $_GET["p"] == "subscribe") {
  $_SESSION["userloggedin"] = 0;
  $_SESSION["userdata"] = array();
}

$login_required =
  (ASKFORPASSWORD && $userpassword && $_GET["p"] == "preferences") ||
  (ASKFORPASSWORD && UNSUBSCRIBE_REQUIRES_PASSWORD && $userpassword && $_GET["p"] == "unsubscribe");

if ($login_required && empty($_SESSION["userloggedin"])) {
  $canlogin = 0;
  if (!empty($_POST["login"])) {
    # login button pushed, let's check formdata

    if (empty($_POST["email"])) {
      $msg = $strEnterEmail;
    } elseif (empty($_POST["password"])) {
      $msg = $strEnterPassword;
    } else {
      if (ENCRYPTPASSWORD) {
        $canlogin = md5($_POST["password"]) == $userpassword && $_POST["email"] == $emailcheck;
      } else {
        $canlogin = $_POST["password"] == $userpassword && $_POST["email"] == $emailcheck;
      }
    }
    if (!$canlogin) {
      $msg = $strInvalidPassword;
    } else {
      loadUser($emailcheck);
      $_SESSION["userloggedin"] = $_SERVER["REMOTE_ADDR"];
     }
   } elseif (!empty($_POST["forgotpassword"])) {
    # forgot password button pushed
    if (!empty($_POST["email"]) && $_POST["email"] == $emailcheck) {
      sendMail ($emailcheck,$GLOBALS["strPasswordRemindSubject"],$GLOBALS["strPasswordRemindMessage"]." ".$userpassword,system_messageheaders());
      $msg = $GLOBALS["strPasswordSent"];
    } else {
      $msg = $strPasswordRemindInfo;
    }
  } elseif (isset($_SESSION["userdata"]["email"]["value"]) && $_SESSION["userdata"]["email"]["value"] == $emailcheck) {
    # Entry without any button pushed (first time) test and, if needed, ask for password
    $canlogin = $_SESSION["userloggedin"];
    $msg = $strEnterPassword;
  }
} else {
  # Logged into session or login not required
  $canlogin = 1;
}

if (!$id) {
  # find the default one:
  $id = getConfig("defaultsubscribepage");
  # fix the true/false issue
  if ($id == "true") $id = 1;
  if ($id == "false") $id = 0;
  if (!$id) {
    # pick a first
    $req = Sql_Fetch_row_Query(sprintf('select ID from %s where active',$tables["subscribepage"]));
    $id = $req[0];
    //こここない
  }
}

if ($login_required && empty($_SESSION["userloggedin"]) && !$canlogin) {
  print LoginPage($id,$userid,$emailcheck,$msg);
} elseif (isset($_GET['p']) && preg_match("/(\w+)/",$_GET["p"],$regs)) {
  if ($id) {
    $data = PageData($id);
    if (isset($data['language_file']) && is_file(dirname(__FILE__).'/texts/'.basename($data['language_file']))) {
      @include dirname(__FILE__).'/texts/'.basename($data['language_file']);
      # Allow customisation per installation
      if (is_file($_SERVER['DOCUMENT_ROOT'].'/'.basename($data['language_file']))) {
        include_once $_SERVER['DOCUMENT_ROOT'].'/'.basename($data['language_file']);
      }
    }

    #TODO 分岐
    switch ($_GET["p"]) {
      case "subscribe":
        $success = require "admin/subscribelib2.php";

        //echo "succ	".$success. "	end";
        if ($success != 2) {
          print SubscribePage($id);
        }
        break;
      case "preferences":
        if (!isset($_GET["id"]) || !$_GET['id']) $_GET["id"] = $id;
        $success = require "admin/subscribelib2.php";
        if (!$userid) {
#          print "Userid not set".$_SESSION["userid"];
          print sendPersonalLocationPage($id);
        } elseif (ASKFORPASSWORD && $userpassword && !$canlogin) {
          print LoginPage($id,$userid,$emailcheck);
        } elseif ($success != 3) {
          print PreferencesPage($id,$userid);
        }
        break;
      case "forward":
         print ForwardPage($id);
        break;
      case "confirm":
         print ConfirmPage($id);
        break;
      #0013076: Blacklisting posibility for unknown users
      case "blacklist":
      case "unsubscribe":
        print UnsubscribePage($id);
        break;
      default:
        FileNotFound();
    }
  } else {
    FileNotFound();
  }
} else {
  if ($id) $data = PageData($id);
  if (isset($data['language_file']) && is_file(dirname(__FILE__).'/texts/'.basename($data['language_file']))) {
    @include dirname(__FILE__).'/texts/'.basename($data['language_file']);
  }
  print '<title>'.$GLOBALS["strSubscribeTitle"].'</title>';
  print $data["header"];
  $req = Sql_Query(sprintf('select * from %s where active',$tables["subscribepage"]));
  if (Sql_Affected_Rows()) {
    while ($row = Sql_Fetch_Array($req)) {
      $intro = Sql_Fetch_Row_Query(sprintf('select data from %s where id = %d and name = "intro"',$tables["subscribepage_data"],$row["id"]));
      print $intro[0];
      printf('<p><a href="./?p=subscribe&id=%d">%s</a></p>',$row["id"],$row["title"]);
     }
  } else {
    printf('<p><a href="./?p=subscribe">%s</a></p>',$strSubscribeTitle);
  }

  printf('<p><a href="./?p=unsubscribe">%s</a></p>',$strUnsubscribeTitle);
  //print $PoweredBy;
  print $data["footer"];
}

function LoginPage($id,$userid,$email = "",$msg = "") {
  $data = PageData($id);
  list($attributes,$attributedata) = PageAttributes($data);
  $html = '<title>'.$GLOBALS["strLoginTitle"].'</title>';
  $html .= $data["header"];
  $html .= '<b>'.$GLOBALS["strLoginInfo"].'</b><br/>';
  $html .= $msg;
  if (isset($_REQUEST["email"])) {
    $email = $_REQUEST["email"];
  }
  if (!isset($_POST["password"])) {
    $_POST["password"] = '';
  }

  $html .= formStart('name="loginform"');
  $html .= '<table border=0>';
  $html .= '<tr><td>'.$GLOBALS["strEmail"].'</td><td><input type=text name="email" value="'.$email.'" size="30"></td></tr>';
  $html .= '<tr><td>'.$GLOBALS["strPassword"].'</td><td><input type="password" name="password" value="'.$_POST["password"].'" size="30"></td></tr>';
  $html .= '</table>';
   $html .= '<p><input type=submit name="login" value="'.$GLOBALS["strLogin"].'"></p>';
  if (ENCRYPTPASSWORD) {
    $html .= sprintf('<a href="mailto:%s?subject=%s">%s</a>',getConfig("admin_address"),$GLOBALS["strForgotPassword"],$GLOBALS["strForgotPassword"]);
  } else {
    $html .= '<input type=submit name="forgotpassword" value="'.$GLOBALS["strForgotPassword"].'">';
  }
  $html .= '<br/><br/>
    <p><a href="'.getConfig("unsubscribeurl").'&id='.$id.'">'.$GLOBALS["strUnsubscribe"].'</a></p>';
  $html .= '</form>';
  $html .= $data["footer"];
  return $html;
}

function sendPersonalLocationPage($id) {
  global $data ;
  list($attributes,$attributedata) = PageAttributes($data);
  $html = '<title>'.$GLOBALS["strPreferencesTitle"].'</title>';
  $html .= $data["header"];
  $html .= '<b>'.$GLOBALS["strPreferencesTitle"].'</b><br/>';
  $html .= $GLOBALS["msg"];
  if ($_REQUEST["email"]) {
    $email = $_REQUEST["email"];
  } elseif ($_SESSION["userdata"]["email"]["value"]) {
    $email = $_SESSION["userdata"]["email"]["value"];
  }
  $html .= $GLOBALS["strPersonalLocationInfo"];

  $html .= formStart('name="form"');
  $html .= '<table border=0>';
  $html .= '<tr><td>'.$GLOBALS["strEmail"].'</td><td><input type=text name="email" value="'.$email.'" size="30"></td></tr>';
  $html .= '</table>';
   $html .= '<p><input type=submit name="sendpersonallocation" value="'.$GLOBALS["strContinue"].'"></p>';
  $html .= '<br/><br/>
    <p><a href="'.getConfig("unsubscribeurl").'&id='.$id.'">'.$GLOBALS["strUnsubscribe"].'</a></p>';
  $html .= '</form>'.$GLOBALS["PoweredBy"];
  $html .= $data["footer"];
  return $html;
}

function preferencesPage($id,$userid) {
  global $data,$is_mobile;
  if ($is_mobile) {
 list($attributes,$attributedata) = PageAttributes($data);

  $selected_lists = explode(',',$data["lists"]);
  //header
  $html = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メールマガジン修正 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/mobile_title_2.gif" alt="シネマサンシャインメールマガジン会員サービス修正"/></div>
</center>
<br>
<font size="1">
  ';

  $html .= '<p>お手数ですが、お名前からご入力お願致します </p>';
  $html .= $GLOBALS["msg"];
  //$html .= formStart('action="'.$_SERVER["PHP_SELF"].'?p=preferences&uid='.$_GET['uid'].'"');
  $html .= '<form method="post" name="subscribeform" action="https://campaign.cinemasunshine.co.jp/magazine/?p=preferences&uid='.$_GET['uid'].'">';
  //yun form 動的に生成
 $html .= ListAttributes_m($attributes,$attributedata,$data["htmlchoice"],$userid,$data['emaildoubleentry']);
  /*if (ENABLE_RSS) {
    $html .= RssOptions($data);
   }*/
  $html .= ListAvailableLists($userid,$data["lists"]);
  $html .= '<br><img src="images/spacer.gif" height="10"><br>
個人情報の取扱いについて
<br><img src="images/spacer.gif" height="5"><br>
ご登録の前に､当社の<a href="http://www.cinemasunshine.co.jp/m/privacy/index.php">｢ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ｣をよくお読み下さい｡</a><br />
ご確認いただき､ご同意いただける場合はﾁｪｯｸﾎﾞｯｸｽにｸﾘｯｸして下さい｡
<br><img src="images/spacer.gif" height="5"><br>
<input id="agreement" name="agreement" type="checkbox" value="1"/>個人情報の取り扱いに同意する
<br><img src="images/spacer.gif" height="5"><br>
<div id="domein_agreement" style="color:red;font-weight:bold;margin:5px 0 0 0;">
※ﾌﾘｰﾒｰﾙや、携帯電話で迷惑ﾒｰﾙ設定をしている場合、確認ﾒｰﾙが届かない場合がございますので、ﾄﾞﾒｲﾝ設定の変更をお願い致します。<br />
ﾄﾞﾒｲﾝ：cinemasunshine.co.jp</div>
<br><img src="images/spacer.gif" height="5"><br>


';
  $html .= '<center><input type="submit" value="送信" name="update"></center>
  </form><br/><br/>
  ';
$html .='
</font>
<br />
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
	'.'<img src="' . googleAnalyticsGetImageUrl()  . '" />
</body>
</html>
';

  //.$GLOBALS["PoweredBy"];
  //$html .= $data["footer"];
  //$html = mb_convert_encoding($html,"sjis");
  return $html;
  }else {


  list($attributes,$attributedata) = PageAttributes($data);
  $selected_lists = explode(',',$data["lists"]);
  include "admin/pagetop.php";
  //$html .= '<b>'.$GLOBALS["strPreferencesInfo"].'</b>';
$html .= '<div id="m_logo"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/pc_title_2.gif" alt="メールマガジン修正" /></div>';
$html .= '<div id="required">*は必須項目です </div>';
$html .= '<div id="required">お手数ですが、お名前からご入力お願致します </div>';
$html .= $GLOBALS["msg"];


  //$html .= formStart('name="subscribeform"');
    $html .= '<form method="post" name="subscribeform" action="https://campaign.cinemasunshine.co.jp/magazine/?p=preferences&uid='.$_GET['uid'].'">';
  $html .= '<table id="form_dl">';
  $html .= ListAttributes($attributes,$attributedata,$data["htmlchoice"],$userid,$data['emaildoubleentry']);
  $html .= '</table>';
  /*if (ENABLE_RSS) {
    $html .= RssOptions($data,$userid);
   }*/
  $html .= ListAvailableLists($userid,$data["lists"]);
 $html .= '<div id="magazine_privacy">
				<p id="magazine_privacy_title">個人情報の取り扱いについて</p>

				<p id="magazine_privacy_explain">ご登録の前に、当社の<a href="http://www.cinemasunshine.co.jp/privacy/" title="「プライバシーポリシー」" target="_blank">「プライバシーポリシー」</a>をよくお読み下さい。<br />
				ご確認いただき、ご同意いただける場合はチェックボックスにクリックして下さい。
				</p>
			</div>

			<div id="agreement"><input id="agreement" name="agreement" type="checkbox" value="1"/><label for="agreement">個人情報の取り扱いに同意する</label></div>
			<div id="no_agreement">※同意いただけないとメールマガジンの登録が完了しません。 </div>
			<div id="domein_agreement" style="color:red;font-size:13px;font-weight:bold;margin:5px 0 0 0;">
				※フリーメールや、携帯電話で迷惑メール設定をしている場合、確認メールが届かない場合がございますので、ドメイン設定の変更をお願い致します。<br />
				ドメイン：cinemasunshine.co.jp</div>
  ';
  if (empty($data['button'])) {
    $data['button'] = $GLOBALS['strSubmit'];
  }
  /*if (isBlackListedID($userid)) {
    $html .= $GLOBALS["strYouAreBlacklisted"];
  }*/


  $html .= '<p><button type=submit name="update" value="情報修正"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/botan.gif" /></button></p>
  			</form>';
  //$html .= $data["footer"];

  $html .=include "admin/pagedown.php";
  return $html;

  }


}

//購読ページ
function subscribePage($id) {
	//モバイルの場合
	global $data,$is_mobile;
	
	//  ワンタイムチケットを生成する。
	$ticket = md5(uniqid(rand(), true));
	
	//  生成したチケットをセッション変数へ保存する。
	$_SESSION['ticket'] = $ticket;
	if($is_mobile){

/*  	if($id != 2) {
  		//リダイレクト

  	}*/

  list($attributes,$attributedata) = PageAttributes($data);

  $selected_lists = explode(',',$data["lists"]);
  //header
  $html = '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メールマガジン登録 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/mobile_title_1.gif" alt="シネマサンシャインメールマガジン会員サービス入会申込"/></div>
</center>
<br>
<font size="1">
  ';

  $html .= $GLOBALS["msg"];
  $html .= '<form method="post" name="subscribeform" action="https://campaign.cinemasunshine.co.jp/magazine/?p=subscribe&id=2">';

  //$html .= formStart('action="http://campaign.cinemasunshine.co.jp/magazine/?p=subscribe&id=2"');
  //yun form 動的に生成
 $html .= ListAttributes_m($attributes,$attributedata,$data["htmlchoice"],0,$data['emaildoubleentry']);
  /*if (ENABLE_RSS) {
    $html .= RssOptions($data);
   }*/
  $html .= ListAvailableLists("",$data["lists"]);
  $html .= '<br><img src="images/spacer.gif" height="10"><br>
個人情報の取扱いについて
<br><img src="images/spacer.gif" height="5"><br>
ご登録の前に､当社の<a href="http://www.cinemasunshine.co.jp/m/privacy/index.php">｢ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ｣をよくお読み下さい｡</a><br />
ご確認いただき､ご同意いただける場合はﾁｪｯｸﾎﾞｯｸｽにｸﾘｯｸして下さい｡
<br><img src="images/spacer.gif" height="5"><br>
<input id="agreement" name="agreement" type="checkbox" value="1"/>個人情報の取り扱いに同意する
<br><img src="images/spacer.gif" height="5"><br>
<div id="domein_agreement" style="color:red;font-weight:bold;margin:5px 0 0 0;">
※ﾌﾘｰﾒｰﾙや、携帯電話で迷惑ﾒｰﾙ設定をしている場合、確認ﾒｰﾙが届かない場合がございますので、ﾄﾞﾒｲﾝ設定の変更をお願い致します。<br />
ﾄﾞﾒｲﾝ：cinemasunshine.co.jp</div>
<br><img src="images/spacer.gif" height="5"><br>
';
  if (empty($data['button'])) {
    $data['button'] = $GLOBALS['strSubmit'];
  }
  if (USE_SPAM_BLOCK)
//    $html .= '<div style="display:none"><input type="text" name="VerificationCodeX" value="" size="20"></div>';
  $html .= '<center><input type="submit" value="送信" name="subscribe"></center>
  <input type="hidden" name="ticket" value="'.$ticket.'">
  </form><br/><br/>
  ';
$html .='
</font>
<br />
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
'.'<img src="' . googleAnalyticsGetImageUrl()  . '" />

</body>
</html>
';

  //.$GLOBALS["PoweredBy"];
  //$html .= $data["footer"];
  //$html = mb_convert_encoding($html,"sjis");
  return $html;

	//pc
	} else {
  		//TODO
	include "admin/pagetop.php";
  list($attributes,$attributedata) = PageAttributes($data);

  $selected_lists = explode(',',$data["lists"]);
  //$html = '<title>'.$GLOBALS["strSubscribeTitle"].'</title>';
  $html .= $data["header"];
  //$html .= $data["intro"];
  $html .= '<div id="m_logo"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/pc_title_1.gif" alt="メールマガジン会員サービス" /></div>';
  $html .= '<div id="m_logo_two"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/touroku.gif" alt="会員登録" /></div>';
  //$html .= '<font class="required">'.$GLOBALS["strRequired"].'</font><br/>
  $html .= '<div id="required">*は必須項目です </div>';
  $html .= $GLOBALS["msg"];
  //$html .= formStart('name="subscribeform"');
 $html .= '<form method="post" name="subscribeform" action="https://campaign.cinemasunshine.co.jp/magazine/?p=subscribe&id='.$_GET['id'].'">' ;
  //yun form 動的に生成
  $html .= '<table id="form_dl">';
 $html .= ListAttributes($attributes,$attributedata,$data["htmlchoice"],0,$data['emaildoubleentry']);
  $html .= '</table>';
  /*if (ENABLE_RSS) {
    $html .= RssOptions($data);
   }*/
  $html .= ListAvailableLists("",$data["lists"]);
  $html .= '<div id="magazine_privacy">
				<p id="magazine_privacy_title">個人情報の取り扱いについて</p>

				<p id="magazine_privacy_explain">ご登録の前に、当社の<a href="http://www.cinemasunshine.co.jp/privacy/" title="「プライバシーポリシー」" target="_blank">「プライバシーポリシー」</a>をよくお読み下さい。<br />
				ご確認いただき、ご同意いただける場合はチェックボックスにクリックして下さい。
				</p>
			</div>

			<div id="agreement"><input id="agreement" name="agreement" type="checkbox" value="1"/><label for="agreement">個人情報の取り扱いに同意する</label></div>
			<div id="no_agreement">※同意いただけないとメールマガジンの登録が完了しません。 </div>
			<div id="domein_agreement" style="color:red;font-size:13px;font-weight:bold;margin:5px 0 0 0;">
				※フリーメールや、携帯電話で迷惑メール設定をしている場合、確認メールが届かない場合がございますので、ドメイン設定の変更をお願い致します。<br />
				ドメイン：cinemasunshine.co.jp</div>
  ';
  if (empty($data['button'])) {
    $data['button'] = $GLOBALS['strSubmit'];
  }
  if (USE_SPAM_BLOCK)
    $html .= '<div style="display:none"><input type="text" name="VerificationCodeX" value="" size="20"></div>';
  $html .= '<p>
  <input type="hidden" value="選択したメールマガジンの購読" name="subscribe">
  <button type=submit name="subscribe" value="選択したメールマガジンの購読'.$data["button"].'"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/botan.gif"></button>
  </p>

	<input type="hidden" name="ticket" value="'.$ticket.'">
  </form><br/><br/>
  ';
	$html .=include "admin/pagedown.php";

	return $html;
  	}
}

function confirmPage($id) {
  global $data, $tables, $envelope,$is_mobile;
  if (!$_GET["uid"]) {
    FileNotFound();
  }
  $req = Sql_Query("select * from {$tables["user"]} where uniqid = \"".$_GET["uid"]."\"");
  $userdata = Sql_Fetch_Array($req);
  if ($userdata["id"]) {
  	$blacklisted = isBlackListed($userdata["email"]);
    //$html = '<ul>';
    $lists = '';
    Sql_Query("update {$tables["user"]} set confirmed = 1,blacklisted = 0 where id = ".$userdata["id"]);
    $req = Sql_Query(sprintf('select name,description from %s list, %s listuser where listuser.userid = %d and listuser.listid = list.id and list.active',$tables['list'],$tables['listuser'],$userdata['id']));
    /*
    if (!Sql_Affected_Rows()) {
      $lists = "\n * ".$GLOBALS["strNoLists"];
      $html .= '<li>'.$GLOBALS["strNoLists"].'</li>';
    }

    while ($row = Sql_fetch_array($req)) {
      $lists .= "\n *".stripslashes($row["name"]);
      $html .= '<li class="list">'.stripslashes($row["name"]).'<div class="listdescription">'.stripslashes($row["description"]).'</div></li>';
    }
    $html .= '</ul>';*/
    if ($blacklisted) {
      unBlackList($userdata['id']);
      addUserHistory($userdata["email"],"Confirmation","User removed from Blacklist for manual confirmation of subscription");
    }
    addUserHistory($userdata["email"],"Confirmation","Lists: $lists");

    $confirmationmessage = ereg_replace('\[LISTS\]', $lists, getUserConfig("confirmationmessage:$id",$userdata["id"]));

    if (!TEST) {
      sendMail($userdata["email"], getConfig("confirmationsubject:$id"), $confirmationmessage,system_messageheaders(),$envelope);
      $adminmessage = $userdata["email"] . " has confirmed their subscription";
      if ($blacklisted) {
        $adminmessage .= "\nUser has been removed from blacklist";
      }
      sendAdminCopy("List confirmation",$adminmessage);
      addSubscriberStatistics('confirmation',1);
    }
    $info = $GLOBALS["strConfirmInfo"];
  } else {
    logEvent("Request for confirmation for invalid user ID: ".substr($_GET["uid"],0,150));
    $html .= 'Error: '.$GLOBALS["strUserNotFound"];
    $info = $GLOBALS["strConfirmFailInfo"];
  }

  //$res = '<title>'.$GLOBALS["strConfirmTitle"].'</title>';
 // $res .= $data["header"];
 $html .= '
 <div id="m_logo"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/pc_title_1.gif" alt="メールマガジン登録" /></div>
 <div id="finish_container">
 <p id="finish1">登録が完了致しました。</p>
 <p id="finish2">次回メールマガジンから配信が開始されます。</p>
 </div>
  ';
 $html .= include "admin/pagedown.php";
  //$res .= '<h1>'.$info.'</h1>';

  //$res .= "<P>".$GLOBALS["PoweredBy"].'</p>';
  //$res .= $data["footer"];



  	//モバイルの場合
  	if($is_mobile){
	 	$res .= '
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メールマガジン登録完了 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/header.gif" alt="シネマサンシャインメールマガジン会員サービス入会申込"/></div>
</center>
<br><img src="images/spacer.gif" height="10"><br>
<font size="1">
<font size="2" style="color:#019fe8;">登録が完了致しました｡</font><br />
次回ﾒｰﾙﾏｶﾞｼﾞﾝから配信が開始されます｡
</font>
<br><img src="images/spacer.gif" height="10"><br>
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
</body>
</html>

	 	';
	} else {
	include "admin/pagetop.php";
		$res .= $data["header"].$html;
	}



  return $res;
}

function unsubscribePage($id) {

  global $data, $tables,$is_mobile;

  //モバイルの場合
  if ($is_mobile) {
  //$res = '<title>'.$GLOBALS["strUnsubscribeTitle"].'</title>'."\n";
  $res = '
  <!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>メールマガジン停止 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/mobile_title_3.gif" alt="シネマサンシャインメールマガジン停止サービス入会申込"/></div>
</center>
<br>
<font size="1">
  ';

  	$res .= $data["header"];

  if (isset($_GET["uid"])) {
    $req = Sql_Query("select * from $tables[user] where uniqid = \"".$_GET["uid"]."\"");
    $userdata = Sql_Fetch_Array($req);
    $email = $userdata["email"];
    if (UNSUBSCRIBE_JUMPOFF) {
      $_POST["unsubscribe"] = 1;
      $_POST["email"] = $email;
      $_REQUEST['unsubscribeemail'] = $email;
      $_POST["unsubscribereason"] = '"Jump off" set, reason not requested';
    }
  } else {
    if (isset($_REQUEST['unsubscribeemail'])) {
       if (UNSUBSCRIBE_JUMPOFF) {
          $_POST["unsubscribe"] = 1;
          $_POST["unsubscribereason"] = '"Jump off" set, reason not requested';
       }
       $email = $_REQUEST['unsubscribeemail'];
    } else {
       if (isset($_REQUEST['email'])) {
          if (UNSUBSCRIBE_JUMPOFF) {
             $_POST["unsubscribe"] = 1;
             $_POST["unsubscribereason"] = '"Jump off" set, reason not requested';
          }
          $email = $_REQUEST['email'];
       }
    }


    #0013076: Blacklisting posibility for unknown users
    # Set flag for blacklisting
    $blacklist = $_GET['p'] == 'blacklist';

    # only proceed when user has confirm the form
    if ($blacklist && is_email($_REQUEST['unsubscribeemail']) ) {
      $_POST["unsubscribe"] = 1;
      $_POST["unsubscribereason"] = 'Forwarded receiver requested blacklist';
    }
  }

  $unsubscribeemail = (isset($_REQUEST['unsubscribeemail']))?$_REQUEST['unsubscribeemail']:$_REQUEST['email'];

  if ( is_email($unsubscribeemail) && isset($_POST['unsubscribe']) && (isset($_REQUEST['email']) || isset($_REQUEST['unsubscribeemail'])) && isset($_POST['unsubscribereason'])) {

    #0013076: Blacklisting posibility for unknown users
    if ( !$blacklist ) {
      // It would be better to do this above, where the email is set for the other cases.
      // But to prevent vulnaribilities let's keep it here for now. [bas]
      $query = Sql_Fetch_Row_Query("select id,email from {$tables["user"]} where email = \"$email\"");
      $userid = $query[0];
      $email = $query[1];
    }

    if (!$userid) {

      #0013076: Blacklisting posibility for unknown users
      if ( $blacklist ) {
        addUserToBlacklist($email,$_POST['unsubscribereason']);
        addSubscriberStatistics('forwardblacklist',1);
      } else {
        $res .= 'Error: '.$GLOBALS["strUserNotFound"];
        logEvent("Request to unsubscribe non-existent user: ".substr($_POST["email"],0,150));
      }
    } else {
      $result = Sql_query("delete from {$tables["listuser"]} where userid = \"$userid\"");
      $lists = "  * ".$GLOBALS["strAllMailinglists"]."\n";
      # add user to blacklist
      addUserToBlacklist($email,nl2br(strip_tags($_POST['unsubscribereason'])));

      addUserHistory($email,"Unsubscription","Unsubscribed from $lists");
      $unsubscribemessage = ereg_replace("\[LISTS\]", $lists,getUserConfig("unsubscribemessage",$userid));
      sendMail($email, getConfig("unsubscribesubject"), stripslashes($unsubscribemessage), system_messageheaders($email));
      $reason = $_POST["unsubscribereason"] ? "Reason given:\n".stripslashes($_POST["unsubscribereason"]):"No Reason given";
      sendAdminCopy("List unsubscription",$email . " has unsubscribed\n$reason");
      addSubscriberStatistics('unsubscription',1);
    }
	//完了画面
    if ($userid)
      //$res .= '<h1>'.$GLOBALS["strUnsubscribeDone"] ."</h1><P>";
      $res .= '<br /><br /><font size="2" style="color:#019fe8;">ﾒｰﾙﾏｶﾞｼﾞﾝの配信を停止しました。間もなく確認のﾒｰﾙが送信されますのでご確認ください</font><br /><br />';
    $res.= '
    </font>
	<br />
	<center>
	<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
	</center>
	'.'<img src="' . googleAnalyticsGetImageUrl()  . '" />
	</body>
	</html>
	';
    #0013076: Blacklisting posibility for unknown users
    if ($blacklist)
      $res .= '<h1>'.$GLOBALS["strYouAreBlacklisted"] ."</h1><P>";
   // $res .= $GLOBALS["PoweredBy"].'</p>';
    $res .= $data["footer"];
    return $res;
  } elseif ( isset($_POST["unsubscribe"]) &&  !is_email($_REQUEST['unsubscribeemail']))  {
    $msg = '<br><font color="#ff8800">メールアドレスを入力してください</font><br>';
  } elseif (!empty($_GET["email"])) {
    $email = trim($_GET["email"]);
  } else {
    if (isset($_REQUEST["email"])) {
      $email = $_REQUEST["email"];
    } elseif (isset($_REQUEST['unsubscribeemail'])) {
      $email = $_REQUEST['unsubscribeemail'];
    } elseif (!isset($email)) {
      $email = '';
    }
  }
  if (!isset($msg)) {
    $msg = '';
  }
  if (isset($msg)) {
    $res .= $msg;
  }
  //$res .= '<b>'. $GLOBALS["strUnsubscribeInfo"].'</b><br>'.
  //$msg.formStart();

  /*$res .= '<table>
  <tr><td>'.$GLOBALS["strEnterEmail"].':</td><td colspan=3><input type=text name="unsubscribeemail" value="'.$email.'" size=40></td></tr>
  </table>';*/

  $res .= '<form method="post" action="https://campaign.cinemasunshine.co.jp/magazine/?p=unsubscribe">';
  $res .='<br><br>登録したメールアドレスを入力してください<font color="#ff8800">必須</font><br><input type="text" name="unsubscribeemail" value="'.$email.'" >';

  if (!$email) {
    $res .= '<br><br><input type="submit" name="unsubscribe" value="'.$GLOBALS[strContinue].'" ></form>';

    $res.= '
    </font>
	<br />
	<center>
	<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
	</center>
'.'<img src="' . googleAnalyticsGetImageUrl()  . '" />
	</body>
	</html>
	';

    return $res;
  }

  $current = Sql_Fetch_Array_query("SELECT list.id as listid,user.uniqid as userhash, user.password as password FROM $tables[list] as list,$tables[listuser] as listuser,$tables[user] as user where list.id = listuser.listid and user.id = listuser.userid and user.email = \"$email\"");
  $some = $current["listid"];
  if (ASKFORPASSWORD && !empty($user['password'])) {
    # it is safe to link to the preferences page, because it will still ask for
    # a password
    $hash = $current["userhash"];
  } elseif (isset($_GET['uid']) && $_GET['uid'] == $current['userhash']) {
    # they got to this page from a link in an email
    $hash = $current['userhash'];
  } else {
    $hash = '';
  }

  $finaltext = $GLOBALS["strUnsubscribeFinalInfo"];
  $pref_url = getConfig("preferencesurl");
  $sep = ereg('\?',$pref_url)?'&':'?';
  $finaltext = eregi_replace('\[preferencesurl\]',$pref_url.$sep.'uid='.$hash,$finaltext);

  if (!$some) {
    #0013076: Blacklisting posibility for unknown users
    if (!$blacklist) {

    	$res .= '<br><br><font color="#ff8800">すでに配信停止状態か、メールマガジンに登録されてないです</font><br>';
     // $res .= "<b>".$GLOBALS["strNoListsFound"]."</b></ul>";
    }
    $res .= '<p><input type=submit value="'.$GLOBALS["strUnsubscribe"].'">';
  } else {
    if ($blacklist) {
      $res .= $GLOBALS["strExplainBlacklist"];
    } elseif (!UNSUBSCRIBE_JUMPOFF) {
      list($r,$c) = explode(",",getConfig("textarea_dimensions"));
      if (!$r) $r = 5;
      if (!$c) $c = 65;
      $res .= $GLOBALS["strUnsubscribeRequestForReason"];
      $res .= sprintf('<br/><textarea name="unsubscribereason" cols="%d" rows="%d" wrap="virtual"></textarea>',$c,$r) . $finaltext;
    }
    $res .= '<p><input type=submit name="unsubscribe" value="'.$GLOBALS["strUnsubscribe"].'"></p>';
  }
  $res .= '</form>';
  //$res .= '<p>'.$GLOBALS["PoweredBy"].'</p>';
  $res .= $data["footer"];
  //error
$res.= '
<br />
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2013, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
'.'<img src="' . googleAnalyticsGetImageUrl()  . '" />
</body>
</html>
';
  return $res;


  //PC TODO
  } else {

  	include "admin/pagetop.php";

  //$res = '<title>'.$GLOBALS["strUnsubscribeTitle"].'</title>'."\n";
  $res .= $data["header"];

  if (isset($_GET["uid"])) {
    $req = Sql_Query("select * from $tables[user] where uniqid = \"".$_GET["uid"]."\"");
    $userdata = Sql_Fetch_Array($req);
    $email = $userdata["email"];
    if (UNSUBSCRIBE_JUMPOFF) {
      $_POST["unsubscribe"] = 1;
      $_POST["email"] = $email;
      $_REQUEST['unsubscribeemail'] = $email;
      $_POST["unsubscribereason"] = '"Jump off" set, reason not requested';
    }
  } else {
    if (isset($_REQUEST['unsubscribeemail'])) {
       if (UNSUBSCRIBE_JUMPOFF) {
          $_POST["unsubscribe"] = 1;
          $_POST["unsubscribereason"] = '"Jump off" set, reason not requested';
       }
       $email = $_REQUEST['unsubscribeemail'];
    } else {
       if (isset($_REQUEST['email'])) {
          if (UNSUBSCRIBE_JUMPOFF) {
             $_POST["unsubscribe"] = 1;
             $_POST["unsubscribereason"] = '"Jump off" set, reason not requested';
          }
          $email = $_REQUEST['email'];
       }
    }


    #0013076: Blacklisting posibility for unknown users
    # Set flag for blacklisting
    $blacklist = $_GET['p'] == 'blacklist';

    # only proceed when user has confirm the form
    if ($blacklist && is_email($_REQUEST['unsubscribeemail']) ) {
      $_POST["unsubscribe"] = 1;
      $_POST["unsubscribereason"] = 'Forwarded receiver requested blacklist';
    }
  }

  $unsubscribeemail = (isset($_REQUEST['unsubscribeemail']))?$_REQUEST['unsubscribeemail']:$_REQUEST['email'];

  if ( is_email($unsubscribeemail) && isset($_POST['unsubscribe']) && (isset($_REQUEST['email']) || isset($_REQUEST['unsubscribeemail'])) && isset($_POST['unsubscribereason'])) {

    #0013076: Blacklisting posibility for unknown users
    if ( !$blacklist ) {
      // It would be better to do this above, where the email is set for the other cases.
      // But to prevent vulnaribilities let's keep it here for now. [bas]
      $query = Sql_Fetch_Row_Query("select id,email from {$tables["user"]} where email = \"$email\"");
      $userid = $query[0];
      $email = $query[1];
    }

    if (!$userid) {

      #0013076: Blacklisting posibility for unknown users
      if ( $blacklist ) {
        addUserToBlacklist($email,$_POST['unsubscribereason']);
        addSubscriberStatistics('forwardblacklist',1);
      } else {
        $res .= 'Error: '.$GLOBALS["strUserNotFound"];
        logEvent("Request to unsubscribe non-existent user: ".substr($_POST["email"],0,150));
      }
    } else {
      $result = Sql_query("delete from {$tables["listuser"]} where userid = \"$userid\"");
      $lists = "  * ".$GLOBALS["strAllMailinglists"]."\n";
      # add user to blacklist
      addUserToBlacklist($email,nl2br(strip_tags($_POST['unsubscribereason'])));

      addUserHistory($email,"Unsubscription","Unsubscribed from $lists");
      $unsubscribemessage = ereg_replace("\[LISTS\]", $lists,getUserConfig("unsubscribemessage",$userid));
      sendMail($email, getConfig("unsubscribesubject"), stripslashes($unsubscribemessage), system_messageheaders($email));
      $reason = $_POST["unsubscribereason"] ? "Reason given:\n".stripslashes($_POST["unsubscribereason"]):"No Reason given";
      sendAdminCopy("List unsubscription",$email . " has unsubscribed\n$reason");
      addSubscriberStatistics('unsubscription',1);
    }

    if ($userid)

    //$res .= '<p id="unsub_end">'.$GLOBALS["strUnsubscribeDone"] ."</p>";
    $res .= '<div id="m_logo"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/pc_title_3.gif" alt="メールマガジン停止" /></div>';
    $res .= '<div id="finish_container"><p id="unsub_end">メールマガジンの配信を停止しました。間もなく確認のメールが送信されますのでご確認ください</p></div>';

    #0013076: Blacklisting posibility for unknown users
    if ($blacklist)
      $res .= '<h1>'.$GLOBALS["strYouAreBlacklisted"] ."</h1><P>";
   // $res .= $GLOBALS["PoweredBy"].'</p>';
    $res .= $data["footer"];

    $res .= include "admin/pagedown.php";
    return $res;

  } elseif ( isset($_POST["unsubscribe"]) &&  !is_email($_REQUEST['unsubscribeemail']))  {
    $msg = '<span class="error">メールアドレスを入力してください</span><br>';
  } elseif (!empty($_GET["email"])) {
    $email = trim($_GET["email"]);
  } else {
    if (isset($_REQUEST["email"])) {
      $email = $_REQUEST["email"];
    } elseif (isset($_REQUEST['unsubscribeemail'])) {
      $email = $_REQUEST['unsubscribeemail'];
    } elseif (!isset($email)) {
      $email = '';
    }
  }
  if (!isset($msg)) {
    $msg = '';
  }

  //$res .= '<b>'. $GLOBALS["strUnsubscribeInfo"].'</b><br>'.
  $res .= '<div id="m_logo"><img src="https://campaign.cinemasunshine.co.jp/magazine/images/pc_title_3.gif" alt="メールマガジン停止" /></div>';
  $res .= '<div id="unsub_container"><div id="unsub_top">メールマガジンの配信停止申込</div>'.

  $msg.formStart();
  $res .='<div id="unsub_set"><div id="unsub_mail">登録したメールアドレスを入力してください</div><div id="unsub_mail_input"><input type=text name="unsubscribeemail" value="'.$email.'" ></div></div>';

  /*$res .= '<table id="unsub_table">
  <tr><td>'.$GLOBALS["strEnterEmail"].':</td><td colspan=3><input type=text name="unsubscribeemail" value="'.$email.'" size=40></td></tr>
  </table>';*/

	//一番最初の画面
  if (!$email) {
    $res .= '<div id="unsub_submit"><input type=submit name=unsubscribe value="'.$GLOBALS[strContinue].'"></form></div></div>';
    //$res .= $GLOBALS["PoweredBy"];
    $res .= $data["footer"];
    $res .= include "admin/pagedown.php";
    return $res;
  }

  $current = Sql_Fetch_Array_query("SELECT list.id as listid,user.uniqid as userhash, user.password as password FROM $tables[list] as list,$tables[listuser] as listuser,$tables[user] as user where list.id = listuser.listid and user.id = listuser.userid and user.email = \"$email\"");
  $some = $current["listid"];
  if (ASKFORPASSWORD && !empty($user['password'])) {
    # it is safe to link to the preferences page, because it will still ask for
    # a password
    $hash = $current["userhash"];
  } elseif (isset($_GET['uid']) && $_GET['uid'] == $current['userhash']) {
    # they got to this page from a link in an email
    $hash = $current['userhash'];
  } else {
    $hash = '';
  }

  $finaltext = $GLOBALS["strUnsubscribeFinalInfo"];
  $pref_url = getConfig("preferencesurl");
  $sep = ereg('\?',$pref_url)?'&':'?';
  $finaltext = eregi_replace('\[preferencesurl\]',$pref_url.$sep.'uid='.$hash,$finaltext);


  //ここから下解除できない場合
  if (!$some) {
    #0013076: Blacklisting posibility for unknown users
    if (!$blacklist) {
      //$res .= "<b>".$GLOBALS["strNoListsFound"]."</b></ul>";
      $res .= '<p id="unsub_warning">すでに配信停止状態か、メールマガジンに登録されてないです</p>';
    }
    //$res .= '<p><input type=submit value="'.$GLOBALS["strUnsubscribe"].'">';
    $res .= '<div id="unsub_submit"><input type=submit name=unsubscribe value="'.$GLOBALS[strContinue].'"></form></div></div>';
  } else {
    if ($blacklist) {
      $res .= $GLOBALS["strExplainBlacklist"];
    } elseif (!UNSUBSCRIBE_JUMPOFF) {
      list($r,$c) = explode(",",getConfig("textarea_dimensions"));
      if (!$r) $r = 5;
      if (!$c) $c = 65;
      $res .= $GLOBALS["strUnsubscribeRequestForReason"];
      $res .= sprintf('<br/><textarea name="unsubscribereason" cols="%d" rows="%d" wrap="virtual"></textarea>',$c,$r) . $finaltext;
    }
    //$res .= '<p><input type=submit name="unsubscribe" value="'.$GLOBALS["strUnsubscribe"].'"></p>';
    $res .= '<div id="unsub_submit"><input type=submit name=unsubscribe value="'.$GLOBALS[strContinue].'"></form></div></div>';
  }
  //$res .= '<p>'.$GLOBALS["PoweredBy"].'</p>';
  $res .= $data["footer"];
  $res .= include "admin/pagedown.php";
  return $res;



  }


  //TODO
}

########################################
if (!function_exists("htmlspecialchars_decode")) {
   function htmlspecialchars_decode($string, $quote_style = ENT_COMPAT) {
       return strtr($string, array_flip(get_html_translation_table(HTML_SPECIALCHARS, $quote_style)));
   }
}
function forwardPage($id) {
  global $data, $tables, $envelope;
  $ok = true;
  $subtitle = '';
  $info = '';
  $html = '';
  $form = '';

  ## Check requirements

  # user
  if (!isset($_REQUEST["uid"]) || !$_REQUEST['uid'])
    FileNotFound();

  $firstpage = 1; ## is this the initial page or a followup

  # forward addresses
  $forwardemail = '';
  if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
    $firstpage = 0;
    $forwardPeriodCount = Sql_Fetch_Array_Query(sprintf('select count(user) from %s where date_add(time,interval %s) >= now() and user = %d and status ="sent" ',
      $tables['user_message_forward'],FORWARD_EMAIL_PERIOD, $userdata['id']));
    $forwardemail = stripslashes($_REQUEST['email']);
    $emails = explode("\n",$forwardemail);
    $emails = trimArray($emails);
    $forwardemail = implode("\n", $emails);
    #0011860: forward to friend, multiple emails
    $emailCount = $forwardPeriodCount[0];
    foreach ( $emails as $index => $email) {
      $emails[$index] = trim($email);
      if( is_email($email) ) {
        $emailCount++;
      } else {
        $info .= sprintf('<BR />' . $GLOBALS['strForwardInvalidEmail'], $email);
        $ok = false;
      }
    }
    if ( $emailCount > FORWARD_EMAIL_COUNT ) {
      $info.= '<BR />' . $GLOBALS["strForwardCountReached"];
      $ok = false;
    }
  } else {
    $ok = false;
  }

  # message
  $mid = 0;
  if (isset($_REQUEST['mid'])) {
    $mid = sprintf('%d',$_REQUEST['mid']);
    $req = Sql_Query(sprintf('select * from %s where id = %d',$tables["message"],$mid));
    $messagedata = Sql_Fetch_Array($req);
    $mid = $messagedata['id'];
    if ($mid) {
      $subtitle = $GLOBALS['strForwardSubtitle'].' '.stripslashes($messagedata['subject']);
    }
  } #mid set

  ## get userdata
  $req = Sql_Query("select * from {$tables["user"]} where uniqid = \"".$_REQUEST["uid"]."\"");
  $userdata = Sql_Fetch_Array($req);
  $req = Sql_Query(sprintf('select * from %s where email = "%s"',$tables["user"],$forwardemail));
  $forwarduserdata = Sql_Fetch_Array($req);

  #0011996: forward to friend - personal message
  # text cannot be longer than max, to prevent very long text with only linefeeds total cannot be longer than twice max
  if (FORWARD_PERSONAL_NOTE_SIZE && isset($_REQUEST['personalNote']) ) {
      if (strlen(strip_newlines($_REQUEST['personalNote'])) > FORWARD_PERSONAL_NOTE_SIZE || strlen($_REQUEST['personalNote']) > FORWARD_PERSONAL_NOTE_SIZE  * 2  ) {
        $info .= '<BR />' . $GLOBALS['strForwardNoteLimitReached'];
        $ok = false;
      }
    $personalNote = strip_tags(htmlspecialchars_decode(stripslashes($_REQUEST['personalNote'])));
    $userdata['personalNote'] = $personalNote;
  }

  if ($userdata["id"] && $mid) {
    if ($ok && count($emails)) { ## All is well, send it
      require 'admin/sendemaillib.php';

      #0013845 Lead Ref Scheme
      if (FORWARD_FRIEND_COUNT_ATTRIBUTE) {
        $iCountFriends = getAttributeIDbyName(FORWARD_FRIEND_COUNT_ATTRIBUTE);
      } else {
        $iCountFriends = 0;
      }
      if($iCountFriends) {
        $nFriends = intval(UserAttributeValue($userdata['id'], $iCountFriends));
      }

      #0011860: forward to friend, multiple emails
      foreach ( $emails as $index => $email) {
        #0011860: forward to friend, multiple emails
        $done = Sql_Fetch_Array_Query(sprintf('select user,status,time from %s where forward = "%s" and message = %d',
        $tables['user_message_forward'],$email,$mid));
        $info .= '<BR />' . $email . ': ';
        if ($done['status'] === 'sent') {
          $info .= $GLOBALS['strForwardAlreadyDone'];
        } elseif (isBlackListed($email)) {
          $info .= $GLOBALS['strForwardBlacklistedEmail'];
        } else {
          if (!TEST) {
            # forward the message
            # sendEmail will take care of blacklisting
            if (sendEmail($mid,$email,'forwarded',$userdata['htmlemail'],array(),$userdata)) {
              $info .= $GLOBALS["strForwardSuccessInfo"];
              sendAdminCopy("Message Forwarded",$userdata["email"] . " has forwarded a message $mid to $email");
              Sql_Query(sprintf('insert into %s (user,message,forward,status,time)
                 values(%d,%d,"%s","sent",now())',
                $tables['user_message_forward'],$userdata['id'],$mid,$email));
              if( $iCountFriends ) $nFriends++;
            } else {
              $info .= $GLOBALS["strForwardFailInfo"];
              sendAdminCopy("Message Forwarded",$userdata["email"] . " tried forwarding a message $mid to $email but failed");
              Sql_Query(sprintf('insert into %s (user,message,forward,status,time)
                values(%d,%d,"%s","failed",now())',
                $tables['user_message_forward'],$userdata['id'],$mid,$email));
                $ok = false;
            }
          }
        }
      } # foreach friend
      if( $iCountFriends ) {
        saveUserAttribute($userdata['id'], $iCountFriends,
          array('name' => FORWARD_FRIEND_COUNT_ATTRIBUTE, 'value' => $nFriends));
      }
    } #ok & emails

  } else { # no valid sender
    logEvent("Forward request from invalid user ID: ".substr($_REQUEST["uid"],0,150));
    $info .= '<BR />' . $GLOBALS["strForwardFailInfo"];
    $ok = false;
  }
  $data = PageData($id);
  if (isset($data['language_file']) && is_file(dirname(__FILE__).'/texts/'.basename($data['language_file']))) {
    @include dirname(__FILE__).'/texts/'.basename($data['language_file']);
  }

## BAS Multiple Forward
  ## build response page
  $form = '<form method="post" action="">';
  $form .= sprintf('<input type=hidden name="mid" value="%d">',$mid);
  $form .= sprintf('<input type=hidden name="id" value="%d">',$id);
  $form .= sprintf('<input type=hidden name="uid" value="%s">',$userdata['uniqid']);
  $form .= sprintf('<input type=hidden name="p" value="forward">');
  if (!$ok) {
    #0011860: forward to friend, multiple emails
    if (FORWARD_EMAIL_COUNT == 1) {
      $form .= '<BR /><H2>' .$GLOBALS['strForwardEnterEmail'] . '</H2>';
      $form .= sprintf('<input type=text name="email" value="%s" size=50 class="attributeinput">',$forwardemail);
    } else {
      $form .= '<BR /><H2>' .sprintf($GLOBALS['strForwardEnterEmails'], FORWARD_EMAIL_COUNT) . '</H2>';
      $form .= sprintf('<textarea name="email" rows=10 cols=50 class="attributeinput">%s</textarea>', $forwardemail);
    }

    #0011996: forward to friend - personal message
    if (FORWARD_PERSONAL_NOTE_SIZE ) {
      $form .= sprintf('<h2>' . $GLOBALS['strForwardPersonalNote'] . '</H2>', FORWARD_PERSONAL_NOTE_SIZE);
      $cols=50;
      $rows=min(10,ceil(FORWARD_PERSONAL_NOTE_SIZE / 40));

      $form .=sprintf('<BR/><textarea type=text name="personalNote" rows=%d cols=%d class="attributeinput">%s</textarea>', $rows, $cols, $personalNote);
    }
    $form .= sprintf('<br /><input type=submit value="%s"></form>',$GLOBALS['strContinue']);
  }

### END BAS

### Michiel, remote response page

  $remote_content = '';
  if (preg_match("/\[URL:([^\s]+)\]/i",$messagedata['message'],$regs)) {
    if (isset($regs[1]) && strlen($regs[1])) {
      $url = $regs[1];
      if (!preg_match('/^http/i',$url)) {
        $url = 'http://'.$url;
      }
      $remote_content = fetchUrl($url);
    }
  }

  if (!empty($remote_content) && preg_match('/\[FORWARDFORM\]/',$remote_content,$regs)) {
    if ($firstpage) {
      ## this is the initial page, not a follow up one.
      $remote_content = str_replace($regs[0],$info.$form,$remote_content);
    } else {
      $remote_content = str_replace($regs[0],$info,$remote_content);
    }
    $res = $remote_content;
  } else {
    $res = '<title>'.$GLOBALS["strForwardTitle"].'</title>';
    $res .= $data["header"];
    $res .= '<h1>'.$subtitle.'</h1>';
    if ($ok) {
      $res .= '<h2>'.$info.'</h2>';
    } else {
      $res .= '<div class="missing">'.$info.'</div>';
    }
    $res .= $form;
    //$res .= "<P>".$GLOBALS["PoweredBy"].'</p>';
    $res .= $data["footer"];
  }
### END MICHIEL
  return $res;
}

  function googleAnalyticsGetImageUrl() {
    global $GA_ACCOUNT, $GA_PIXEL;
    $url = "";
    $url .= $GA_PIXEL . "?";
    $url .= "utmac=" . $GA_ACCOUNT;
    $url .= "&utmn=" . rand(0, 0x7fffffff);
    $referer = $_SERVER["HTTP_REFERER"];
    $query = $_SERVER["QUERY_STRING"];
    $path = $_SERVER["REQUEST_URI"];
    if (empty($referer)) {
      $referer = "-";
    }
    $url .= "&utmr=" . urlencode($referer);
    if (!empty($path)) {
      $url .= "&utmp=" . urlencode($path);
    }
    $url .= "&guid=ON";
    return str_replace("&", "&amp;", $url);
  }


?>

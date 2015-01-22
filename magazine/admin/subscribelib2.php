<?php
require_once dirname(__FILE__)."/accesscheck.php";

mt_srand((double)microtime()*1000000);
$randval = mt_rand();

//モバイル処理
$is_mobile;
$agent = $_SERVER['HTTP_USER_AGENT'];
if(preg_match("/^DoCoMo/i", $agent) || preg_match("/^(J\-PHONE|Vodafone|MOT\-[CV]|SoftBank)/i", $agent) || preg_match("/^KDDI\-/i", $agent) || preg_match("/UP\.Browser/i", $agent)){
	$is_mobile=true;
} else {
	$is_mobile=false;
}

if (empty($id) && isset($_GET['id'])) {
	$id = sprintf('%d',$_GET["id"]);
} elseif (!isset($id)) {
	$id = 0;
}

if (!$id && $_GET["page"] != "import1") {
	Fatal_Error("Invalid call");
	exit;
}
require_once dirname(__FILE__)."/date.php";
$date = new Date();
$_POST['attribute7'] = mb_convert_encoding($_POST['attribute7'],'UTF-8','UTF-8,SJIS,EUC-JP');

## Check if input is complete
//VALIDATE
$allthere = 1;
$subscribepagedata = PageData($id);
if (isset($subscribepagedata['language_file']) && is_file(dirname(__FILE__).'/../texts/'.basename($subscribepagedata['language_file']))) {
	@include_once dirname(__FILE__).'/../texts/'.basename($subscribepagedata['language_file']);
}
# Allow customisation per installation
if (is_file($_SERVER['DOCUMENT_ROOT'].'/'.basename($GLOBALS["language_module"]))) {
	include_once $_SERVER['DOCUMENT_ROOT'].'/'.basename($GLOBALS["language_module"]);
}
if (!empty($data['language_file']) && is_file($_SERVER['DOCUMENT_ROOT'].'/'.basename($data['language_file']))) {
	include_once $_SERVER['DOCUMENT_ROOT'].'/'.basename($data['language_file']);
}

$required = array();   # id's of missing attribbutes
if (sizeof($subscribepagedata)) {
	$attributes = explode('+',$subscribepagedata["attributes"]);
	foreach ($attributes as $attribute) {
		if (isset($subscribepagedata[sprintf('attribute%03d',$attribute)]) && $subscribepagedata[sprintf('attribute%03d',$attribute)]) {
			list($dummy,$dummy2,$dummy3,$req) = explode('###',$subscribepagedata[sprintf('attribute%03d',$attribute)]);
			if ($req) {
				array_push($required,$attribute);
			}
		}
	}
} else {
	$req = Sql_Query(sprintf('select * from %s',$GLOBALS['tables']['attribute']));
	while ($row = Sql_Fetch_Array($req)) {
		if ($row['required']) {
			array_push($required,$row['id']);
		}
	}
}
//size
//var_dump($required);
//exit;
//TODO
if (sizeof($required)) {
	$required_ids = join(',',$required);
	# check if all required attributes have been entered;
	if ($required_ids) {
		$res = Sql_Query("select * from {$GLOBALS["tables"]["attribute"]} where id in ($required_ids)");
		$allthere = 1;
		$missing = '';
		while ($row = Sql_Fetch_Array($res)) {
			$fieldname = "attribute" .$row["id"];
			$thisonemissing = 0;
			if ($row["type"] != "hidden") {
				//yun追加 日付処理
				if ($row["type"] == "date") {
					if (empty($_POST["year"][$fieldname]) || empty($_POST["month"][$fieldname]) || empty($_POST["day"][$fieldname])) {
						$missing .= $row["name"] .", ";
						$allthere = $allthere && !true;
					}
				} else {
					$thisonemissing = empty($_POST[$fieldname]);
					if ($thisonemissing)
					$missing .= $row["name"] .", ";
					$allthere = $allthere && !$thisonemissing;
				}
			}
		}
		//個人情報同意
		if (empty($_POST["agreement"])) {
			//$missing .= "agreement, ";
			$allthere = $allthere && !true;
		}else {
		}

		$missing = substr($missing,0,-2);
		if ($allthere) {
			$missing = '';
		}
	}
}

#
# If need to check for double entry of email address
#
if (isset($subscribepagedata['emaildoubleentry']) && $subscribepagedata['emaildoubleentry'] == 'yes')
{
	if (!(isset($_POST['email']) && isset($_POST['emailconfirm']) && $_POST['email'] == $_POST['emailconfirm']))
	{
		$allthere=0;
		$missing = $GLOBALS["strEmailsNoMatch"];
	}
}

// anti spambot check
if (!empty($_POST['VerificationCodeX'])) {
	if (NOTIFY_SPAM) {
		$msg = $GLOBALS['I18N']->get('spamblockemailintro');
		foreach ($_REQUEST as $key => $val) {
			$msg .= "\n".'Form field: '.htmlentities($key)."\n".'================='."\nSubmitted value: ".htmlentities($val)."\n".'=============='."\n\n";
		}
		sendAdminCopy("phplist Spam blocked","\n".$msg);
	}
	unset($msg);
	return;
}

if (!isset($_POST['passwordreq'])) $_POST['passwordreq'] = '';
if (!isset($_POST['password'])) $_POST['password'] = '';

if ($allthere && ASKFORPASSWORD && ($_POST["passwordreq"] || $_POST["password"])) {
	if (empty($_POST["password"]) || $_POST["password"] != $_POST["password_check"]) {
		$allthere = 0;
		$missing = $GLOBALS["strPasswordsNoMatch"];
	}
	if ($_POST["email"]) {
		$curpwd = Sql_Fetch_Row_Query(sprintf('select password from %s where email = "%s"',
		$GLOBALS["tables"]["user"],$_POST["email"]));

		if ($curpwd[0] && $_POST["password"] != $curpwd[0]) {
			$missing = $GLOBALS["strInvalidPassword"];
		}
	}
}

if (isset($_POST["email"]) && $check_for_host) {
	list($username,$domaincheck) = split('@',$_POST["email"]);
	#  $mxhosts = array();
	#  $validhost = getmxrr ($domaincheck,$mxhosts);
	$validhost = checkdnsrr($domaincheck, "MX") || checkdnsrr($domaincheck, "A");
} else {
	$validhost = 1;
}
$listsok = ((!ALLOW_NON_LIST_SUBSCRIBE && isset($_POST["list"]) && is_array($_POST["list"])) || ALLOW_NON_LIST_SUBSCRIBE);

//TODO 分岐 1 フォームが成功の時の画面
if (isset($_POST["subscribe"]) && is_email($_POST["email"]) && $listsok && $allthere && $validhost) {

	if($is_mobile) {
		print '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>仮登録完了 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/mobile_title_1.gif" alt="シネマサンシャインメールマガジン会員サービス入会申込"/></div>
</center>
<br><img src="images/spacer.gif" height="10"><br>
<font size="1">
<font size="2" style="color:#019fe8;">仮登録が完了致しました｡</font><br />
登録ﾒｰﾙｱﾄﾞﾚｽに仮登録完了のﾒｰﾙを送信しましたので<br />
ﾒｰﾙ本文内の本登録URLより本登録をお済ませください｡
<br />
ドメイン：cinemasunshine.co.jp
</font>
<br><img src="images/spacer.gif" height="10"><br>
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
</body>
</html>
';
	} else {
		include "admin/pagetop.php";

	}


	$history_entry = '';
	# make sure to save the correct data
	if ($subscribepagedata["htmlchoice"] == "checkfortext" && !$textemail) {
		$htmlemail = 1;
	}
	else {
		$htmlemail = isset($_POST["htmlemail"]) && $_POST["htmlemail"];
	}

	# now check whether this user already exists.
	//ユーザがすでにいるかのチェック　e mailとして
	$email = $_POST["email"];
	if (preg_match("/(.*)\n/U",$email,$regs)) {
		$email = $regs[1];
	}


	$result = Sql_query("select * from {$GLOBALS["tables"]["user"]} where email = \"$email\"");#"

	if (isset($_POST['rssfrequency'])) {
		$rssfrequency = validateRssFrequency($_POST['rssfrequency']);
	}
	else {
		$rssfrequency = '';
	}

	//TODO
	//ユーザデータinsert
	if (!Sql_affected_rows()) {
		# they do not exist, so add them
		$query = sprintf('insert into %s (email,entered,uniqid,confirmed,
      htmlemail,subscribepage,rssfrequency) values("%s",now(),"%s",0,%d,%d,"%s")',
		$GLOBALS["tables"]["user"],addslashes($email),getUniqid(),$htmlemail,$id,
		$rssfrequency);
		$result = Sql_query($query);
		$userid = Sql_Insert_Id();
		addSubscriberStatistics('total users',1);
	}
	//データupate
	//すでに仮登録している場合もupdate
	else {
		# they do exist, so update the existing record
		# read the current values to compare changes
		$old_data = Sql_fetch_array($result);
		$userid = $old_data["id"];
		$old_data = array_merge($old_data,getUserAttributeValues('',$userid));
		$history_entry = 'http://'.getConfig("website").$GLOBALS["adminpages"].'/?page=user&id='.$userid."\n\n";

		$query = sprintf('update %s set email = "%s",htmlemail = %d,subscribepage = %d,rssfrequency = "%s" where id = %d',$GLOBALS["tables"]["user"],addslashes($email),$htmlemail,$id,$rssfrequency,$userid);
		$result = Sql_query($query);
	}

	//パスワードを求められている場合　なんだろう
	if (ASKFORPASSWORD && $_POST["password"]) {
		if (ENCRYPTPASSWORD) {
			$newpassword = sprintf('%s',md5($_POST["password"]));
		}
		else {
			$newpassword = sprintf('%s',$_POST["password"]);
		}
		# see whether is has changed

		$curpwd = Sql_Fetch_Row_Query("select password from {$GLOBALS["tables"]["user"]} where id = $userid");

		if ($_POST["password"] != $curpwd[0]) {
			$storepassword = 'password = "'.$newpassword.'"';
			Sql_query("update {$GLOBALS["tables"]["user"]} set passwordchanged = now(),$storepassword where id = $userid");
		}
		else {
			$storepassword = "";
		}
	}
	else {
		$storepassword = "";
	}

	# subscribe to the lists
	$lists = '';

	if (isset($_POST['list']) && is_array($_POST["list"])) {
		while(list($key,$val)= each($_POST["list"])) {
			if ($val == "signup") {
				$key = sprintf('%d',$key);
				if (!empty($key)) {
					$result = Sql_query(sprintf('replace into %s (userid,listid,entered) values(%d,%d,now())',$GLOBALS["tables"]["listuser"],$userid,$key));
					$lists .= "\n  * ".listname($key);

					addSubscriberStatistics('subscribe',1,$key);
				} else {
					## hack attempt...
					exit;
				}
			}
		}
	}

	# remember the users attributes
	# make sure to only remember the ones from this subscribe page
	$history_entry .= 'Subscribe page: '.$id;
	array_push($attributes,0);
	$attids = join_clean(',',$attributes);

	if ($attids && $attids != "") {
		$res = Sql_Query("select * from ".$GLOBALS["tables"]["attribute"]." where id in ($attids)");

		while ($row = Sql_Fetch_Array($res)) {
			$fieldname = "attribute" .$row["id"];
			$value = $_POST[$fieldname];

			if (is_array($value)) {
				$newval = array();

				foreach ($value as $val) {
					array_push($newval,sprintf('%0'.$checkboxgroup_storesize.'d',$val));
				}

				$value = join(",",$newval);
			}
			elseif ($row["type"] == "date") {
				$value = $date->getDate($fieldname);
			}
			elseif ($row['type'] != 'textarea') {
				if (preg_match("/(.*)\n/U",$value,$regs)) {
					$value = $regs[1];
				}
			}

			Sql_Query(sprintf('replace into %s (attributeid,userid,value) values("%s","%s","%s")',

			$GLOBALS["tables"]["user_attribute"],$row["id"],$userid,$value));
			$history_entry .= "\n".$row["name"] . ' = '.UserAttributeValue($userid,$row["id"]);
			#    }
		}
	}

	$information_changed = 0;

	if (isset($old_data) && is_array($old_data)) {
		$history_subject = 'Re-Subscription';
		# when they submit a new subscribe
		$current_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$GLOBALS["tables"]["user"],$userid));
		$current_data = array_merge($current_data,getUserAttributeValues('',$userid));
		foreach ($current_data as $key => $val) {
			if (!is_numeric($key))
			if ($old_data[$key] != $val && $key != "password" && $key != "modified") {
				$information_changed = 1;
				$history_entry .= "\n$key = $val\n*changed* from $old_data[$key]";
			}
		}
		if (!$information_changed) {
			$history_entry .= "\nNo user details changed";
		}
	}
	else {
		$history_subject = 'Subscription';
	}

	$history_entry .= "\n\nList Membership: \n$lists\n";

	$subscribemessage = ereg_replace('\[LISTS\]', $lists, getUserConfig("subscribemessage:$id",$userid));

	$blacklisted = isBlackListed($email);

	// print '<title>'.$GLOBALS["strSubscribeTitle"].'</title>';
	print $subscribepagedata["header"];

	/* if (isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"]) {
	 print '<p><b>You are logged in as '.$_SESSION["logindetails"]["adminname"].'</b></p>';
	 print '<p><a href="'.$adminpages.'">Back to the main admin page</a></p>';

	 if ($_POST["makeconfirmed"] && !$blacklisted) {
	 $sendrequest = 0;
	 Sql_Query(sprintf('update %s set confirmed = 1 where email = "%s"',$GLOBALS["tables"]["user"],$email));
	 addUserHistory($email,$history_subject." by ".$_SESSION["logindetails"]["adminname"],$history_entry);
	 }
	 elseif ($_POST["makeconfirmed"]) {
	 print '<p>'.$GLOBALS['I18N']->get('Email is blacklisted, so request for confirmation has been sent.').'<br/>';
	 print $GLOBALS['I18N']->get('If user confirms subscription, they will be removed from the blacklist.').'</p>';

	 $sendrequest = 1;
	 }
	 else {
	 $sendrequest = 1;
	 }
	 }
	 else {*/
	$sendrequest = 1;
	/* }*/

	# personalise the thank you page
	if ($subscribepagedata["thankyoupage"]) {
		$thankyoupage = $subscribepagedata["thankyoupage"];
	}
	else {
		$thankyoupage = '<h3>'.$strThanks.'</h3>'. $strEmailConfirmation;
	}

	if (eregi("\[email\]",$thankyoupage,$regs))
	$thankyoupage = eregi_replace("\[email\]",$email,$thankyoupage);

	$user_att = getUserAttributeValues($email);

	while (list($att_name,$att_value) = each ($user_att)) {
		if (eregi("\[".$att_name."\]",$thankyoupage,$regs))
		$thankyoupage = eregi_replace("\[".$att_name."\]",$att_value,$thankyoupage);
	}

	if (is_array($GLOBALS["plugins"])) {
		reset($GLOBALS["plugins"]);

		foreach ($GLOBALS["plugins"] as $name => $plugin) {
			$thankyoupage = $plugin->parseThankyou($id,$userid,$thankyoupage);
		}
	}

	if ($sendrequest && $listsok) { #is_array($_POST["list"])) {
	
	
	//  ポストされたワンタイムチケットを取得する。
	$ticket = isset($_POST['ticket'])    ? $_POST['ticket']    : '';

	//  セッション変数に保存されたワンタイムチケットを取得する。
	$save   = isset($_SESSION['ticket']) ? $_SESSION['ticket'] : '';

	$mail_result= true;
	if ($ticket === $save) {

	    echo 'Normal Access';
	    $mail_result = sendMail($email, getConfig("subscribesubject:$id"), $subscribemessage,system_messageheaders($email),'',1);
	   

	} 
	//  セッション変数を解放し、ブラウザの戻るボタンで戻った場合に備え
	//  る。
	unset($_SESSION['ticket']);
	
	
	
	
		
		//$mail_result = true;
		
		if ($mail_result) {
			sendAdminCopy("Lists subscription","\n".$email . " has subscribed\n\n$history_entry");
			addUserHistory($email,$history_subject,$history_entry);
			//yun 結果文言

			if(!$is_mobile) {
				print '<div id="m_logo"><img src="http://www.cinemasunshine.co.jp/magazine/images/pc_title_1.gif" alt="メールマガジン会員サービス" /></div>';
				print $thankyoupage;
			}

			/*print '<h3 id="confirm">メールマガジンにご登録頂、ありがとうございます。</h3>
			 <p id="confirm_p">間もなく【シネマサンシャインメールマガジン】から登録確定のメールが送信されます。</p>
			 ';*/
		}
		else {
			//print '<h3>'.$strEmailFailed.'</h3>';
			print '<h3 id="confirm">システムエラーが発生しました。大変申し訳ございませんが、最初からやり直して下さい。 </h3>';

			if ($blacklisted) {
				print '<p>'.$GLOBALS["strYouAreBlacklisted"].'</p>';
			}
		}
	}
	else {
		print $thankyoupage;

		/*
		 if ($_SESSION["adminloggedin"]) {
		 print "<p>User has been added and confirmed</p>";
		 }*/
	}

	//print "<P>".$PoweredBy.'</p>';
	//print $subscribepagedata["footer"];
	if(!$is_mobile) {
		print include "admin/pagedown.php";
	}


	//  exit;
	// Instead of exiting here, we return 2. So in lists/index.php
	// We can decide, whether to show subcribe page or not.
	## issue 6508
	return 2;
}

//TODO 分岐 2 修正画面
elseif (isset($_POST["update"]) && $_POST["update"] && is_email($_POST["email"]) && $allthere) {
	$email = trim($_POST["email"]);
	if (preg_match("/(.*)\n/U",$email,$regs)) {
		$email = $regs[1];
	}
	if ($_GET["uid"]) {
		$req = Sql_Fetch_Row_Query(sprintf('select id from %s where uniqid = "%s"',
		$GLOBALS["tables"]["user"],$_GET["uid"]));
		$userid = $req[0];
	} else {
		$req = Sql_Fetch_Row_query("select id from {$GLOBALS["tables"]["user"]} where email = \"".$_GET["email"]."\"");
		$userid = $req[0];
	}
	if (!$userid)
	Fatal_Error("Error, no such user");
	# update the existing record, check whether the email has changed
	$req = Sql_Query("select * from {$GLOBALS["tables"]["user"]} where id = $userid");
	$data = Sql_fetch_array($req);

	# check that the password was provided if required
	# we only require a password if there is one, otherwise people are blocked out
	# when switching to requiring passwords
	if (ASKFORPASSWORD && $data['password']) {
		# they need to be "logged in" for this
		if (empty($_SESSION['userloggedin'])) {
			Fatal_Error("Access Denied");
			exit;
		}
		$checkpassword = '';
		$allow = 0;
		# either they have to give the current password, or given two new ones
		if (ENCRYPTPASSWORD) {
			$checkpassword = sprintf('%s',md5($_POST["password"]));
		} else {
			$checkpassword = sprintf('%s',$_POST["password"]);
		}
		if (!empty($_POST['password_check'])) {
			$allow = $_POST['password_check'] == $_POST['password'] && !empty($_POST['password']);
		} else {
			$allow = (!empty($_POST['password']) && $data['password'] == $checkpassword) || empty($_POST['password']);
		}

		if (!$allow) {
			# @@@ this check should be done above, so the error can be embedded in the template
			print $GLOBALS["strPasswordsNoMatch"];
			exit;
		}
	}

	# check whether they are changing to an email that already exists, should not be possible
	$req = Sql_Query("select uniqid from {$GLOBALS["tables"]["user"]} where email = \"$email\"");
	if (Sql_Affected_Rows()) {
		$row = Sql_Fetch_Row($req);
		if ($row[0] != $_GET["uid"]) {
			Fatal_Error("Cannot change to that email address.
      <br/>This email already exists.
      <br/>Please use the preferences URL for this email to make updates.
      <br/>Click <a href=\"".getConfig("preferencesurl")."&email=$email\">here</a> to request your personal location");
			exit;
		}
	}
	# read the current values to compare changes
	$old_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$GLOBALS["tables"]["user"],$userid));
	$old_data = array_merge($old_data,getUserAttributeValues('',$userid));
	$history_entry = 'http://'.getConfig("website").$GLOBALS["adminpages"].'/?page=user&id='.$userid."\n\n";

	if (ASKFORPASSWORD && $_POST["password"]) {
		if (ENCRYPTPASSWORD) {
			$newpassword = sprintf('%s',md5($_POST["password"]));
		} else {
			$newpassword = sprintf('%s',$_POST["password"]);
		}
		# see whether is has changed
		$curpwd = Sql_Fetch_Row_Query("select password from {$GLOBALS["tables"]["user"]} where id = $userid");
		if ($_POST["password"] != $curpwd[0]) {
			$storepassword = 'password = "'.$newpassword.'",';
			Sql_query("update {$GLOBALS["tables"]["user"]} set passwordchanged = now() where id = $userid");
			$history_entry .= "\nUser has changed their password\n";
			addSubscriberStatistics('password change',1);
		} else {
			$storepassword = "";
		}
	} else {
		$storepassword = "";
	}

	$rssfrequency = validateRssFrequency($_POST['rssfrequency']);
	$query = sprintf('update %s set email = "%s", %s htmlemail = %d, rssfrequency = "%s" where id = %d',
	$GLOBALS["tables"]["user"],addslashes($_POST["email"]),$storepassword,$_POST["htmlemail"],$rssfrequency,$userid);
	#print $query;
	$result = Sql_query($query);
	if ($data["email"] != $email) {
		$emailchanged = 1;
		Sql_Query(sprintf('update %s set confirmed = 0 where id = %d',$GLOBALS["tables"]["user"],$userid));
	}

	# subscribe to the lists
	# first take them off the ones, then re-subscribe
	if ($subscribepagedata["lists"]) {
		$subscribepagedata["lists"] = preg_replace("/^\,/","",$subscribepagedata["lists"]);
		Sql_query(sprintf('delete from %s where userid = %d and listid in (%s)',$GLOBALS["tables"]["listuser"],$userid,$subscribepagedata["lists"]));
		$liststat = explode(',',$subscribepagedata["lists"]);
	} else {
		Sql_query(sprintf('delete from %s where userid = %d',$GLOBALS["tables"]["listuser"],$userid));
	}

	$lists = "";
	if (is_array($_POST["list"])) {
		while(list($key,$val)= each($_POST["list"])) {
			if ($val == "signup") {
				$result = Sql_query("replace into {$GLOBALS["tables"]["listuser"]} (userid,listid,entered) values($userid,$key,now())");
				#        $lists .= "  * ".$_POST["listname"][$key]."\n";
			}
		}
	}
	# check list membership
	$req = Sql_Query(sprintf('select * from %s listuser,%s list where listuser.userid = %d and listuser.listid = list.id and list.active',$GLOBALS['tables']['listuser'],$GLOBALS['tables']['list'],$userid));
	while ($row = Sql_Fetch_Array($req)) {
		$lists .= "  * ".listName($row['listid'])."\n";
	}

	if ($lists == "")
	$lists = "No Lists";
	if ($lists == "")
	$lists = "No Lists";

	$datachange .= "$strEmail : ".$email . "\n";
	if ($subscribepagedata["htmlchoice"] != "textonly"
	&& $subscribepagedata["htmlchoice"] != "htmlonly") {
		$datachange .= "$strSendHTML : ";
		$datachange .= $_POST["htmlemail"] ? "$strYes\n":"$strNo\n";
	}
	$rssfrequency = validateRssFrequency($_POST['rssfrequency']);
	if ($rssfrequency) {
		$datachange .= "$strFrequency : ".$rssfrequency."\n";
	}

	# remember the users attributes
	$attids = join_clean(',',$attributes);
	if ($attids && $attids != "") {
		$res = Sql_Query("select * from ".$GLOBALS["tables"]["attribute"] ." where id in ($attids)");
		while ($attribute = Sql_Fetch_Array($res)) {
			$fieldname = "attribute" .$attribute["id"];
			$value = $_POST[$fieldname];
			$replace = 1;#isset($_POST[$fieldname]);
			if (is_array($value)) {
				$values = array();
				foreach ($value as $val) {
					array_push($values,sprintf('%0'.$checkboxgroup_storesize.'d',$val));
				}
				$value = join(",",$values);
			} elseif ($attribute["type"] == "date") {
				$value = $date->getDate($fieldname);
			} elseif ($row['type'] != 'textarea') {
				if (preg_match("/(.*)\n/U",$value,$regs)) {
					$value = $regs[1];
				}
			}
			if ($replace) {
				Sql_query(sprintf('replace into %s (attributeid,userid,value) values("%s","%s","%s")',
				$GLOBALS["tables"]["user_attribute"],$attribute["id"],$userid,$value));
				if ($attribute["type"] != "hidden") {
					$datachange .= strip_tags($attribute["name"]) . " : ";
					if ($attribute["type"] == "checkbox")
					$datachange .= $value?$strYes:$strNo;
					elseif ($attribute["type"] != "date" && $attribute["type"] != "textline" && $attribute["type"] != "textarea")
					$datachange .= AttributeValue($attribute["tablename"],$value);
					else
					$datachange .= stripslashes($value);
					$datachange .= "\n";
				}
			}
		}
	}
	$current_data = Sql_Fetch_Array_Query(sprintf('select * from %s where id = %d',$GLOBALS["tables"]["user"],$userid));
	$current_data = array_merge($current_data,getUserAttributeValues('',$userid));
	foreach ($current_data as $key => $val) {
		if (!is_numeric($key))
		if ($old_data[$key] != $val && $key != "password" && $key != "modified") {
			$information_changed = 1;
			$history_entry .= "$key = $val\n*changed* from $old_data[$key]\n";
		}
	}
	if (!$information_changed) {
		$history_entry .= "\nNo user system details changed";
	}
	$history_entry .= "\n\nList Membership: \n$lists\n";

	$message = ereg_replace('\[LISTS\]', $lists, getUserConfig("updatemessage",$userid));
	$message = ereg_replace('\[USERDATA\]', $datachange, $message);
	if ($emailchanged) {
		$newaddressmessage = ereg_replace('\[CONFIRMATIONINFO\]', getUserConfig("emailchanged_text",$userid), $message);
		$oldaddressmessage = ereg_replace('\[CONFIRMATIONINFO\]', getUserConfig("emailchanged_text_oldaddress",$userid), $message);
	} else {
		$message = ereg_replace('\[CONFIRMATIONINFO\]', "", $message);
	}

	//print '<title>'.$GLOBALS["strPreferencesTitle"].'</title>';
	//print $subscribepagedata["header"];
	if (!TEST) {
		if ($emailchanged) {
			if (sendMail($data["email"],getConfig("updatesubject"),$oldaddressmessage, system_messageheaders($email),'') &&
			sendMail($email,getConfig("updatesubject"),$newaddressmessage, system_messageheaders($email),'')) {
				$ok = 1;
				sendAdminCopy("Lists information changed","\n".$data["email"] . " has changed their information.\n\nThe email has changed to $email.\n\n$history_entry");
				addUserHistory($email,"Change",$history_entry);
			} else {
				$ok = 0;
			}
		} else {
			if (sendMail($email, getConfig("updatesubject"), $message, system_messageheaders($email),'')) {
				$ok = 1;
				sendAdminCopy("Lists information changed","\n".$data["email"] . " has changed their information\n\n$history_entry");
				addUserHistory($email,"Change",$history_entry);
			} else {
				$ok = 0;
			}
		}
	} else {
		$ok = 1;
	}
	if ($ok) {
		if ($is_mobile) {
		print '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>情報修正完了 | シネマサンシャイン</title>
</head>
<body>
<center>
<div><img src="images/mobile_title_2.gif" alt="シネマサンシャインメールマガジン会員サービス修正"/></div>
</center>
<br><img src="images/spacer.gif" height="10"><br>
<font size="1">
<font size="2" style="color:#019fe8;">メールマガジン登録内容が変更されました。</font><br />
メールマガジン登録内容変更完了のメールを送信しましたのでご確認ください。
</font>
<br><img src="images/spacer.gif" height="10"><br>
<center>
<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>
</center>
</body>
</html>';

		} else {
include "admin/pagetop.php";
print '<div id="m_logo"><img src="http://www.cinemasunshine.co.jp/magazine/images/pc_title_2.gif" alt="メールマガジン情報更新" /></div>';
print '<div id="finish_container">
<p id="kousin1">メールマガジン登録内容が変更されました。</p>

<p id="kousin2">メールマガジン登録内容変更完了のメールを送信しましたのでご確認ください。</p>
</div>
';
print include "admin/pagedown.php";
		}
		//print '<h3>'.$GLOBALS["strPreferencesUpdated"].'</h3>';
		//if ($emailchanged)
		//echo $strPreferencesEmailChanged;
		//print "<br/>";
		//echo $strPreferencesNotificationSent;
	} else {
		print '<p id="kousin">'.$strEmailFailed.'</p>';
	}
	//print "<P>".$PoweredBy.'</p>';
	//print $subscribepagedata["footer"];
	// exit;
	// Instead of exiting here, we return 3. So in lists/index.php
	// We can decide, whether to show preferences page or not.
	## mantis issue 6508
	return 3;
	//TODO
} elseif ((isset($_POST["subscribe"]) || isset($_POST["update"]))) {
	//TODO ERROR　メッセージ部分
	/*
	if(!is_email($_POST["email"])) {
	$msg = '<div class="missing">メールアドレスが正しくありません。'.'</div><br/>';
	}*/
	$f_name = $_POST["attribute7"];
	$f_mail = $_POST["email"];
	$f_emailconfirm = $_POST["emailconfirm"];
	$f_sex = $_POST["attribute2"];
	$f_year = $_POST["year"]["attribute5"];
	$f_month = $_POST["month"]["attribute5"];
	$f_day = $_POST["day"]["attribute5"];
	$f_agree = $_POST["agreement"];


	$error;
	if ("$f_agree" == "") {
		$error[] = "個人情報の取り扱いに同意していただけるお客様のみご登録頂けます。";
	}
	if ("$f_name" == "") {
		$error[] = "お名前を入力してください。";
	}
	if ("$f_mail" == "") {
		$error[] = "メールアドレスを入力してください。";
	} else {
		if (!is_email($f_mail)) {
			$error[] = "メールアドレスを正しく入力してください。";
		}
	}
	if ("$f_emailconfirm" == "") {
		$error[] = "メールアドレス(確認)を入力してください。";
	} else {
		if (!is_email($f_emailconfirm)) {
			$error[] = "メールアドレス(確認)を正しく入力してください。";
		}
	}

	if ("$f_mail" != "" && "$f_emailconfirm" != "") {

		if ($f_mail != $f_emailconfirm) {
			$error[] = "メールアドレスが一致しません。";
		}

	}
	if ("$f_sex" == "") {
		$error[] = "性別を選択してください。";
	}
	if ("$f_year" == "") {
		$error[] = "年を選択してください。";
	}
	if ("$f_month" == "") {
		$error[] = "月を選択してください。";
	}
	if ("$f_day" == "") {
		$error[] = "日を選択してください。";
	}
	if (count($error) != 0) {
		$msg .= '<ul id="error_ul">';
		for ($i=0; $i < count($error);$i++) {
			$msg .= "<li>".$error[$i]."</li>";
		}
		$msg .= "</ul>";
	}
	//yun エラーがある場合は何にもリターンしないけど。。
	return 10;
} elseif ((isset($_POST["subscribe"]) || isset($_POST["update"])) && !$validhost) {
	$msg = '<div class="missing">'.$strInvalidHostInEmail.'</div><br/>';
	//return 222;
} elseif ((isset($_POST["subscribe"]) || isset($_POST["update"])) && $missing) {
	$msg = '<div class="missing">'."$strValuesMissing: $missing".'</div><br/>';
	//return 333333;
} elseif ((isset($_POST["subscribe"]) || isset($_POST["update"])) && !isset($_POST["list"]) && !ALLOW_NON_LIST_SUBSCRIBE) {
	$msg = '<div class="missing">'.$strEnterList.'</div><br/>';
	//return 44444;
} else {
	//return 5555;
	#  $msg = 'Unknown Error';
}

function ListAvailableLists($userid = 0,$lists_to_show = "") {
	global $tables;
	if (isset($_POST['list'])) {
		$list = $_POST["list"];
	} else {
		$list = '';
	}
	$subselect = "";$listset = array();

	$showlists = explode(",",$lists_to_show);
	foreach ($showlists as $listid)
	if (preg_match("/^\d+$/",$listid))
	array_push($listset,$listid);
	if (sizeof($listset) >= 1) {
		$subselect = "where id in (".join(",",$listset).") ";
	}

	$some = 0;
	$html = '<ul class="list">';
	$result = Sql_query("SELECT * FROM {$GLOBALS["tables"]["list"]} $subselect order by listorder, name");
	while ($row = Sql_fetch_array($result)) {
		if ($row["active"]) {
			$html .= '<li class="list"><input type="checkbox" name="list['.$row["id"] . ']" value=signup ';
			if (isset($list[$row["id"]]) && $list[$row['id']] == "signup")
			$html .= "checked";
			if ($userid) {
				$req = Sql_Fetch_Row_Query(sprintf('select userid from %s where userid = %d and listid = %d',
				$GLOBALS["tables"]["listuser"],$userid,$row["id"]));
				if (Sql_Affected_Rows())
				$html .= "checked";
			}
			$html .= " /><b>".stripslashes($row["name"]).'</b><div class="listdescription">';
			$desc = nl2br(StripSlashes($row["description"]));
			$html .= '<input type=hidden name="listname['.$row["id"] . ']" value="'.htmlspecialchars(stripslashes($row["name"])).'"/>';
			$html .= $desc.'</div></li>';
			$some++;
			if ($some == 1) {
				$singlelisthtml = sprintf('<input type="hidden" name="list[%d]" value="signup">',$row["id"]);
				$singlelisthtml .= '<input type="hidden" name="listname['.$row["id"] . ']" value="'.htmlspecialchars(stripslashes($row["name"])).'"/>';
			}
		}
	}
	$html .= '</ul>';
	$hidesinglelist = getConfig("hide_single_list");
	if (!$some) {
		global $strNotAvailable;
		return '<p>'.$strNotAvailable.'</p>';
	} elseif ($some == 1 && $hidesinglelist == "true") {
		return $singlelisthtml;
	} else {
		global $strPleaseSelect;
		return '<p>'.$strPleaseSelect .':</p>'.$html;
	}
}

#TODO
function ListAttributes($attributes,$attributedata,$htmlchoice = 0,$userid = 0,$emaildoubleentry='no' ) {
	global $strPreferHTMLEmail,$strPreferTextEmail,
	$strEmail,$tables,$table_prefix,$strPreferredFormat,$strText,$strHTML;
	/*  if (!sizeof($attributes)) {
	 return "No attributes have been defined for this page";
	 }
	 */
	//emailのところ start

	if ($userid) {
		$data = array();
		$current = Sql_Fetch_array_Query("select * from {$GLOBALS["tables"]["user"]} where id = $userid");
		$datareq = Sql_Query("select * from {$GLOBALS["tables"]["user_attribute"]} where userid = $userid");
		while ($row = Sql_Fetch_Array($datareq)) {
			$data[$row["attributeid"]] = $row["value"];
		}

		$email = $current["email"];
		$htmlemail = $current["htmlemail"];
		# override with posted info
		foreach ($current as $key => $val) {
			if ($_POST[$key] && $key != "password") {
				$current[$key] = $val;
			}
		}
	} else {
		if (isset($_REQUEST['email'])) {
			$email = stripslashes($_REQUEST["email"]);
		} else {
			$email = '';
		}
		if (isset($_POST['htmlemail'])) {
			$htmlemail = $_POST["htmlemail"];
		}
		$data = array();
		$current = array();
	}
	//email のところend
	$textlinewidth = sprintf('%d',getConfig("textline_width"));
	if (!$textlinewidth) $textlinewidth = 40;
	list($textarearows,$textareacols) = explode(",",getConfig("textarea_dimensions"));
	if (!$textarearows) $textarearows = 10;
	if (!$textareacols) $textareacols = 40;

	$html = '';
	if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET["page"] != "import1"))
	$html = sprintf('
  <tr>
  <td class="must">メールアドレス</td>
	<td>
			<input type=text name="email"  class="attributeinput" value="%s">
	</td></tr>',
	htmlspecialchars($email));

	// BPM 12 May 2004 - Begin
	if ($emaildoubleentry=='yes')
	{
		if (!isset($_REQUEST['emailconfirm'])) $_REQUEST['emailconfirm'] = '';


		$html .= sprintf('
	<tr>
  <td class="must">メールアドレス(確認)</td>
		<td>
				<input type=text name=emailconfirm value="%s">
		</td></tr>',
		htmlspecialchars(stripslashes($_REQUEST["emailconfirm"])));
	}
	// BPM 12 May 2004 - Finish
	#管理画面用 star
	if ((isset($_GET['page']) && $_GET["page"] != "import1") || !isset($_GET['page']))
	if (ASKFORPASSWORD) {
		# we only require a password if there isnt one, so they can set it
		# otherwise they can keep the existing, if they do not enter anything
		if (!isset($current['password']) || !$current["password"]) {
			$pwdclass = "required";
			$js = sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("password","%s");</script>',$GLOBALS["strPassword"]);
			$js2 = sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("password_check","%s");</script>',$GLOBALS["strPassword2"]);
			$html .= '<input type=hidden name="passwordreq" value="1">';
		} else {
			$pwdclass = 'attributename';
			$html .= '<input type=hidden name="passwordreq" value="0">';
		}

		$html .= sprintf('
  <tr><td><div class="%s">%s</div></td>
  <td class="attributeinput"><input type=password name=password value="" size="%d">%s</td></tr>',
		$pwdclass,$GLOBALS["strPassword"],$textlinewidth,$js);
		$html .= sprintf('
  <tr><td><div class="%s">%s</div></td>
  <td class="attributeinput"><input type=password name="password_check" value="" size="%d">%s</td></tr>',
		$pwdclass,$GLOBALS["strPassword2"],$textlinewidth,$js2);
	}
	#管理画面用 end

	## 購読するのがhtmlかtextか start
	switch($htmlchoice) {
		case "textonly":
			if (!isset($htmlemail))
			$htmlemail = 0;
			$html .= sprintf('<input type=hidden name="htmlemail" value="0">');
			break;
		case "htmlonly":
			if (!isset($htmlemail))
			$htmlemail = 1;
			$html .= sprintf('<input type=hidden name="htmlemail" value="1">');
			break;
		case "checkfortext":
			if (!isset($htmlemail))
			$htmlemail = 0;
			$html .= sprintf('<tr><td colspan=2>
      <span class="attributeinput">
      <input type=checkbox name="textemail" value="1" %s></span>
      <span class="attributename">%s</span>
      </td></tr>',!$htmlemail,$strPreferTextEmail);
			break;
		case "radiotext":
			if (!isset($htmlemail))
			$htmlemail = 0;
			$html .= sprintf('<tr><td colspan=2>
        <span class="attributename">%s<br/>
        <span class="attributeinput"><input type=radio name="htmlemail" value="0" %s /></span>
        <span class="attributename">%s</span>
        <span class="attributeinput"><input type=radio name="htmlemail" value="1" %s /></span>
        <span class="attributename">%s</span></td></tr>',
			$strPreferredFormat,
			!$htmlemail ? "checked":"",$strText,
			$htmlemail ? "checked":"",$strHTML);
			break;
		case "radiohtml":
			if (!isset($htmlemail))
			$htmlemail = 1;
			$html .= sprintf('<tr><td colspan=2>
        <span class="attributename">%s</span><br/>
        <span class="attributeinput"><input type=radio name="htmlemail" value="0" %s /></span>
        <span class="attributename">%s</span>
        <span class="attributeinput"><input type=radio name="htmlemail" value="1" %s /></span>
        <span class="attributename">%s</span></td></tr>',
			$strPreferredFormat,
			!$htmlemail ? "checked":"",$strText,
			$htmlemail ? "checked":"",$strHTML);
			break;
		case "checkforhtml":
		default:
			if (!isset($htmlemail))
			$htmlemail = 0;
			$html .= sprintf('<tr><td colspan=2>
        <span class="attributeinput"><input type=checkbox name="htmlemail" value="1" %s /></span>
        <span class="attributename">%s</span></td></tr>',$htmlemail ? "checked":"",$strPreferHTMLEmail);
			break;
	}
	$html .= "\n";
	## 購読するのがhtmlかtextか end

	//TODO
	//下の属性生成
	$attids = join(',',array_keys($attributes));
	$output = array();
	if ($attids) {
		$res = Sql_Query("select * from {$GLOBALS["tables"]["attribute"]} where id in ($attids)");
		while ($attr = Sql_Fetch_Array($res)) {
			$output[$attr["id"]] = '';
			if (!isset($data[$attr['id']])) {
				$data[$attr['id']] = '';
			}
			$attr["required"] = $attributedata[$attr["id"]]["required"];
			$attr["default_value"] = $attributedata[$attr["id"]]["default_value"];
			$fieldname = "attribute" .$attr["id"];
			if ($userid && !isset($_POST[$fieldname])) {
				$val = Sql_Fetch_Row_Query(sprintf('select value from %s where
          attributeid = %d and userid = %d',$GLOBALS["tables"]["user_attribute"],$attr["id"],$userid));
				$_POST[$postvalue] = $val[0];
			} elseif (!isset($_POST[$fieldname])) {
				$_POST[$fieldname] = 0;
			}
			switch ($attr["type"]) {
				case "checkbox":
					$output[$attr["id"]] = '<tr><td colspan=2>';
					# what they post takes precedence over the database information
					if ($_POST[$fieldname])
					$checked = $_POST[$fieldname] ? "checked":"";
					else
					$checked = $data[$attr["id"]] ? "checked":"";
					$output[$attr["id"]] .= sprintf("\n".'<input type="checkbox" name="%s" value="on" %s class="attributeinput">',$fieldname,$checked);
					$output[$attr["id"]] .= sprintf("\n".'<span class="%s">%s</span>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					if ($attr["required"])
					$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
					break;
				case "radio":
					/*
					 $output[$attr["id"]] .= sprintf("\n".'<tr><td colspan=2><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					 $values_request = Sql_Query("select * from $table_prefix"."listattr_".$attr["tablename"]." order by listorder,name");
					 while ($value = Sql_Fetch_array($values_request)) {
					 if (!empty($_POST[$fieldname]))
					 $checked = $_POST[$fieldname] == $value["id"] ? "checked":"";
					 else if ($data[$attr["id"]])
					 $checked = $data[$attr["id"]] == $value["id"] ? "checked":"";
					 else
					 $checked = $attr["default_value"] == $value["name"] ? "checked":"";
					 $output[$attr["id"]] .= sprintf('&nbsp;%s&nbsp;<input type=radio  class="attributeinput" name="%s" value="%s" %s>',
					 $value["name"],$fieldname,$value["id"],$checked);
					 }*/

					$output[$attr["id"]] .= "
        		<tr>
				<td class=\"must\">性別</td>
				<td>
						<input type=radio  class=\"attributeinput\" name=\"attribute2\" value=\"1\" >男性
						<input type=radio  class=\"attributeinput\" name=\"attribute2\" value=\"2\" >女性
				</td></tr>
			";

					if (!empty($_POST[$fieldname])){
						$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">$("input[name='.'%s'.']").val( ["%s"] );</script>',$fieldname,$_POST[$fieldname]);
					}
					/*
					 if ($attr["required"]) {
					 $output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addGroupToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
					 }*/
					break;
				case "select":
					 //劇場
					if ($attr['tablename'] == 'attribute') {
						$output[$attr["id"]] .=  "
        				<tr>
        				<td>よく行く劇場はどこですか？</td>
						<td>
						<select id=\"attribute1\" name=\"attribute1\" class=\"attributeinput\">
						<option value=\"47\" >選択してください
								<option value=\"1\" >池袋
								<option value=\"32\" >平和島
								<option value=\"36\" >土浦
								<option value=\"37\" >沼津
								<option value=\"46\" >大和郡山
								<option value=\"38\" >大街道
								<option value=\"39\" >衣山
								<option value=\"40\" >重信
								<option value=\"42\" >大洲
								<option value=\"43\" >北島
								<option value=\"44\" >かほく
								<option value=\"45\" >エミフルMASAKI

						</select>
						</td>
						</tr>
						";

						if (!empty($_POST[$fieldname])){
							$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">$(\''."#"."attribute1').val('%s');</script>",$_POST[$fieldname]);
						}

						//地域
					} else {
						$output[$attr["id"]] .=  "
        		<tr>
        				<td>お住まいの地域</td>
						<td>
						<select id=\"attribute6\" name=\"attribute6\" class=\"attributeinput\">
									<option value=\"96\" >選択してください
								<option value=\"49\" >北海道
								<option value=\"50\" >青森県
								<option value=\"51\" >岩手県
								<option value=\"52\" >宮城県
								<option value=\"53\" >秋田県
								<option value=\"54\" >山形県
								<option value=\"55\" >福島県
								<option value=\"56\" >茨城県
								<option value=\"57\" >栃木県
								<option value=\"58\" >群馬県
								<option value=\"59\" >埼玉県
								<option value=\"60\" >千葉県
								<option value=\"61\" >東京都
								<option value=\"62\" >神奈川県
								<option value=\"63\" >新潟県
								<option value=\"64\" >富山県
								<option value=\"65\" >石川県
								<option value=\"66\" >福井県
								<option value=\"67\" >山梨県
								<option value=\"68\" >長野県
								<option value=\"69\" >岐阜県
								<option value=\"70\" >静岡県
								<option value=\"71\" >愛知県
								<option value=\"72\" >三重県
								<option value=\"73\" >滋賀県
								<option value=\"74\" >京都府
								<option value=\"75\" >大阪府
								<option value=\"76\" >兵庫県
								<option value=\"77\" >奈良県
								<option value=\"78\" >和歌山県
								<option value=\"79\" >鳥取県
								<option value=\"80\" >島根県
								<option value=\"81\" >岡山県
								<option value=\"82\" >広島県
								<option value=\"83\" >山口県
								<option value=\"84\" >徳島県
								<option value=\"85\" >香川県
								<option value=\"86\" >愛媛県
								<option value=\"87\" >高知県
								<option value=\"88\" >福岡県
								<option value=\"89\" >佐賀県
								<option value=\"90\" >長崎県
								<option value=\"91\" >熊本県
								<option value=\"92\" >大分県
								<option value=\"93\" >宮崎県
								<option value=\"94\" >鹿児島県
								<option value=\"95\" >沖縄県
						</select>
						</td>
						</tr>
						";

						if (!empty($_POST[$fieldname])){
							$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">$(\''."#"."attribute6').val('%s');</script>",$_POST[$fieldname]);
						}
					}
					/*
					 $output[$attr["id"]] .= sprintf("\n".'<tr><td><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					 $values_request = Sql_Query("select * from $table_prefix"."listattr_".$attr["tablename"]." order by listorder,name");
					 $output[$attr["id"]] .= sprintf('</td><td class="attributeinput"><!--%d--><select name="%s" class="attributeinput">',$data[$attr["id"]],$fieldname);
					 while ($value = Sql_Fetch_array($values_request)) {
					 if (!empty($_POST[$fieldname]))
					 $selected = $_POST[$fieldname] == $value["id"] ? "selected" : "";
					 else if ($data[$attr["id"]])
					 $selected = $data[$attr["id"]] == $value["id"] ? "selected":"";
					 else
					 $selected = $attr["default_value"] == $value["name"] ? "selected":"";
					 if (preg_match('/^'.preg_quote(EMPTY_VALUE_PREFIX).'/i',$value['name'])) {
					 $value['id'] = '';
					 }
					 $output[$attr["id"]] .= sprintf('<option value="%s" %s>%s',$value["id"],$selected,stripslashes($value["name"]));
					 }
					 $output[$attr["id"]] .= "</select>";*/


					break;
				case "checkboxgroup":
					$output[$attr["id"]] .= sprintf("\n".'<tr><td colspan=2><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					$values_request = Sql_Query("select * from $table_prefix"."listattr_".$attr["tablename"]." order by listorder,name");
					$output[$attr["id"]] .= sprintf('</td></tr>');
					while ($value = Sql_Fetch_array($values_request)) {
						if (is_array($_POST[$fieldname]))
						$selected = in_array($value["id"],$_POST[$fieldname]) ? "checked" : "";
						else if ($data[$attr["id"]]) {
							$selection = explode(",",$data[$attr["id"]]);
							$selected = in_array($value["id"],$selection) ? "checked":"";
						}
						else{
							$selection = Array();
							$selected  = "";
						}

						$output[$attr["id"]] .= sprintf('<tr><td colspan=2 class="attributeinput"><input type=checkbox name="%s[]"  class="attributeinput" value="%s" %s> %s</td></tr>',$fieldname,$value["id"],$selected,stripslashes($value["name"]));
					}
					break;
				case "textline":
					$form_name_html = sprintf('
			<tr>
			  <td class="must" width="230">お名前</td>
			<td width="710">
					<input type=text name="attribute7"  class="attributeinput" value="%s">
			</td>
			</tr>
			',
		 	 $_POST[$fieldname] ? htmlspecialchars(stripslashes($_POST[$fieldname])) : '');

		 	 /*   $output[$attr["id"]] .= sprintf("\n".'<tr><td><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',$attr["name"]);
		 	  $output[$attr["id"]] .= sprintf ('</td><td class="attributeinput">
		 	  <input type=text name="%s"  class="attributeinput" size="%d" value="%s">',$fieldname,
		 	  $textlinewidth,
		 	  $_POST[$fieldname] ? htmlspecialchars(stripslashes($_POST[$fieldname])) : ($data[$attr["id"]] ? $data[$attr["id"]] : $attr["default_value"]));*/
		 	 //if ($attr["required"])
		 	 //$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
		 	 break;
				case "textarea":
					$output[$attr["id"]] .= sprintf("\n".'<tr><td colspan=2>
            <div class="%s">%s</div></td></tr>',$attr["required"] ? 'required' : 'attributename',
					$attr["name"]);
					$output[$attr["id"]] .= sprintf ('<tr><td class="attributeinput" colspan=2>
            <textarea name="%s" rows="%d"  class="attributeinput" cols="%d" wrap="virtual">%s</textarea>',
					$fieldname,$textarearows,$textareacols,
					$_POST[$fieldname] ? htmlspecialchars(stripslashes($_POST[$fieldname])) : ($data[$attr["id"]] ? htmlspecialchars(stripslashes($data[$attr["id"]])) : $attr["default_value"]));
					if ($attr["required"])
					$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
					break;

				case "hidden":
					$output[$attr["id"]] .= sprintf('<input type=hidden name="%s" size=40 value="%s">',$fieldname,$data[$attr["id"]] ? $data[$attr["id"]] : $attr["default_value"]);
					break;
				case "date":
					require_once dirname(__FILE__)."/date.php";
					$date = new Date();
					// var_dump($_REQUEST);
					// var_dump($_POST);
					// exit;
					$postval = $date->getDate($fieldname);
					if ($data[$attr["id"]]) {
						$val = $data[$attr["id"]];
					} else {
						//ここがポストからのデータを取得する
						$val = $postval;
					}
					//$output[$attr["id"]] = sprintf("\n".'<tr><td><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',$attr["name"]);
					$output[$attr["id"]] = "<tr><td class=\"must\">生年月日</td>";

					$output[$attr["id"]] .= sprintf ('<td>%s</td></tr>',$date->showInput2($fieldname,"",$val));
					break;
				default:
					print "システムエラー該当する属性タイプがない by motionpicture";
			}
			//$output[$attr["id"]] .= "</td></tr>\n";
		}
	}

	# make sure the order is correct
	foreach ($attributes as $attribute => $listorder) {
		if (isset($output[$attribute])) {
			$html .= $output[$attribute];
		}
	}
	$html = $form_name_html.$html;
	return $html;
}




function ListAttributes_m($attributes,$attributedata,$htmlchoice = 0,$userid = 0,$emaildoubleentry='no' ) {
	global $strPreferHTMLEmail,$strPreferTextEmail,
	$strEmail,$tables,$table_prefix,$strPreferredFormat,$strText,$strHTML;
	/*  if (!sizeof($attributes)) {
	 return "No attributes have been defined for this page";
	 }
	 */
	//emailのところ start

	if ($userid) {
		$data = array();
		$current = Sql_Fetch_array_Query("select * from {$GLOBALS["tables"]["user"]} where id = $userid");
		$datareq = Sql_Query("select * from {$GLOBALS["tables"]["user_attribute"]} where userid = $userid");
		while ($row = Sql_Fetch_Array($datareq)) {
			$data[$row["attributeid"]] = $row["value"];
		}

		$email = $current["email"];
		$htmlemail = $current["htmlemail"];
		# override with posted info
		foreach ($current as $key => $val) {
			if ($_POST[$key] && $key != "password") {
				$current[$key] = $val;
			}
		}
	} else {
		if (isset($_REQUEST['email'])) {
			$email = stripslashes($_REQUEST["email"]);
		} else {
			$email = '';
		}
		if (isset($_POST['htmlemail'])) {
			$htmlemail = $_POST["htmlemail"];
		}
		$data = array();
		$current = array();
	}
	//email のところend
	$textlinewidth = sprintf('%d',getConfig("textline_width"));
	if (!$textlinewidth) $textlinewidth = 40;
	list($textarearows,$textareacols) = explode(",",getConfig("textarea_dimensions"));
	if (!$textarearows) $textarearows = 10;
	if (!$textareacols) $textareacols = 40;

	$html = '';
	if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET["page"] != "import1"))
	$html = sprintf('
<br>
ﾒｰﾙｱﾄﾞﾚｽ <font color="#ff8800">必須</font><br>
			<input type="text" name="email"  class="attributeinput" value="%s"><br>',
	htmlspecialchars($email));

	// BPM 12 May 2004 - Begin
	if ($emaildoubleentry=='yes')
	{
		if (!isset($_REQUEST['emailconfirm'])) $_REQUEST['emailconfirm'] = '';


		$html .= sprintf('
<br>
ﾒｰﾙｱﾄﾞﾚｽ確認 <font color="#ff8800">必須</font><br>
				<input type="text" name="emailconfirm" value="%s"><br>',
		htmlspecialchars(stripslashes($_REQUEST["emailconfirm"])));
	}
	// BPM 12 May 2004 - Finish
	#管理画面用 star
	/* if ((isset($_GET['page']) && $_GET["page"] != "import1") || !isset($_GET['page']))
	 if (ASKFORPASSWORD) {
	 # we only require a password if there isnt one, so they can set it
	 # otherwise they can keep the existing, if they do not enter anything
	 if (!isset($current['password']) || !$current["password"]) {
	 $pwdclass = "required";
	 $js = sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("password","%s");</script>',$GLOBALS["strPassword"]);
	 $js2 = sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("password_check","%s");</script>',$GLOBALS["strPassword2"]);
	 $html .= '<input type=hidden name="passwordreq" value="1">';
	 } else {
	 $pwdclass = 'attributename';
	 $html .= '<input type=hidden name="passwordreq" value="0">';
	 }

	 $html .= sprintf('
	 <tr><td><div class="%s">%s</div></td>
	 <td class="attributeinput"><input type=password name=password value="" size="%d">%s</td></tr>',
	 $pwdclass,$GLOBALS["strPassword"],$textlinewidth,$js);
	 $html .= sprintf('
	 <tr><td><div class="%s">%s</div></td>
	 <td class="attributeinput"><input type=password name="password_check" value="" size="%d">%s</td></tr>',
	 $pwdclass,$GLOBALS["strPassword2"],$textlinewidth,$js2);
	 }*/
	#管理画面用 end

	## 購読するのがhtmlかtextか start
	/*  switch($htmlchoice) {
	case "textonly":
	if (!isset($htmlemail))
	$htmlemail = 0;
	$html .= sprintf('<input type=hidden name="htmlemail" value="0">');
	break;
	case "htmlonly":
	if (!isset($htmlemail))
	$htmlemail = 1;
	$html .= sprintf('<input type=hidden name="htmlemail" value="1">');
	break;
	case "checkfortext":
	if (!isset($htmlemail))
	$htmlemail = 0;
	$html .= sprintf('<tr><td colspan=2>
	<span class="attributeinput">
	<input type=checkbox name="textemail" value="1" %s></span>
	<span class="attributename">%s</span>
	</td></tr>',!$htmlemail,$strPreferTextEmail);
	break;
	case "radiotext":
	if (!isset($htmlemail))
	$htmlemail = 0;
	$html .= sprintf('<tr><td colspan=2>
	<span class="attributename">%s<br/>
	<span class="attributeinput"><input type=radio name="htmlemail" value="0" %s /></span>
	<span class="attributename">%s</span>
	<span class="attributeinput"><input type=radio name="htmlemail" value="1" %s /></span>
	<span class="attributename">%s</span></td></tr>',
	$strPreferredFormat,
	!$htmlemail ? "checked":"",$strText,
	$htmlemail ? "checked":"",$strHTML);
	break;
	case "radiohtml":
	if (!isset($htmlemail))
	$htmlemail = 1;
	$html .= sprintf('<tr><td colspan=2>
	<span class="attributename">%s</span><br/>
	<span class="attributeinput"><input type=radio name="htmlemail" value="0" %s /></span>
	<span class="attributename">%s</span>
	<span class="attributeinput"><input type=radio name="htmlemail" value="1" %s /></span>
	<span class="attributename">%s</span></td></tr>',
	$strPreferredFormat,
	!$htmlemail ? "checked":"",$strText,
	$htmlemail ? "checked":"",$strHTML);
	break;
	case "checkforhtml":
	default:
	if (!isset($htmlemail))
	$htmlemail = 0;
	$html .= sprintf('<tr><td colspan=2>
	<span class="attributeinput"><input type=checkbox name="htmlemail" value="1" %s /></span>
	<span class="attributename">%s</span></td></tr>',$htmlemail ? "checked":"",$strPreferHTMLEmail);
	break;
	}
	$html .= "\n";*/
	## 購読するのがhtmlかtextか end

	//TODO
	//下の属性生成
	$attids = join(',',array_keys($attributes));
	$output = array();
	if ($attids) {
		$res = Sql_Query("select * from {$GLOBALS["tables"]["attribute"]} where id in ($attids)");
		while ($attr = Sql_Fetch_Array($res)) {
			$output[$attr["id"]] = '';
			if (!isset($data[$attr['id']])) {
				$data[$attr['id']] = '';
			}
			$attr["required"] = $attributedata[$attr["id"]]["required"];
			$attr["default_value"] = $attributedata[$attr["id"]]["default_value"];
			$fieldname = "attribute" .$attr["id"];
			if ($userid && !isset($_POST[$fieldname])) {
				$val = Sql_Fetch_Row_Query(sprintf('select value from %s where
          attributeid = %d and userid = %d',$GLOBALS["tables"]["user_attribute"],$attr["id"],$userid));
				$_POST[$postvalue] = $val[0];
			} elseif (!isset($_POST[$fieldname])) {
				$_POST[$fieldname] = 0;
			}
			switch ($attr["type"]) {
				case "checkbox":
					$output[$attr["id"]] = '<tr><td colspan=2>';
					# what they post takes precedence over the database information
					if ($_POST[$fieldname])
					$checked = $_POST[$fieldname] ? "checked":"";
					else
					$checked = $data[$attr["id"]] ? "checked":"";
					$output[$attr["id"]] .= sprintf("\n".'<input type="checkbox" name="%s" value="on" %s class="attributeinput">',$fieldname,$checked);
					$output[$attr["id"]] .= sprintf("\n".'<span class="%s">%s</span>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					if ($attr["required"])
					$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
					break;
				case "radio":
					/*
					 $output[$attr["id"]] .= sprintf("\n".'<tr><td colspan=2><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					 $values_request = Sql_Query("select * from $table_prefix"."listattr_".$attr["tablename"]." order by listorder,name");
					 while ($value = Sql_Fetch_array($values_request)) {
					 if (!empty($_POST[$fieldname]))
					 $checked = $_POST[$fieldname] == $value["id"] ? "checked":"";
					 else if ($data[$attr["id"]])
					 $checked = $data[$attr["id"]] == $value["id"] ? "checked":"";
					 else
					 $checked = $attr["default_value"] == $value["name"] ? "checked":"";
					 $output[$attr["id"]] .= sprintf('&nbsp;%s&nbsp;<input type=radio  class="attributeinput" name="%s" value="%s" %s>',
					 $value["name"],$fieldname,$value["id"],$checked);
					 }*/

					$output[$attr["id"]] .= '
        		<br>
						性別 <font color="#ff8800">必須</font><br>
						<input type="radio"  class="attributeinput" name="attribute2" value="1" >男性
						<input type="radio"  class="attributeinput" name="attribute2" value="2" >女性
				<br>
			';
					/*
					 if (!empty($_POST[$fieldname])){
					 $output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">$("input[name='.'%s'.']").val( ["%s"] );</script>',$fieldname,$_POST[$fieldname]);
					 }

					 if ($attr["required"]) {
					 $output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addGroupToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
					 }*/
					break;
				case "select":

					//劇場
					if ($attr['tablename'] == 'attribute') {
						$output[$attr["id"]] .=  '
						<br><img src="images/spacer.gif" height="10"><br>
						よく行く劇場はどこですか？<br>

						<select id="attribute1" name="attribute1" class="attributeinput">
						<option value="47" >選択してください
								<option value="1" >池袋
								<option value="32" >平和島
								<option value="36" >土浦
								<option value="37" >沼津
								<option value="46" >大和郡山
								<option value="38" >大街道
								<option value="39" >衣山
								<option value="40" >重信
								<option value="42" >大洲
								<option value="43" >北島
								<option value="44" >かほく
								<option value="45" >エミフルMASAKI

						</select>
						';
						/*
						 if (!empty($_POST[$fieldname])){
						 $output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">$(\''."#"."attribute1').val('%s');</script>",$_POST[$fieldname]);
						 }*/

						//地域
					} else {
						$output[$attr["id"]] .=  '
						<br><img src="images/spacer.gif" height="10"><br>
						お住まいの地域 <br>
						<select id="attribute6" name="attribute6" class="attributeinput">
								<option value="96" >選択してください
								<option value="49" >北海道
								<option value="50" >青森県
								<option value="51" >岩手県
								<option value="52" >宮城県
								<option value="53" >秋田県
								<option value="54" >山形県
								<option value="55" >福島県
								<option value="56" >茨城県
								<option value="57" >栃木県
								<option value="58" >群馬県
								<option value="59" >埼玉県
								<option value="60" >千葉県
								<option value="61" >東京都
								<option value="62" >神奈川県
								<option value="63" >新潟県
								<option value="64" >富山県
								<option value="65" >石川県
								<option value="66" >福井県
								<option value="67" >山梨県
								<option value="68" >長野県
								<option value="69" >岐阜県
								<option value="70" >静岡県
								<option value="71" >愛知県
								<option value="72" >三重県
								<option value="73" >滋賀県
								<option value="74" >京都府
								<option value="75" >大阪府
								<option value="76" >兵庫県
								<option value="77" >奈良県
								<option value="78" >和歌山県
								<option value="79" >鳥取県
								<option value="80" >島根県
								<option value="81" >岡山県
								<option value="82" >広島県
								<option value="83" >山口県
								<option value="84" >徳島県
								<option value="85" >香川県
								<option value="86" >愛媛県
								<option value="87" >高知県
								<option value="88" >福岡県
								<option value="89" >佐賀県
								<option value="90" >長崎県
								<option value="91" >熊本県
								<option value="92" >大分県
								<option value="93" >宮崎県
								<option value="94" >鹿児島県
								<option value="95" >沖縄県
						</select>
						';

						/*if (!empty($_POST[$fieldname])){
						 $output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">$(\''."#"."attribute6').val('%s');</script>",$_POST[$fieldname]);
						 }*/
					}
					/*
					 $output[$attr["id"]] .= sprintf("\n".'<tr><td><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					 $values_request = Sql_Query("select * from $table_prefix"."listattr_".$attr["tablename"]." order by listorder,name");
					 $output[$attr["id"]] .= sprintf('</td><td class="attributeinput"><!--%d--><select name="%s" class="attributeinput">',$data[$attr["id"]],$fieldname);
					 while ($value = Sql_Fetch_array($values_request)) {
					 if (!empty($_POST[$fieldname]))
					 $selected = $_POST[$fieldname] == $value["id"] ? "selected" : "";
					 else if ($data[$attr["id"]])
					 $selected = $data[$attr["id"]] == $value["id"] ? "selected":"";
					 else
					 $selected = $attr["default_value"] == $value["name"] ? "selected":"";
					 if (preg_match('/^'.preg_quote(EMPTY_VALUE_PREFIX).'/i',$value['name'])) {
					 $value['id'] = '';
					 }
					 $output[$attr["id"]] .= sprintf('<option value="%s" %s>%s',$value["id"],$selected,stripslashes($value["name"]));
					 }
					 $output[$attr["id"]] .= "</select>";*/


					break;
				case "checkboxgroup":
					$output[$attr["id"]] .= sprintf("\n".'<tr><td colspan=2><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',stripslashes($attr["name"]));
					$values_request = Sql_Query("select * from $table_prefix"."listattr_".$attr["tablename"]." order by listorder,name");
					$output[$attr["id"]] .= sprintf('</td></tr>');
					while ($value = Sql_Fetch_array($values_request)) {
						if (is_array($_POST[$fieldname]))
						$selected = in_array($value["id"],$_POST[$fieldname]) ? "checked" : "";
						else if ($data[$attr["id"]]) {
							$selection = explode(",",$data[$attr["id"]]);
							$selected = in_array($value["id"],$selection) ? "checked":"";
						}
						else{
							$selection = Array();
							$selected  = "";
						}

						$output[$attr["id"]] .= sprintf('<tr><td colspan=2 class="attributeinput"><input type=checkbox name="%s[]"  class="attributeinput" value="%s" %s> %s</td></tr>',$fieldname,$value["id"],$selected,stripslashes($value["name"]));
					}
					break;
				case "textline":
					$form_name_html = sprintf('
					<br>
					お名前 <font color="#ff8800">必須</font><br>
					<input type="text" name="attribute7"  class="attributeinput" value="%s"><br>
			',
		 	 $_POST[$fieldname] ? htmlspecialchars(stripslashes(mb_convert_encoding($_POST[$fieldname],'UTF-8','UTF-8,SJIS,EUC-JP'))) : '');

		 	 /*   $output[$attr["id"]] .= sprintf("\n".'<tr><td><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',$attr["name"]);
		 	  $output[$attr["id"]] .= sprintf ('</td><td class="attributeinput">
		 	  <input type=text name="%s"  class="attributeinput" size="%d" value="%s">',$fieldname,
		 	  $textlinewidth,
		 	  $_POST[$fieldname] ? htmlspecialchars(stripslashes($_POST[$fieldname])) : ($data[$attr["id"]] ? $data[$attr["id"]] : $attr["default_value"]));*/
		 	 //if ($attr["required"])
		 	 //$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
		 	 break;
				case "textarea":
					$output[$attr["id"]] .= sprintf("\n".'<tr><td colspan=2>
            <div class="%s">%s</div></td></tr>',$attr["required"] ? 'required' : 'attributename',
					$attr["name"]);
					$output[$attr["id"]] .= sprintf ('<tr><td class="attributeinput" colspan=2>
            <textarea name="%s" rows="%d"  class="attributeinput" cols="%d" wrap="virtual">%s</textarea>',
					$fieldname,$textarearows,$textareacols,
					$_POST[$fieldname] ? htmlspecialchars(stripslashes($_POST[$fieldname])) : ($data[$attr["id"]] ? htmlspecialchars(stripslashes($data[$attr["id"]])) : $attr["default_value"]));
					if ($attr["required"])
					$output[$attr["id"]] .= sprintf('<script language="Javascript" type="text/javascript">addFieldToCheck("%s","%s");</script>',$fieldname,$attr["name"]);
					break;

				case "hidden":
					$output[$attr["id"]] .= sprintf('<input type="hidden" name="%s" size=40 value="%s">',$fieldname,$data[$attr["id"]] ? $data[$attr["id"]] : $attr["default_value"]);
					break;
				case "date":
					require_once dirname(__FILE__)."/date.php";
					$date = new Date();
					// var_dump($_REQUEST);
					// var_dump($_POST);
					// exit;
					$postval = $date->getDate($fieldname);
					if ($data[$attr["id"]]) {
						$val = $data[$attr["id"]];
					} else {
						//ここがポストからのデータを取得する
						$val = $postval;
					}
					//$output[$attr["id"]] = sprintf("\n".'<tr><td><div class="%s">%s</div>',$attr["required"] ? 'required' : 'attributename',$attr["name"]);
					$output[$attr["id"]] = '<br>生年月日 <font color="#ff8800">必須</font><br>';

					$output[$attr["id"]] .= sprintf ('%s',$date->showInput2($fieldname,"",$val));
					break;
				default:
					print "システムエラー該当する属性タイプがない by motionpicture";
			}
			//$output[$attr["id"]] .= "</td></tr>\n";
		}
	}

	# make sure the order is correct
	foreach ($attributes as $attribute => $listorder) {
		if (isset($output[$attribute])) {
			$html .= $output[$attribute];
		}
	}
	$html = $form_name_html.$html;
	return $html;
}




























function ListAllAttributes() {
	global $tables;
	$attributes = array();
	$attributedata = array();
	$res = Sql_Query("select * from {$GLOBALS["tables"]["attribute"]} order by listorder");
	while ($row = Sql_Fetch_Array($res)) {
		#   print $row["id"]. " ".$row["name"];
		$attributes[$row["id"]] = $row["listorder"];
		$attributedata[$row["id"]]["id"] = $row["id"];
		$attributedata[$row["id"]]["default_value"] = $row["default_value"];
		$attributedata[$row["id"]]["listorder"] = $row["listorder"];
		$attributedata[$row["id"]]["required"] = $row["required"];
		$attributedata[$row["id"]]["default_value"] = $row["default_value"];
	}
	return ListAttributes($attributes,$attributedata,"checkforhtml");
}

function RSSOptions($data,$userid = 0) {
	global $rssfrequencies,$tables;
	if ($userid) {
		$current = Sql_Fetch_Row_Query("select rssfrequency from {$GLOBALS["tables"]["user"]} where id = $userid");
		$default = $current[0];
	} else {
		$default = '';
	}
	if (!$default || !in_array($default,array_keys($rssfrequencies))) {
		$default = $data["rssdefault"];
	}

	$html = "\n<table>";
	$html .= '<tr><td>'.$data["rssintro"].'</td></tr>';
	$html .= '<tr><td>';
	$options = explode(",",$data["rss"]);
	if (!in_array($data["rssdefault"],$options)) {
		array_push($options,$data["rssdefault"]);
	}
	if (sizeof($options) == 1) {
		return sprintf('<input type="hidden" name="rssfrequency" value="%s">',$options[0]);
	}

	foreach ($options as $freq) {
		if ($freq) {
			$html .= sprintf('<input type=radio name="rssfrequency" value="%s" %s>&nbsp;%s&nbsp;',
			$freq,$freq == $default ? "checked":"",$rssfrequencies[$freq]);
		}
	}
	$html .= '</td></tr></table>';
	if ($data["rssintro"])
	return $html;
}

?>

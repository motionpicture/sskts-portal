


<?php
require("./FormAction.php");


$fa = new FormAction(true);

$parameters = $fa->getParameters();
$action = $fa->getAction();
$errors = $fa->getErrors();

// SJIS‚É•ÏŠ·
foreach($parameters as $key => $val){
	$parameters[$key] = mb_convert_encoding($val, 'SJIS', 'UTF-8');
}
for($i=0; $i<count($errors); $i++){
	$errors[$i] = mb_convert_encoding($errors[$i], 'SJIS', 'UTF-8');
}
	


include ('include/user_agent_docomo.php'); // USER AGENT DOCOMO SWITCH
include ('include/mime_type.php'); // MIME TYPE
include ('include/cache_control.php'); // CACHE CONTROL

//Œg‘ÑUAŽî¼€
$agent = user_agent_docomo($_SERVER["HTTP_USER_AGENT"]);

//HTTPƒwƒbƒ_[
header("Content-Type: ".mime_type($agent)."; charset=Shift_JIS");
echo "<?xml version=\"1.0\" encoding=\"Shift_JIS\"?>\n";
?>
<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/1.0) 1.0//EN" "i-xhtml_4ja_10.dtd">
<?php

  // Copyright 2009 Google Inc. All Rights Reserved.

  $GA_ACCOUNT = "MO-8383230-48";

  $GA_PIXEL = "./ga.php";



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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis"/>
<title>uX-MEN:Ì§°½Ä¥¼ÞªÈÚ°¼®ÝvÌßÚ¾ÞÝÄ·¬ÝÍß-Ý»²Ä</title>
<style type="text/css"></style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a> <span style="font-size:small;">

<h1><img style="margin-bottom:5px;" src="images/top.gif" alt="uX-MEN:Ì§°½Ä¥¼ÞªÈÚ°¼®ÝvÌßÚ¾ÞÝÄ·¬ÝÍß-Ý" /></h1>
      
      
      
<?php
	  
if($action == 'submit'){

?>

<p style="color:red;">‚²‰ž•å‚ ‚è‚ª‚Æ‚¤‚²‚´‚¢‚Ü‚µ‚½B<br />
‰º‹L‚Ì’ÊƒŠ‘—M‚³‚ê‚Ü‚µ‚½B</p>


<dl style="color:">
<dt>‚¨–¼‘O:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>ÌØ¶ÞÅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>«•Ê:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "’j«" : "—«"); ?></dd>

<dt>”N—î:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>Î</dd>

<dt>—X•Ö”Ô†:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>ZŠ:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>“d˜b”Ô†:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>Ò°Ù±ÄÞÚ½:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>E‹Æ:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>

<dt>ÌßÚ¾ÞÝÄ:</dt>
<dd>
<?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='¶Þ¼Þª¯ÄØ½ÄÁ¬°¼Þ¬° (1–¼—l)';
          } elseif ($judge==2) {
          	$judge='ÍßÝŒ^USB&¶°ÄÞØ°ÀÞ°¾¯Ä (2–¼—l)';
          } elseif ($judge==3) {
          	$judge='T¼¬Â(¸ÞÚ°)M (2–¼—l)';
          } elseif ($judge==4) {
          	$judge='½Ã°¼®ÅØ°¾¯Ä (5–¼—l)';
          } elseif ($judge==5) {
          	$judge='ÒÀØ¯¸É°Ä(5–¼—l)';
          }
          
          echo($judge); 
          ?>
          </dd>

</dl>
<br />      
<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m" accesskey="0"><span style="color:#0000ff;">¼ÈÏ»Ý¼¬²ÝHOME‚Ö</span></a></div>
<br />
<?php
	  
	  
}elseif($action == 'confirm'){

?>


<p style="color:red;">ˆÈ‰º‚Ì“à—e‚Å‘—M‚µ‚Ü‚·B<br />
‚æ‚ë‚µ‚¯‚ê‚ÎŒˆ’èÎÞÀÝ‚ðAC³‚·‚éê‡‚Í‚¨ŽèŒ³‚Ì–ß‚éÎÞÀÝ‚ð‰Ÿ‚µ‚Ä‚­‚¾‚³‚¢B</p>


<dl style="color:">
<dt>‚¨–¼‘O:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>ÌØ¶ÞÅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>«•Ê:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "’j«" : "—«"); ?></dd>

<dt>”N—î:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>Î</dd>

<dt>—X•Ö”Ô†:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>ZŠ:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>“d˜b”Ô†:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>Ò°Ù±ÄÞÚ½:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>E‹Æ:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>

<dt>ÌßÚ¾ÞÝÄ:</dt>
          <dd>
<?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='¶Þ¼Þª¯ÄØ½ÄÁ¬°¼Þ¬° (1–¼—l)';
          } elseif ($judge==2) {
          	$judge='ÍßÝŒ^USB&¶°ÄÞØ°ÀÞ°¾¯Ä (2–¼—l)';
          } elseif ($judge==3) {
          	$judge='T¼¬Â(¸ÞÚ°)M (2–¼—l)';
          } elseif ($judge==4) {
          	$judge='½Ã°¼®ÅØ°¾¯Ä (5–¼—l)';
          } elseif ($judge==5) {
          	$judge='ÒÀØ¯¸É°Ä(5–¼—l)';
          }
          
          echo($judge); 
          ?>
          </dd>
</dl>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
<div style="text-align:center;"><input type="hidden" name="action" value="submit" /><input type="submit" value="Œˆ’è" /></div>
</form>


<?php
	  
}else{


?>

      
<?php 

	if($action == 'error'){
		echo "<img src=\"images/sp.gif\" alt=\" \" height=\"4\" />\n";
		echo "<ul style=\"color:#eb3030\">\n";
		foreach($errors as $val){
			echo "<li>".htmlspecialchars($val)."</li>\n";
		}
		echo "</ul>\n";
	}

?>

<p style="color:red;">ˆÈ‰º‚Ì‰ž•åÌ«°Ñ‚²‹L“ü‚ÌãA‘—MÎÞÀÝ‚ð‰Ÿ‚µ‚Ä‚­‚¾‚³‚¢B</p>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">

<img src="images/sp.gif" alt=" " height="12"/><br />


<img src="images/sp.gif" alt=" " height="4"/><br />

‚¨–¼‘O <font color="#ff8800">•K{</font><br>
<input maxlength="20" size="40" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>" /><br />
<br />

ÌØ¶ÞÅ <font color="#ff8800">•K{</font><br>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>" /><br />
<br />

«•Ê <font color="#ff8800">•K{</font><br>
<input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />’j«<br />
<input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />—«<br />
<br />

”N—î <font color="#ff8800">•K{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" />Î<br />
<br />


—X•Ö”Ô† <font color="#ff8800">•K{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />
-
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="zip2" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" /><br />
<br />

ZŠ <font color="#ff8800">•K{</font><br>
<select name="pref">
  <option selected="selected" value="">¥ “s“¹•{Œ§(‘I‘ð)</option>
  <option value="–kŠC“¹">–kŠC“¹</option>
  <option value="ÂXŒ§">ÂXŒ§</option>
  <option value="ŠâŽèŒ§">ŠâŽèŒ§</option>
  <option value="‹{éŒ§">‹{éŒ§</option>
  <option value="H“cŒ§">H“cŒ§</option>
  <option value="ŽRŒ`Œ§">ŽRŒ`Œ§</option>
  <option value="•Ÿ“‡Œ§">•Ÿ“‡Œ§</option>
  <option value="ˆïéŒ§">ˆïéŒ§</option>
  <option value="“È–ØŒ§">“È–ØŒ§</option>
  <option value="ŒQ”nŒ§">ŒQ”nŒ§</option>
  <option value="é‹ÊŒ§">é‹ÊŒ§</option>
  <option value="ç—tŒ§">ç—tŒ§</option>
  <option value="“Œ‹ž“s">“Œ‹ž“s</option>
  <option value="_“ÞìŒ§">_“ÞìŒ§</option>
  <option value="VŠƒŒ§">VŠƒŒ§</option>
  <option value="•xŽRŒ§">•xŽRŒ§</option>
  <option value="ÎìŒ§">ÎìŒ§</option>
  <option value="•ŸˆäŒ§">•ŸˆäŒ§</option>
  <option value="ŽR—œŒ§">ŽR—œŒ§</option>
  <option value="’·–ìŒ§">’·–ìŒ§</option>
  <option value="Šò•ŒŒ§">Šò•ŒŒ§</option>
  <option value="EªŒ§">EªŒ§</option>
  <option value="ˆ¤’mŒ§">ˆ¤’mŒ§</option>
  <option value="ŽOdŒ§">ŽOdŒ§</option>
  <option value="Ž ‰êŒ§">Ž ‰êŒ§</option>
  <option value="‹ž“s•{">‹ž“s•{</option>
  <option value="‘åã•{">‘åã•{</option>
  <option value="•ºŒÉŒ§">•ºŒÉŒ§</option>
  <option value="“Þ—ÇŒ§">“Þ—ÇŒ§</option>
  <option value="˜a‰ÌŽRŒ§">˜a‰ÌŽRŒ§</option>
  <option value="’¹Žj">’¹Žj</option>
  <option value="“‡ªŒ§">“‡ªŒ§</option>
  <option value="‰ªŽRŒ§">‰ªŽRŒ§</option>
  <option value="L“‡Œ§">L“‡Œ§</option>
  <option value="ŽRŒûŒ§">ŽRŒûŒ§</option>
  <option value="“¿“‡Œ§">“¿“‡Œ§</option>
  <option value="ìŒ§">ìŒ§</option>
  <option value="ˆ¤•QŒ§">ˆ¤•QŒ§</option>
  <option value="‚’mŒ§">‚’mŒ§</option>
  <option value="•Ÿ‰ªŒ§">•Ÿ‰ªŒ§</option>
  <option value="²‰êŒ§">²‰êŒ§</option>
  <option value="’·èŒ§">’·èŒ§</option>
  <option value="ŒF–{Œ§">ŒF–{Œ§</option>
  <option value="‘å•ªŒ§">‘å•ªŒ§</option>
  <option value="‹{èŒ§">‹{èŒ§</option>
  <option value="Ž­Ž™“‡Œ§">Ž­Ž™“‡Œ§</option>
  <option value="‰«“êŒ§">‰«“êŒ§</option>
  <option value="‚»‚Ì‘¼">‚»‚Ì‘¼</option>
</select>
<br />
<input maxlength="60" size="40" name="address1" value="<?php echo(htmlspecialchars($parameters['address1'])); ?>" />
<br />
ËÞÙ¥ÏÝ¼®Ý–¼<br>
<input maxlength="40" size="40" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>" /><br />
<br />

“d˜b”Ô† <font color="#ff8800">•K{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>" /><br />
<br />

Ò°Ù±ÄÞÚ½ <font color="#ff8800">•K{</font><br>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>" /><br />
<br />

Ò°Ù±ÄÞÚ½(Šm”F) <font color="#ff8800">•K{</font><br>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>" /><br />
<br />

E‹Æ <font color="#ff8800">•K{</font><br>
<select name="occupation">
  <option selected="selected" value="">¥ ‘I‘ð</option>
  <option value="Šw¶">Šw¶</option>
  <option value="ƒAƒ‹ƒoƒCƒg">±ÙÊÞ²Ä</option>
  <option value="‰ïŽÐˆõ">‰ïŽÐˆõ</option>
  <option value="Œö–±ˆõ">Œö–±ˆõ</option>
  <option value="Ž©‰c‹Æ">Ž©‰c‹Æ</option>
  <option value="Žå•wi•vj">Žå•w(•v)</option>
  <option value="‚»‚Ì‘¼">‚»‚Ì‘¼</option>
</select><br />
<br />


ÌßÚ¾ÞÝÄ <font color="#ff8800">•K{</font><br>
            <br/><font color="#ff0000">uX-MEN:Ì§°½Ä¥¼ÞªÈÚ°¼®Ýv‚ÌµØ¼ÞÅÙ¸Þ¯½Þ</font><br/>
            <input type="radio" <?php echo((intval($parameters['present']) === 1) || (intval($parameters['present']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="present" />
          	¶Þ¼Þª¯ÄØ½ÄÁ¬°¼Þ¬° (1–¼—l)<br />
          	<input type="radio" <?php echo((intval($parameters['present']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="present" />
            ÍßÝŒ^USB&¶°ÄÞØ°ÀÞ°¾¯Ä (2–¼—l)</font><br />
            <input type="radio" <?php echo((intval($parameters['present']) === 3)? 'checked="checked"' : ''); ?> value="3" name="present" />
            T¼¬Â(¸ÞÚ°)M (2–¼—l)<br />          
          	<input type="radio" <?php echo((intval($parameters['present']) === 4) ? 'checked="checked"' : ''); ?> value="4" name="present" />
            ½Ã°¼®ÅØ°¾¯Ä (5–¼—l)</font><br />
            <input type="radio" <?php echo((intval($parameters['present']) === 5)? 'checked="checked"' : ''); ?> value="5" name="present" />
            ÒÀØ¯¸É°Ä(5–¼—l)<br /><br />          

<h4>“Á‹LŽ–€</h4><br>
<font color="#ff8800"> “–‘IŽÒ‚Ì”­•\‚ÍAŒµ‘I‚È‚é’Š‘I‚Ì‚¤‚¦A‚²–{l‚³‚Ü‚Ö‚Ì’Ê’m‚ð‚à‚Á‚Ä‘ã‚¦‚³‚¹‚Ä‚¢‚½‚¾‚«‚Ü‚·B </font><br><br>
<div style="text-align:center;"><input id="formAgreement" type="checkbox" value="1" name="agreement" />“¯ˆÓ‚·‚é</div><br>


<br />
<p style="color:">“Á‹LŽ–€‚ð‚¨“Ç‚Ý‚É‚È‚èA“¯ˆÓ‚µ‚½ã‚Å‰º‹L‚Ì‘—MÎÞÀÝ‚ð‰Ÿ‚µ‚Ä‚­‚¾‚³‚¢B</p>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><input type="hidden" name="action" value="confirm" /><input type="submit" value="‘—M" /></div>
</form>
  
<?php
	  
}

?>

<div style="text-align:right;"><a href="#top" accesskey="2"><span style="color:#0000ff;">Íß°¼ÞTOPÍ</span></a></div>

<img src="images/sp.gif" alt=" " height="4" /><br />
<div style="text-align:center;"><img src="images/dl.gif" alt="line"/></div>
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m/company"><span style="color:#0000ff;">‰ïŽÐŠT—v</span></a><br />
<a href="http://www.cinemasunshine.co.jp/m/privacy"><span style="color:#0000ff;">Ìß×²ÊÞ¼°ÎßØ¼°</span></a><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=‚²ˆÓŒ©E‚²Š´‘z"><span style="color:#0000FF;">‚¨–â‚¢‡‚í‚¹</span></a><br />
</div>

<img src="images/sp.gif" alt=" " height="4" /><br />
<center>

<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>

</center>

</span>

<?php

  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();

  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>

</body>
</html>

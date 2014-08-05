


<?php
require("./FormAction.php");


$fa = new FormAction(true);

$parameters = $fa->getParameters();
$action = $fa->getAction();
$errors = $fa->getErrors();

// SJISÉÏ·
foreach($parameters as $key => $val){
	$parameters[$key] = mb_convert_encoding($val, 'SJIS', 'UTF-8');
}
for($i=0; $i<count($errors); $i++){
	$errors[$i] = mb_convert_encoding($errors[$i], 'SJIS', 'UTF-8');
}
	


include ('include/user_agent_docomo.php'); // USER AGENT DOCOMO SWITCH
include ('include/mime_type.php'); // MIME TYPE
include ('include/cache_control.php'); // CACHE CONTROL

//gÑUAî¼
$agent = user_agent_docomo($_SERVER["HTTP_USER_AGENT"]);

//HTTPwb_[
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

<p style="color:red;">²å èªÆ¤²´¢Üµ½B<br />
ºLÌÊM³êÜµ½B</p>


<dl style="color:">
<dt>¨¼O:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>ÌØ¶ÞÅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>«Ê:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "j«" : "«"); ?></dd>

<dt>Nî:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>Î</dd>

<dt>XÖÔ:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>Z:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>dbÔ:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>Ò°Ù±ÄÞÚ½:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>EÆ:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>

<dt>ÌßÚ¾ÞÝÄ:</dt>
<dd>
<?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='¶Þ¼Þª¯ÄØ½ÄÁ¬°¼Þ¬° (1¼l)';
          } elseif ($judge==2) {
          	$judge='ÍßÝ^USB&¶°ÄÞØ°ÀÞ°¾¯Ä (2¼l)';
          } elseif ($judge==3) {
          	$judge='T¼¬Â(¸ÞÚ°)M (2¼l)';
          } elseif ($judge==4) {
          	$judge='½Ã°¼®ÅØ°¾¯Ä (5¼l)';
          } elseif ($judge==5) {
          	$judge='ÒÀØ¯¸É°Ä(5¼l)';
          }
          
          echo($judge); 
          ?>
          </dd>

</dl>
<br />      
<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m" accesskey="0"><span style="color:#0000ff;">¼ÈÏ»Ý¼¬²ÝHOMEÖ</span></a></div>
<br />
<?php
	  
	  
}elseif($action == 'confirm'){

?>


<p style="color:red;">ÈºÌàeÅMµÜ·B<br />
æëµ¯êÎèÎÞÀÝðAC³·éêÍ¨è³ÌßéÎÞÀÝðµÄ­¾³¢B</p>


<dl style="color:">
<dt>¨¼O:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>ÌØ¶ÞÅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>«Ê:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "j«" : "«"); ?></dd>

<dt>Nî:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>Î</dd>

<dt>XÖÔ:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>Z:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>dbÔ:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>Ò°Ù±ÄÞÚ½:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>EÆ:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>

<dt>ÌßÚ¾ÞÝÄ:</dt>
          <dd>
<?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='¶Þ¼Þª¯ÄØ½ÄÁ¬°¼Þ¬° (1¼l)';
          } elseif ($judge==2) {
          	$judge='ÍßÝ^USB&¶°ÄÞØ°ÀÞ°¾¯Ä (2¼l)';
          } elseif ($judge==3) {
          	$judge='T¼¬Â(¸ÞÚ°)M (2¼l)';
          } elseif ($judge==4) {
          	$judge='½Ã°¼®ÅØ°¾¯Ä (5¼l)';
          } elseif ($judge==5) {
          	$judge='ÒÀØ¯¸É°Ä(5¼l)';
          }
          
          echo($judge); 
          ?>
          </dd>
</dl>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
<div style="text-align:center;"><input type="hidden" name="action" value="submit" /><input type="submit" value="è" /></div>
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

<p style="color:red;">ÈºÌåÌ«°Ñ²LüÌãAMÎÞÀÝðµÄ­¾³¢B</p>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">

<img src="images/sp.gif" alt=" " height="12"/><br />


<img src="images/sp.gif" alt=" " height="4"/><br />

¨¼O <font color="#ff8800">K{</font><br>
<input maxlength="20" size="40" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>" /><br />
<br />

ÌØ¶ÞÅ <font color="#ff8800">K{</font><br>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>" /><br />
<br />

«Ê <font color="#ff8800">K{</font><br>
<input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />j«<br />
<input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />«<br />
<br />

Nî <font color="#ff8800">K{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" />Î<br />
<br />


XÖÔ <font color="#ff8800">K{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />
-
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="zip2" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" /><br />
<br />

Z <font color="#ff8800">K{</font><br>
<select name="pref">
  <option selected="selected" value="">¥ s¹{§(Ið)</option>
  <option value="kC¹">kC¹</option>
  <option value="ÂX§">ÂX§</option>
  <option value="âè§">âè§</option>
  <option value="{é§">{é§</option>
  <option value="Hc§">Hc§</option>
  <option value="R`§">R`§</option>
  <option value="§">§</option>
  <option value="ïé§">ïé§</option>
  <option value="ÈØ§">ÈØ§</option>
  <option value="Qn§">Qn§</option>
  <option value="éÊ§">éÊ§</option>
  <option value="çt§">çt§</option>
  <option value="s">s</option>
  <option value="_Þì§">_Þì§</option>
  <option value="V§">V§</option>
  <option value="xR§">xR§</option>
  <option value="Îì§">Îì§</option>
  <option value="ä§">ä§</option>
  <option value="R§">R§</option>
  <option value="·ì§">·ì§</option>
  <option value="ò§">ò§</option>
  <option value="Eª§">Eª§</option>
  <option value="¤m§">¤m§</option>
  <option value="Od§">Od§</option>
  <option value=" ê§"> ê§</option>
  <option value="s{">s{</option>
  <option value="åã{">åã{</option>
  <option value="ºÉ§">ºÉ§</option>
  <option value="ÞÇ§">ÞÇ§</option>
  <option value="aÌR§">aÌR§</option>
  <option value="¹j">¹j</option>
  <option value="ª§">ª§</option>
  <option value="ªR§">ªR§</option>
  <option value="L§">L§</option>
  <option value="Rû§">Rû§</option>
  <option value="¿§">¿§</option>
  <option value="ì§">ì§</option>
  <option value="¤Q§">¤Q§</option>
  <option value="m§">m§</option>
  <option value="ª§">ª§</option>
  <option value="²ê§">²ê§</option>
  <option value="·è§">·è§</option>
  <option value="F{§">F{§</option>
  <option value="åª§">åª§</option>
  <option value="{è§">{è§</option>
  <option value="­§">­§</option>
  <option value="«ê§">«ê§</option>
  <option value="»Ì¼">»Ì¼</option>
</select>
<br />
<input maxlength="60" size="40" name="address1" value="<?php echo(htmlspecialchars($parameters['address1'])); ?>" />
<br />
ËÞÙ¥ÏÝ¼®Ý¼<br>
<input maxlength="40" size="40" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>" /><br />
<br />

dbÔ <font color="#ff8800">K{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>" /><br />
<br />

Ò°Ù±ÄÞÚ½ <font color="#ff8800">K{</font><br>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>" /><br />
<br />

Ò°Ù±ÄÞÚ½(mF) <font color="#ff8800">K{</font><br>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>" /><br />
<br />

EÆ <font color="#ff8800">K{</font><br>
<select name="occupation">
  <option selected="selected" value="">¥ Ið</option>
  <option value="w¶">w¶</option>
  <option value="AoCg">±ÙÊÞ²Ä</option>
  <option value="ïÐõ">ïÐõ</option>
  <option value="ö±õ">ö±õ</option>
  <option value="©cÆ">©cÆ</option>
  <option value="åwivj">åw(v)</option>
  <option value="»Ì¼">»Ì¼</option>
</select><br />
<br />


ÌßÚ¾ÞÝÄ <font color="#ff8800">K{</font><br>
            <br/><font color="#ff0000">uX-MEN:Ì§°½Ä¥¼ÞªÈÚ°¼®ÝvÌµØ¼ÞÅÙ¸Þ¯½Þ</font><br/>
            <input type="radio" <?php echo((intval($parameters['present']) === 1) || (intval($parameters['present']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="present" />
          	¶Þ¼Þª¯ÄØ½ÄÁ¬°¼Þ¬° (1¼l)<br />
          	<input type="radio" <?php echo((intval($parameters['present']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="present" />
            ÍßÝ^USB&¶°ÄÞØ°ÀÞ°¾¯Ä (2¼l)</font><br />
            <input type="radio" <?php echo((intval($parameters['present']) === 3)? 'checked="checked"' : ''); ?> value="3" name="present" />
            T¼¬Â(¸ÞÚ°)M (2¼l)<br />          
          	<input type="radio" <?php echo((intval($parameters['present']) === 4) ? 'checked="checked"' : ''); ?> value="4" name="present" />
            ½Ã°¼®ÅØ°¾¯Ä (5¼l)</font><br />
            <input type="radio" <?php echo((intval($parameters['present']) === 5)? 'checked="checked"' : ''); ?> value="5" name="present" />
            ÒÀØ¯¸É°Ä(5¼l)<br /><br />          

<h4>ÁL</h4><br>
<font color="#ff8800"> IÒÌ­\ÍAµIÈéIÌ¤¦A²{l³ÜÖÌÊmðàÁÄã¦³¹Ä¢½¾«Ü·B </font><br><br>
<div style="text-align:center;"><input id="formAgreement" type="checkbox" value="1" name="agreement" />¯Ó·é</div><br>


<br />
<p style="color:">ÁLð¨ÇÝÉÈèA¯Óµ½ãÅºLÌMÎÞÀÝðµÄ­¾³¢B</p>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><input type="hidden" name="action" value="confirm" /><input type="submit" value="M" /></div>
</form>
  
<?php
	  
}

?>

<div style="text-align:right;"><a href="#top" accesskey="2"><span style="color:#0000ff;">Íß°¼ÞTOPÍ</span></a></div>

<img src="images/sp.gif" alt=" " height="4" /><br />
<div style="text-align:center;"><img src="images/dl.gif" alt="line"/></div>
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m/company"><span style="color:#0000ff;">ïÐTv</span></a><br />
<a href="http://www.cinemasunshine.co.jp/m/privacy"><span style="color:#0000ff;">Ìß×²ÊÞ¼°ÎßØ¼°</span></a><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=²Ó©E²´z"><span style="color:#0000FF;">¨â¢í¹</span></a><br />
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

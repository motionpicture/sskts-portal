


<?php
require("./FormAction.php");


$fa = new FormAction(true);

$parameters = $fa->getParameters();
$action = $fa->getAction();
$errors = $fa->getErrors();

// SJIS�ɕϊ�
foreach($parameters as $key => $val){
	$parameters[$key] = mb_convert_encoding($val, 'SJIS', 'UTF-8');
}
for($i=0; $i<count($errors); $i++){
	$errors[$i] = mb_convert_encoding($errors[$i], 'SJIS', 'UTF-8');
}
	


include ('include/user_agent_docomo.php'); // USER AGENT DOCOMO SWITCH
include ('include/mime_type.php'); // MIME TYPE
include ('include/cache_control.php'); // CACHE CONTROL

//�g��UA��
$agent = user_agent_docomo($_SERVER["HTTP_USER_AGENT"]);

//HTTP�w�b�_�[
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
<title>�uX-MEN:̧��ĥ�ު�ڰ��݁v��ھ��ķ����-ݻ��</title>
<style type="text/css"></style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a> <span style="font-size:small;">

<h1><img style="margin-bottom:5px;" src="images/top.gif" alt="�uX-MEN:̧��ĥ�ު�ڰ��݁v��ھ��ķ����-�" /></h1>
      
      
      
<?php
	  
if($action == 'submit'){

?>

<p style="color:red;">�����傠�肪�Ƃ��������܂����B<br />
���L�̒ʃ����M����܂����B</p>


<dl style="color:">
<dt>�����O:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>�ض��:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>����:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "�j��" : "����"); ?></dd>

<dt>�N��:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>��</dd>

<dt>�X�֔ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>�Z��:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>�d�b�ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>Ұٱ��ڽ:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>�E��:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>

<dt>��ھ���:</dt>
<dd>
<?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='�޼ު��ؽ�����ެ� (1���l)';
          } elseif ($judge==2) {
          	$judge='��݌^USB&����ذ�ް��� (2���l)';
          } elseif ($judge==3) {
          	$judge='T���(��ڰ)M (2���l)';
          } elseif ($judge==4) {
          	$judge='�ð���ذ��� (5���l)';
          } elseif ($judge==5) {
          	$judge='��د�ɰ�(5���l)';
          }
          
          echo($judge); 
          ?>
          </dd>

</dl>
<br />      
<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m" accesskey="0"><span style="color:#0000ff;">��ϻݼ���HOME��</span></a></div>
<br />
<?php
	  
	  
}elseif($action == 'confirm'){

?>


<p style="color:red;">�ȉ��̓��e�ő��M���܂��B<br />
��낵����Ό������݂��A�C������ꍇ�͂��茳�̖߂����݂������Ă��������B</p>


<dl style="color:">
<dt>�����O:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>�ض��:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>����:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "�j��" : "����"); ?></dd>

<dt>�N��:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>��</dd>

<dt>�X�֔ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>�Z��:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>�d�b�ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>Ұٱ��ڽ:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>�E��:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>

<dt>��ھ���:</dt>
          <dd>
<?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='�޼ު��ؽ�����ެ� (1���l)';
          } elseif ($judge==2) {
          	$judge='��݌^USB&����ذ�ް��� (2���l)';
          } elseif ($judge==3) {
          	$judge='T���(��ڰ)M (2���l)';
          } elseif ($judge==4) {
          	$judge='�ð���ذ��� (5���l)';
          } elseif ($judge==5) {
          	$judge='��د�ɰ�(5���l)';
          }
          
          echo($judge); 
          ?>
          </dd>
</dl>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
<div style="text-align:center;"><input type="hidden" name="action" value="submit" /><input type="submit" value="����" /></div>
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

<p style="color:red;">�ȉ��̉���̫�т��L���̏�A���M���݂������Ă��������B</p>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">

<img src="images/sp.gif" alt=" " height="12"/><br />


<img src="images/sp.gif" alt=" " height="4"/><br />

�����O <font color="#ff8800">�K�{</font><br>
<input maxlength="20" size="40" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>" /><br />
<br />

�ض�� <font color="#ff8800">�K�{</font><br>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>" /><br />
<br />

���� <font color="#ff8800">�K�{</font><br>
<input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />�j��<br />
<input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />����<br />
<br />

�N�� <font color="#ff8800">�K�{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" />��<br />
<br />


�X�֔ԍ� <font color="#ff8800">�K�{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />
-
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="zip2" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" /><br />
<br />

�Z�� <font color="#ff8800">�K�{</font><br>
<select name="pref">
  <option selected="selected" value="">�� �s���{��(�I��)</option>
  <option value="�k�C��">�k�C��</option>
  <option value="�X��">�X��</option>
  <option value="��茧">��茧</option>
  <option value="�{�錧">�{�錧</option>
  <option value="�H�c��">�H�c��</option>
  <option value="�R�`��">�R�`��</option>
  <option value="������">������</option>
  <option value="��錧">��錧</option>
  <option value="�Ȗ،�">�Ȗ،�</option>
  <option value="�Q�n��">�Q�n��</option>
  <option value="��ʌ�">��ʌ�</option>
  <option value="��t��">��t��</option>
  <option value="�����s">�����s</option>
  <option value="�_�ސ쌧">�_�ސ쌧</option>
  <option value="�V����">�V����</option>
  <option value="�x�R��">�x�R��</option>
  <option value="�ΐ쌧">�ΐ쌧</option>
  <option value="���䌧">���䌧</option>
  <option value="�R����">�R����</option>
  <option value="���쌧">���쌧</option>
  <option value="�򕌌�">�򕌌�</option>
  <option value="�E���">�E���</option>
  <option value="���m��">���m��</option>
  <option value="�O�d��">�O�d��</option>
  <option value="���ꌧ">���ꌧ</option>
  <option value="���s�{">���s�{</option>
  <option value="���{">���{</option>
  <option value="���Ɍ�">���Ɍ�</option>
  <option value="�ޗǌ�">�ޗǌ�</option>
  <option value="�a�̎R��">�a�̎R��</option>
  <option value="����j">����j</option>
  <option value="������">������</option>
  <option value="���R��">���R��</option>
  <option value="�L����">�L����</option>
  <option value="�R����">�R����</option>
  <option value="������">������</option>
  <option value="���쌧">���쌧</option>
  <option value="���Q��">���Q��</option>
  <option value="���m��">���m��</option>
  <option value="������">������</option>
  <option value="���ꌧ">���ꌧ</option>
  <option value="���茧">���茧</option>
  <option value="�F�{��">�F�{��</option>
  <option value="�啪��">�啪��</option>
  <option value="�{�茧">�{�茧</option>
  <option value="��������">��������</option>
  <option value="���ꌧ">���ꌧ</option>
  <option value="���̑�">���̑�</option>
</select>
<br />
<input maxlength="60" size="40" name="address1" value="<?php echo(htmlspecialchars($parameters['address1'])); ?>" />
<br />
��٥�ݼ�ݖ�<br>
<input maxlength="40" size="40" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>" /><br />
<br />

�d�b�ԍ� <font color="#ff8800">�K�{</font><br>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>" /><br />
<br />

Ұٱ��ڽ <font color="#ff8800">�K�{</font><br>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>" /><br />
<br />

Ұٱ��ڽ(�m�F) <font color="#ff8800">�K�{</font><br>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>" /><br />
<br />

�E�� <font color="#ff8800">�K�{</font><br>
<select name="occupation">
  <option selected="selected" value="">�� �I��</option>
  <option value="�w��">�w��</option>
  <option value="�A���o�C�g">���޲�</option>
  <option value="��Ј�">��Ј�</option>
  <option value="������">������</option>
  <option value="���c��">���c��</option>
  <option value="��w�i�v�j">��w(�v)</option>
  <option value="���̑�">���̑�</option>
</select><br />
<br />


��ھ��� <font color="#ff8800">�K�{</font><br>
            <br/><font color="#ff0000">�uX-MEN:̧��ĥ�ު�ڰ��݁v�̵ؼ��ٸޯ��</font><br/>
            <input type="radio" <?php echo((intval($parameters['present']) === 1) || (intval($parameters['present']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="present" />
          	�޼ު��ؽ�����ެ� (1���l)<br />
          	<input type="radio" <?php echo((intval($parameters['present']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="present" />
            ��݌^USB&����ذ�ް��� (2���l)</font><br />
            <input type="radio" <?php echo((intval($parameters['present']) === 3)? 'checked="checked"' : ''); ?> value="3" name="present" />
            T���(��ڰ)M (2���l)<br />          
          	<input type="radio" <?php echo((intval($parameters['present']) === 4) ? 'checked="checked"' : ''); ?> value="4" name="present" />
            �ð���ذ��� (5���l)</font><br />
            <input type="radio" <?php echo((intval($parameters['present']) === 5)? 'checked="checked"' : ''); ?> value="5" name="present" />
            ��د�ɰ�(5���l)<br /><br />          

<h4>���L����</h4><br>
<font color="#ff8800"> ���I�҂̔��\�́A���I�Ȃ钊�I�̂����A���{�l���܂ւ̒ʒm�������đウ�����Ă��������܂��B </font><br><br>
<div style="text-align:center;"><input id="formAgreement" type="checkbox" value="1" name="agreement" />���ӂ���</div><br>


<br />
<p style="color:">���L���������ǂ݂ɂȂ�A���ӂ�����ŉ��L�̑��M���݂������Ă��������B</p>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><input type="hidden" name="action" value="confirm" /><input type="submit" value="���M" /></div>
</form>
  
<?php
	  
}

?>

<div style="text-align:right;"><a href="#top" accesskey="2"><span style="color:#0000ff;">�߰��TOP�</span></a></div>

<img src="images/sp.gif" alt=" " height="4" /><br />
<div style="text-align:center;"><img src="images/dl.gif" alt="line"/></div>
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m/company"><span style="color:#0000ff;">��ЊT�v</span></a><br />
<a href="http://www.cinemasunshine.co.jp/m/privacy"><span style="color:#0000ff;">��ײ�޼���ؼ�</span></a><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=���ӌ��E�����z"><span style="color:#0000FF;">���₢���킹</span></a><br />
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

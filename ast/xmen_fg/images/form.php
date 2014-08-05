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

//�g��UA�擾
$agent = user_agent_docomo($_SERVER["HTTP_USER_AGENT"]);

//HTTP�w�b�_�[
header("Content-Type: ".mime_type($agent)."; charset=Shift_JIS");
echo "<?xml version=\"1.0\" encoding=\"Shift_JIS\"?>\n";
?>
<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/1.0) 1.0//EN" "i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis"/>
<title>Ұ�϶޼�ݓo�^�����-ݻ��</title>
<style type="text/css"></style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a> <span style="font-size:small;">

<h1><img style="margin-bottom:5px;" src="images/cam_img.gif" alt="Ұ�϶޼�ݓo�^�����-�" /></h1>
      
      
      
<?php
	  
if($action == 'submit'){

?>

<div style="background-color:#3D6497; color:#ffffff; text-align:center;"><img src="images/ttl.gif" alt=" " height="4" /><br />
���M����<br />
<img src="images/ttl.gif" alt=" " height="4"/></div>


<p style="color:#3D6497;">�����傠�肪�Ƃ��������܂����B<br />
���L�̒ʂ著�M����܂����B</p>

<dl style="color:#3D6497;">

<p style="color:#3D6497;text-align:center">�� ү���ނ̑����ɂ���</p>

<dl style="color:#3D6497;">

<dt>�����O:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_name'])); ?></dd>

<dt>�ض��:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_furigana'])); ?></dd>

<dt>�X�֔ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_zip1'])); ?>-<?php echo(htmlspecialchars($parameters['to_zip2'])); ?></dd>

<dt>�Z��:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address2'])); ?></dd>

<dt>�d�b�ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_tel'])); ?></dd>
</dl>

<p style="color:#8E5D76;text-align:center">�� ���Ȃ��ɂ���</p>

<dl style="color:#8E5D76">
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
</dl>
      
<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m" accesskey="0"><span style="color:#0000ff;">��ϻݼ���HOME��</span></a></div>

<?php
	  
	  
}elseif($action == 'confirm'){

?>


<p style="color:#3D6497;">�ȉ��̓��e�ő��M���܂��B<br />
��낵����Ό������݂��A�C������ꍇ�͂��茳�̖߂����݂������Ă��������B</p>
      
<dl style="color:#3D6497;">

<p style="color:#3D6497;text-align:center">�� ү���ނ̑����ɂ���</p>

<dl style="color:#3D6497;">

<dt>�����O:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_name'])); ?></dd>

<dt>�ض��:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_furigana'])); ?></dd>

<dt>�X�֔ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_zip1'])); ?>-<?php echo(htmlspecialchars($parameters['to_zip2'])); ?></dd>

<dt>�Z��:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address2'])); ?></dd>

<dt>�d�b�ԍ�:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_tel'])); ?></dd>
</dl>

<p style="color:#8E5D76;text-align:center">�� ���Ȃ��ɂ���</p>

<dl style="color:#8E5D76">
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
</dl>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
<div style="text-align:center;"><input type="hidden" name="action" value="submit" /><input type="submit" value="����" /></div>
</form>


<?php
	  
}else{


?>

<div style="background-color:#3D6497; color:#ffffff; text-align:center;"><img src="images/ttl.gif" alt=" " height="4" /><br />
����̫��<br />
<img src="images/ttl.gif" alt=" " height="4"/></div>
      
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

<p style="color:#3D6497;">�ȉ��̉���̫�тɂ��L���̏�A���M���݂������Ă��������B</p>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">

<img src="images/sp.gif" alt=" " height="12"/><br />

<p style="color:#3D6497;text-align:center">�� ү���ނ̑����ɂ���</p>

<img src="images/sp.gif" alt=" " height="4"/><br />

<span style="color:#3D6497">�����O:<br /></span>
<input maxlength="20" size="40" name="to_name" value="<?php echo(htmlspecialchars($parameters['to_name'])); ?>" /><br />
<br />

<span style="color:#3D6497">�ض��:<br /></span>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="to_furigana" value="<?php echo(htmlspecialchars($parameters['to_furigana'])); ?>" /><br />
<br />

<span style="color:#3D6497">�X�֔ԍ�:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="to_zip1" value="<?php echo(htmlspecialchars($parameters['to_zip1'])); ?>" />-<br />
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="to_zip2" value="<?php echo(htmlspecialchars($parameters['to_zip2'])); ?>" /><br />
<br />

<span style="color:#3D6497">�Z��:<br /></span>
<select name="to_pref">
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
  <option value="�É���">�É���</option>
  <option value="���m��">���m��</option>
  <option value="�O�d��">�O�d��</option>
  <option value="���ꌧ">���ꌧ</option>
  <option value="���s�{">���s�{</option>
  <option value="���{">���{</option>
  <option value="���Ɍ�">���Ɍ�</option>
  <option value="�ޗǌ�">�ޗǌ�</option>
  <option value="�a�̎R��">�a�̎R��</option>
  <option value="���挧">���挧</option>
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
<input maxlength="60" size="40" name="to_address1" value="<?php echo(htmlspecialchars($parameters['to_address1'])); ?>" />
<br />
<span style="color:#3D6497">��٥�ݼ�ݖ�:<br /></span>
<input maxlength="40" size="40" name="to_address2" value="<?php echo(htmlspecialchars($parameters['to_address2'])); ?>" /><br />
<br />

<span style="color:#3D6497">�d�b�ԍ�:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="to_tel" value="<?php echo(htmlspecialchars($parameters['to_tel'])); ?>" />
<br />

<img src="images/sp.gif" alt=" " height="12"/><br />

<p style="color:#8E5D76;text-align:center">�� ���Ȃ��ɂ���</p>

<img src="images/sp.gif" alt=" " height="4"/><br />

<span style="color:#8E5D76">�����O:<br /></span>
<input maxlength="20" size="40" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>" /><br />
<br />

<span style="color:#8E5D76">�ض��:<br /></span>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>" /><br />
<br />

<span style="color:#8E5D76">����:<br /></span>
<input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />�j��<br />
<input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />����<br />
<br />

<span style="color:#8E5D76">�N��:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" />��<br />
<br />


<span style="color:#8E5D76">�X�֔ԍ�:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />
-
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="zip2" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" /><br />
<br />

<span style="color:#8E5D76">�Z��:<br /></span>
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
  <option value="�É���">�É���</option>
  <option value="���m��">���m��</option>
  <option value="�O�d��">�O�d��</option>
  <option value="���ꌧ">���ꌧ</option>
  <option value="���s�{">���s�{</option>
  <option value="���{">���{</option>
  <option value="���Ɍ�">���Ɍ�</option>
  <option value="�ޗǌ�">�ޗǌ�</option>
  <option value="�a�̎R��">�a�̎R��</option>
  <option value="���挧">���挧</option>
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
<span style="color:#8E5D76">��٥�ݼ�ݖ�:<br /></span>
<input maxlength="40" size="40" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>" /><br />
<br />

<span style="color:#8E5D76">�d�b�ԍ�:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>" /><br />
<br />

<span style="color:#8E5D76">Ұٱ��ڽ:<br /></span>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>" /><br />
<br />

<span style="color:#8E5D76">Ұٱ��ڽ(�m�F):<br /></span>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>" /><br />
<br />

<span style="color:#8E5D76">�E��:<br /></span>
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

<h3 style="color:#3D6497">���L����</h3>
<ul>
  <li style="color:#3D6497">���I�҂̔��\�́A���I�Ȃ钊�I�̂����A���{�l���܂ւ̒ʒm�������đウ�����Ă��������܂��B</li>
  <li style="color:#3D6497">ү���ނ̑����̌l���́A���{�l�l�Ɠ����̂��戵���ŕی삳���Ă��������܂��B</li>
</ul>
<p style="color:#3D6497">���L���������ǂ݂ɂȂ�A���ӂ�����ŉ��L�̑��M���݂������Ă��������B</p>
          
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

<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m/?p=company"><span style="color:#0000ff;">��ЊT�v</span></a><br />
<a href="http://www.cinemasunshine.co.jp/m/?p=privacy"><span style="color:#0000ff;">��ײ�޼���ؼ�</span></a><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=���ӌ��E�����z"><span style="color:#0000FF;">���₢���킹</span></a><br />
</div>

<img src="images/sp.gif" alt=" " height="4" /><br />
<div style="background-color:#242c53; color:#ffffff; text-align:center;">
<img src="http://www.cinemasunshine.co.jp/m/images/ttl_07.gif" alt=" " height="4"/><br />
(c)cinema sunshine<br />
<img src="http://www.cinemasunshine.co.jp/m/images/ttl_07.gif" alt=" " height="4"/><br />
</div>
</span>
</body>
</html>

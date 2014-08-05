<?php
require("./FormAction.php");


$fa = new FormAction(true);

$parameters = $fa->getParameters();
$action = $fa->getAction();
$errors = $fa->getErrors();

// SJISに変換
foreach($parameters as $key => $val){
	$parameters[$key] = mb_convert_encoding($val, 'SJIS', 'UTF-8');
}
for($i=0; $i<count($errors); $i++){
	$errors[$i] = mb_convert_encoding($errors[$i], 'SJIS', 'UTF-8');
}
	


include ('include/user_agent_docomo.php'); // USER AGENT DOCOMO SWITCH
include ('include/mime_type.php'); // MIME TYPE
include ('include/cache_control.php'); // CACHE CONTROL

//携帯UA取得
$agent = user_agent_docomo($_SERVER["HTTP_USER_AGENT"]);

//HTTPヘッダー
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
<title>ﾒｰﾙﾏｶﾞｼﾞﾝ登録ｷｬﾝﾍﾟ-ﾝｻｲﾄ</title>
<style type="text/css"></style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a> <span style="font-size:small;">

<h1><img style="margin-bottom:5px;" src="images/cam_img.gif" alt="ﾒｰﾙﾏｶﾞｼﾞﾝ登録ｷｬﾝﾍﾟ-ﾝ" /></h1>
      
      
      
<?php
	  
if($action == 'submit'){

?>

<div style="background-color:#3D6497; color:#ffffff; text-align:center;"><img src="images/ttl.gif" alt=" " height="4" /><br />
送信完了<br />
<img src="images/ttl.gif" alt=" " height="4"/></div>


<p style="color:#3D6497;">ご応募ありがとうございました。<br />
下記の通り送信されました。</p>

<dl style="color:#3D6497;">

<p style="color:#3D6497;text-align:center">■ ﾒｯｾｰｼﾞの送り先について</p>

<dl style="color:#3D6497;">

<dt>お名前:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_name'])); ?></dd>

<dt>ﾌﾘｶﾞﾅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_furigana'])); ?></dd>

<dt>郵便番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_zip1'])); ?>-<?php echo(htmlspecialchars($parameters['to_zip2'])); ?></dd>

<dt>住所:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address2'])); ?></dd>

<dt>電話番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_tel'])); ?></dd>
</dl>

<p style="color:#8E5D76;text-align:center">■ あなたについて</p>

<dl style="color:#8E5D76">
<dt>お名前:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>ﾌﾘｶﾞﾅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>性別:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "男性" : "女性"); ?></dd>

<dt>年齢:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>歳</dd>

<dt>郵便番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>住所:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>電話番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>ﾒｰﾙｱﾄﾞﾚｽ:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>職業:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>
</dl>
      
<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m" accesskey="0"><span style="color:#0000ff;">ｼﾈﾏｻﾝｼｬｲﾝHOMEへ</span></a></div>

<?php
	  
	  
}elseif($action == 'confirm'){

?>


<p style="color:#3D6497;">以下の内容で送信します。<br />
よろしければ決定ﾎﾞﾀﾝを、修正する場合はお手元の戻るﾎﾞﾀﾝを押してください。</p>
      
<dl style="color:#3D6497;">

<p style="color:#3D6497;text-align:center">■ ﾒｯｾｰｼﾞの送り先について</p>

<dl style="color:#3D6497;">

<dt>お名前:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_name'])); ?></dd>

<dt>ﾌﾘｶﾞﾅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_furigana'])); ?></dd>

<dt>郵便番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_zip1'])); ?>-<?php echo(htmlspecialchars($parameters['to_zip2'])); ?></dd>

<dt>住所:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['to_address2'])); ?></dd>

<dt>電話番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['to_tel'])); ?></dd>
</dl>

<p style="color:#8E5D76;text-align:center">■ あなたについて</p>

<dl style="color:#8E5D76">
<dt>お名前:</dt>
<dd><?php echo(htmlspecialchars($parameters['name'])); ?></dd>

<dt>ﾌﾘｶﾞﾅ:</dt>
<dd><?php echo(htmlspecialchars($parameters['furigana'])); ?></dd>

<dt>性別:</dt>
<dd><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "男性" : "女性"); ?></dd>

<dt>年齢:</dt>
<dd><?php echo(htmlspecialchars($parameters['age'])); ?>歳</dd>

<dt>郵便番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['zip1'])); ?>-<?php echo(htmlspecialchars($parameters['zip2'])); ?></dd>

<dt>住所:</dt>
<dd><?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />
<?php echo(htmlspecialchars($parameters['address2'])); ?></dd>

<dt>電話番号:</dt>
<dd><?php echo(htmlspecialchars($parameters['tel'])); ?></dd>

<dt>ﾒｰﾙｱﾄﾞﾚｽ:</dt>
<dd><?php echo(htmlspecialchars($parameters['mail1'])); ?></dd>

<dt>職業:</dt>
<dd><?php echo(htmlspecialchars($parameters['occupation'])); ?></dd>
</dl>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
<div style="text-align:center;"><input type="hidden" name="action" value="submit" /><input type="submit" value="決定" /></div>
</form>


<?php
	  
}else{


?>

<div style="background-color:#3D6497; color:#ffffff; text-align:center;"><img src="images/ttl.gif" alt=" " height="4" /><br />
応募ﾌｫｰﾑ<br />
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

<p style="color:#3D6497;">以下の応募ﾌｫｰﾑにご記入の上、送信ﾎﾞﾀﾝを押してください。</p>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">

<img src="images/sp.gif" alt=" " height="12"/><br />

<p style="color:#3D6497;text-align:center">■ ﾒｯｾｰｼﾞの送り先について</p>

<img src="images/sp.gif" alt=" " height="4"/><br />

<span style="color:#3D6497">お名前:<br /></span>
<input maxlength="20" size="40" name="to_name" value="<?php echo(htmlspecialchars($parameters['to_name'])); ?>" /><br />
<br />

<span style="color:#3D6497">ﾌﾘｶﾞﾅ:<br /></span>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="to_furigana" value="<?php echo(htmlspecialchars($parameters['to_furigana'])); ?>" /><br />
<br />

<span style="color:#3D6497">郵便番号:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="to_zip1" value="<?php echo(htmlspecialchars($parameters['to_zip1'])); ?>" />-<br />
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="to_zip2" value="<?php echo(htmlspecialchars($parameters['to_zip2'])); ?>" /><br />
<br />

<span style="color:#3D6497">住所:<br /></span>
<select name="to_pref">
  <option selected="selected" value="">▼ 都道府県(選択)</option>
  <option value="北海道">北海道</option>
  <option value="青森県">青森県</option>
  <option value="岩手県">岩手県</option>
  <option value="宮城県">宮城県</option>
  <option value="秋田県">秋田県</option>
  <option value="山形県">山形県</option>
  <option value="福島県">福島県</option>
  <option value="茨城県">茨城県</option>
  <option value="栃木県">栃木県</option>
  <option value="群馬県">群馬県</option>
  <option value="埼玉県">埼玉県</option>
  <option value="千葉県">千葉県</option>
  <option value="東京都">東京都</option>
  <option value="神奈川県">神奈川県</option>
  <option value="新潟県">新潟県</option>
  <option value="富山県">富山県</option>
  <option value="石川県">石川県</option>
  <option value="福井県">福井県</option>
  <option value="山梨県">山梨県</option>
  <option value="長野県">長野県</option>
  <option value="岐阜県">岐阜県</option>
  <option value="静岡県">静岡県</option>
  <option value="愛知県">愛知県</option>
  <option value="三重県">三重県</option>
  <option value="滋賀県">滋賀県</option>
  <option value="京都府">京都府</option>
  <option value="大阪府">大阪府</option>
  <option value="兵庫県">兵庫県</option>
  <option value="奈良県">奈良県</option>
  <option value="和歌山県">和歌山県</option>
  <option value="鳥取県">鳥取県</option>
  <option value="島根県">島根県</option>
  <option value="岡山県">岡山県</option>
  <option value="広島県">広島県</option>
  <option value="山口県">山口県</option>
  <option value="徳島県">徳島県</option>
  <option value="香川県">香川県</option>
  <option value="愛媛県">愛媛県</option>
  <option value="高知県">高知県</option>
  <option value="福岡県">福岡県</option>
  <option value="佐賀県">佐賀県</option>
  <option value="長崎県">長崎県</option>
  <option value="熊本県">熊本県</option>
  <option value="大分県">大分県</option>
  <option value="宮崎県">宮崎県</option>
  <option value="鹿児島県">鹿児島県</option>
  <option value="沖縄県">沖縄県</option>
  <option value="その他">その他</option>
</select>
<br />
<input maxlength="60" size="40" name="to_address1" value="<?php echo(htmlspecialchars($parameters['to_address1'])); ?>" />
<br />
<span style="color:#3D6497">ﾋﾞﾙ･ﾏﾝｼｮﾝ名:<br /></span>
<input maxlength="40" size="40" name="to_address2" value="<?php echo(htmlspecialchars($parameters['to_address2'])); ?>" /><br />
<br />

<span style="color:#3D6497">電話番号:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="to_tel" value="<?php echo(htmlspecialchars($parameters['to_tel'])); ?>" />
<br />

<img src="images/sp.gif" alt=" " height="12"/><br />

<p style="color:#8E5D76;text-align:center">■ あなたについて</p>

<img src="images/sp.gif" alt=" " height="4"/><br />

<span style="color:#8E5D76">お名前:<br /></span>
<input maxlength="20" size="40" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>" /><br />
<br />

<span style="color:#8E5D76">ﾌﾘｶﾞﾅ:<br /></span>
<input istyle="2" format="*M" mode="katakana" maxlength="20" size="40" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>" /><br />
<br />

<span style="color:#8E5D76">性別:<br /></span>
<input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />男性<br />
<input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />女性<br />
<br />

<span style="color:#8E5D76">年齢:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" />歳<br />
<br />


<span style="color:#8E5D76">郵便番号:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />
-
<input istyle="4" format="*N" mode="numeric" maxlength="10" size="15" name="zip2" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" /><br />
<br />

<span style="color:#8E5D76">住所:<br /></span>
<select name="pref">
  <option selected="selected" value="">▼ 都道府県(選択)</option>
  <option value="北海道">北海道</option>
  <option value="青森県">青森県</option>
  <option value="岩手県">岩手県</option>
  <option value="宮城県">宮城県</option>
  <option value="秋田県">秋田県</option>
  <option value="山形県">山形県</option>
  <option value="福島県">福島県</option>
  <option value="茨城県">茨城県</option>
  <option value="栃木県">栃木県</option>
  <option value="群馬県">群馬県</option>
  <option value="埼玉県">埼玉県</option>
  <option value="千葉県">千葉県</option>
  <option value="東京都">東京都</option>
  <option value="神奈川県">神奈川県</option>
  <option value="新潟県">新潟県</option>
  <option value="富山県">富山県</option>
  <option value="石川県">石川県</option>
  <option value="福井県">福井県</option>
  <option value="山梨県">山梨県</option>
  <option value="長野県">長野県</option>
  <option value="岐阜県">岐阜県</option>
  <option value="静岡県">静岡県</option>
  <option value="愛知県">愛知県</option>
  <option value="三重県">三重県</option>
  <option value="滋賀県">滋賀県</option>
  <option value="京都府">京都府</option>
  <option value="大阪府">大阪府</option>
  <option value="兵庫県">兵庫県</option>
  <option value="奈良県">奈良県</option>
  <option value="和歌山県">和歌山県</option>
  <option value="鳥取県">鳥取県</option>
  <option value="島根県">島根県</option>
  <option value="岡山県">岡山県</option>
  <option value="広島県">広島県</option>
  <option value="山口県">山口県</option>
  <option value="徳島県">徳島県</option>
  <option value="香川県">香川県</option>
  <option value="愛媛県">愛媛県</option>
  <option value="高知県">高知県</option>
  <option value="福岡県">福岡県</option>
  <option value="佐賀県">佐賀県</option>
  <option value="長崎県">長崎県</option>
  <option value="熊本県">熊本県</option>
  <option value="大分県">大分県</option>
  <option value="宮崎県">宮崎県</option>
  <option value="鹿児島県">鹿児島県</option>
  <option value="沖縄県">沖縄県</option>
  <option value="その他">その他</option>
</select>
<br />
<input maxlength="60" size="40" name="address1" value="<?php echo(htmlspecialchars($parameters['address1'])); ?>" />
<br />
<span style="color:#8E5D76">ﾋﾞﾙ･ﾏﾝｼｮﾝ名:<br /></span>
<input maxlength="40" size="40" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>" /><br />
<br />

<span style="color:#8E5D76">電話番号:<br /></span>
<input istyle="4" format="*N" mode="numeric" maxlength="15" size="30" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>" /><br />
<br />

<span style="color:#8E5D76">ﾒｰﾙｱﾄﾞﾚｽ:<br /></span>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>" /><br />
<br />

<span style="color:#8E5D76">ﾒｰﾙｱﾄﾞﾚｽ(確認):<br /></span>
<input istyle="3" format="*x" mode="alphabet" maxlength="60" size="60" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>" /><br />
<br />

<span style="color:#8E5D76">職業:<br /></span>
<select name="occupation">
  <option selected="selected" value="">▼ 選択</option>
  <option value="学生">学生</option>
  <option value="アルバイト">ｱﾙﾊﾞｲﾄ</option>
  <option value="会社員">会社員</option>
  <option value="公務員">公務員</option>
  <option value="自営業">自営業</option>
  <option value="主婦（夫）">主婦(夫)</option>
  <option value="その他">その他</option>
</select><br />
<br />

<h3 style="color:#3D6497">特記事項</h3>
<ul>
  <li style="color:#3D6497">当選者の発表は、厳選なる抽選のうえ、ご本人さまへの通知をもって代えさせていただきます。</li>
  <li style="color:#3D6497">ﾒｯｾｰｼﾞの送り先の個人情報は、ご本人様と同等のお取扱いで保護させていただきます。</li>
</ul>
<p style="color:#3D6497">特記事項をお読みになり、同意した上で下記の送信ﾎﾞﾀﾝを押してください。</p>
          
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><input type="hidden" name="action" value="confirm" /><input type="submit" value="送信" /></div>
</form>
  
<?php
	  
}

?>

<div style="text-align:right;"><a href="#top" accesskey="2"><span style="color:#0000ff;">ﾍﾟｰｼﾞTOPﾍ</span></a></div>

<img src="images/sp.gif" alt=" " height="4" /><br />
<div style="text-align:center;"><img src="images/dl.gif" alt="line"/></div>
<img src="images/sp.gif" alt=" " height="4" /><br />

<div style="text-align:center;"><a href="http://www.cinemasunshine.co.jp/m/?p=company"><span style="color:#0000ff;">会社概要</span></a><br />
<a href="http://www.cinemasunshine.co.jp/m/?p=privacy"><span style="color:#0000ff;">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</span></a><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=ご意見・ご感想"><span style="color:#0000FF;">お問い合わせ</span></a><br />
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

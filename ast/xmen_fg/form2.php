<?php

// actionは
// {empty}|"error"|"confirm"|"submit"
require("FormAction.php");


$fa = new FormAction();

$parameters = $fa->getParameters();
$action = $fa->getAction();
$errors = $fa->getErrors();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>プレゼント応募フォーム</title>

</head>
<body>

<center>

<div><img src="images/cam_img.gif" alt="メールマガジン登録キャンペーン" /></div>

</center>

<br><img src="images/spacer.gif" height="10"><br>      
      
<?php
	  
if($action == 'submit'){

?>

            <p id="description">ご応募ありがとうございました。<br />
		下記の通り応募されました。</p>
        
お名前<br />
<?php echo(htmlspecialchars($parameters['name'])); ?><br />
お名前(フリガナ)<br />
<?php echo(htmlspecialchars($parameters['furigana'])); ?><br />
性別<br />
<?php echo(htmlspecialchars($parameters['gender']) != 2 ? "男性" : "女性"); ?><br />
年齢<br />
<?php echo(htmlspecialchars($parameters['age'])); ?>歳<br />
郵便番号<br />
<?php echo(htmlspecialchars($parameters['zip1'])); ?>
 -
<?php echo(htmlspecialchars($parameters['zip2'])); ?><br />

住所<br />
<?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />

ﾋﾞﾙ･ﾏﾝｼｮﾝ名<br>
<?php echo(htmlspecialchars($parameters['address2'])); ?><br />

電話番号<br />
<?php echo(htmlspecialchars($parameters['tel'])); ?><br />

メールアドレス<br />
<?php echo(htmlspecialchars($parameters['mail1'])); ?><br />

職業<br />
<?php echo(htmlspecialchars($parameters['occupation'])); ?><br />

プレゼント<br />
<?php           
 $judge=htmlspecialchars($parameters['present']);
 
 if($judge==1) {
 	$judge='オリジナル腕時計（小人用）';
 } elseif ($judge==2) {
 	$judge='オリジナルTシャツ（小人用120cm）';
 } elseif ($judge==3) {
 	$judge='オリジナルノートブック';
 } elseif ($judge==4) {
 	$judge='出演者サイン入りプレスシート';
 } elseif ($judge==5) {
 	$judge='タトゥーシール';
 } elseif ($judge==6) {
 	$judge='ガリバーサイズイヤホン型スピーカー';
 } elseif ($judge==7) {
 	$judge='ガリバー＆ミニサイズえんぴつセット';
 }
 
 echo($judge); 
 ?><br />
      
  <p id="confirm"><a href="http://www.cinemasunshine.co.jp">シネマサンシャイン HOMEへ</a></p>
      
<?php
	  
}elseif($action == 'confirm'){

?>
      
      <p id="description">以下の内容で送信します。<br />
		よろしければ決定ボタンをクリックしてください。</p>
      
お名前<br />
<?php echo(htmlspecialchars($parameters['name'])); ?><br />
お名前(フリガナ)<br />
<?php echo(htmlspecialchars($parameters['furigana'])); ?><br />
性別<br />
<?php echo(htmlspecialchars($parameters['gender']) != 2 ? "男性" : "女性"); ?><br />
年齢<br />
<?php echo(htmlspecialchars($parameters['age'])); ?>歳<br />
郵便番号<br />
<?php echo(htmlspecialchars($parameters['zip1'])); ?>
 -
<?php echo(htmlspecialchars($parameters['zip2'])); ?><br />

住所<br />
<?php echo(htmlspecialchars($parameters['pref'])); ?><br />
<?php echo(htmlspecialchars($parameters['address1'])); ?><br />

ﾋﾞﾙ･ﾏﾝｼｮﾝ名<br>
<?php echo(htmlspecialchars($parameters['address2'])); ?><br />

電話番号<br />
<?php echo(htmlspecialchars($parameters['tel'])); ?><br />

メールアドレス<br />
<?php echo(htmlspecialchars($parameters['mail1'])); ?><br />

職業<br />
<?php echo(htmlspecialchars($parameters['occupation'])); ?><br />

プレゼント<br />
<?php           
 $judge=htmlspecialchars($parameters['present']);
 
 if($judge==1) {
 	$judge='オリジナル腕時計（小人用）';
 } elseif ($judge==2) {
 	$judge='オリジナルTシャツ（小人用120cm）';
 } elseif ($judge==3) {
 	$judge='オリジナルノートブック';
 } elseif ($judge==4) {
 	$judge='出演者サイン入りプレスシート';
 } elseif ($judge==5) {
 	$judge='タトゥーシール';
 } elseif ($judge==6) {
 	$judge='ガリバーサイズイヤホン型スピーカー';
 } elseif ($judge==7) {
 	$judge='ガリバー＆ミニサイズえんぴつセット';
 }
 
 echo($judge); 
 ?><br />
      
      <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
      
      <p id="confirm"><input type="submit" style="background:url(images/back.gif) no-repeat center center;width:50px;height:20px; margin-right:9px" onclick="history.back()" value="" /><input type="hidden" name="action" value="submit" /><input type="submit" style="background:url(images/confirm.gif) no-repeat center center;width:50px;height:20px;" onclick="this.form.submit()" value="" /></p>
      
      </form>

      
<?php
	  
}else{

?>      

<p id="description">以下の応募フォームにご記入の上、送信ボタンをクリックしてください。</p>
      
<?php 

	if($action == 'error'){
		echo "<ul id=\"errors\">\n";
		foreach($errors as $val){
			echo "<li>".htmlspecialchars($val)."</li>\n";
		}
		echo "</ul>\n";
	}

?>

<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm"><br>

お名前 <font color="#ff8800">必須</font><br>

<input type="text" maxlength="50" size="16" value="" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>"><br>
<input type="text" maxlength="50" size="16" value="" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>"><br><br>


性別 <font color="#ff8800">必須</font><br>

<input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />男性　
<input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />女性<br>


年齢 <font color="#ff8800">必須</font><br>

<input type="text" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" /><br>歳

<br>


郵便番号 <font color="#ff8800">必須</font><br>

<input id="formZip1" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />-
<input id="formZip2" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" /><br><br>


住所 <font color="#ff8800">必須</font><br>

<select id="formPref" name="pref">
  <option selected="selected" value="">▼ 都道府県(選択してください)</option>
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
</select><br>

            
<input id="formAddress1" maxlength="60" size="40" name="address1" value="<?php echo(htmlspecialchars($parameters['address1'])); ?>" />

<br>


ﾋﾞﾙ･ﾏﾝｼｮﾝ名 <font color="#ff8800"></font><br>

<input type="text" maxlength="50" size="16" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>"><br><br>


電話番号 <font color="#ff8800">必須</font><br>

<input type="text" maxlength="50" size="16" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>"><br><br>


ﾒｰﾙｱﾄﾞﾚｽ <font color="#ff8800">必須</font><br>

<input type="text" maxlength="256" istyle="3" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>"><br><br>


ﾒｰﾙｱﾄﾞﾚｽ確認 <font color="#ff8800">必須</font><br>

<input type="text" maxlength="256" istyle="3" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>"><br><br>

職業 <font color="#ff8800">必須</font><br>
 <select id="formOccupation" name="occupation">
   <option selected="selected" value="">▼選択してください</option>
   <option value="学生">学生</option>
   <option value="アルバイト">アルバイト</option>
   <option value="会社員">会社員</option>
   <option value="公務員">公務員</option>
   <option value="自営業">自営業</option>
   <option value="主婦（夫）">主婦（夫）</option>
   <option value="その他">その他</option>
 </select>

プレゼントを選ぶ <font color="#ff8800">必須</font><br>

   <br/>「塔の上のラプンツェル」<br/>
   <input type="radio" <?php echo((intval($parameters['present']) === 1) || (intval($parameters['present']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="present" />
 	オリジナル腕時計（小人用）（5名様）<br />
 	<input type="radio" <?php echo((intval($parameters['present']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="present" />
   オリジナルTシャツ（小人用120cm）（5名様）<br />
   <input type="radio" <?php echo((intval($parameters['present']) === 3)? 'checked="checked"' : ''); ?> value="3" name="present" />
   オリジナルノートブック（5名様）<br /><br />          
 
   <br/>「漫才ギャング」<br/>
   <input type="radio" <?php echo((intval($parameters['present']) === 4) ? 'checked="checked"' : ''); ?> value="4" name="present" />
   出演者サイン入りプレスシート（3名様）<br />
   <input type="radio" <?php echo((intval($parameters['present']) === 5)? 'checked="checked"' : ''); ?> value="5" name="present" />
   タトゥーシール（12名様）<br /><br />
 
   <br/>「ガリバー旅行記」<br/>
   <input type="radio" <?php echo((intval($parameters['present']) === 6) || (intval($parameters['present']) === 1) ? 'checked="checked"' : ''); ?> value="6" name="present" />
 	ガリバーサイズイヤホン型スピーカー（1名様）<br />
 	<input type="radio" <?php echo((intval($parameters['present']) === 7) ? 'checked="checked"' : ''); ?> value="7" name="present" />
   ガリバー＆ミニサイズえんぴつセット<br /><br />

 <br><img src="images/spacer.gif" height="10"><br>

個人情報の取扱いについて

<br><img src="images/spacer.gif" height="5"><br>

ご登録の前に､当社の｢ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ｣をよくお読み下さい｡<br />

ご確認いただき､ご同意いただける場合はﾁｪｯｸﾎﾞｯｸｽにｸﾘｯｸして下さい｡

<br><img src="images/spacer.gif" height="5"><br>

<input type="checkbox" value="1" name="ppa">個人情報の取り扱いに同意する

<br><img src="images/spacer.gif" height="5"><br>

※当選者の発表は、厳選なる抽選のうえ、ご本人さまへの通知をもって代えさせていただきます。<br /> 
<img src="images/spacer.gif" height="10"><br>

<center><input type="submit" value="送信"></center>
      </form>


<?php
	  
}

?>
      
      
      
      
      <p id="copyright">Copyright (Co) 2001-2009, Cinema Sunshine Co., Ltd. All Right Reserved.</p>
      <!-- end #mainContent -->
    </div>
    <!-- end #container -->
  </div>
  <div id="footer">
    <p style="font-size:1px;line-height:1px">&nbsp;</p>
    <!-- end #footer -->
  </div>
</div>


<script type="text/javascript">

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");

document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<script type="text/javascript">

try {

var pageTracker = _gat._getTracker("UA-8383230-14");

pageTracker._trackPageview();

} catch(err) {}</script>


<center>

<div><img src="images/waribiki_img_2_m.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved."/></div>

</center>

</body>
</html>

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>「長ぐつをはいたネコ」プレゼントキャンペーン</title>
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/form.js"></script>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");

document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8383230-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body class="oneColFixCtrHdr">
<div id="page">
  <div id="container">
    <div id="kanban">
      <h2 id="headLogo" class="logo"><a href="http://www.cinemasunshine.co.jp"><img src="images/logo.gif" alt="CINEMA SUNSHINE" width="115" height="69" /></a></h2>
      <!-- end #header -->
    </div>
    <div id="mainContent">
      <h1>「長ぐつをはいたネコ」プレゼントキャンペーン</h1>
      <p id="visualImage"><img src="images/image.jpg" alt="「長ぐつをはいたネコ」プレゼントキャンペーン" width="636" height="280" /></p>
      
      
      
<?php
	  
if($action == 'submit'){

?>
      
            <p id="description">ご応募ありがとうございました。<br />
		下記の通り応募されました。</p>
        
      <table width="636" cellpadding="0" cellspacing="1">
        <tr>
          <th class="your">お名前</th>
          <td><?php echo(htmlspecialchars($parameters['name'])); ?></td>
        </tr>
        <tr>
          <th class="your">お名前(フリガナ)</th>
          <td><?php echo(htmlspecialchars($parameters['furigana'])); ?></td>
        </tr>
        <tr>
          <th class="your">性別</th>
          <td><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "男性" : "女性"); ?></td>
        </tr>
        <tr>
          <th class="your">年齢</th>
          <td><?php echo(htmlspecialchars($parameters['age'])); ?>歳</td>
        </tr>
        <tr>
          <th class="your">郵便番号</th>
          <td><?php echo(htmlspecialchars($parameters['zip1'])); ?>
            -
            <?php echo(htmlspecialchars($parameters['zip2'])); ?>
          </td>
        </tr>
        <tr>
          <th class="your" rowspan="2">住所</th>
          <td><?php echo(htmlspecialchars($parameters['pref'])); ?></td>
        </tr>
        <tr>
          <td><?php echo(htmlspecialchars($parameters['address1'])); ?></td>
        </tr>
        <tr>
          <th class="your">ビル・マンション名</th>
          <td><?php echo(htmlspecialchars($parameters['address2'])); ?></td>
        </tr>
        <tr>
          <th class="your">電話番号</th>
          <td><?php echo(htmlspecialchars($parameters['tel'])); ?></td>
        </tr>
        <tr>
          <th class="your">メールアドレス</th>
          <td><?php echo(htmlspecialchars($parameters['mail1'])); ?></td>
        </tr>
        <tr>
          <th class="your">職業</th>
          <td><?php echo(htmlspecialchars($parameters['occupation'])); ?></td>
        </tr>
        <!--<tr>
          <th class="your">プレゼント</th>
          <td><?php echo(htmlspecialchars($parameters['occupation'])); ?></td>
        </tr>    -->    
		  <tr>
          <th class="your">プレゼント</th>
          <td><?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='特製ダンシングマット (1名様)';
          } elseif ($judge==2) {
          	$judge='特製長靴バック(5名様)';
          } elseif ($judge==3) {
          	$judge='特製長靴型湯たんぽ(5名様)';
          } elseif ($judge==4) {
          	$judge='特製"肉球"つき長靴下(5名様)';
          } elseif ($judge==5) {
          	$judge='特製長靴色えんぴつセット(10名様)';
          }
          	  
          echo($judge); 
          ?></td>
        </tr>
      </table>
      
      <p id="confirm"><a href="http://www.cinemasunshine.co.jp">シネマサンシャイン HOMEへ</a></p>
      
<?php
	  
	  
}elseif($action == 'confirm'){

?>
      
      <p id="description">以下の内容で送信します。<br />
		よろしければ決定ボタンをクリックしてください。</p>
      
      <table width="636" cellpadding="0" cellspacing="1">
        <tr>
          <!--<th class="about" colspan="2" style="color:#3D6497">あなたについて</th>
        </tr>-->
        <tr>
          <th class="your">お名前</th>
          <td><?php echo(htmlspecialchars($parameters['name'])); ?></td>
        </tr>
        <tr>
          <th class="your">お名前(フリガナ)</th>
          <td><?php echo(htmlspecialchars($parameters['furigana'])); ?></td>
        </tr>
        <tr>
          <th class="your">性別</th>
          <td><?php echo(htmlspecialchars($parameters['gender']) != 2 ? "男性" : "女性"); ?></td>
        </tr>
        <tr>
          <th class="your">年齢</th>
          <td><?php echo(htmlspecialchars($parameters['age'])); ?>歳</td>
        </tr>
        <tr>
          <th class="your">郵便番号</th>
          <td><?php echo(htmlspecialchars($parameters['zip1'])); ?>
            -
            <?php echo(htmlspecialchars($parameters['zip2'])); ?>
          </td>
        </tr>
        <tr>
          <th class="your" rowspan="2">住所</th>
          <td><?php echo(htmlspecialchars($parameters['pref'])); ?></td>
        </tr>
        <tr>
          <td><?php echo(htmlspecialchars($parameters['address1'])); ?></td>
        </tr>
        <tr>
          <th class="your">ビル・マンション名</th>
          <td><?php echo(htmlspecialchars($parameters['address2'])); ?></td>
        </tr>
        <tr>
          <th class="your">電話番号</th>
          <td><?php echo(htmlspecialchars($parameters['tel'])); ?></td>
        </tr>
        <tr>
          <th class="your">メールアドレス</th>
          <td><?php echo(htmlspecialchars($parameters['mail1'])); ?></td>
        </tr>
        <tr>
          <th class="your">職業</th>
          <td><?php echo(htmlspecialchars($parameters['occupation'])); ?></td>
        </tr>
        <tr>
          <th class="your">プレゼント</th>
          <td><?php 
          
          $judge=htmlspecialchars($parameters['present']);
          
          if($judge==1) {
          	$judge='特製ダンシングマット (1名様)';
          } elseif ($judge==2) {
          	$judge='特製長靴バック(5名様)';
          } elseif ($judge==3) {
          	$judge='特製長靴型湯たんぽ(5名様)';
          } elseif ($judge==4) {
          	$judge='特製"肉球"つき長靴下(5名様)';
          } elseif ($judge==5) {
          	$judge='特製長靴色えんぴつセット(10名様)';
          }
          
          echo($judge); 
          ?></td>
        </tr>
        
      </table>
      
      <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
      
      <p id="confirm"><input type="button" style="background:url(images/back.gif) no-repeat center center;width:50px;height:20px; margin-right:9px" onclick="history.back()" value="" /><input type="hidden" name="action" value="submit" /><input type="button" style="background:url(images/confirm.gif) no-repeat center center;width:50px;height:20px;" onclick="this.form.submit()" value="" /></p>
      
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
      
      
      <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="applicationForm">
      <table width="636" cellpadding="0" cellspacing="1">
        <!--<tr>
          <th class="about" colspan="2" style="color:#3D6497">あなたについて</th>
        </tr>-->
        <tr>
          <th class="your">お名前</th>
          <td><input id="formName" maxlength="20" size="40" name="name" value="<?php echo(htmlspecialchars($parameters['name'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">お名前(フリガナ)</th>
          <td><input id="formFurigana" maxlength="20" size="40" name="furigana" value="<?php echo(htmlspecialchars($parameters['furigana'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">性別</th>
          <td><input type="radio" <?php echo((intval($parameters['gender']) === 0) || (intval($parameters['gender']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="gender" />
            男性　
            <input type="radio" <?php echo((intval($parameters['gender']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="gender" />
            女性
            </td>
        </tr>
        <tr>
          <th class="your">年齢</th>
          <td><input id="formAge" maxlength="5" size="5" name="age" value="<?php echo(htmlspecialchars($parameters['age'])); ?>" />
            歳</td>
        </tr>
        <tr>
          <th class="your">郵便番号</th>
          <td><input id="formZip1" maxlength="10" size="10" name="zip1" value="<?php echo(htmlspecialchars($parameters['zip1'])); ?>" />
            -
            <input id="formZip2" maxlength="10" size="15" name="zip2" value="<?php echo(htmlspecialchars($parameters['zip2'])); ?>" />
          </td>
        </tr>
        <tr>
          <th class="your" rowspan="2">住所</th>
          <td><select id="formPref" name="pref">
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
            </select>
			<script type="text/javascript">
			$('#formPref').val('<?php echo(htmlspecialchars($parameters['pref'])); ?>');
			</script>
			</td>
        </tr>
        <tr>
          <td><input id="formAddress1" maxlength="60" size="40" name="address1" value="<?php echo(htmlspecialchars($parameters['address1'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">ビル・マンション名</th>
          <td><input id="formAddress2" maxlength="40" size="40" name="address2" value="<?php echo(htmlspecialchars($parameters['address2'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">電話番号</th>
          <td><input id="formTel" maxlength="15" size="30" name="tel" value="<?php echo(htmlspecialchars($parameters['tel'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">メールアドレス</th>
          <td><input id="formMail1" maxlength="60" size="60" name="mail1" value="<?php echo(htmlspecialchars($parameters['mail1'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">メールアドレス(確認用)</th>
          <td><input id="formMail2" maxlength="60" size="60" name="mail2" value="<?php echo(htmlspecialchars($parameters['mail2'])); ?>" /></td>
        </tr>
        <tr>
          <th class="your">職業</th>
          <td><select id="formOccupation" name="occupation">
              <option selected="selected" value="">▼   選択してください</option>
              <option value="学生">学生</option>
              <option value="アルバイト">アルバイト</option>
              <option value="会社員">会社員</option>
              <option value="公務員">公務員</option>
              <option value="自営業">自営業</option>
              <option value="主婦（夫）">主婦（夫）</option>
              <option value="その他">その他</option>
            </select>
			<script type="text/javascript">
			document.getElementById('formOccupation').value = '<?php echo(htmlspecialchars($parameters['occupation'])); ?>';
			</script>
			</td>
        </tr>
  		<tr>
          <th class="your">プレゼント</th>
          <td>
          <div style="margin: 0; padding: 0;"><img src="images/present.jpg" width="447" height="111" border="0" alt="プレゼント一覧" /></div>
            <br/>
            <input type="radio" <?php echo((intval($parameters['present']) === 1) || (intval($parameters['present']) === 1) ? 'checked="checked"' : ''); ?> value="1" name="present" />
            特製ダンシングマット (1名様)<br />
          	<input type="radio" <?php echo((intval($parameters['present']) === 2) ? 'checked="checked"' : ''); ?> value="2" name="present" />
            特製長靴バック(5名様)<br />
          	<input type="radio" <?php echo((intval($parameters['present']) === 3) ? 'checked="checked"' : ''); ?> value="3" name="present" />
            特製長靴型湯たんぽ(5名様)<br />  
          	<input type="radio" <?php echo((intval($parameters['present']) === 4) ? 'checked="checked"' : ''); ?> value="4" name="present" />
            特製"肉球"つき長靴下(5名様)<br />  
          	<input type="radio" <?php echo((intval($parameters['present']) === 5) ? 'checked="checked"' : ''); ?> value="5" name="present" />
            特製長靴色えんぴつセット(10名様)<br />  
            </td>
        </tr>
        
      </table>
      <div id="particular">
        <h3>特記事項</h3>
        <ul>
          <li>当選者の発表は、厳選なる抽選のうえ、ご本人さまへの通知をもって代えさせていただきます。</li>
          <!--<li>メッセージの送り先の個人情報は、ご本人様と同等のお取扱いで保護させていただきます。</li>-->
        </ul>
        <p>特記事項に
          <input id="formAgreement" type="checkbox" value="1" name="agreement" /><label for="formAgreement">同意する</label></p>
      </div>
      <div id="privacy">
        <h3>【個人情報の取扱いについて】</h3>
        <ul>
          <li>個人情報をご本人の了解なく第三者に提供することはありません。</li>
          <li>商品の発送など、キャンペーン応募目的のために個人情報を収集いたします。</li>
          <li>15歳以下のお子様に関しては、親権者の同意を得たものとして個人情報を取扱います。</li>
        </ul>
      </div>
      <p id="confirmation">内容をご確認頂き、間違いが無ければ送信ボタンを押してください。</p>
      <p id="submit"><input type="hidden" name="action" value="confirm" /><input type="button" style="background:url(images/submit.gif) no-repeat center center;width:151px;height:31px;" onclick="checkAndSubmit(this.form)" value="" /></p>
      </form>
    
      
<?php
	  
}

?>
      
      
      
      
      <p id="copyright">Copyright (Co) 2001-2011, Cinema Sunshine Co., Ltd. All Right Reserved.</p>
      <!-- end #mainContent -->
    </div>
    <!-- end #container -->
  </div>
  <div id="footer">
    <p style="font-size:1px;line-height:1px">&nbsp;</p>
    <!-- end #footer -->
  </div>
</div>




</body>
</html>

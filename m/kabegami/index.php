<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  $GA_ACCOUNT = "MO-8383230-43";
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
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<!--<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=Shift_JIS"/>
<meta name="description" content="�r�܁A���a���A���A��t�A�����A���Q�ŉf�������Ȃ��ϻݼ���" />
<meta name="keywords" content="��ϻݼ���,�f��,���,�f�挟��,�f���,��f,�Ⱥ�,��f����,�ǎ���ھ��ķ���߰�" />
<title>��ϻݼ���|�ǎ���ھ��ķ���߰�</title>-->
<style type="text/css">
a:link {color:#000000;}
a:visited {color:#000000;}
-a:hover{color: #ff0000;}

</style>
</head>
<body style="background-color:#FFFFFF;">
<a id="top" name="top"></a>
<h1><img src="images/kabegami.gif" alt="�ǎ��v���[���g�L�����y�[��"/></h1><br />



<div style="text-align:center">
<span style="color:#9d0000; font-size:12px;">�u����ǂ��q�ǂ��v�̕ǎ��v���[���g!!</span><br /><br />

<span style="font-size:10px;">����������</span><br /><br />

<img src="images/hoshi-o-kodomo.gif" width="156" height="208" alt="����ǂ��q�ǂ�"><br /><br />

<span style="font-size:10px; color:#999;"><a href="images/hoshi-kabegami.jpg">���_�E�����[�h�͂����灚</a></span><br /><br />
<!--<a href="../images/campaign/hoshi-kabegami.jpg"><img src="../images/campaign/kabegami_btn.gif" alt="�_�E�����[�h�͂�����"/></a><br /><br />-->


<span style="color:#826524;font-size:10px;">���摜�́A�g�ѓd�b�̃��j���[�́u�摜��ۑ��v���g���ĕۑ����ĉ������B</span><br />

<br />

</div>

<hr size ="2" style="border-color:#e4e4e4"></hr>


<div style="font-size:x-small;background-color:#FFFFFF;text-align:right;">
<img src="../images/sp4.gif" alt=" " height="4"/><br />
<a href="#top" accesskey="2"><span style="color:#171c61;">���߰��TOP�</span></a><br />
<img src="../images/sp4.gif" alt=" " height="4"/><br />
</div>



<img src="../images/sp.gif" alt=" " height="4"/><br />



<img src="../images/sp.gif" alt=" " height="4"/><br />

<div style="font-size:x-small;background-color:#EFEFEF;text-align:left;">
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../company"><span style="color:#888888;">��ЊT�v</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../privacy"><span style="color:#888888;">��ײ�޼���ؼ�</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=���ӌ��E�����z"><span style="color:#888888;">���₢���킹(�������p��������m�点������)</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
<a href="../?p=index"><span style="color:#171c61;">>>��ϻݼ�����޲�TOP�</span></a><br />
<img src="../images/sp5.gif" alt=" " height="8"/><br />
</div>



<div style="font-size:x-small;background-color:#171c61; color:#ffffff; text-align:center;">
<img src="../images/sp1.gif" alt=" " height="4"/><br />
(c)cinema sunshine<br />
<img src="../images/sp1.gif" alt=" " height="4"/><br />
</div>
<?php
  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>
</body>
</html>
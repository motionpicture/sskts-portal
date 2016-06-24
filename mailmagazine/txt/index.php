<?php
include($_SERVER['DOCUMENT_ROOT'].'/lib/mobileGA_function.php');
header('Content-Type: text/html; charset=Shift_JIS');
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
<title>シネマサンシャインメールマガジン簡易テキスト版</title>
<script>
if(window.XMLHttpRequest){
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-8383230-68', 'auto');
  ga('send', 'pageview');
}
</script>
</head>
<body>
<noscript>
<img src="<?php echo mobileGoogleAnalyticsGetImageUrl('MO-8383230-68'); ?>" />
</noscript>
<?php
$issue = trim(htmlspecialchars(str_replace('/','',$_GET['issue']),ENT_NOQUOTES));
if($issue){
  $html = file_get_contents('./'.$issue.'/text.html');
}
if($html){
  echo $html;
}else{
  echo 'NOT FOUND';
}
$output = ob_get_contents();
ob_end_clean();
echo mb_convert_encoding($output,'SJIS','UTF-8');
?>
</body>
</html>
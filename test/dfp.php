
<?php

switch (true) {
    case !isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']):
    case $_SERVER['PHP_AUTH_USER'] !== 'test':
    case $_SERVER['PHP_AUTH_PW']   !== 'S6eU3mvD':
        header('WWW-Authenticate: Basic realm="Enter username and password."');
        header('Content-Type: text/plain; charset=utf-8');
        die('このページを見るにはログインが必要です');
}

header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title></title>
</head>
<body>
<?php

$theaters = array(
  'masaki',
  'kahoku',
  'kinuyama',
  'shimonoseki',
  'shigenobu',
  'numazu',
  'okaido',
  'ozu',
  'yamatokoriyama',
  'ikebukuro',
  'tsuchiura',
  'heiwajima',
  'kitajima'
);

foreach ($theaters as $value) {
  $html = '';
  $theaterName = $value;

  $theaterMediaNetwork = array(
  'masaki'=> '1463113779226-0',
  'kahoku'=> '1463113229613-0',
  'kinuyama'=> '1463113611480-0',
  'shimonoseki'=> '1463113431009-0',
  'shigenobu'=> '1463113696177-0',
  'numazu'=> '1463113099521-0',
  'okaido'=> '1463113527808-0',
  'ozu'=> '1463113874944-0',
  'yamatokoriyama'=> '1463113342732-0',
  'ikebukuro'=> '1463112742866-0',
  'tsuchiura'=> '1463112998403-0',
  'heiwajima'=> '1463112890125-0',
  'kitajima'=> '1463113963815-0'
  );

$html = <<<EOL
<h2>{$theaterName}</h2>
<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
	var gads = document.createElement('script');
	gads.async = true;
	gads.type = 'text/javascript';
	var useSSL = 'https:' == document.location.protocol;
	gads.src = (useSSL ? 'https:' : 'http:') +
	'//www.googletagservices.com/tag/js/gpt.js';
	var node = document.getElementsByTagName('script')[0];
	node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
	googletag.defineSlot('/22524478/sunshine_{$theaterName}_pc', [250, 250], 'div-gpt-ad-{$theaterMediaNetwork[$theaterName]}').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
});
</script>

<!-- /22524478/sunshine_{$theaterName}_pc -->
<div id='div-gpt-ad-{$theaterMediaNetwork[$theaterName]}' style='height:250px; width:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-{$theaterMediaNetwork[$theaterName]}'); });
</script>
</div>
EOL;

echo($html);
}
?>
</body>
</html>

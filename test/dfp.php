
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
      googletag.defineSlot('/22524478/motion_picture', [250, 250], 'div-gpt-ad-1456996551898-0').addService(googletag.pubads());
      googletag.pubads().enableSingleRequest();
      googletag.enableServices();
    });
  </script>
  <!-- /22524478/motion_picture -->
  <div id='div-gpt-ad-1456996551898-0' style='height:250px; width:250px;'>
  <script type='text/javascript'>
  googletag.cmd.push(function() { googletag.display('div-gpt-ad-1456996551898-0'); });
  </script>
  </div>
</body>
</html>

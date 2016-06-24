<?php
//https://developers.google.com/analytics/devguides/collection/other/mobileWebsites#update-your-web-pages
function mobileGoogleAnalyticsGetImageUrl($GA_ACCOUNT) {
  $GA_PIXEL = "/lib/mobileGA.php";
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
  return $url;
}

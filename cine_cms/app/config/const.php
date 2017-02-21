<?php
require dirname(dirname(dirname(dirname(__FILE__)))).DS.'env.php';
define('APP_ENV', $env);

//シネマサンシャインドメイン
define('sunshine_domain', 'http://' . $_SERVER["HTTP_HOST"] . '/');

//本部
define('honbu','honbu');

//本部
define('motion','motion');

/*
//movie img 格納 local
define('movie_picture','C:'.DS.'phproot'.DS.'htdocs2'.DS.'theaters_image'.DS.'movie');

//NEWSのピクチャー
define('news_picture','C:'.DS.'phproot'.DS.'htdocs2'.DS.'theaters_	image'.DS.'news');


//campaignのピクチャー
define('campaign_picture','C:'.DS.'phproot'.DS.'htdocs2'.DS.'theaters_image'.DS.'campaign');

//Top image
define('topimage_picture','C:'.DS.'phproot'.DS.'htdocs2'.DS.'theaters_image'.DS.'topimage');

//flv
define('flv_picture','C:'.DS.'phproot'.DS.'htdocs2'.DS.'theaters_image'.DS.'flv');

//flv image
define('flvimage_picture','C:'.DS.'phproot'.DS.'htdocs2'.DS.'theaters_image'.DS.'flvimage');

*/

$pictureBaseDir = dirname(dirname(dirname(dirname(__FILE__)))).DS.'theaters_image';

//movie img 格納 local
define('movie_picture', $pictureBaseDir.DS.'movie');

//NEWSのピクチャー
define('news_picture', $pictureBaseDir.DS.'news');

//作品紹介
define('special_picture', $pictureBaseDir.DS.'special');

//特設サイトのメインバナー
define('special_main_picture', $pictureBaseDir.DS.'special_main_banner');

//特設サイトのサイドバナー
define('special_side_picture', $pictureBaseDir.DS.'special_side_banner');

//ピックアップ
define('pick_picture', $pictureBaseDir.DS.'pick');

//campaignのピクチャー
define('campaign_picture', $pictureBaseDir.DS.'campaign');

//Top image
define('topimage_picture', $pictureBaseDir.DS.'topimage');

//Top slider
define('topslider_picture', $pictureBaseDir.DS.'topslider');

//flv
define('flv_picture', $pictureBaseDir.DS.'flv');

//flv image
define('flvimage_picture', $pictureBaseDir.DS.'flvimage');

?>


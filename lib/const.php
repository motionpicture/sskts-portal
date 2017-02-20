<?php
include dirname(__FILE__) . '../../env.php';
define('APP_ENV', $env);

// cache dir
define('CACHE_DIR', realpath(dirname(__DIR__) . '/cache'));

//movie img 格納 local
define('movie_picture','/theaters_image/movie');

//NEWSのピクチャー
define('news_picture','/theaters_image/news');


//campaignのピクチャー
define('campaign_picture','/theaters_image/campaign');

//Top image
define('topimage_picture','/theaters_image/topimage');

// flv（ローカル）
define('flv_picture','/theaters_image/flv');

// flv（動画サーバ）
define('FLV_PATH', 'http://160.16.87.153/' . APP_ENV . '/flv');

//flv image
define('flvimage_picture','/theaters_image/flvimage');


//TOPページURL
define ("GROBAL_TOP_URL", 'http://' . $_SERVER["HTTP_HOST"] . '/');

//スマートフォンのTOPページURL
define ("GROBAL_SP_TOP_URL", GROBAL_TOP_URL . 'sp/');

//モバイルのTOPページURL
define ("GROBAL_M_TOP_URL", GROBAL_TOP_URL . 'm/');

//モバイルのTOPのswfページURL
define ("GROBAL_M__SWF_TOP_URL", GROBAL_TOP_URL . 'm/index.swf');

//画像フォルダのURL
define ("Images_URL", GROBAL_TOP_URL . "images/");

//スマートフォンの画像フォルダのURL
define ("Images_SP_URL", GROBAL_SP_TOP_URL . "images/");

//cssフォルダのURL
define ("Css_URL", GROBAL_TOP_URL . "css/");

//スマートフォンのcssフォルダのURL
define ("Css_SP_URL", GROBAL_SP_TOP_URL . "css/");

//JavaScriptフォルダのURL
define ("SCRIPT_URL", GROBAL_TOP_URL . "js/");

//スマートフォンのJavaScriptフォルダのURL
define ("SCRIPT_SP_URL", GROBAL_SP_TOP_URL . "js/");

//メールマガジンページ会員サービスページURL
define ("Magazine_URL", 'http://www.cinemasunshine.co.jp/magazine/magazine.html');

//上映中ページURL
define ("Showing_URL", GROBAL_TOP_URL . "showing/");

//上映予定ページURL
define ("Next_Showing_URL", GROBAL_TOP_URL . "next_showing/");

//劇場一覧ページURL
define ("Theater_URL", GROBAL_TOP_URL . "theater/");

//池袋のTOPページURL
define ("IKEBUKURO_URL", Theater_URL . "ikebukuro/");

//平和島のTOPページURL
define ("HEIWAJIMA_URL", Theater_URL . "heiwajima/");

//松戸のTOPページURL
define ("MATSUDO_URL", Theater_URL . "matsudo/");

//岩井のTOPページURL
define ("IWAI_URL", Theater_URL . "iwai/");

//土浦のTOPページURL
define ("TSUCHIURA_URL", Theater_URL . "tsuchiura/");

//かほくのTOPページURL
define ("KAHOKU_URL", Theater_URL . "kahoku/");

//沼津のTOPページURL
define ("NUMAZU_URL", Theater_URL . "numazu/");

//大和郡山のTOPページURL
define ("YAMATOKORIYAMA_URL", Theater_URL . "yamatokoriyama/");

//下関のTOPページURL
define ("SHIMONOSEKI_URL", Theater_URL . "shimonoseki/");

//大街道のTOPページURL
define ("OKAIDO_URL", Theater_URL . "okaido/");

//衣山のTOPページURL
define ("KINUYAMA_URL", Theater_URL . "kinuyama/");

//重信のTOPページURL
define ("SHIGENOBU_URL", Theater_URL . "shigenobu/");

//大洲のTOPページURL
define ("OZU_URL", Theater_URL . "ozu/");

//今治のTOPページURL
define ("IMABARI_URL", Theater_URL . "imabari/");

//北島のTOPページURL
define ("KITAJIMA_URL", Theater_URL . "kitajima/");

//エミフルMASAKIのTOPページURL
define ("MASAKI_URL", Theater_URL . "masaki/");

//imaxページURL
define ("IMAX_URL", GROBAL_TOP_URL . "imax/");

//immページURL
define ("IMM_URL", GROBAL_TOP_URL . "imm/");

//会社概要ページURL
define ("Company_URL", GROBAL_TOP_URL . "company/");

//メンバーズカードページURL
define ("Member_URL", GROBAL_TOP_URL . "members_card/");

//Q&AページURL
define ("QA_URL", GROBAL_TOP_URL . "question/");

//シネマサンシャイン特別鑑賞券ページURL
define ("Ticket_URL", GROBAL_TOP_URL . "special_ticket/");

//特定商取引法に基づく表記ページURL
define ("Low_URL", GROBAL_TOP_URL . "law/");

//プライバシーポリシー表記ページURL
define ("Privacy_URL", GROBAL_TOP_URL . "privacy/");

//利用規約ページURL
define ("Policy_URL", GROBAL_TOP_URL . "sitepolicy/");

//サイトマップページURL
define ("SiteMap_URL", GROBAL_TOP_URL . "sitemap/");

//スマートフォンの上映中ページURL
define ("Showing_SP_URL", GROBAL_SP_TOP_URL . "showing/");

//スマートフォンの上映予定ページURL
define ("Next_Showing_SP_URL", GROBAL_SP_TOP_URL . "next_showing/");

//スマートフォンの劇場一覧ページURL
define ("Theater_SP_URL", GROBAL_SP_TOP_URL . "theater/");

//スマートフォンの池袋のTOPページURL
define ("IKEBUKURO_SP_URL", Theater_SP_URL . "ikebukuro/");

//スマートフォンの平和島のTOPページURL
define ("HEIWAJIMA_SP_URL", Theater_SP_URL . "heiwajima/");

//スマートフォンの松戸のTOPページURL
define ("MATSUDO_SP_URL", Theater_SP_URL . "matsudo/");

//スマートフォンの岩井のTOPページURL
define ("IWAI_SP_URL", Theater_SP_URL . "iwai/");

//スマートフォンの土浦のTOPページURL
define ("TSUCHIURA_SP_URL", Theater_SP_URL . "tsuchiura/");

//スマートフォンのかほくのTOPページURL
define ("KAHOKU_SP_URL", Theater_SP_URL . "kahoku/");

//スマートフォンの沼津のTOPページURL
define ("NUMAZU_SP_URL", Theater_SP_URL . "numazu/");

//スマートフォンの大和郡山のTOPページURL
define ("YAMATOKORIYAMA_SP_URL", Theater_SP_URL . "yamatokoriyama/");

//スマートフォンの下関のTOPページURL
define ("SHIMONOSEKI_SP_URL", Theater_SP_URL . "shimonoseki/");

//スマートフォンの大街道のTOPページURL
define ("OKAIDO_SP_URL", Theater_SP_URL . "okaido/");

//スマートフォンの衣山のTOPページURL
define ("KINUYAMA_SP_URL", Theater_SP_URL . "kinuyama/");

//スマートフォンの重信のTOPページURL
define ("SHIGENOBU_SP_URL", Theater_SP_URL . "shigenobu/");

//スマートフォンの大洲のTOPページURL
define ("OZU_SP_URL", Theater_SP_URL . "ozu/");

//スマートフォンの今治のTOPページURL
define ("IMABARI_SP_URL", Theater_SP_URL . "imabari/");

//スマートフォンの北島のTOPページURL
define ("KITAJIMA_SP_URL", Theater_SP_URL . "kitajima/");

//スマートフォンのエミフルMASAKIのTOPページURL
define ("MASAKI_SP_URL", Theater_SP_URL . "masaki/");

//スマートフォンのimaxページURL
define ("IMAX_SP_URL", GROBAL_SP_TOP_URL . "imax/");

//スマートフォンのimmページURL
define ("IMM_SP_URL", GROBAL_SP_TOP_URL . "imm/");

//スマートフォンの会社概要ページURL
define ("Company_SP_URL", GROBAL_SP_TOP_URL . "company/");

//スマートフォンのメンバーズカードページURL
define ("Member_SP_URL", GROBAL_SP_TOP_URL . "members_card/");

//スマートフォンのQ&AページURL
define ("QA_SP_URL", GROBAL_SP_TOP_URL . "question/");

//スマートフォンのシネマサンシャイン特別鑑賞券ページURL
define ("Ticket_SP_URL", GROBAL_SP_TOP_URL . "special_ticket/");

//スマートフォンの特定商取引法に基づく表記ページURL
define ("Low_SP_URL", GROBAL_SP_TOP_URL . "law/");

//スマートフォンのプライバシーポリシー表記ページURL
define ("Privacy_SP_URL", GROBAL_SP_TOP_URL . "privacy/");

//スマートフォンの利用規約ページURL
define ("Policy_SP_URL", GROBAL_SP_TOP_URL . "sitepolicy/");

//スマートフォンのサイトマップページURL
define ("SiteMap_SP_URL", GROBAL_SP_TOP_URL . "sitemap/");
?>


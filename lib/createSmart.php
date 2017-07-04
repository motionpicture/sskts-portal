<?php

//閉館のリダイレクト処理
if(preg_match("!http://www.cinemasunshine.co.jp/sp/theater/imabari/!", $Url)){
	header("Location: http://www.cinemasunshine.co.jp/theater/imabari/thanks/");
}

//headの中身
function getSmartHeadInclude(){
	$define = get_defined_constants() ;
	$arr = getNowPage();

	//meta情報取得
	$meta = getMeta($arr);

echo <<<EOL
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="description" content="{$meta["description"]}">
	<meta name="keywords" content="{$meta["keyword"]}">
	<title>{$meta["title"]}</title>
	<link rel="apple-touch-icon" href="{$define['Images_SP_URL']}siteicon.png" >
	<link rel="stylesheet" type="text/css" href="{$define['Css_SP_URL']}reset.css">
	<link rel="stylesheet" type="text/css" href="{$define['Css_SP_URL']}common.css">
	<link rel="stylesheet" type="text/css" href="{$define['Css_SP_URL']}style.css">
	<link rel="stylesheet" type="text/css" href="{$define['Css_SP_URL']}flickslide.css">
	<script type="text/javascript" src="{$define['SCRIPT_URL']}gtm_tag.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery-1.8.3.min.js"></script>
	<script src="{$define['SCRIPT_SP_URL']}jquery.flickslide.js" type="application/javascript" charset="UTF-8"></script>
  <script src="{$define['SCRIPT_SP_URL']}common.js" type="application/javascript" charset="UTF-8"></script>
	<script type="application/javascript" charset="UTF-8">//a:hoverの設定
		jQuery(function($){
			$( 'a, input[type="button"], input[type="submit"], button' ).bind( 'touchstart', function(){
				$( this ).addClass( 'hover' );
			}).bind( 'touchend', function(){
				$( this ).removeClass( 'hover' );
			});
		});

		$(document).ready(function(){
		    if($('.newsbox .ptblr10 img').width() > 280){
			    $('.newsbox .ptblr10 img').css("width","280px");
			    $('.newsbox .ptblr10 img').css("height","auto");
		    }
		});

	</script>
EOL;

	getSmartHeadTag($arr);

}

function getSmartHeadTag($arr) {

	//土浦、衣山、大和郡山　TOPのみのタグ
	if($arr["ename"] == "tsuchiura" || $arr["ename"] == "kinuyama" || $arr["ename"] == "yamatokoriyama"){
		if($arr["ename2"] == "schedule"){

echo <<<EOL

	<!--gaie-FB計測タグ-->

	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');

	fbq('init', '212446625793321');
	fbq('track', "PageView");</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=212446625793321&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

	<!--/gaie-FB計測タグ-->

EOL;
		}
	}

}

//ヘッダー
function getSmartHeader(){
	$define = get_defined_constants() ;

	//現在のUrlの取得
	$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	$arr = getNowPage();

	//劇場の選択できるページの英語表記
	$SelectPage = array(
		"news",
		"admission",
		"advance_ticket",
		"concession",
		"floor_guide",
		"access",
		"schedule"
	);

	if($arr["pattern2"]){
		//どのページが選択されているか判別
		foreach($SelectPage as $key => $val){
			if($val == $arr["ename2"]){
				$select[$val] = "_on";
			}else{
				$select[$val] = "_off";
			}
		}
	}

	if($arr["ename"] == "top" && !preg_match("!news/detail!",$Url)){

	}else{

	}
	$html = "";
	$html .= "<!-- header -->";
	$html .= "<div id='header'>";
	$html .= "<h1><img src='$define[Images_SP_URL]common/header_rogo.gif' width='119' height='24' alt=''></h1>";
	$html .= "<div class='menu-btn'><a href='#'><div class='border'><span></span><span></span><span></span></div></a></div>";
	$html .= "</div>";
	$html .= "<!-- header -->";


	$menu = "<!-- menu -->";
	$menu .= "<div class='menu'>";

	if ($arr["ename2"]) {
		$menu .= "<div class='menu-ttl'>シネマサンシャイン".$arr["name"]." | 劇場メニュー</div>";
		$menu .= "<ul>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/'>上映スケジュール</a></li>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/news/'>ニュース＆キャンペーン</a></li>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/advance_ticket/'>前売情報</a></li>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/admission/'>料金案内</a></li>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/concession/'>コンセッション</a></li>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/floor_guide/'>劇場設備</a></li>";
			$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/$arr[ename]/access/'>アクセス</a></li>";
			$menu .= "</ul>";
	}

	$menu .= "<div class='menu-ttl'>劇場共通メニュー</div>";
	$menu .= "<ul>";
	$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]'>シネマサンシャインTOP</a></li>";
	$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]theater/'>劇場一覧</a></li>";
	$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]showing/'>上映中作品</a></li>";
	$menu .= "<li><a href='$define[GROBAL_SP_TOP_URL]next_showing/'>上映予定作品</a></li>";
	$menu .= "<li><a href='$define[GROBAL_TOP_URL]question/'>よくあるご質問</a></li>";
	$menu .= "</ul>";
	$menu .= "</div>";
	$menu .= "<div class='menu-cover'></div>";
	$menu .= "<!-- menu -->";

	$html .= $menu;

	echo $html;
}

function getSmartSlideBnr(){
$define = get_defined_constants() ;
	//スライダーの生成
	$arr = getNowPage();

	//劇場IDの取得
	$theaterId=getTheaterId($arr["ename"]);
	$theaterId = $theaterId['id'];
	if($theaterId == null){
		$theaterId = 1000;
	}

	$slide = getTopImage($theaterId);

	if($theaterId == 1000 && $arr["ename"] != "top"){
		$html = '';
	}else{
		//バナーの生成
		foreach($slide as $key => $val){
			unset($theater);
			unset($blank);
			if($val["url_flg"] == 1){
				$target = 'target="_blank"';
			}else{
				$target = '';
			}


			if($val["url"]){
				$bnrHtml .= "<li><div class='pickup_slide'><a href='$val[url]'><img src='/theaters_image/topslider/$val[pic_path]' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "'></a></div></li>";
			}else{
				$bnrHtml .= "<li><div class='pickup_slide'><img src='/theaters_image/topslider/$val[pic_path]' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "'></div></li>";
			}
		}

		$html = '';
		$html .= '<!-- スライド部分 -->';
		$html .= '<div id="mainImage" class="pb10">';
		$html .= '<div id="mainImages" class="mainImageInit">';
		$html .= '<ul>';
		$html .= $bnrHtml;
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<!-- /スライド部分 -->';

		//表示する内容がなかったら$htmlの中を削除
		if(!$bnrHtml){
			$html = "";
		}
	}
	echo $html;
}

//パンクズ的な
function getSmartPankuzu(){
	$define = get_defined_constants();

	//現在のUrlの取得
	$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	//現在のページ情報の取得
	$arr = getNowPage();

	//劇場設備の時の対応
	if($arr["ename2"] && preg_match("/detail/",$Url) && preg_match("/floor_guide/",$Url)){
		$html = "";
		if(!is_int($_GET["p"])){
			if($_GET["p"] == "1" && ($arr["ename"] == "heiwajima" )){
				$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]＞imm 3D sound シアター</span></div>";
			}elseif($_GET["p"] == "1" && ($arr["ename"] == "kinuyama" || $arr["ename"] == "tsuchiura")){
				$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]＞IMAX</span></div>";
			}elseif($_GET["p"] == "4" && ($arr["ename"] == "yamatokoriyama")){
				$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]＞IMAX</span></div>";
			}elseif($arr["ename"] == "heiwajima" || $arr["ename"] == "tsuchiura"  || $arr["ename"] == "numazu"  || $arr["ename"] == "kahoku" || $arr["ename"] == "kinuyama"  || $arr["ename"] == "shigenobu" || $arr["ename"] == "masaki" || $arr["ename"] == "kitajima" || $arr["ename"] == "yamatokoriyama"){
				$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]＞シネマ$_GET[p]</span></div>";
			}else{
				$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]＞$_GET[p]番館</span></div>";
			}
		}else{
			$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]</span></div>";
		}
	}elseif($arr["ename2"]){
		$html = "";
		$html .= "<div class='category_bar_area'>$arr[name]<span class='bread'>＞$arr[name2]</span></div>";
	}

	echo $html;

}

function getSmartRank(){
	$define = get_defined_constants() ;

	//ランキングのIDを取得
	$RankID = getRanking();

	//ループ回数の格納
	$loop = -1;

	$week = array(
		0 => "日",
		1 => "月",
		2 => "火",
		3 => "水",
		4 => "木",
		5 => "金",
		6 => "土"
	);
	$start_date = date('n月j日', strtotime($RankID["start_date"]));
	$end_date = date('n月j日', strtotime($RankID["end_date"]));
	$start_week = $week[date('w',strtotime($RankID["start_date"]))];
	$end_week = $week[date('w',strtotime($RankID["end_date"]))];

	//ランキングまたは劇場リスト用のhtmlの生成
	$html = "";

	$html .= "<div class='between'><p>" . $start_date . "(" . $start_week . ")" . "～" . $end_date . "(" . $end_week . ")" . "</p></div>";

	foreach($RankID as $key => $val){
		unset($MovieSet);
		if($loop < 1){
			$loop++;
			continue;
		}elseif($loop > 3){
			break;
		}
		$MovieSet = getMovieById($val);
		//作品名と画像がない場合は作品マスタから削除されたと判定する。
		if(!$MovieSet["picture"] && !$MovieSet[name]){
			continue;
		}

		if($MovieSet["picture"]){
			$html .= "<li class='num0$loop clearfix'>";
			$html .= "<p class='num'><img class='number' src='./images/top/ranking_0$loop.png' width='33' alt='$loop位'></p>";
			$html .= "<p class='photo'><img src='$define[GROBAL_TOP_URL]theaters_image/movie/$MovieSet[picture]' width='85' alt='" . htmlspecialchars($MovieSet["name"], ENT_QUOTES) . "' ></p>";
			$html .= "<p class='movie'>$MovieSet[name]</p>";
			$html .= "</li>";
		}else{
			$html .= "<li class='num0$loop clearfix'>";
			$html .= "<p class='num'><img class='number' src='./images/top/ranking_0$loop.png' width='33' alt='$loop位'></p>";
			$html .= "<p class='photo'><img src='$define[Images_URL]common/image_none.gif' width='85' alt='NoImage' ></p>";
			$html .= "<p class='movie'>$MovieSet[name]</p>";
			$html .= "</li>";
		}
		$loop++;
	}

	echo $html;
}

function getSmartPickUp(){
	$arr = getNowPage();
	//TOPの場合メディアネットワークタグ
	if ($arr["ename"] == 'top') {
		echo getSmartTrailer();
	}
	//現在のページ情報の取得
	$html =  BnrPattern($arr["ename"]);
	echo $html;
}

//Mapの定義
function getSmartMap(){
	$define = get_defined_constants() ;

	//現在のUrlの取得
	$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	if(preg_match("!/ikebukuro/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B1-14-3&amp;aq=&amp;sll=34.728949,138.455511&amp;sspn=54.857824,135.263672&amp;brcurrent=3,0x60188d66480772ff:0x4136f3704e611443,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%94%E2%88%92%EF%BC%93&amp;t=m&amp;ll=35.729975,139.714787&amp;spn=0.004355,0.006427&amp;z=17&amp;output=embed&amp;iwloc=B"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B1-14-3&amp;aq=&amp;sll=34.728949,138.455511&amp;sspn=54.857824,135.263672&amp;brcurrent=3,0x60188d66480772ff:0x4136f3704e611443,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%94%E2%88%92%EF%BC%93&amp;t=m&amp;ll=35.729975,139.714787&amp;spn=0.004355,0.006427&amp;z=17" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/heiwajima/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;aq=&amp;sll=35.584427,139.740709&amp;sspn=0.108473,0.264187&amp;brcurrent=3,0x601861b96b1c3e97:0x26613e72332c4a46,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;hnear=&amp;t=m&amp;ll=35.585136,139.740644&amp;spn=0.008725,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;aq=&amp;sll=35.584427,139.740709&amp;sspn=0.108473,0.264187&amp;brcurrent=3,0x601861b96b1c3e97:0x26613e72332c4a46,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;hnear=&amp;t=m&amp;ll=35.585136,139.740644&amp;spn=0.008725,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/tsuchiura/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E5%9C%9F%E6%B5%A6&amp;sll=35.584778,139.741083&amp;sspn=0.00678,0.016512&amp;brcurrent=3,0x60220d504c46f8dd:0x6c55af970e3ae7f4,0&amp;ie=UTF8&amp;hq=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;t=m&amp;ll=36.081292,140.181084&amp;spn=0.017342,0.025706&amp;z=15&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E5%9C%9F%E6%B5%A6&amp;sll=35.584778,139.741083&amp;sspn=0.00678,0.016512&amp;brcurrent=3,0x60220d504c46f8dd:0x6c55af970e3ae7f4,0&amp;ie=UTF8&amp;hq=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;t=m&amp;ll=36.081292,140.181084&amp;spn=0.017342,0.025706&amp;z=15&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/kahoku/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E7%9F%B3%E5%B7%9D%E7%9C%8C%E3%81%8B%E3%81%BB%E3%81%8F%E5%B8%82%E5%86%85%E6%97%A5%E8%A7%92%E3%82%BF%EF%BC%92%EF%BC%95&amp;aq=&amp;sll=36.5626,136.362305&amp;sspn=53.816829,135.263672&amp;brcurrent=3,0x5ff9d694480fa525:0xd1d4f5f28272b873,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E7%9F%B3%E5%B7%9D%E7%9C%8C%E3%81%8B%E3%81%BB%E3%81%8F%E5%B8%82%E5%86%85%E6%97%A5%E8%A7%92%E3%82%BF%EF%BC%92%EF%BC%95&amp;t=m&amp;ll=36.709096,136.701078&amp;spn=0.013762,0.023775&amp;z=14&amp;iwloc=A&amp;output=embed&iwloc=B"></iframe><br /><small><a href="https://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E7%9F%B3%E5%B7%9D%E7%9C%8C%E3%81%8B%E3%81%BB%E3%81%8F%E5%B8%82%E5%86%85%E6%97%A5%E8%A7%92%E3%82%BF%EF%BC%92%EF%BC%95&amp;aq=&amp;sll=36.5626,136.362305&amp;sspn=53.816829,135.263672&amp;brcurrent=3,0x5ff9d694480fa525:0xd1d4f5f28272b873,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E7%9F%B3%E5%B7%9D%E7%9C%8C%E3%81%8B%E3%81%BB%E3%81%8F%E5%B8%82%E5%86%85%E6%97%A5%E8%A7%92%E3%82%BF%EF%BC%92%EF%BC%95&amp;t=m&amp;ll=36.709096,136.701078&amp;spn=0.013762,0.023775&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/numazu/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E6%B2%BC%E6%B4%A5&amp;sll=36.709681,136.700907&amp;sspn=0.026732,0.066047&amp;brcurrent=3,0x6019855cc3c4cc53:0x348de189f0c7bdea,0&amp;ie=UTF8&amp;hq=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;t=m&amp;ll=35.103602,138.860385&amp;spn=0.004389,0.006427&amp;z=17&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E6%B2%BC%E6%B4%A5&amp;sll=36.709681,136.700907&amp;sspn=0.026732,0.066047&amp;brcurrent=3,0x6019855cc3c4cc53:0x348de189f0c7bdea,0&amp;ie=UTF8&amp;hq=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;t=m&amp;ll=35.103602,138.860385&amp;spn=0.004389,0.006427&amp;z=17&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/yamatokoriyama/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C&amp;sll=35.10379,138.860986&amp;sspn=0.00341,0.008256&amp;brcurrent=3,0x60013a70d497170d:0x884b55346960bf58,0&amp;ie=UTF8&amp;hq=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;t=m&amp;ll=34.65125,135.802152&amp;spn=0.008826,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C&amp;sll=35.10379,138.860986&amp;sspn=0.00341,0.008256&amp;brcurrent=3,0x60013a70d497170d:0x884b55346960bf58,0&amp;ie=UTF8&amp;hq=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;t=m&amp;ll=34.65125,135.802152&amp;spn=0.008826,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/okaido/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93%E3%80%80&amp;sll=34.65035,135.802367&amp;sspn=0.013716,0.033023&amp;brcurrent=3,0x354fe5f21242979b:0x8a9c6a8072cf4129,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;t=m&amp;ll=33.837039,132.770655&amp;spn=0.008912,0.012853&amp;z=16&amp;output=embed&iwloc=B"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93%E3%80%80&amp;sll=34.65035,135.802367&amp;sspn=0.013716,0.033023&amp;brcurrent=3,0x354fe5f21242979b:0x8a9c6a8072cf4129,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;t=m&amp;ll=33.837039,132.770655&amp;spn=0.008912,0.012853&amp;z=16" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/shimonoseki/!",$Url)){
	    $html = '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d3309.694704410653!2d130.92513042659354!3d33.948979499743395!3m2!1i1024!2i768!4f13.1!2m1!1z5bGx5Y-j55yM5LiL6Zai5biC56u55bSO55S677yU77yN77yR77yN77yT77yXIOOCt-ODvOODouODvOODq-S4i-mWou-8kkY!5e0!3m2!1sja!2sjp!4v1402649404976" width="278" height="200" frameborder="0" style="border:0"></iframe><br /><small><a href="https://www.google.co.jp/maps/search/%E5%B1%B1%E5%8F%A3%E7%9C%8C%E4%B8%8B%E9%96%A2%E5%B8%82%E7%AB%B9%E5%B4%8E%E7%94%BA%EF%BC%94%EF%BC%8D%EF%BC%91%EF%BC%8D%EF%BC%93%EF%BC%97+%E3%82%B7%E3%83%BC%E3%83%A2%E3%83%BC%E3%83%AB%E4%B8%8B%E9%96%A2%EF%BC%92F/@33.9489795,130.9251304,17z" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/kinuyama/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;aq=&amp;sll=33.837048,132.770395&amp;sspn=0.001731,0.004128&amp;brcurrent=3,0x354fe57a7b20822f:0xad326a414f9b6b85,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;t=m&amp;cid=13650703771668844799&amp;hnear=&amp;ll=33.854032,132.746773&amp;spn=0.004455,0.006427&amp;z=17&amp;output=embed&iwloc=B"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;aq=&amp;sll=33.837048,132.770395&amp;sspn=0.001731,0.004128&amp;brcurrent=3,0x354fe57a7b20822f:0xad326a414f9b6b85,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;t=m&amp;cid=13650703771668844799&amp;hnear=&amp;ll=33.854032,132.746773&amp;spn=0.004455,0.006427&amp;z=17" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/shigenobu/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%B1%E6%B8%A9%E5%B8%823%E4%B8%81%E7%9B%AE1%E2%88%9213&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=53.477264,135.263672&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%97%A5%E6%9C%AC,+%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%B1%E6%B8%A9%E5%B8%82%E9%87%8E%E7%94%B0%EF%BC%93%E4%B8%81%E7%9B%AE%EF%BC%91%E2%88%92%EF%BC%91%EF%BC%93&amp;t=m&amp;ll=33.796909,132.833891&amp;spn=0.014265,0.023947&amp;z=14&amp;iwloc=A&amp;output=embed&iwloc=B"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%B1%E6%B8%A9%E5%B8%823%E4%B8%81%E7%9B%AE1%E2%88%9213&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=53.477264,135.263672&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%97%A5%E6%9C%AC,+%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%B1%E6%B8%A9%E5%B8%82%E9%87%8E%E7%94%B0%EF%BC%93%E4%B8%81%E7%9B%AE%EF%BC%91%E2%88%92%EF%BC%91%EF%BC%93&amp;t=m&amp;ll=33.796909,132.833891&amp;spn=0.014265,0.023947&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/masaki/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB&amp;sll=33.795376,132.833966&amp;sspn=0.003464,0.008256&amp;brcurrent=3,0x354ff1fc71ca5245:0x960be657a61769ae,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95&amp;t=m&amp;ll=33.788172,132.714694&amp;spn=0.008917,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB&amp;sll=33.795376,132.833966&amp;sspn=0.003464,0.008256&amp;brcurrent=3,0x354ff1fc71ca5245:0x960be657a61769ae,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95&amp;t=m&amp;ll=33.788172,132.714694&amp;spn=0.008917,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/ozu/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;aq=&amp;brcurrent=3,0x354f80914624c053:0x7e68ce3752b76e25,1&amp;brv=25.1-fa8ed276_c3147e72_ccf32e81_040c821b_76b35545&amp;sll=33.517651,132.552774&amp;sspn=0.055601,0.132093&amp;g=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;t=m&amp;ll=33.529393,132.568417&amp;spn=0.008944,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;aq=&amp;brcurrent=3,0x354f80914624c053:0x7e68ce3752b76e25,1&amp;brv=25.1-fa8ed276_c3147e72_ccf32e81_040c821b_76b35545&amp;sll=33.517651,132.552774&amp;sspn=0.055601,0.132093&amp;g=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;t=m&amp;ll=33.529393,132.568417&amp;spn=0.008944,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/imabari/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;aq=t&amp;sll=33.528977,132.568645&amp;sspn=0.001737,0.004128&amp;brcurrent=3,0x35503a7736a15089:0x25139c358788e3a2,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;t=m&amp;ll=34.062259,133.015938&amp;spn=0.017776,0.025706&amp;z=15&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;aq=t&amp;sll=33.528977,132.568645&amp;sspn=0.001737,0.004128&amp;brcurrent=3,0x35503a7736a15089:0x25139c358788e3a2,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;t=m&amp;ll=34.062259,133.015938&amp;spn=0.017776,0.025706&amp;z=15&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	}elseif(preg_match("!/kitajima/!",$Url)){
		$html = '<iframe width="278" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%8C%97%E5%B3%B6&amp;aq=&amp;sll=34.061424,133.016464&amp;sspn=0.003453,0.008256&amp;brcurrent=3,0x355372097bcba9e9:0x4f9a0c2e98520ff3,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3&amp;hnear=%E5%BE%B3%E5%B3%B6%E7%9C%8C%E6%9D%BF%E9%87%8E%E9%83%A1%E5%8C%97%E5%B3%B6%E7%94%BA&amp;t=m&amp;ll=34.112213,134.547329&amp;spn=0.008883,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%8C%97%E5%B3%B6&amp;aq=&amp;sll=34.061424,133.016464&amp;sspn=0.003453,0.008256&amp;brcurrent=3,0x355372097bcba9e9:0x4f9a0c2e98520ff3,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3&amp;hnear=%E5%BE%B3%E5%B3%B6%E7%9C%8C%E6%9D%BF%E9%87%8E%E9%83%A1%E5%8C%97%E5%B3%B6%E7%94%BA&amp;t=m&amp;ll=34.112213,134.547329&amp;spn=0.008883,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
	} else if (preg_match('!/aira/!', $Url)) {
        $html = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1753.4567379794848!2d130.62739174792173!3d31.73309605316688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353e57ddf88cdd8b%3A0xf70410c066683a75!2z44K344ON44Oe44K144Oz44K344Oj44Kk44Oz5ae26Imv!5e0!3m2!1sja!2sjp!4v1490407976401" width="278" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>';
    }

	echo $html;
}

//キャンペーンバナーの取得
function getSmartCampaign(){
	$define = get_defined_constants() ;

	//現在のUrlの取得
	$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	$arr = getNowPage();

	//劇場IDの取得
	$theaterId=getTheaterId($arr["ename"]);
	$theaterId=$theaterId["id"];

	if($theaterId == null){
		$theaterId = 1000;
	}

	$campaignBnr = getCampaign($theaterId);

	//バナーの生成
	foreach($campaignBnr as $key => $val){
		unset($theater);
		unset($blank);

		if($val["url_flg"] == "1"){
			$blank = 'target="_blank"';
		}else{
			$blank = '';
		}

		if($val["url"] == null){
			$campaign .= "<li><img src='$define[GROBAL_TOP_URL]theaters_image/campaign/$val[pic_path]' width='100%' alt='" . htmlspecialchars($val["midasi"], ENT_QUOTES) . "' ></li>";
		}else{
			$campaign .= "<li><a href='$val[url]' $blank><img src='$define[GROBAL_TOP_URL]theaters_image/campaign/$val[pic_path]' width='100%' alt='" . htmlspecialchars($val["midasi"], ENT_QUOTES) . "' ></a></li>";
		}
	}

	echo $campaign;
}

//フッターの取得
function getSmartFooter(){
	$define = get_defined_constants() ;

	//現在のUrlの取得
	$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	//現在のページ情報の取得
	$arr = getNowPage();

	//facebookとtwitterのurlを定義
	if(preg_match("!/ikebukuro/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineikebukuro";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ikebukuro";
	}elseif(preg_match("!/heiwajima/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineheiwajima";
		$twitter[$arr["ename"]] = "https://twitter.com/#!/sunshine_imm";
	}elseif(preg_match("!/tsuchiura/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6/340536766033858";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_tsuchiura";
	}elseif(preg_match("!/kahoku/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%81%8B%E3%81%BB%E3%81%8F/333275446766491";
		$twitter[$arr["ename"]] = "https://twitter.com/cs_kahoku";
	}elseif(preg_match("!/numazu/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/pages/%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5/488698254476149";
		$twitter[$arr["ename"]] = "https://twitter.com/cs_numazu";
	}elseif(preg_match("!/yamatokoriyama/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineyamatokoriyama";
		$twitter[$arr["ename"]] = "https://twitter.com/sunshine_imax";
	}elseif(preg_match("!/shimonoseki/!",$Url)){
		$facebook[$arr["ename"]] = "";
		$twitter[$arr["ename"]] = "";
	}elseif(preg_match("!/okaido/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineehime";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ehime";
	}elseif(preg_match("!/kinuyama/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineehime";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ehime";
	}elseif(preg_match("!/shigenobu/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineehime";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ehime";
	}elseif(preg_match("!/masaki/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineehime";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ehime";
	}elseif(preg_match("!/ozu/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineehime";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ehime";
	}elseif(preg_match("!/imabari/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshineehime";
		$twitter[$arr["ename"]] = "http://twitter.com/cs_ehime";
	}elseif(preg_match("!/kitajima/!",$Url)){
		$facebook[$arr["ename"]] = "http://www.facebook.com/sunshinekitajima";
		$twitter[$arr["ename"]] = "https://twitter.com/cs_kitajima";
	}

	if($arr["ename2"]){
		if($facebook[$arr["ename"]] && $twitter[$arr["ename"]]){
			$social = "";
			$social .= "<div class='section ptb10'>";
			$social .= "<p class=''>";
			if($facebook[$arr["ename"]]){
			    $social .= "<a href='" . $facebook[$arr["ename"]] . "'><img class='pickup2' src='$define[Images_SP_URL]bnr/btn_facebook.gif' width='100' alt='CHINEMA SUNSHINE facebook'></a>";
			}
			if($twitter[$arr["ename"]]){
			     $social .= "<a href='" . $twitter[$arr["ename"]] . "'><img class='pickup3' src='$define[Images_SP_URL]bnr/btn_twitter.gif' width='100' alt='CHINEMA SUNSHINE ｔwitter'></a></p>";
			}
			if(!$facebook[$arr["ename"]] && !$twitter[$arr["ename"]]){
			    echo "<div style='margin:0 0 20px;'></div>";
			}
			$social .= "</div>";
		}
	}


	if($arr["ename"] != "top" || preg_match("!news/detail!",$Url)){
		$home = "<p class='return_home'><a href='$define[GROBAL_SP_TOP_URL]'><img src='$define[Images_SP_URL]common/btn_home.gif' width='300' alt='HOME'></a></p>";
	}



echo <<<EOL
	<!-- footer -->
	{$social}



	<!-- ↓adsense下部↓ -->
	<div class="g_Ad_sp_content ptb10">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- シネサン（SP共通下部） -->
		<ins class="adsbygoogle"
		style="display:inline-block;width:320px;height:50px"
		data-ad-client="ca-pub-3891476404601512"
		data-ad-slot="6360860168"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!-- ↑adsense下部↑ -->



	<div class="section">
		{$home}
		<p class="change_pc"><a href="{$define['GROBAL_TOP_URL']}"><img src="{$define['Images_SP_URL']}common/btn_pc.gif" width="160" alt="切り替えPC"></a></p>
	</div>
	<p class="pagetop"><a href="#header" ><img src="{$define['Images_SP_URL']}common/btn_top.gif" alt="ページTOP" width="79" height="20"></a></p>

	<div id="footer">
		<div id="footerMain">
			<ul>
				<li><a href="{$define['Company_SP_URL']}">会社概要</a></li>
				<li>|</li>
				<li><a href="{$define['SiteMap_SP_URL']}">サイトマップ</a></li>
				<li>|</li>
				<li><a href="{$define['Low_SP_URL']}">特定商取引法に基づく表記</a></li>
			</ul>
			<ul>
				<li><a href="{$define['Policy_SP_URL']}">利用規約</a></li>
				<li>|</li>
				<li><a href="{$define['Privacy_SP_URL']}">プライバシーポリシー</a></li>
				<li>|</li>
				<li><a href="{$define['QA_URL']}">よくあるご質問</a></li>
			</ul>
		</div>
	</div>
	<div id="footer_copyright"><img src="{$define['Images_SP_URL']}common/copyright.gif" alt="Copyright (Co) 2001-2010, Cinema Sunshine Co., Ltd. All Right Reserved." width="320"></div>
	<!-- /footer -->

	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

		$(function(){
		});
	</script>
EOL;

getSmartFooterTag($arr);

}

function getSmartTrailer() {
	$arr = getNowPage();
	$theaterName = $arr['ename'];
	$theaterId = getTheaterId($theaterName);
	$theaterId = $theaterId['id'];
	if (!$theaterId) {
		$theaterId = 1000;
	}

	if ($arr["ename"] == 'showing') $theaterName = 'top';
	$theaterMediaNetwork = array(
		'1000'=> '1478747373365-0', //TOP
		'1'=> '1463114321049-0', //池袋
		'2'=> '1463114425475-0', //平和島
		'6'=> '1463114610118-0', //沼津
		'7'=> '1463115631220-0', //北島
		'8'=> '1463115092247-0', //衣山
		'9'=> '1463115013734-0', //大街道
		'11'=> '1463115510743-0', //大洲
		'12'=> '1463115219252-0', //重信
		'13'=> '1463114519699-0', //土浦
		'14'=> '1463114716128-0', //かほく
		'15'=> '1463115336241-0', //MASAKI
		'16'=> '1463114817432-0', //大和郡山
		'17'=> '1463114915106-0', //下関
        '18'=> '1487136633128-0', // 姶良
	);


	$html = <<<EOL
	<div class="section ptb10" style="width: 250px;">
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
		googletag.defineSlot('/22524478/sunshine_{$theaterName}_sp', [250, 250], 'div-gpt-ad-{$theaterMediaNetwork[$theaterId]}').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.pubads().collapseEmptyDivs();
		googletag.enableServices();
	});
	</script>

	<!-- /22524478/sunshine_{$theaterName}_sp -->
	<div id='div-gpt-ad-{$theaterMediaNetwork[$theaterId]}' style='height:250px; width:250px;'>
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-{$theaterMediaNetwork[$theaterId]}'); });
	</script>
	</div>
	</div>
EOL;

	return $html;
}

function getSmartFooterTag($arr) {
	//土浦、大和郡山、衣山　TOPのみのタグ
	if($arr["ename"] == "tsuchiura" || $arr["ename"] == "kinuyama" || $arr["ename"] == "yamatokoriyama"){
		if($arr["ename2"] == "schedule"){

echo <<<EOL

<!--CB-CV計測タグ-->

<!-- Google Code for IMAX Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 993895592;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "0O_4CJXb82QQqMn22QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/993895592/?label=0O_4CJXb82QQqMn22QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!--/CB-CV計測タグ-->

<!--gaie-Google-リマーケティングタグ-->

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 927515068;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/927515068/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!--/gaie-Google-リマーケティングタグ-->


<!--gaie-YDN-リマーケティングタグ-->

<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = 'HRDFLUEGVL';
var yahoo_retargeting_label = '';
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>

<!--/gaie-YDN-リマーケティングタグ-->



EOL;


		}
	}

	//土浦、大和郡山、平和島、沼津　TOPのみのタグ(2016/07/01)
	if(($arr["ename"] == "tsuchiura"
	|| $arr["ename"] == "yamatokoriyama"
	|| $arr["ename"] == "heiwajima"
	|| $arr["ename"] == "numazu")
	&& $arr["ename2"] == "schedule"
	){
echo <<<EOL
	<!-- リマーケティング タグの Google コード -->
	<!--
	リマーケティング タグは、個人を特定できる情報と関連付けることも、デリケートなカテゴリに属するページに設置することも許可されません。タグの設定方法については、こちらのページをご覧ください。
	http://google.com/ads/remarketingsetup
	-->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 881288241;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/881288241/?value=0&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
EOL;
	}

	//土浦、大和郡山、平和島、沼津、衣山、MASAKI　TOPのみのタグ(2016/11/17)
	if(($arr["ename"] == "tsuchiura"
	|| $arr["ename"] == "yamatokoriyama"
	|| $arr["ename"] == "heiwajima"
	|| $arr["ename"] == "numazu"
	|| $arr["ename"] == "kinuyama"
	|| $arr["ename"] == "masaki")
	&& $arr["ename2"] == "schedule"
	){
echo <<<EOL
	<!-- サンライズ社CVタグ 161119 -->
	<!-- Google Code for CV Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 869306713;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "cH6ICJLG8GsQ2aLCngM";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/869306713/?label=cH6ICJLG8GsQ2aLCngM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
	<!-- /サンライズ社CVタグ 161119 -->
EOL;
	}

}

function paging($limit, $page, $disp=5){
	$define = get_defined_constants() ;

	//$dispはページ番号の表示数
	$next = $page+1;
	$prev = $page-1;

	//ページ番号リンク用
	$start =  ($page-floor($disp/2)> 0) ? ($page-floor($disp/2)) : 1;//始点
	$end =  ($start> 1) ? ($page+floor($disp/2)) : $disp;//終点
	$start = ($limit <$end)? $start-($end-$limit):$start;//始点再計算

	print '<div class="news_return">';
	if($page != 1 ) {
		print '<a href="./detail.php?p='.$prev.'"><img src="'. $define['Images_SP_URL'] .'common/btn_news_return.gif" width="64" alt="前へ"></a>';
	}else{
		print '<img src="'. $define['Images_SP_URL'] .'common/btn_news_return.gif" width="64" alt="前へ">';
	}
	print '</div>';

	print '<ul class="news_list">';

for($i=$start; $i <= $end ; $i++){//ページリンク表示ループ
	$class = ($page == $i) ? ' class="current"':"";//現在地を表すCSSクラス
	if($i <= $limit && $i> 0 )//1以上最大ページ数以下の場合
		if($i != $_GET["p"]){
			if($i != 1){
				$html .= '<li>|</li>';
			}
			$html .= '<li><a href="?p='.$i.'"'.$class.'>'.$i.'</a></li>';//ページ番号リンク表示
		}else{
			if($i != 1){
				$html .= '<li>|</li>';
			}
			$html .= '<li>'.$i.'</li>';//ページ番号リンク表示
		}
	}

	$html =  preg_replace("!^<li>\|</li>!","",$html);
	echo $html;

	print '</ul>';

	print '<div class="news_next">';
	if($page <$limit){
		print '<a href="./detail.php?p='.$next.'"><img src="'. $define['Images_SP_URL'] .'common/btn_news_next.gif" width="64" alt="次へ"></a>';
	}else{
		print '<img src="'. $define['Images_SP_URL'] .'common/btn_news_next.gif" width="64" alt="次へ">';
	}
	print '</div>';

/*確認用
print "<p>current:".$page."<br>";
print "next:".$next."<br>";
print "prev:".$prev."<br>";
print "limit:".$limit."<br>";
print "start:".$start."<br>";
print "end:".$end."</p>";*/
}

?>

<?php

$define = get_defined_constants() ;

//現在のUrlの取得
$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$redirect = $define["GROBAL_TOP_URL"] . "sp" .  $_SERVER["REQUEST_URI"];

//echo $_SERVER["REQUEST_URI"];
//exit();

//閉館のリダイレクト処理
if(preg_match("!http://www.cinemasunshine.co.jp/theater/imabari/!", $Url)){
	header("Location: http://www.cinemasunshine.co.jp/theater/imabari/thanks/");
}

//1段目でiphoneとipodとandroidならtrue
//2段目でリファラーがなしか外部サイトならtrue
//3段目でURIが"sp"以外ならtrue
//4段目でURIの個別ページを設定
if(preg_match("/iPhone/", $_SERVER['HTTP_USER_AGENT']) ||
   preg_match("/iPod/", $_SERVER['HTTP_USER_AGENT']) ||
   preg_match("/Android/", $_SERVER['HTTP_USER_AGENT'])){
		if(!strpos($_SERVER['HTTP_REFERER'],$_SERVER[HTTP_HOST])){
			if(!preg_match("!/sp/!", $_SERVER["REQUEST_URI"]) &&
			   !preg_match("!/m/!", $_SERVER["REQUEST_URI"])){
			   if(!preg_match("!/members_card/!", $_SERVER["REQUEST_URI"]) &&
			      !preg_match("!/question/!", $_SERVER["REQUEST_URI"]) &&
			      !preg_match("!/imax/!", $_SERVER["REQUEST_URI"]) &&
			      !preg_match("!/imm/!", $_SERVER["REQUEST_URI"]) &&
			      !preg_match("!/4dx/!", $_SERVER["REQUEST_URI"]) &&
			      !preg_match("!/ast/!", $_SERVER["REQUEST_URI"]) &&
			      !preg_match("!/special_ticket/!", $_SERVER["REQUEST_URI"])){
					header("Location: $redirect");
				}
			}

		}
}

if(!preg_match('!/m/!', $Url)){
	// モバイルページへジャンプ
	$agent = $_SERVER['HTTP_USER_AGENT'];

	if (preg_match('/^J-PHONE/', $agent) or
	    preg_match('/^Vodafone/', $agent) or
	    preg_match('/^SoftBank/', $agent) or
	    preg_match('/^MOT-/', $agent) or
	    preg_match('/^DoCoMo/', $agent) or
	    preg_match('/UP.Browser/', $agent) or
	    preg_match('/^KDDI/', $agent)) {

		// モバイルページへジャンプ
	    header("Location: $define[GROBAL_M_TOP_URL]");
		exit;
	}

}
//現在のページがどこか判別
function getNowPage(){
	$define = get_defined_constants() ;

	//現在のUrlの取得
	$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

	//各フォルダの検索正規表現と文言を配列化
	//top_flag:TOPのスライダーを表示させるか。0:なし,1:あり
	//side_flag:サイドメニューに表示するものの制御 0:なし,1:ランキング,2:劇場一覧
	$path = array(
		"company" =>
			array(
				"pattern" => "!/company/!",
				"name" => "会社概要",
				"ename" => "company",
				"top_flag" => "0",
				"side_flag" => 2
			),
		"sitemap" =>
			array(
				"pattern" => "!/sitemap/!",
				"name" => "サイトマップ",
				"ename" => "sitemap",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"law" =>
			array(
				"pattern" => "!/law/!",
				"name" => "特定商取引に基づく表示",
				"ename" => "law",
				"top_flag" => "0",
				"side_flag" => 2
			),
		"sitepolicy" =>
			array(
				"pattern" => "!/sitepolicy/!",
				"name" => "利用規約",
				"ename" => "sitepolicy",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"privacy" =>
			array(
				"pattern" => "!/privacy/!",
				"name" => "プライバシーポリシー",
				"ename" => "privacy",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"showing" =>
			array(
				"pattern" => "!/showing/!",
				"name" => "上映中作品",
				"ename" => "showing",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"next_showing" =>
			array(
				"pattern" => "!/next_showing/!",
				"name" => "上映予定作品",
				"ename" => "next_showing",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"question" =>
			array(
				"pattern" => "!/question/!",
				"name" => "よくあるご質問",
				"ename" => "question",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"theater" =>
			array(
				"pattern" => "!/theater/!",
				"name" => "劇場一覧",
				"ename" => "theater",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"members_card" =>
			array(
				"pattern" => "!/members_card/!",
				"name" => "メンバーズカードのご案内",
				"ename" => "members_card",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"special_ticket" =>
			array(
				"pattern" => "!/special_ticket/!",
				"name" => "シネマサンシャイン特別鑑賞券",
				"ename" => "special_ticket",
				"top_flag" => "0",
				"side_flag" => 2
				),

		"result" =>
			array(
				"pattern" => "!result.php!",
				"name" => "検索結果",
				"ename" => "result",
				"top_flag" => "0",
				"side_flag" => 2
				),
		"top" =>
			array(
				"pattern" => "/.*/",
				"name" => "TOP",
				"ename" => "top",
				"top_flag" => "1",
				"side_flag" => 1
				)
	);

	//劇場名の検索正規表現と文言を配列化
	$TheaterList = getTheaterList();
	foreach($TheaterList  as $key => $val){
		$theaterPath[$val["ename"]] =
		array(
			"pattern" => "!/" . $val["ename"] . "/!",
			"name" => $val["name"],
			"ename" => $val["ename"],
			"top_flag" => "1",
			"side_flag" => 0
		);
	}

	//劇場詳細の検索正規表現と文言を配列化
	$detailPath = array(
		"news" =>
			array(
				"pattern" => "!/news/!",
				"name" => "ニュース&トピックス",
				"ename" => "news"
				),
		"advance_ticket" =>
			array(
				"pattern" => "!/advance_ticket/!",
				"name" => "前売情報",
				"ename" => "advance_ticket"
				),
		"admission" =>
			array(
				"pattern" => "!/admission/!",
				"name" => "料金案内",
				"ename" => "admission"
				),
		"concession" =>
			array(
				"pattern" => "!/concession/!",
				"name" => "コンセッション",
				"ename" => "concession"
				),
		"floor_guide" =>
			array(
				"pattern" => "!/floor_guide/!",
				"name" => "劇場設備",
				"ename" => "floor_guide"
				),
		"access" =>
			array(
				"pattern" => "!/access/!",
				"name" => "アクセス",
				"ename" => "access"
				),
		"schedule" =>
			array(
				"pattern" => "/.*/",
				"name" => "劇場TOP",
				"ename" => "schedule"
				)
	);

	//ページ名を戻す
	foreach ($path as $key => $val){
		//URLが劇場だった場合はさらなる判定
		if(preg_match($val["pattern"],$Url) && $key == "theater"){
			foreach ($theaterPath as $key2 => $val2){
				//劇場名を取得
				if(preg_match($val2["pattern"],$Url)){
					//劇場の何のページか判別
					foreach ($detailPath as $key3 => $val3){
						if(preg_match($val3["pattern"],$Url)){
							$val2["pattern2"] = $val3["pattern"];
							$val2["name2"] = $val3["name"];
							$val2["ename2"] = $val3["ename"];
							return $val2;
						}
					}
				}
			}
			return $val;
		}elseif(preg_match($val["pattern"],$Url)){
			return $val;
		}
	}
}

//meta情報生成
function getMeta($arr){
	if($arr["ename"] == "top"){
		$meta["title"] = "シネマサンシャイン";
		$meta["description"] = "池袋、平和島、茨城、千葉、徳島、愛媛、鹿児島で映画を見るならシネマサンシャイン";
		$meta["keyword"] = "シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間";
	//共通のmeta情報
	}elseif(!$arr["ename2"]){
		$meta["title"] = "$arr[name]&nbsp;|&nbsp;シネマサンシャイン";
		$meta["description"] = "池袋、平和島、茨城、千葉、徳島、愛媛、鹿児島で映画を見るならシネマサンシャイン";
		$meta["keyword"] = "$arr[name],シネマサンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間";
	//各下層のmeta情報
	}elseif($arr["ename2"]){
		if($arr["ename2"] == "schedule"){
			$meta["title"] = "上映スケジュール&nbsp;|&nbsp;シネマサンシャイン$arr[name]";
		}else{
			$meta["title"] = "$arr[name2]&nbsp;|&nbsp;シネマサンシャイン$arr[name]";
		}
		$meta["description"] = "$arr[name]で映画を見るならシネマサンシャイン｜$arr[name2]";
		$meta["keyword"] = "$arr[name],$arr[name2],シネマサンシャイン,サンシャイン,映画,シネマ,映画検索,映画館,上映,シネコン,上映時間";
	}

	return $meta;
}

//headの中身
function getHeadInclude(){
$define = get_defined_constants() ;

$arr = getNowPage();
/*if($arr['name'] == "TOP" || ($arr['ename'] != 'ikebukuro' && $arr['ename'] != 'okaido' && ($arr['ename2'] == "schedule" || $arr['ename2'] == "news" || $arr['ename2'] == "admission" || $arr['ename2'] == "advance_ticket" || $arr['ename2'] == "concession" || $arr['ename2'] == "floor_guide" || $arr['ename2'] == "access"))){
	$jack= "<link type=\"text/css\" rel=\"stylesheet\" href=\"{$define['Css_URL']}base_jack.css\" />";
	$jack .= "<script type=\"text/javascript\" src=\"{$define['SCRIPT_URL']}pagejack.js\"></script>";
}*/
$jack= "<script type=\"text/javascript\" src=\"{$define['SCRIPT_URL']}pagejack.js\"></script>";

//meta情報取得
$meta = getMeta($arr);

echo <<<EOL
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="{$meta["description"]}">
	<meta name="keywords" content="{$meta["keyword"]}">
	<title>{$meta["title"]}</title>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery.accordion.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}rollover.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery.fancybox.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery.easing.1.3.min.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}jquery.sliderkit.1.9.2.pack.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}sliderkit.counter.1.0.pack.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}sliderkit.timer.1.0.pack.js"></script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}sliderkit.imagefx.1.0.pack.js"></script>
	<script language="javascript">AC_FL_RunContent = 0;</script>
	<script type="text/javascript" src="{$define['SCRIPT_URL']}AC_RunActiveContent4cache.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="{$define['SCRIPT_URL']}DD_belatedPNG.js"></script>
		<script>
			DD_belatedPNG.fix('img, .png_bg');
		</script>
	<![endif]-->

	<link type="text/css" rel="stylesheet" href="{$define['Css_URL']}reset.css" />
	<link type="text/css" rel="stylesheet" href="{$define['Css_URL']}base.css" />

	<link type="text/css" rel="stylesheet" href="{$define['Css_URL']}jquery.fancybox.css" />
	<link rel="stylesheet" type="text/css" href="{$define['Css_URL']}sliderkit-core.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="{$define['Css_URL']}sliderkit-demos.css" media="screen, projection" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="{$define['Css_URL']}sliderkit-demos-ie6.css" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="{$define['Css_URL']}sliderkit-demos-ie7.css" /><![endif]-->
	<!--[if IE 8]><link rel="stylesheet" type="text/css" href="{$define['Css_URL']}sliderkit-demos-ie8.css" /><![endif]-->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-8383230-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	<script type="text/javascript">
		$(window).load(function(){ //$(window).load() must be used instead of $(document).ready() because of Webkit compatibility

			// Photo gallery > Vertical
			$(".photosgallery-vertical").sliderkit({
				circular:true,
				mousewheel:false,
				shownavitems:5,
				verticalnav:true,
				navclipcenter:true,
				auto:true
			});


		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
		    $('.fancybox').fancybox();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('#footerWrap .closebtn img').click(function () {
				$('#footerFixed').css({ display:"none"});
				$('#footer').css({ margin:0});
			});
		});
	</script>
EOL;

	getHeadTag($arr);
}

function getHeadTag($arr) {

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
function getHeader(){
	$define = get_defined_constants() ;

	//共通のページか各劇場の下層か判別
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

	//スマホだったら戻れるリンクボタンを追加
	if(preg_match("/iPhone/", $_SERVER['HTTP_USER_AGENT']) ||
	   preg_match("/iPod/", $_SERVER['HTTP_USER_AGENT']) ||
	   preg_match("/Android/", $_SERVER['HTTP_USER_AGENT'])){
			$smart = "<p><a href='$define[GROBAL_SP_TOP_URL]'><img src='$define[Images_URL]common/btn_spLink.gif'  alt='SPサイトへ' ></a></p>";
	}


	if($arr["pattern2"]){
		//どのページが選択されているか判別
		foreach($SelectPage as $key => $val){
			if($val == $arr["ename2"]){
				$select[$val] = "_on";
			}else{
				$select[$val] = "_off";
			}
		}

		$html = "";
		$html .= "<div class='bottomArea'>";
		$html .= "<div class='bottomWrap'>";
		$html .= "<ul>";
		$html .= "<li><h2><img src='$define[Images_URL]common/list_$arr[ename].gif' alt='$arr[name]' ></h2></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/'><img src='$define[Images_URL]common/list_headBtn01$select[schedule].gif'  alt='上映スケジュールチケット購入' ></a></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/news/'><img src='$define[Images_URL]common/list_headBtn02$select[news].gif'  alt='ニュース' ></a></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/admission/'><img src='$define[Images_URL]common/list_headBtn03$select[admission].gif'  alt='料金案内' ></a></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/advance_ticket/'><img src='$define[Images_URL]common/list_headBtn04$select[advance_ticket].gif'  alt='前売情報' ></a></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/concession/'><img src='$define[Images_URL]common/list_headBtn05$select[concession].gif'  alt='コンセッション' ></a></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/floor_guide/'><img src='$define[Images_URL]common/list_headBtn06$select[floor_guide].gif'  alt='劇場設備サービス' ></a></li>";
		$html .= "<li><a href='$define[Theater_URL]$arr[ename]/access/'><img src='$define[Images_URL]common/list_headBtn07$select[access].gif'  alt='アクセス' ></a></li>";
		$html .= "</ul>";
		$html .= "</div>";
		$html .= "</div>";
	}else{
		$html = "";
	}

echo <<<EOL
	<a id="pagrTop" name="pageTop"></a>
	<!-- #header start -->
	<div id="header">
		<div class="topArea">
			<div class="topWrap clearfix">
				<div class="left">
					<h1><a href="{$define['GROBAL_TOP_URL']}"><img src="{$define['Images_URL']}common/logo_img01.gif"  alt="シネマサンシャイン$arr[name]" ></a></h1>
					{$smart}
				</div>

				<div class="right">
					<ul>
						<li><a href="{$define['Theater_URL']}"><img src="{$define['Images_URL']}common/btn_headLis01_off.gif"  alt="劇場一覧" ></a></li>
						<li><a href="{$define['Showing_URL']}"><img src="{$define['Images_URL']}common/btn_headLis02_off.gif"  alt="上映中作品" ></a></li>
						<li><a href="{$define['Next_Showing_URL']}"><img src="{$define['Images_URL']}common/btn_headLis03_off.gif"  alt="上映予定作品" ></a></li>
						<li><a href="{$define['QA_URL']}"><img src="{$define['Images_URL']}common/btn_headLis04_off.gif"  alt="よくあるご質問" ></a></li>
					</ul>
				</div>
			</div>
		</div>
		{$html}
	</div>
	<!-- #header end -->
EOL;
}

function getSlideBnr(){
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
	}elseif($theaterId != 1000 && ($arr["ename2"] == "admission" || $arr["ename2"] == "advance_ticket" || $arr["ename2"] == "concession" || $arr["ename2"] == "floor_guide" || $arr["ename2"] == "access")){
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

			$topBnrHtml .= "<li><a href='#' rel='nofollow' title=''><img src='/theaters_image/topslider/$val[pic_path]' width='106' heigh='44' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "' /></a></li>";
			if($val["url"]){
				$bottomBnrHtml .= "<div class='sliderkit-panel'><a href='$val[url]' $target><img src='/theaters_image/topslider/$val[pic_path]' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "' /></a></div>";
			}else{
				$bottomBnrHtml .= "<div class='sliderkit-panel'><img src='/theaters_image/topslider/theaters_image/topimage/$val[pic_path]' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "' /></div>";
			}
		}


		$html = '';
		$html .= '<div id="topColumn">';
		$html .= '<div class="sliderkit photosgallery-vertical">';
		$html .= '<div class="sliderkit-nav">';
		$html .= '<div class="sliderkit-nav-clip">';
		$html .= '<ul>';

		$html .= $topBnrHtml;

		$html .= '</ul>';
		$html .= '</div>';
		$html .= '<div class="btn-line-top"><img src="/images/common/slide-line.gif"></div>';
		$html .= '<div class="btn-line-bottom"><img src="/images/common/slide-line.gif"></div>';
		$html .= '<div class="sliderkit-btn sliderkit-go-btn sliderkit-go-prev"><a rel="nofollow" href="#" title="Previous photo"><span></span></a></div>';
		$html .= '<div class="sliderkit-btn sliderkit-go-btn sliderkit-go-next"><a rel="nofollow" href="#" title="Next photo"><span></span></a></div>';
		$html .= '</div>';
		$html .= '<div class="sliderkit-panels">';

		$html .= $bottomBnrHtml;

		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';

		//表示する内容がなかったら$htmlの中を削除
		if(!$topBnrHtml){
			$html = "";
		}
	}

	echo $html;
}

function getPankuzu(){
$define = get_defined_constants() ;

$arr = getNowPage();
//TOPのパンくず
if($arr["ename"] == "top"){
	$html = "";
//共通のパンくず
}elseif(!$arr["ename2"]){
	$html = '';
	$html .= "<ul>";
	$html .= "<li><a href='$define[GROBAL_TOP_URL]'>ホーム</a>&nbsp;&gt;&nbsp;</li>";
	$html .= "<li>$arr[name]</li>";
	$html .= "</ul>";
//各下層のパンくず
}elseif($arr["ename2"]){
	if($arr["ename2"] == "schedule"){
		$html = "";
		$html .= "<ul>";
		$html .= "<li><a href='$define[GROBAL_TOP_URL]'>ホーム</a>&nbsp;&gt;&nbsp;</li>";
		$html .= "<li>$arr[name]</li>";
		$html .= "</ul>";
	}else{
		$html = '';
		$html .= "<ul>";
		$html .= "<li><a href='$define[GROBAL_TOP_URL]'>ホーム</a>&nbsp;&gt;&nbsp;</li>";
		$html .= "<li><a href='$define[GROBAL_TOP_URL]theater/$arr[ename]/'>$arr[name]</a>&nbsp;&gt;&nbsp;</li>";
		$html .= "<li>$arr[name2]</li>";
		$html .= "</ul>";
	}
}

echo <<<EOL
	<div id="PankuzuArea">
		{$html}
	</div>
EOL;
}

function getRightMenu(){
$define = get_defined_constants() ;

//ランキングのIDを取得
$RankID = getRanking();

//現在のUrlの取得
$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$arr = getNowPage();

//ループ回数の格納
$loop = -1;

//ランキングまたは劇場リスト用のhtmlの生成
//劇場ページには何も出力しない
if($arr["side_flag"] == 0){
	$html = "" ;
//劇場リスト
}elseif($arr["side_flag"] == 1){
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

	$html = "";
	$html .= "<div class='rankArea'>";
	$html .= "<h3 class='headlineImg'><img src='$define[Images_URL]common/headline_Rank.png'  alt='ランキング' ></h3>";
	$html .= "<div class='between'><p>" . $start_date . "(" . $start_week . ")" . "～" . $end_date . "(" . $end_week . ")" . "</p></div>";

	foreach($RankID as $key => $val){
		unset($MovieSet);
		if($loop < 1){
			$loop++;
			continue;
		}
		$MovieSet = getMovieById($val);
		//作品名と画像がない場合は作品マスタから削除されたと判定する。
		if(!$MovieSet["picture"] && !$MovieSet[name]){
					continue;
		}
		$html .= "<!-- Rnanking -->";
		$html .= "<div class='rank clearfix'>";
		$html .= "<div class='num'><p><img src='$define[Images_URL]common/fig_rank0$loop.png'  alt='$loop位' ></p></div>";
		if($MovieSet["picture"]){
			$html .= "<div class='photo'><p><img src='$define[GROBAL_TOP_URL]theaters_image/movie/$MovieSet[picture]' width='68' alt='" . htmlspecialchars($MovieSet["name"], ENT_QUOTES) . "' ></p></div>";
		}else{
			$html .= "<div class='photo'><p><img src='$define[Images_URL]common/image_none.gif' width='68' alt='NoImage' ></p></div>";
		}
		$html .= "<div class='txt'><p>$MovieSet[name]</p></div>";
		$html .= "</div>";
		$html .= "<!-- Rnanking -->";

		$loop++;
	}
	$html .= "</div>";

}elseif($arr["side_flag"] == 2){
	$html = "";
	$html .= "<div class='theaterListArea'>";
	$html .= "<div class='theaterLink'>";
	$html .= "<div class='Box clearfix'>";
	$html .= "<div class='kind'><p><img src='$define[Images_URL]common/theater_kanto.gif' alt='関東'></p></div>";
	$html .= "<ul>";
	$html .= "<li><a href='$define[Theater_URL]ikebukuro/'>池袋</a></li>";
	$html .= "<li><a href='$define[Theater_URL]heiwajima/'>平和島</a></li>";
	$html .= "<li><a href='$define[Theater_URL]tsuchiura/'>土浦</a></li>";
	$html .= "</ul>";
	$html .= "</div>";
	$html .= "<div class='Box clearfix'>";
	$html .= "<div class='kind'><p><img src='$define[Images_URL]common/theater_chubu.gif' alt='北部・中部'></p></div>";
	$html .= "<ul>";
	$html .= "<li><a href='$define[Theater_URL]kahoku/'>かほく</a></li>";
	$html .= "<li><a href='$define[Theater_URL]numazu/'>沼津</a></li>";
	$html .= "</ul>";
	$html .= "</div>";
	$html .= "<div class='Box clearfix'>";
	$html .= "<div class='kind'><p><img src='$define[Images_URL]common/theater_kansai.gif' alt='関西'></p></div>";
	$html .= "<ul>";
	$html .= "<li><a href='$define[Theater_URL]yamatokoriyama/'>大和郡山</a></li>";
	$html .= "</ul>";
	$html .= "</div>";
	$html .= "<div class='Box clearfix'>";
	$html .= "<div class='kind'><p><img src='$define[Images_URL]common/theater_chugoku_shikoku.gif' alt='中国・四国'></p></div>";
	$html .= "<ul>";
	$html .= "<li><a href='$define[Theater_URL]shimonoseki/'>下関</a></li>";
	$html .= "<li><a href='$define[Theater_URL]okaido/'>大街道</a></li>";
	$html .= "<li><a href='$define[Theater_URL]kinuyama/'>衣山</a></li>";
	$html .= "<li><a href='$define[Theater_URL]shigenobu/'>重信</a></li>";
	$html .= "<li><a href='$define[Theater_URL]masaki/'>エミフルMASAKI</a></li>";
	$html .= "<li><a href='$define[Theater_URL]ozu/'>大洲</a></li>";
	$html .= "<li><a href='$define[Theater_URL]kitajima/'>北島</a></li>";
	$html .= "</ul>";
	$html .= "</div>";
    $html .= "<div class='Box clearfix'>";
	$html .= "<div class='kind'><p><img src='$define[Images_URL]common/theater_kyushu.gif' alt='九州'></p></div>";
	$html .= "<ul>";
	$html .= "<li><a href='$define[Theater_URL]aira/'>姶良</a></li>";
	$html .= "</ul>";
	$html .= "</div>";
	$html .= "</div>";
	$html .= "</div>";
}

//劇場IDの取得
$theaterId=getTheaterId($arr["ename"]);
//echo $theaterId;
$theaterId = $theaterId['id'];
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
		$campaign .= "<li><img src='$define[GROBAL_TOP_URL]theaters_image/campaign/$val[pic_path]' width='258' alt='" . htmlspecialchars($val["midasi"], ENT_QUOTES) . "' ></li>";
	}else{
		$campaign .= "<li><a href='$val[url]' $blank><img src='$define[GROBAL_TOP_URL]theaters_image/campaign/$val[pic_path]' width='258' alt='" . htmlspecialchars($val["midasi"], ENT_QUOTES) . "' ></a></li>";
	}
}

$trailerHtml = getTrailer();

echo <<<EOL
	<div class="rightColumn">
		<div class="trailArea">
			<h3 class="headlineImg"><img src="{$define['Images_URL']}common/headline_Trail.png"  alt="おすすめ予告編" ></h3>
			<p>
				{$trailerHtml}
			</p>
		</div>

		{$html}


		<!-- ↓adsense↓ -->
		<div class="infoadArea">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-3891476404601512";
			/* シネサン（サイド共通） */
			google_ad_slot = "9361685766";
			google_ad_width = 250;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="//pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
		<!-- ↑adsense↑ -->


		<div class="infoArea">
			<h3 class="headlineImg"><img src="$define[Images_URL]common/headline_Info.png"  alt="インフォメーション" ></h3>
			<ul>
				{$campaign}
			</ul>
		</div>
	</div>
EOL;
}

function getTrailer() {
	$define = get_defined_constants();
	$arr = getNowPage();
	$theaterName = $arr['ename'];
	$theaterId = getTheaterId($theaterName);
	$theaterId = $theaterId['id'];
	if (!$theaterId) {
		$theaterId = 1000;
	}
	//TOP,上映中作品,各劇場TOP
	if ($arr["ename"] == 'top'
	|| $arr["ename"] == 'showing'
	|| $arr["ename2"] == 'schedule') {
		if ($arr["ename"] == 'showing') $theaterName = 'top';
		$theaterMediaNetwork = array(
			'1000'=> '1478747112860-0', //TOP
			'1'=> '1463112742866-0', //池袋
			'2'=> '1463112890125-0', //平和島
			'6'=> '1463113099521-0', //沼津
			'7'=> '1463113963815-0', //北島
			'8'=> '1463113611480-0', //衣山
			'9'=> '1463113527808-0', //大街道
			'11'=> '1463113874944-0', //大洲
			'12'=> '1463113696177-0', //重信
			'13'=> '1463112998403-0', //土浦
			'14'=> '1463113229613-0', //かほく
			'15'=> '1463113779226-0', //MASAKI
			'16'=> '1463113342732-0', //大和郡山
			'17'=> '1463113431009-0', //下関
            '18'=> '1487136769798-0', // 姶良
		);
		$html = <<<EOL
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
			googletag.defineSlot('/22524478/sunshine_{$theaterName}_pc', [250, 250], 'div-gpt-ad-{$theaterMediaNetwork[$theaterId]}').addService(googletag.pubads());
			googletag.pubads().enableSingleRequest();
			googletag.enableServices();
		});
		</script>

		<!-- /22524478/sunshine_{$theaterName}_pc -->
		<div id='div-gpt-ad-{$theaterMediaNetwork[$theaterId]}' style='height:250px; width:250px;'>
		<script type='text/javascript'>
		googletag.cmd.push(function() { googletag.display('div-gpt-ad-{$theaterMediaNetwork[$theaterId]}'); });
		</script>
		</div>
EOL;
	} else {
		$trailerList = getTrailerList($theaterId);

        // ランダムに１つを抽出
        $randKey = array_rand($trailerList);
        $trailer = $trailerList[$randKey];

        $width = 256;
        $height = 166;
        $flv =  FLV_PATH . '/' . $trailer['trailer_path'];
        $swfParams = array(
            'flv'             => $flv,
            'width'           => $width,
            'height'          => $height,
            'loop'            => '1',
            'autoplay'        => '1',
            'autoload'        => '1',
            'volume'          => 0,
            'margin'          => 0,
            'showvolume'      => '1',
            'showplayer'      => 'always',
            'playercolor'     => 'eaeaea',
            'loadingcolor'    => '888888',
            'buttoncolor'     => '868686',
            'buttonovercolor' => '888888',
            'slidercolor1'    => '868686',
            'slidercolor2'    => '868686',
            'sliderovercolor' => '868686',
        );
        $flashVars = http_build_query($swfParams, '', '&amp;');
        $bunnerPath = flvimage_picture . '/'. $trailer['pic_path'];
        $bunnerUrl = $trailer['url'];

        /**
         * @link http://flv-player.net/players/maxi/
         */
		$html = <<<EOL
		<object type="application/x-shockwave-flash" data="/player_flv_maxi.swf" width="$width" height="$height">
            <param name="movie" value="/player_flv_maxi.swf" />
            <param name="allowFullScreen" value="true" />
            <param name="FlashVars" value="$flashVars" />
        </object>

        <a href="$bunnerUrl" target="_blank"><img src="$bunnerPath" width="$width" /><a/>
EOL;
	}



	return $html;
}

function getMap(){
$define = get_defined_constants() ;

//現在のUrlの取得
$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

if(preg_match("!/ikebukuro/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B1-14-3&amp;aq=&amp;sll=34.728949,138.455511&amp;sspn=54.857824,135.263672&amp;brcurrent=3,0x60188d66480772ff:0x4136f3704e611443,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%94%E2%88%92%EF%BC%93&amp;t=m&amp;ll=35.729975,139.714787&amp;spn=0.004355,0.006427&amp;z=17&amp;output=embed&amp;iwloc=B"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B1-14-3&amp;aq=&amp;sll=34.728949,138.455511&amp;sspn=54.857824,135.263672&amp;brcurrent=3,0x60188d66480772ff:0x4136f3704e611443,0&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%9D%B1%E4%BA%AC%E9%83%BD%E8%B1%8A%E5%B3%B6%E5%8C%BA%E6%9D%B1%E6%B1%A0%E8%A2%8B%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%94%E2%88%92%EF%BC%93&amp;t=m&amp;ll=35.729975,139.714787&amp;spn=0.004355,0.006427&amp;z=17" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/heiwajima/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;aq=&amp;sll=35.584427,139.740709&amp;sspn=0.108473,0.264187&amp;brcurrent=3,0x601861b96b1c3e97:0x26613e72332c4a46,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;hnear=&amp;t=m&amp;ll=35.585136,139.740644&amp;spn=0.008725,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;aq=&amp;sll=35.584427,139.740709&amp;sspn=0.108473,0.264187&amp;brcurrent=3,0x601861b96b1c3e97:0x26613e72332c4a46,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%B9%B3%E5%92%8C%E5%B3%B6&amp;hnear=&amp;t=m&amp;ll=35.585136,139.740644&amp;spn=0.008725,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/tsuchiura/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E5%9C%9F%E6%B5%A6&amp;sll=35.584778,139.741083&amp;sspn=0.00678,0.016512&amp;brcurrent=3,0x60220d504c46f8dd:0x6c55af970e3ae7f4,0&amp;ie=UTF8&amp;hq=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;t=m&amp;ll=36.081292,140.181084&amp;spn=0.017342,0.025706&amp;z=15&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E5%9C%9F%E6%B5%A6&amp;sll=35.584778,139.741083&amp;sspn=0.00678,0.016512&amp;brcurrent=3,0x60220d504c46f8dd:0x6c55af970e3ae7f4,0&amp;ie=UTF8&amp;hq=%E8%8C%A8%E5%9F%8E%E7%9C%8C%E5%9C%9F%E6%B5%A6%E5%B8%82%E4%B8%8A%E9%AB%98%E6%B4%A5%EF%BC%93%EF%BC%96%EF%BC%97+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%9C%9F%E6%B5%A6&amp;t=m&amp;ll=36.081292,140.181084&amp;spn=0.017342,0.025706&amp;z=15&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/kahoku/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%81%8B%E3%81%BB%E3%81%8F&amp;aq=&amp;sll=36.079532,140.182103&amp;sspn=0.006737,0.016512&amp;brcurrent=3,0x5ff9d6be3d5cfb97:0x13763170eb69a94,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3&amp;hnear=%E7%9F%B3%E5%B7%9D%E7%9C%8C%E3%81%8B%E3%81%BB%E3%81%8F%E5%B8%82&amp;t=m&amp;ll=36.709199,136.701164&amp;spn=0.008601,0.012853&amp;z=16&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%81%8B%E3%81%BB%E3%81%8F&amp;aq=&amp;sll=36.079532,140.182103&amp;sspn=0.006737,0.016512&amp;brcurrent=3,0x5ff9d6be3d5cfb97:0x13763170eb69a94,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3&amp;hnear=%E7%9F%B3%E5%B7%9D%E7%9C%8C%E3%81%8B%E3%81%BB%E3%81%8F%E5%B8%82&amp;t=m&amp;ll=36.709199,136.701164&amp;spn=0.008601,0.012853&amp;z=16" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/numazu/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E6%B2%BC%E6%B4%A5&amp;sll=36.709681,136.700907&amp;sspn=0.026732,0.066047&amp;brcurrent=3,0x6019855cc3c4cc53:0x348de189f0c7bdea,0&amp;ie=UTF8&amp;hq=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;t=m&amp;ll=35.103602,138.860385&amp;spn=0.004389,0.006427&amp;z=17&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%80%80%E6%B2%BC%E6%B4%A5&amp;sll=36.709681,136.700907&amp;sspn=0.026732,0.066047&amp;brcurrent=3,0x6019855cc3c4cc53:0x348de189f0c7bdea,0&amp;ie=UTF8&amp;hq=%E9%9D%99%E5%B2%A1%E7%9C%8C%E6%B2%BC%E6%B4%A5%E5%B8%82%E5%A4%A7%E6%89%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E6%B2%BC%E6%B4%A5&amp;t=m&amp;ll=35.103602,138.860385&amp;spn=0.004389,0.006427&amp;z=17&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/yamatokoriyama/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C&amp;sll=35.10379,138.860986&amp;sspn=0.00341,0.008256&amp;brcurrent=3,0x60013a70d497170d:0x884b55346960bf58,0&amp;ie=UTF8&amp;hq=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;t=m&amp;ll=34.65125,135.802152&amp;spn=0.008826,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C&amp;sll=35.10379,138.860986&amp;sspn=0.00341,0.008256&amp;brcurrent=3,0x60013a70d497170d:0x884b55346960bf58,0&amp;ie=UTF8&amp;hq=%E5%A5%88%E8%89%AF%E7%9C%8C%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1%E5%B8%82%E4%B8%8B%E4%B8%89%E6%A9%8B%E7%94%BA+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E5%92%8C%E9%83%A1%E5%B1%B1&amp;t=m&amp;ll=34.65125,135.802152&amp;spn=0.008826,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';




}elseif(preg_match("!/shimonoseki/!",$Url)){
	$html = '<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d1654.84674652467!2d130.92371422023524!3d33.949010649545016!3m2!1i1024!2i768!4f13.1!2m1!1z5bGx5Y-j55yM5LiL6Zai5biC56u55bSO55S677yU77yN77yR77yN77yT77yXIOOCt-ODvOODouODvOODq-S4i-mWou-8kkY!5e0!3m2!1sja!2sjp!4v1402648788874" width="600" height="500" frameborder="0" style="border:0"></iframe><br /><small><a href="https://www.google.co.jp/maps/search/%E5%B1%B1%E5%8F%A3%E7%9C%8C%E4%B8%8B%E9%96%A2%E5%B8%82%E7%AB%B9%E5%B4%8E%E7%94%BA%EF%BC%94%EF%BC%8D%EF%BC%91%EF%BC%8D%EF%BC%93%EF%BC%97+%E3%82%B7%E3%83%BC%E3%83%A2%E3%83%BC%E3%83%AB%E4%B8%8B%E9%96%A2%EF%BC%92F/@33.9490106,130.9237142,18z" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/okaido/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93%E3%80%80&amp;sll=34.65035,135.802367&amp;sspn=0.013716,0.033023&amp;brcurrent=3,0x354fe5f21242979b:0x8a9c6a8072cf4129,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;t=m&amp;ll=33.837039,132.770655&amp;spn=0.008912,0.012853&amp;z=16&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93%E3%80%80&amp;sll=34.65035,135.802367&amp;sspn=0.013716,0.033023&amp;brcurrent=3,0x354fe5f21242979b:0x8a9c6a8072cf4129,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E6%9D%BE%E5%B1%B1%E5%B8%82%E5%A4%A7%E8%A1%97%E9%81%93%EF%BC%91%E4%B8%81%E7%9B%AE%EF%BC%95%E2%88%92%EF%BC%91%EF%BC%90+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%A4%A7%E8%A1%97%E9%81%93&amp;t=m&amp;ll=33.837039,132.770655&amp;spn=0.008912,0.012853&amp;z=16" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/kinuyama/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;aq=&amp;sll=33.837048,132.770395&amp;sspn=0.001731,0.004128&amp;brcurrent=3,0x354fe57a7b20822f:0xad326a414f9b6b85,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;t=m&amp;cid=13650703771668844799&amp;hnear=&amp;ll=33.854032,132.746773&amp;spn=0.004455,0.006427&amp;z=17&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;aq=&amp;sll=33.837048,132.770395&amp;sspn=0.001731,0.004128&amp;brcurrent=3,0x354fe57a7b20822f:0xad326a414f9b6b85,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E8%A1%A3%E5%B1%B1&amp;t=m&amp;cid=13650703771668844799&amp;hnear=&amp;ll=33.854032,132.746773&amp;spn=0.004455,0.006427&amp;z=17" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/shigenobu/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E9%87%8D%E4%BF%A1&amp;aq=&amp;sll=33.85399,132.746913&amp;sspn=0.027692,0.066047&amp;brcurrent=3,0x354fe87083c8bdeb:0xb24da08104da567c,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E9%87%8D%E4%BF%A1&amp;hnear=&amp;t=m&amp;ll=33.795412,132.832775&amp;spn=0.017832,0.025706&amp;z=15&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E9%87%8D%E4%BF%A1&amp;aq=&amp;sll=33.85399,132.746913&amp;sspn=0.027692,0.066047&amp;brcurrent=3,0x354fe87083c8bdeb:0xb24da08104da567c,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E9%87%8D%E4%BF%A1&amp;hnear=&amp;t=m&amp;ll=33.795412,132.832775&amp;spn=0.017832,0.025706&amp;z=15" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/masaki/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB&amp;sll=33.795376,132.833966&amp;sspn=0.003464,0.008256&amp;brcurrent=3,0x354ff1fc71ca5245:0x960be657a61769ae,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95&amp;t=m&amp;ll=33.788172,132.714694&amp;spn=0.008917,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;aq=0&amp;oq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB&amp;sll=33.795376,132.833966&amp;sspn=0.003464,0.008256&amp;brcurrent=3,0x354ff1fc71ca5245:0x960be657a61769ae,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E3%82%A8%E3%83%9F%E3%83%95%E3%83%AB%EF%BC%AD%EF%BC%A1%EF%BC%B3%EF%BC%A1%EF%BC%AB%EF%BC%A9&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BC%8A%E4%BA%88%E9%83%A1%E6%9D%BE%E5%89%8D%E7%94%BA%E7%AD%92%E4%BA%95&amp;t=m&amp;ll=33.788172,132.714694&amp;spn=0.008917,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/ozu/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;aq=&amp;brcurrent=3,0x354f80914624c053:0x7e68ce3752b76e25,1&amp;brv=25.1-fa8ed276_c3147e72_ccf32e81_040c821b_76b35545&amp;sll=33.517651,132.552774&amp;sspn=0.055601,0.132093&amp;g=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;t=m&amp;ll=33.529393,132.568417&amp;spn=0.008944,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;aq=&amp;brcurrent=3,0x354f80914624c053:0x7e68ce3752b76e25,1&amp;brv=25.1-fa8ed276_c3147e72_ccf32e81_040c821b_76b35545&amp;sll=33.517651,132.552774&amp;sspn=0.055601,0.132093&amp;g=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2&amp;ie=UTF8&amp;hq=&amp;hnear=%E6%84%9B%E5%AA%9B%E7%9C%8C%E5%A4%A7%E6%B4%B2%E5%B8%82%E6%9D%B1%E5%A4%A7%E6%B4%B2%EF%BC%91%EF%BC%91%EF%BC%92%EF%BC%95&amp;t=m&amp;ll=33.529393,132.568417&amp;spn=0.008944,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/imabari/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;aq=t&amp;sll=33.528977,132.568645&amp;sspn=0.001737,0.004128&amp;brcurrent=3,0x35503a7736a15089:0x25139c358788e3a2,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;t=m&amp;ll=34.062259,133.015938&amp;spn=0.017776,0.025706&amp;z=15&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;aq=t&amp;sll=33.528977,132.568645&amp;sspn=0.001737,0.004128&amp;brcurrent=3,0x35503a7736a15089:0x25139c358788e3a2,0&amp;ie=UTF8&amp;hq=%E6%84%9B%E5%AA%9B%E7%9C%8C%E4%BB%8A%E6%B2%BB%E5%B8%82%E6%9D%B1%E9%96%80%E7%94%BA%EF%BC%95%E4%B8%81%E7%9B%AE%EF%BC%91%EF%BC%93%E2%88%92%EF%BC%91+%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E4%BB%8A%E6%B2%BB&amp;t=m&amp;ll=34.062259,133.015938&amp;spn=0.017776,0.025706&amp;z=15&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
}elseif(preg_match("!/kitajima/!",$Url)){
	$html = '<iframe width="600" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%8C%97%E5%B3%B6&amp;aq=&amp;sll=34.061424,133.016464&amp;sspn=0.003453,0.008256&amp;brcurrent=3,0x355372097bcba9e9:0x4f9a0c2e98520ff3,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3&amp;hnear=%E5%BE%B3%E5%B3%B6%E7%9C%8C%E6%9D%BF%E9%87%8E%E9%83%A1%E5%8C%97%E5%B3%B6%E7%94%BA&amp;t=m&amp;ll=34.112213,134.547329&amp;spn=0.008883,0.012853&amp;z=16&amp;iwloc=B&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3%E5%8C%97%E5%B3%B6&amp;aq=&amp;sll=34.061424,133.016464&amp;sspn=0.003453,0.008256&amp;brcurrent=3,0x355372097bcba9e9:0x4f9a0c2e98520ff3,0&amp;ie=UTF8&amp;hq=%E3%82%B7%E3%83%8D%E3%83%9E%E3%82%B5%E3%83%B3%E3%82%B7%E3%83%A3%E3%82%A4%E3%83%B3&amp;hnear=%E5%BE%B3%E5%B3%B6%E7%9C%8C%E6%9D%BF%E9%87%8E%E9%83%A1%E5%8C%97%E5%B3%B6%E7%94%BA&amp;t=m&amp;ll=34.112213,134.547329&amp;spn=0.008883,0.012853&amp;z=16&amp;iwloc=B" style="color:#0000FF;text-align:left">大きな地図で見る</a></small>';
} else if (preg_match("!/aira/!",$Url)) {
	$html = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1753.4567379794848!2d130.62739174792173!3d31.73309605316688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353e57ddf88cdd8b%3A0xf70410c066683a75!2z44K344ON44Oe44K144Oz44K344Oj44Kk44Oz5ae26Imv!5e0!3m2!1sja!2sjp!4v1490407976401" width="600" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>';
}

echo $html;

}

function getFooter(){
$define = get_defined_constants() ;

//現在のページ情報の取得
$arr = getNowPage();
$html =  BnrPattern($arr["ename"]);
$today = getdate();

$Url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

echo <<<EOL
	<!-- #footer start -->
	<div id="footer">
		<div id="footerMain">
			<div class="top">
				<div class="topMain clearfix">
					<ul class="ftrListTop">
						<li><a href="{$define['Company_URL']}">会社概要</a></li>
						<li>|</li>
						<li><a href="{$define['SiteMap_URL']}">サイトマップ</a></li>
						<li>|</li>
						<li><a href="{$define['Low_URL']}">特定商取引法に基づく表記</a></li>
						<li>|</li>
						<li><a href="{$define['Policy_URL']}">利用規約</a></li>
						<li>|</li>
						<li class="end"><a href="{$define['Privacy_URL']}">プライバシーポリシー</a></li>
					</ul>

					<ul class="ftrListBottom">
						<li>ご意見・ご感想 （ご利用劇場をお知らせください） </li>
						<li><a href="mailto:cin-sun_mail@cinemasunshine.co.jp?Subject=%e3%81%94%e6%84%8f%e8%a6%8b%e3%83%bb%e3%81%94%e6%84%9f%e6%83%b3"><img src="{$define['Images_URL']}common/btn_mail.gif"></a></li>
					</ul>
				</div>
			</div>

			<div class="bottom">
				<div class="bottomMain">
					<p>Copyright (C) 2001-{$today['year']} Cinema Sunshine Co., Ltd. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- #footer end -->

	<!-- #footerFixed start -->
    <div id="footerFixed">
		<div id="footerShade"></div>

		<div id="footerWrap">

			<ul>
				{$html}
				<li class="closebtn"><img src="{$define['Images_URL']}common/fig_close.png" alt="close"></li>
				</div>

			</ul>
	         <hr style="clear: left;visibility: hidden;"/>
		</div>
	</div>
	<!-- #footerFixed end -->

	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));

		$(function(){
		});
	</script>
EOL;

//アフィリエイトタグの出し分け
//必要なページの見はられるよ
//劇場TOPのみのタグ
if($arr["ename"] == "top"){
echo <<<EOL
	<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
	<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 993895592;
	var google_conversion_label = "pEYJCNittQQQqMn22QM";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>

	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=0&amp;label=pEYJCNittQQQqMn22QM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>

	<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
	<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 994556079;
	var google_conversion_label = "6zH7CNmKzAQQr_Ge2gM";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/994556079/?value=0&amp;label=6zH7CNmKzAQQr_Ge2gM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
EOL;
}

//衣山・土浦のみのタグ
if($arr["ename"] == "tsuchiura" || $arr["ename"] == "kinuyama"){
echo <<<EOL
	<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
	<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 993895592;
	var google_conversion_label = "pEYJCNittQQQqMn22QM";
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
	</script>

	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=0&amp;label=pEYJCNittQQQqMn22QM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>
EOL;
}

//平和島TOPのみのタグ
if($arr["ename"] == "heiwajima" && $arr["ename2"] == "schedule"){
echo <<<EOL
<!-- Google Code for &#12522;&#12510;&#12540;&#12465;&#12486;&#12451;&#12531;&#12464; &#12479;&#12464; -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup --> <script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 993895592;
var google_conversion_label = "pEYJCNittQQQqMn22QM"; var google_custom_params = window.google_tag_params; var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/993895592/?value=1.00&amp;label=pEYJCNittQQQqMn22QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
EOL;
}

//土浦、大和郡山、衣山　TOPのみのタグ
if($arr["ename"] == "tsuchiura" || $arr["ename"] == "kinuyama" || $arr["ename"] == "yamatokoriyama"){
    if($arr["ename2"] == "schedule"){
echo <<<EOL

<!--CB-CV計測タグ-->
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = '55V7ZHW0DR';
var yahoo_retargeting_label = '';
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>

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

<script type="text/javascript" language="javascript">
  /* <![CDATA[ */
  var yahoo_ydn_conv_io = "GAJxYt0OLDXyzhiugq09";
  var yahoo_ydn_conv_label = "";
  var yahoo_ydn_conv_transaction_id = "";
  var yahoo_ydn_conv_amount = "0";
  /* ]]> */
</script>
<script type="text/javascript" language="javascript" charset="UTF-8" src="//b90.yahoo.co.jp/conv.js"></script>
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




}
function getMensArray() {
	return array('numazu'=>'numazu','kahoku'=>'kahoku','yamatokoriyama'=>'yamatokoriyama');
}
?>

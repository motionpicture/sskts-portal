<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin:0px !important;">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="../css/common.css" type="text/css" />        
<link rel="stylesheet" href="../css/style.css" type="text/css" />        
<link rel="stylesheet" href="../css/blog.css" type="text/css" />
<link rel="stylesheet" href="../css/common2.css" type="text/css" />
<link rel="stylesheet" href="../css/ac_gl_nav.css" type="text/css" />      
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8383230-50']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type='text/javascript' src='../scripts/jquery-1.4.3.min.js'></script>

<script type="text/javascript">
<!--
	var j$ = jQuery;

	j$(function(){

	function setBackground() {
		var $last = j$(".acc > li:last > a");
		if($last.hasClass("close"))
			$last.css("background-position", "left bottom");
		else
			$last.css("background-position", "left -30px");
	}

	j$(".acc").each(function(){
		j$("li > ul"            , this).wrap("<div></div>");
		j$("li > div:not(:last)", this).append("<div class='notlast'>&nbsp;</div>");
		j$("li > div:last"      , this).append("<div class='last'>&nbsp;</div>");

		j$("li > a", this).each(function(index){
			var $this = j$(this);

			if(index > 0) 
				$this.addClass("close").next().hide();
			else
				$this.css("background-position", "left top");

			setBackground();

			var prms = {height:"toggle", opacity:"toggle"};
			$this.mouseover(function(){
				j$(this).toggleClass("close").next().animate(prms, {duration:"fast"})
					.parent().siblings().children("div:visible").animate(prms, {duration:"fast"}).prev().addClass("close");
				setBackground();
				return false;
			});
		});
	});
});
//-->
</script> 
</head>

<body>
    <!--header▼--> 
    <div id="wrapper">    
    <div class="header">
    
    <div class="copy">
      <a href="../"><img src="../images/common/top_logo.gif" alt="IMAX" style="float:left;"></a>
      </div>
      <div class="clear"></div>
        <div class="gl_nav">  
      <div class="mainNav">
      <!--<ul id="menu-main-nav">
      <li><a href="./about"><img src="images/common/navi1.gif" width="206" height="18"></a></li>
      <li><a href="./movie"><img src="images/common/navi2.gif" width="91" height="18"></a></li>
      <li><a href="./theater"><img src="images/common/navi3.gif" width="91" height="18"></a></li>
      <li><a href="./blog"><img src="images/common/navi5.gif" width="147" height="18"></a></li>
      </ul>-->
      <ul class="acc">
	<li class="tittle"><a href="../about/"><img src="../images/common/navi1.gif" width="207" height="37" alt="IMAXデジタルシアターとは？"></a>
	
	</li>
	<li class="tittle"><a href="../movie/"><img src="../images/common/navi2.gif" width="92" height="37" alt="作品情報"></a>
		
	</li>
	<li class="tittle"><a class="menu" href="http://www.cinemasunshine.co.jp/theater/yamatokoriyama/"><img src="../images/common/navi6.gif" width="112" height="37" alt="チケット購入"></a>
		<ul> 
			<li class="open"><a href="http://www.cinemasunshine.co.jp/theater/tsuchiura/" target="_blank">土浦</a></li>
			<li class="open"><a href="http://www.cinemasunshine.co.jp/theater/yamatokoriyama/" target="_blank">大和郡山</a></li>
			<li class="open"><a href="http://www.cinemasunshine.co.jp/theater/kinuyama/" target="_blank">衣山</a></li>

		</ul>
	</li>
    <li class="tittle"><a class="menu" href="../theater/index.html"><img src="../images/common/navi3.gif" width="100" height="37" alt="劇場情報"></a>
		<ul> 
            <li class="open"><a href="../theater/#theater-tsuchiura">土浦</a></li>
			<li class="open"><a href="../theater/#theater-yamatokoriyama">大和郡山</a></li>
			<li class="open"><a href="../theater/#theater-kinuyama">衣山</a></li>
            <li class="open"><a href="../theater/#price_infomation">鑑賞料金</a></li>
		</ul>
	</li>
    <li class="tittle"><a href="../blog/"><img src="../images/common/navi5.gif" width="148" height="37" alt="オフシャルブログ"></a>	
	</li>
</ul>
      </div>
  </div>
    </div>
    <!--header▲--> 
</div>

<div id="content">				
    <div id="wrap" style="width:982px;margin:auto;background-color:#000;border-left:#026e96 1px solid;border-right:#026e96 1px solid;">    
	<div id="main">
		<div id="container">

			<div id="content_area" role="main">
				<div id="top_image" style="width:982px;margin-bottom:10px;">
				<img src="../images/blog/blog_img1.jpg">
				</div>
			<div id="main_column">
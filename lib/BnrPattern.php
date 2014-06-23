<?php

function BnrPattern($page){
$define = get_defined_constants() ;

$dir = dirname(__FILE__);
$banners = simplexml_load_file(realpath($dir.'/banners.xml'));

if($page == "top"){
	$target=array(1,59,58);
}elseif($page == "showing"){
	$target=array(1,59,58);
}elseif($page == "next_showing"){
	$target=array(1,59,58);
}elseif($page == "company"){
	$target=array(1,59,58);
}elseif($page == "sitemap"){
	$target=array(1,59,58);
}elseif($page == "law"){
	$target=array(1,59,58);
}elseif($page == "sitepolicy"){
	$target=array(1,59,58);
}elseif($page == "privacy"){
	$target=array(1,59,58);
}elseif($page == "theater"){
	$target=array(1,59,58);
}elseif($page == "members_card"){
	$target=array(1,59,58);
}elseif($page == "3d"){
	$target=array(1,59,58);
}elseif($page == "special_ticket"){
	$target=array(1,59,58);
}elseif($page == "question"){
	$target=array(1,59,58);

//ここから劇場
}elseif($page == "ikebukuro"){$target=array(4,5,59);
}elseif($page == "heiwajima"){$target=array(59,58,7,60);
}elseif($page == "tsuchiura"){$target=array(8,9,1);
}elseif($page == "numazu"){$target=array(12,13);
}elseif($page == "kahoku"){$target=array(10,11);
}elseif($page == "yamatokoriyama"){$target=array(14,15,1);
}elseif($page == "shimonoseki"){$target=array();
}elseif($page == "okaido"){$target=array(32);
}elseif($page == "kinuyama"){$target=array(16,17,1);
}elseif($page == "shigenobu"){$target=array(16,17);
}elseif($page == "masaki"){$target=array(16,17);
}elseif($page == "ozu"){$target=array(16,17);
}elseif($page == "kitajima"){$target=array(18,19);
}else{
	//現状ではresult.php用
	$target=array(1,59,58);
}

foreach($banners->banner as $bnr){
	if(!in_array($bnr["num"],$target)){
		continue;
	}
	
	//target="_blank"の処理
	unset($blank);
	if($bnr['target'] == 1){
		$blank = 'target="_blank"';
	}else{
		$blank = '';
	}
	
	//使用する前に初期化
	$num = "";
	$num = (int)$bnr["num"];

	if($bnr['url'] && $bnr['url'] != ""){
		$cord[$num] = "<li><a href='$bnr[url]' $blank ><img width ='226' src='$define[Images_URL]pickBnr/$bnr[image]' alt='" . htmlspecialchars($bnr["name"], ENT_QUOTES) . "' /></a></li>";
	}else{
		$cord[$num] = "<li><img width ='226' src='$define[Images_URL]pickBnr/$bnr[image]' alt='" . htmlspecialchars($bnr["name"], ENT_QUOTES) . "' /></li>";
	}	
}

$i = 0;
foreach($target as $val){
	if($i > 3){
		break;
	}
	$html .= $cord[$val];
	$i++;
}

return $html;
}

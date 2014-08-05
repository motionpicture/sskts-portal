<?php

function BnrPattern($page){
	global $db;
	$loop = 0;
	$define = get_defined_constants();

	$theaterId = getTheaterId($page);
	if(!$theaterId){
		$theaterId = 1000;
		$sql ="
			select view
			from
			pick_views
			where theater_id = '{$theaterId}'";
	}else{
		$sql ="
			select view
			from
			pick_views
			where theater_id = '{$theaterId['id']}'";
	}

	$pickId= $db->select($sql);
	$pickId= explode(",",$pickId[0]["view"]);

	foreach($pickId as $key => $val){
		if($loop > 3) break;
		else $loop++;
		$banners .= $val . ",";
	}

	$banners = preg_replace("/\,$/","",$banners);

	$sql ="
		select *
		from
		picks
		where id IN({$banners})";
	$bnr = $db->select($sql);

	foreach($bnr as $key => $val){
	    $bnrInfo[$val['id']] = $val;
	}

	foreach($pickId as $key => $val){
	    if(count($bnrReturn) > 3)break;
	    if(is_array($bnrInfo[$val])){
	        $bnrReturn[] = $bnrInfo[$val];
	    }
	}

	foreach($bnrReturn as $val){
		//target="_blank"�̏���
		unset($blank);

		if($val['url_flg'] == 1){
			$blank = 'target="_blank"';
		}else{
			$blank = '';
		}

		if($val['url'] && $val['url'] != ""){
			$html .= "<li><a href='$val[url]' $blank ><img width ='226' height='58' src='/theaters_image/pick/$val[pic_path]' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "' /></a></li>";
		}else{
			$html .= "<li><img width ='226' height='58' src='/theaters_image/pick/theater_img/pickBnr/$val[pic_path]' alt='" . htmlspecialchars($val["name"], ENT_QUOTES) . "' /></li>";
		}
	}

	return $html;
}

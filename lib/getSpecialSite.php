<?php

$define = get_defined_constants() ;

$db = new DB();

//IMAX作品紹介
function getSpecialImaxMovie($type = true){
    global $db;
    $today = date("Y-m-d");
    //上映中
    $sql ="
    select *
    from
    introductions
    where
    start_date1 <= '$today' and
    end_date1 >= '$today' and ";
    if($type == true){
	    $sql .=" reflection = 1 and ";
    }
    $sql .=" FIND_IN_SET('1001',theater_ids)
    ".plusDelFlg()
    ."ORDER BY start_date1 DESC";

    $bnr[] = $db->select($sql);

    //上映予定
    $sql ="
    select *
    from
    introductions
    where
    start_date1 > '$today' and
    end_date1 > '$today' and ";
    if($type == true){
	    $sql .=" reflection = 1 and ";
    }
    $sql .=" FIND_IN_SET('1001',theater_ids)
    ".plusDelFlg()
    ."ORDER BY start_date1 ASC";

    $bnr[] = $db->select($sql);

    return $bnr;
}

//4DX作品紹介
function getSpecial4dxMovie($type = true){
    global $db;
    $today = date("Y-m-d");
    //上映中
    $sql ="
    select *
    from
    introductions
    where
    start_date2 <= '$today' and
    end_date2 >= '$today' and ";
    if($type == true){
	    $sql .=" reflection = 1 and ";
    }
    $sql .=" FIND_IN_SET('1003',theater_ids)
    ".plusDelFlg()
    ."ORDER BY start_date2 DESC";

    $bnr[] = $db->select($sql);

    //上映予定
    $sql ="
    select *
    from
    introductions
    where
    start_date2 > '$today' and
    end_date2 > '$today' and ";
    if($type == true){
	    $sql .=" reflection = 1 and ";
    }
    $sql .=" FIND_IN_SET('1003',theater_ids)
    ".plusDelFlg()
    ."ORDER BY start_date2 ASC";

    $bnr[] = $db->select($sql);

    return $bnr;
}

//AST作品紹介
function getSpecialastMovie($type = true){
    global $db;
    $today = date("Y-m-d");
    //上映中
    $sql ="
    select *
    from
    introductions
    where
    start_date3 <= '$today' and
    end_date3 >= '$today' and ";
    if($type == true){
	    $sql .=" reflection = 1 and ";
    }
    $sql .=" FIND_IN_SET('1004',theater_ids)
    ".plusDelFlg()
    ."ORDER BY start_date3 DESC";

    $bnr[] = $db->select($sql);

    //上映予定
    $sql ="
    select *
    from
    introductions
    where
    start_date3 > '$today' and
    end_date3 > '$today' and ";
    if($type == true){
	    $sql .=" reflection = 1 and ";
    }
    $sql .=" FIND_IN_SET('1004',theater_ids)
    ".plusDelFlg()
    ."ORDER BY start_date3 ASC";

    $bnr[] = $db->select($sql);

    return $bnr;
}

//サイドバナーの判定
function getSpecialBottomBnr($theaterId){
    global $db;
    $sql ="
    select *
    from
    special_side_banner_views
    where
    theater_id=$theaterId
    ".plusDelFlg();

    //表示したいバナーをまず取得
    $bnr = $db->select($sql);
    $bnrId = explode(",",$bnr[0]["view"]);

    foreach($bnrId as $key => $val){
        $banners .= $val . ",";
    }

    $banners = preg_replace("/\,$/","",$banners);

    $sql ="
    select *
    from
    special_side_banners
    where id IN({$banners})";
    $bnr = $db->select($sql);

    foreach($bnr as $key => $val){
        $bnrInfo[$val['id']] = $val;
    }

    foreach($bnrId as $key => $val){
        if(is_array($bnrInfo[$val])){
            $bnrReturn[] = $bnrInfo[$val];
        }
    }
    return $bnrReturn;
}

//メインバナーの判定
function getSpecialMainBnr($theaterId){
    global $db;
    $sql ="
    select *
    from
    special_main_banner_views
    where
    theater_id=$theaterId
    ".plusDelFlg();

    //表示したいバナーをまず取得
    $bnr = $db->select($sql);
    $bnrId = explode(",",$bnr[0]["view"]);

    foreach($bnrId as $key => $val){
        $banners .= $val . ",";
    }

    $banners = preg_replace("/\,$/","",$banners);
    if(!$banners) $banners= 99999;

    $sql ="
    select *
    from
    special_main_banners
    where id IN({$banners})";
    $bnr = $db->select($sql);

    foreach($bnr as $key => $val){
        $bnrInfo[$val['id']] = $val;
    }

    foreach($bnrId as $key => $val){
        if(is_array($bnrInfo[$val])){
            $bnrReturn[] = $bnrInfo[$val];
        }
    }
    return $bnrReturn;

}

?>

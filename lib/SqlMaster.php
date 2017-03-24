<?php
//シネサンで使う全select sqlをここに記述
$db = new DB();


//ランキング取得する
function getRanking() {
	global $db;
	$sql ="
		select start_date,end_date,movie_code1,movie_code2,movie_code3,movie_code4,movie_code5
		from
		rankings
		where id='1'"

	.plusDelFlg();

	$ranking =$db->select($sql);

	//ランキングは1件のみなので必ず0に格納される。
	$ranking= $ranking[0];
	return $ranking;
}

//有効な全劇場取得
function getTheaterList(){
	global $db;
	$sql= "
	select *
		from theaters
 	where del_flg='0'";
	$theaters = $db->select($sql);
	foreach($theaters as $theater){
		if($theater["ename"] == "ikebukuro") $arr[0] = $theater;
		if($theater["ename"] == "heiwajima") $arr[1] = $theater;
		if($theater["ename"] == "tsuchiura") $arr[2] = $theater;
		if($theater["ename"] == "kahoku") $arr[3] = $theater;
		if($theater["ename"] == "numazu") $arr[4] = $theater;
		if($theater["ename"] == "yamatokoriyama") $arr[5] = $theater;
		if($theater["ename"] == "shimonoseki") $arr[6] = $theater;
		if($theater["ename"] == "okaido") $arr[7] = $theater;
		if($theater["ename"] == "kinuyama") $arr[8] = $theater;
		if($theater["ename"] == "shigenobu") $arr[9] = $theater;
		if($theater["ename"] == "masaki") $arr[10] = $theater;
		if($theater["ename"] == "ozu") $arr[11] = $theater;
		if($theater["ename"] == "imabari") $arr[12] = $theater;
		if($theater["ename"] == "kitajima") $arr[13] = $theater;
        if($theater["ename"] == "aira") $arr[14] = $theater;
	}

	ksort($arr,SORT_NUMERIC);
	return $arr;

}

//作品取得
function getMovieById($id){
	global $db;
	$id=$db->quote_smart($id);

	$sql="
		select *
		from movies
		where
		id=$id
	".plusDelFlg();
	//var_dump($sql)
	$movie = $db->select($sql);

	//１件のみの取得なので直接取得
	$movie = $movie[0];
	return $movie;

}

//theaterIdを取得
function getTheaterId($theaterEname) {
	global $db;
	$sql ="
			select
			id
			from theaters
			where ename='$theaterEname'
	";
	$theaterId= $db->select($sql);
	$theaterId=$theaterId[0];
	return $theaterId;


}


//newsを表示する順を取得
function getNewsViews($theaterId){
		global $db;
	$sql ="
		select *
		from news_views
		where
		theater_id=$theaterId
		".plusDelFlg();
	$newsView= $db->select($sql);
	$newsView=$newsView[0];
	return $newsView;
}

//news詳細を取得
function getNewsDetail($Id){
		global $db;
	$sql ="
		select *
		from news
		where
		start_date <= date_format(now(), '%Y%m%d%H%i%s') and
		end_date >= date_format(now(), '%Y%m%d%H%i%s') and
		id=$Id
		".plusDelFlg();
	$news= $db->select($sql);
	$news= $news[0];
	return $news;
}


//news取得
function getNews($theaterId){
		global $db;
	$sql ="
		select *
		from news
		where
		start_date <= date_format(now(), '%Y%m%d%H%i%s') and
		end_date >= date_format(now(), '%Y%m%d%H%i%s') and
		FIND_IN_SET('$theaterId',theater_ids)
		".plusDelFlg();
	$news= $db->select($sql);
	return $news;
}

//開館時間取得
function getImportants($theaterId){
	global $db;
	$sql ="
		select *
		from importants
		where
		theater_id=$theaterId
		".plusDelFlg();
	$important= $db->select($sql);
	$important=$important[0];
	return $important;
}
//TOP image取得
function getTopImage($theaterId){
	global $db;

	$sql= "
	select *
	from topslider_views
	where
	theater_id=$theaterId
	".plusDelFlg();
	$num = $db->select($sql);

	$sliderId = explode(",",$num[0]["view"]);

	foreach($sliderId as $key => $val){
	    $banners .= $val . ",";
	}

	$banners = preg_replace("/\,$/","",$banners);

	$sql ="
	select *
	from
	topsliders
	where id IN({$banners})";
	$bnr = $db->select($sql);

	foreach($bnr as $key => $val){
	    $bnrInfo[$val['id']] = $val;
	}

	foreach($sliderId as $key => $val){
	    if(is_array($bnrInfo[$val])){
	        $bnrReturn[] = $bnrInfo[$val];
	    }
	}

	return $bnrReturn;
}

//上映中取得
function getNowRoadShow($theaterId = null) {
	global $db;
	$sql ="
		SELECT
		    roadshows.id,
		    movie_code,
		    theater_ids,
		    start_date,
		    end_date,
		    tuika,
		    name,
		    picture,
		    credit,
		    site,
		    grade,
		    ename,
		    midokoro
		FROM
		    roadshows ,
		    movies
		WHERE
		    roadshows.del_flg=0 AND
		    movies.del_flg=0 AND
		    roadshows.movie_code = movies.id AND
		    roadshows.start_date <=  date_format(now(), '%Y-%m-%d') AND
		    (roadshows.end_date >= date_format(now(), '%Y-%m-%d') or roadshows.end_date is null) AND
		    roadshows.theater_ids is not null";

	if ($theaterId != null) {
		$sql.= " AND  FIND_IN_SET($theaterId,roadshows.theater_ids) ";
	}

		$sql.=" ORDER BY
		    start_date
		    DESC
			";
	$now= $db->select($sql);
	return $now;
}



//上映予定
function getNextRoadShow($theaterId = null) {
	global $db;
	$sql ="
		SELECT
		    a.id,
		    movie_code,
		    theater_ids,
		    start_date,
		    end_date,
		    tuika,
		    name,
		    picture,
		    credit,
		    site,
		    grade,
		    ename,
		    midokoro
		FROM
		    roadshows a,
		    movies b
		WHERE
		    a.del_flg=0 AND
		    b.del_flg=0 AND
		    a.movie_code = b.id AND
		    a.start_date >  date_format(now(), '%Y-%m-%d') AND
		    a.theater_ids is not null  ";

	if ($theaterId != null) {
		$sql.= "  AND
		    FIND_IN_SET('$theaterId',a.theater_ids) ";

	}

	$sql.=" ORDER BY
		    start_date
		    ASC
			";
	$now= $db->select($sql);
	return $now;
}

//3d上映中取得
function getNowRoadShow3d() {
	global $db;
	$sql ="
		SELECT
		    roadshows.id,
		    movie_code,
		    theater_ids,
		    start_date,
		    end_date,
		    tuika,
		    name,
		    picture,
		    credit,
		    site,
		    grade,
		    ename,
		    midokoro
		FROM
		    roadshows ,
		    movies
		WHERE
		    roadshows.del_flg=0 AND
		    movies.del_flg=0 AND
		    movies.3d=1 AND
		    roadshows.movie_code = movies.id AND
		    roadshows.start_date <=  date_format(now(), '%Y-%m-%d') AND
		    (roadshows.end_date >= date_format(now(), '%Y-%m-%d') or roadshows.end_date is null) AND
		    roadshows.theater_ids is not null";

		$sql.=" ORDER BY
		    start_date
		    DESC
			";
	$now= $db->select($sql);
	return $now;
}



//3d上映予定
function getNextRoadShow3d() {
	global $db;
	$sql ="
		SELECT
		    a.id,
		    movie_code,
		    theater_ids,
		    start_date,
		    end_date,
		    tuika,
		    name,
		    picture,
		    credit,
		    site,
		    grade,
		    ename,
		    midokoro
		FROM
		    roadshows a,
		    movies b
		WHERE
		    a.del_flg=0 AND
		    b.del_flg=0 AND
		    b.3d=1 AND
		    a.movie_code = b.id AND
		    a.start_date >  date_format(now(), '%Y-%m-%d') AND
		    a.theater_ids is not null  ";
	$sql.=" ORDER BY
		    start_date
		    ASC
			";
	$now= $db->select($sql);
	return $now;
}

function getMovieCode($i){
	global $db;
	$sql ="
		SELECT
		    movie_code
		FROM
			roadshows
		WHERE
		    id = $i
		";

	$code= $db->select($sql);
	return $code;
}

//キャンペーン
function getCampaign($theaterId) {
	global $db;
	$sql= "
	select *
	from campaigns
 	where
 	del_flg='0' AND
	start_date <= date_format(now(), '%Y%m%d') AND
	end_date >= date_format(now(), '%Y%m%d') AND
	FIND_IN_SET('$theaterId',theater_ids)
	ORDER BY midasi ASC";

	$pickup = $db->select($sql);
	return $pickup;
}

//前売り情報を取得する
function getMaeuri($theaterEname) {
	global $db;
	$sql ="
			select *
			from maeuris
			where
			start_date <= date_format(now(), '%Y%m%d%H%i%s') and
			end_date >= date_format(now(), '%Y%m%d%H%i%s') and
			theater_id='$theaterEname' and
			del_flg = '0'
			order by end_date
		";
	$maeuri= $db->select($sql);
	return $maeuri;

}

/**
 * @global DB $db
 * @param int $theaterId
 */
function getTrailerList($theaterId) {
    global $db;
    $sql = "
        SELECT
            *
        FROM
            trailers
        WHERE
            del_flg = '0' AND FIND_IN_SET($theaterId, theater_ids)
    ";

    return $db->select($sql);
}

function plusDelFlg(){
	return " and del_flg='0'";
}
?>
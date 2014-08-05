<?php

//┌─────────────────────────────────
//│ [ CACHE CONTROL SWITCH FUNCTION Ver1.0]
//│ cache_control.php - 2009/01/27
//│ Copyright (C) DSPT.NET
//│ http://www.dspt.net/
//└─────────────────────────────────
	
	//キャッシュコントロール制御
	function cache_control($data,$html) {
		$meta_line1 = "<meta http-equiv=\"pragma\" content=\"no-cache\"";
		$meta_line2 = "<meta http-equiv=\"cache-control\" content=\"no-cache\"";
		$meta_line3 = "<meta http-equiv=\"expires\" content=\"-1\"";
		if($data == 'on') {
			if ($html == 'xhtml') {
				$out = $meta_line1." />\n".$meta_line2." />\n".$meta_line3." />\n";
			}
			else {
				$out = $meta_line1.">\n".$meta_line2.">\n".$meta_line3.">\n";
			}
			return $out;
		}
		else {
			return "";
		}
	}

?>

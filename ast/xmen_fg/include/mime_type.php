<?php

//┌─────────────────────────────────
//│ [ CONTENTS MIME TYPE SWITCH FUNCTION Ver1.0]
//│ mime_type.php - 2009/01/27
//│ Copyright (C) DSPT.NET
//│ http://www.dspt.net/
//└─────────────────────────────────
	
	//ドコモのFOMAのみ適切なコンテンツMIMEタイプを出力する
	function mime_type($data) {
		if($data == 'foma') {
			return "application/xhtml+xml";
		}
		else {
			return "text/html";
		}
	}

?>

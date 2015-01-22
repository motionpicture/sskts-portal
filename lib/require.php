<?php

$include_dir = realpath(dirname( __FILE__));
var_dump($include_dir);
exit();
require_once ($include_dir."/DB.php");
require_once($include_dir."/const.php");
require_once($include_dir."/SqlMaster.php");
require_once($include_dir."/getSchedule.php");
require_once($include_dir."/BnrPattern.php");
require_once($include_dir."/create.php");
require_once($include_dir."/createSmart.php");
require_once($include_dir."/getJsonSp.php");
require_once($include_dir."/getSpecialSite.php");
?>

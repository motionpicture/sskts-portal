<?php
header('Content-Type: text/html; charset=UTF-8');
include("../lib/require.php");
$bnr = getSpecialImaxMovie();
echo '<pre>';
echo date("Y/m/d H:i:s");
print_r($bnr);

?>
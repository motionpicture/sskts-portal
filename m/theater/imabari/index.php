<?php


$BASE = dirname(dirname(dirname(__FILE__)));
$resourcePath = $BASE . '/resource/theater/' . basename(dirname(__FILE__)) . '/';
ob_start();
include $BASE . '/lib/resource.php';
$template = ob_get_contents();
ob_end_clean();

echo $template;


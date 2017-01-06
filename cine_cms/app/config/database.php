<?php
class DATABASE_CONFIG {

	var $default = array();

    var $prod = array(
		'datasource' => 'AzureMysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'cinesun_cms',
		'password' => 'cine_sun_px',
		'database' => 'cinema_cms',
		'encoding' => 'utf8',
        'time_zone' => '+09:00',
	);

    // 自動テスト用
    var $test = array();

    var $stg = array(
		'datasource' => 'AzureMysql',
		'persistent' => false,
		'host' => 'ja-cdbr-azure-east-a.cloudapp.net',
		'login' => 'b68a3a830cc797',
		'password' => 'c9e1bde9',
		'database' => 'testsasakidb',
		'encoding' => 'utf8',
        'time_zone' => '+09:00',
	);

    var $dev = array(
        'datasource' => 'AzureMysql',
		'persistent' => false,
		'host' => 'ja-cdbr-azure-east-a.cloudapp.net',
		'login' => 'b68a3a830cc797',
		'password' => 'c9e1bde9',
		'database' => 'testsasakidb',
		'encoding' => 'utf8',
        'time_zone' => '+09:00',
	);

    function __construct() {
        if (APP_ENV == 'prod') {
            $this->default = $this->prod;
        } else if (APP_ENV == 'stg') {
            $this->default = $this->stg;
        } else {
            $this->default = $this->dev;
        }
    }
}
?>
<?php
class DATABASE_CONFIG {

	var $default = array();

    var $prod = array(
		'datasource' => 'AzureMysql',
		'persistent' => false,
		'host' => 'db-facce1f722-1.cloudapp.net',
        'port' => '3310',
		'login' => 'ud9ee5ecd9e2c3',
		'password' => 'pb3fca0c068905',
		'database' => 'prodsskportal',
		'encoding' => 'utf8',
        'time_zone' => '+09:00',
	);

    // 自動テスト用
    var $test = array();

    var $stg = array(
		'datasource' => 'AzureMysql',
		'persistent' => false,
		'host' => '',
		'login' => '',
		'password' => '',
		'database' => '',
		'encoding' => 'utf8',
        'time_zone' => '+09:00',
	);

    var $dev = array(
        'datasource' => 'AzureMysql',
		'persistent' => false,
		'host' => 'ja-cdbr-azure-east-a.cloudapp.net',
		'login' => 'bf09d71fd6434a',
		'password' => 'd8a6129b',
		'database' => 'devssktsportal',
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
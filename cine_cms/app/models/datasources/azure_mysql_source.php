<?php
App::import('Datasource', 'DboSource');
App::import('Datasource', 'DboMysqli');

/**
 * Mysqli DBO Driver for Microsoft Azure
 *
 * @link https://m-p.backlog.jp/view/SASAKI_TICKET-35
 * @author Atsushi Okui <okui@motionpicture.jp>
 */
class AzureMysqlSource extends DboMysqli
{
    var $description = "Mysqli DBO Driver for Microsoft Azure";

    function connect()
    {
        parent::connect();

        $config = $this->config;

        if (!empty($config['time_zone'])) {
			$this->setTimezone($config['time_zone']);
		}

        return $this->connected;
    }

    /**
     * Sets the database timezone
     *
     * @param string $timezone ±HH:MM形式（開発時点ではAsia/Tokyoなどは使用できず）
     * @return boolean
     */
    function setTimezone($timezone)
    {
		return $this->_execute(sprintf("SET SESSION time_zone = '%s'", $timezone)) != false;
	}
}

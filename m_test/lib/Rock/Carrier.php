<?php
/**
 *  Carrier.php
 *
 *  @author     Hiroto Ogoh <dancho@Rock.com>
 *  @package    Common
 *  @version    $Id: skel.app_manager.php,v 1.2 2006/11/06 14:31:24 cocoitiban Exp $
 */


/**
 *  Rock_Carrier
 *
 *  @author     Hiroto Ogoh <dancho@Rock.com>
 *  @access     public
 *  @package    Common
 */
class Rock_Carrier
{
    var $_ua;
    var $_isPc = false;
    var $_isDocomo = false;
    var $_isAu = false;
    var $_isSoftbank = false;
    var $_isWillcom = false;
    var $_is3g = false;
    var $_isBot = false;
    var $_terminalId = '';


    function Rock_Carrier()
    {
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $this->_ua = $_SERVER['HTTP_USER_AGENT'];
            $this->_setCarrier();
            $this->_set3g();
            $this->_setTerminalId();
        }
    }


    function isDocomo()
    {
        return $this->_isDocomo;
    }

    function isAu()
    {
        return $this->_isAu;
    }

    function isSoftbank()
    {
        return $this->_isSoftbank;
    }

    function isWillcom()
    {
        return $this->_isWillcom;
    }

    function is3g()
    {
        return $this->_is3g;
    }

    function isPc()
    {
        return $this->_isPc;
    }

    function isBot()
    {
        return $this->_isBot;
    }

    function getTerminalId()
    {
        return $this->_terminalId;
    }


    /**
     * メールアドレスによるキャリア判別
     */
    function _setCarrierByMailaddress($mailaddress)
    {
        $regex = '/^.+@(?:(docomo)|(ezweb)|((?:softbank|\w+\.vodafone))|(\w+\.pdx))\.ne\.jp$/i';
        preg_match($regex, $mailaddress, $matches);
        if (!empty($matches[1]))      {$this->_isDocomo = true;}
        else if (!empty($matches[2])) {$this->_isAu = true;}
        else if (!empty($matches[3])) {$this->_isSoftbank = true;}
        else if (!empty($matches[4])) {$this->_isWillcom = true;}
        else                         {$this->_isPc = true;}
    }


    /**
     * キャリア判別
     */
    function _setCarrier()
    {
        // キャリア判別
        $docomoRegex   = '^DoCoMo/\d\.\d[ /]';
        $softbankRegex = '^(?:(?:SoftBank|Vodafone|J-PHONE|Semulator)/\d\.\d|MOT-)';
        $auRegex       = '^(?:KDDI-[A-Z]+\d+[A-Z]? |)UP\.Browser\/';
        $willcomRegex  = '^Mozilla\/3\.0\((?:DDIPOCKET|WILLCOM);';
        $mobileRegex   = "(?:($docomoRegex)|($softbankRegex)|($auRegex)|($willcomRegex))";

        preg_match("!$mobileRegex!", $this->_ua, $matches);
//        if (!empty($matches[1]))      {$this->_isAu = true;}
        if (!empty($matches[1]))      {$this->_isDocomo = true;}
        else if (!empty($matches[2])) {$this->_isSoftbank = true;}
        else if (!empty($matches[3])) {$this->_isAu = true;}
        else if (!empty($matches[4])) {$this->_isWillcom = true;}
        else                         {$this->_isPc = true;}
        $botRegex = "(?:"
                  . "Googlebot\-Mobile\/\d\.\d"
                  . "|"
                  . "Y!J\-(SRD|MBS)\/\d\.\d"
                  . "|"
                  . "LD_mobile_bot"
                  . "|"
                  . "ichiro\/mobile goo"
                  . "|"
                  . "moba\-crawler"
                  . "|"
                  . "symphonybot1\.froute\.jp"
                  . "|"
                  . "croozbot\/\d\.\d"
                  . ")";
        if (preg_match("/$botRegex/", $this->_ua)) {
            $this->_isBot = true;
        }
    }


    /**
     * 3G携帯判別
     */
    function _set3g()
    {
        // docomo
        if ($this->isDocomo()) {
            @list($main, $foma_or_comment) = explode(' ', $this->_ua, 2);
            // FOMA端末
            if ($foma_or_comment && !preg_match('/^\((.*)\)$/', $foma_or_comment)) {
                $this->is3g = true;
            }
        }

        // au
        else if ($this->isAu()) {
            if (preg_match('/^KDDI-(.*)/', $this->_ua, $matches)) {
                list($deviceID) = explode(' ', $matches[1], 1);
            } else {
                @list($browser) = explode(' ', $this->_ua, 1);
                list($name, $software) = explode('/', $browser);
                list($version, $deviceID) = explode('-', $software);
            }

            // WIN端末
            if (substr($deviceID, 2, 1) == 3) {
                $this->is3g = true;
            }
        }

        // softbank
        else if ($this->isSoftbank()) {
            $agent = explode(' ', $this->_ua);
            preg_match('!^(?:(SoftBank|Vodafone|J-PHONE)/\d\.\d|MOT-)!', $agent[0], $matches);
            if (count($matches) > 1) {
                $brand = $matches[1];
            } else {
                $brand = 'Motorola';
            }

            // 3GC端末
            if ($brand != 'J-PHONE') {
                $this->is3g = true;
            }
        }

        // willcom
        else if ($this->isWillcom()) {
            if (preg_match('/^Mozilla\/3\.0\(WILLCOM;/', $this->_ua)) {
                $this->is3g = true;
            }
        }
    }


    /**
     * 識別番号解析
     */
    function _setTerminalId()
    {
        if ($this->isDocomo()) {
            if (preg_match("/\/(ser[a-z0-9]{11})/i", $this->_ua, $matches)) {
                $this->_terminalId = $matches[1];
            }
            if (preg_match("/;(icc[a-z0-9]{20})/i", $this->_ua, $matches)) {
                $this->_terminalId = $matches[1];
            }
        } else if ($this->isAu()) {
            $this->_terminalId = isset($_SERVER['HTTP_X_UP_SUBNO']) ? $_SERVER['HTTP_X_UP_SUBNO'] : '';
        } else if ($this->isSoftbank()) {
            if (preg_match("/\/(SN[a-z0-9]{11,15}) /i", $this->_ua, $matches)) {
                 $this->_terminalId = $matches[1];
            }
        } else if ($this->isWillcom()) {
            if (isset($_COOKIE['terminal_id'])) {
                $utn = $_COOKIE['terminal_id'];
                setcookie('terminal_id', $utn, time()+60*60*24*30);
            } else {
                $utn = Rock_Utility::getSalt(10);
                setcookie('terminal_id', $utn, time()+60*60*24*30);
            }
        }
    }
}
?>

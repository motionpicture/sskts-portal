<?php
/**
 *  Rock_Emoji.php
 *
 *  @author     Hiroto Ogoh <dancho@Rock.com>
 *  @package    Rock
 */

require_once 'Carrier.php';

/**
 *  Rock_Emoji
 *
 *  @author     Hiroto Ogoh <dancho@Rock.com>
 *  @access     public
 *  @package    Rock
 */
class Rock_Emoji extends Rock_Carrier
{
    var $_imageUrl                 = '';
    var $_mapAu2Docomo             = array();
    var $_mapAu2Softbank           = array();
    var $_mapDocomo2Au             = array();
    var $_mapDocomo2Softbank       = array();
    var $_mapDocomo2WillcomMail    = array();
    var $_mapSoftbank2Au           = array();
    var $_mapSoftbank2Docomo       = array();
    var $_mapSoftbankForm2Softbank = array();


    function Rock_Emoji($imageUrl=null)
    {
        parent::Rock_Carrier();
        $this->_imageUrl = '/emoji/';
    }


    function convert($str, $fromCarrier) {
        switch ($fromCarrier) {
            case 'd':
                $str = $this->_toTagDocomo($str);
                break;
            case 'a':
                $str = $this->_toTagAu($str);
                break;
            case 's':
                $str = $this->_toTagSoftbank($str);
                break;
            case 'w':
                $str = $this->_toTagDocomo($str);
                break;
        }

        return $this->toString($str);
    }


    function toTag($str) {
        if ($this->isDocomo()) {$str = $this->_toTagDocomo($str);}
        if ($this->isAu()) {$str = $this->_toTagAu($str);}
        if ($this->isSoftbank()) {$str = $this->_toTagSoftbank($str);}
        if ($this->isWillcom()) {$str = $this->_toTagDocomo($str);}

        return $str;
    }


    function toString($str) {
        if ($this->isBot()) {$str = $this->_toStringBot($str);}
        else {
            if ($this->isDocomo()) {$str = $this->_toStringDocomo($str);}
            if ($this->isAu()) {$str = $this->_toStringAu($str);}
            if ($this->isSoftbank()) {$str = $this->_toStringSoftbank($str);}
            if ($this->isWillcom()) {$str = $this->_toStringDocomo($str);}
            if ($this->isPc()) {$str = $this->_toStringPc($str);}
        }

        return $str;
    }


    function toStringMail($str) {
        if ($this->isDocomo()) {$str = $this->_toStringMailDocomo($str);}
        if ($this->isAu()) {$str = $this->_toStringMailAu($str);}
        if ($this->isSoftbank()) {$str = $this->_toStringMailSoftbank($str);}
        if ($this->isWillcom()) {$str = $this->_toStringMailWillcom($str);}
        if ($this->isPc()) {$str = $this->_toStringMailPc($str);}

        return $str;
    }



    function _toTagDocomo($str) {
        $out = '';
        $strLen = strlen($str);
        for ($i = 0; $i < $strLen; $i++) {
            $char1 = ord(substr($str, $i, 1));
            $char2 = ord(substr($str, $i+1, 1));

            // 絵文字
            if ((($char1 == 0xF8) && ($char2 >= 0x9F && $char2 <= 0xFC)) ||
                (($char1 == 0xF9) && ($char2 >= 0x40 && $char2 <= 0xFC))) {

                $out .= '((d:'.dechex($char1).dechex($char2).'))';

                $i++;
                continue;
            }

            // 2バイトコード
            if (($char1 >= 0x80 && $char1 <= 0x9F) || ($char1 >= 0xE0 && $char1 <= 0xEF)) {
                $out .= substr($str, $i++, 2);
                continue;
            }

            // ASCIIコード
            $out .= chr($char1);
        }
        return $out;
    }

    function _toTagAu($str) {
        $str = $this->_toTagDocomo($str);

        $out = '';
        $strLen = strlen($str);
        for ($i = 0; $i < $strLen; $i++) {
            $char1 = ord(substr($str, $i, 1));
            $char2 = ord(substr($str, $i+1, 1));

            // 絵文字
            if (($char1 == 0xF3 || $char1 == 0xF4 || $char1 == 0xF6 || $char1 == 0xF7) &&
                ($char2 >= 0x40 && $char2 <= 0xFC)) {

                $out .= '((a:'.dechex($char1).dechex($char2).'))';

                $i++;
                continue;
            }

            // 2バイトコード
            if (($char1 >= 0x80 && $char1 <= 0x9F) || ($char1 >= 0xE0 && $char1 <= 0xEF)) {
                $out .= substr($str, $i++, 2);
                continue;
            }

            // ASCIIコード
            $out .= chr($char1);
        }

        return $out;
    }

    function _toTagSoftbank($str) {
        $out = '';

        $strLen = strlen($str);
        for ($i = 0; $i < $strLen; $i++) {
            $char1 = ord(substr($str, $i, 1));
            $char2 = ord(substr($str, $i+1, 1));
            $char3 = ord(substr($str, $i+2, 1));
            $char4 = ord(substr($str, $i+3, 1));
            $char5 = ord(substr($str, $i+4, 1));

            // 絵文字
            if ($char1 == 0x1B &&
                $char2 == 0x24 &&
                $char5 == 0x0f) {

                $out .= '((s:'.dechex($char3).dechex($char4).'))';

                $i += 4;
                continue;
            }

            // 2バイトコード
            if (($char1 >= 0x80 && $char1 <= 0x9F) || ($char1 >= 0xE0 && $char1 <= 0xEF)) {
                $out .= substr($str, $i++, 2);
                continue;
            }

            // ASCIIコード
            $out .= chr($char1);
        }

        $str = $out;


        $out = '';

        $strLen = strlen($str);
        for ($i = 0; $i < $strLen; $i++) {
            $char1 = ord(substr($str, $i, 1));
            $char2 = ord(substr($str, $i+1, 1));

            // 絵文字
            if (($char1 == 0xF7 &&
                (
                    ($char2 >= 0x41 && $char2 <= 0x7E) ||
                    ($char2 >= 0x80 && $char2 <= 0x9B) ||
                    ($char2 >= 0xA1 && $char2 <= 0xF9)
                )) ||
                ($char1 == 0xF9 &&
                (
                    ($char2 >= 0x41 && $char2 <= 0x7E) ||
                    ($char2 >= 0x80 && $char2 <= 0x9B) ||
                    ($char2 >= 0xA1 && $char2 <= 0xED)
                )) ||
                ($char1 == 0xFB &&
                (
                    ($char2 >= 0x41 && $char2 <= 0x8D) ||
                    ($char2 >= 0xA1 && $char2 <= 0xDE)
                ))
               ) {

                if (empty($this->map_f2s)){
                    $this->map_f2s = include('map/softbankForm2softbank.php');
                }
                $out .= '((s:'.$this->map_f2s[dechex($char1).dechex($char2)].'))';

                $i++;
                continue;
            }

            // 2バイトコード
            if (($char1 >= 0x80 && $char1 <= 0x9F) || ($char1 >= 0xE0 && $char1 <= 0xEF)) {
                $out .= substr($str, $i++, 2);
                continue;
            }

            // ASCIIコード
            $out .= chr($char1);
        }
        return $out;
    }


    function _toStringDocomo($str) {
        if (strpos($str,'((d:') !== false) {
            $str = preg_replace("/\(\(d:([0-9a-f]{2})([0-9a-f]{2})\)\)/e", "chr(hexdec('\\1')).chr(hexdec('\\2'))", $str);
        }

        if (strpos($str,'((a:') !== false) {
            if (empty($this->_mapAu2Docomo)){
                $this->_mapAu2Docomo = include('map/au2docomo.php');
            }
            preg_match_all("/\(\(a:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapAu2Docomo[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '<img src="'.$this->_imageUrl.'a/'.$v[1].'.gif" border="0" width="12" height="12" />';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((s:') !== false) {
            if (empty($this->_mapSoftbank2Docomo)){
                $this->_mapSoftbank2Docomo = include('map/softbank2docomo.php');
            }
            preg_match_all("/\(\(s:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapSoftbank2Docomo[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '<img src="'.$this->_imageUrl.'s/'.$v[1].'.gif" border="0" width="12" height="12" />';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        return $str;
    }


    function _toStringAu($str) {
        if (strpos($str,'((d:') !== false) {
            if (empty($this->_mapDocomo2Au)){
                $this->_mapDocomo2Au = include('map/docomo2au.php');
            }
            preg_match_all("/\(\(d:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapDocomo2Au[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '<img src="'.$this->_imageUrl.'d/'.$v[1].'.gif" border="0" width="12" height="12" />';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((a:') !== false) {
            $str = preg_replace("/\(\(a:([0-9a-f]{2})([0-9a-f]{2})\)\)/e", "chr(hexdec('\\1')).chr(hexdec('\\2'))", $str);
        }

        if (strpos($str,'((s:') !== false) {
            if (empty($this->_mapSoftbank2Au)){
                $this->_mapSoftbank2Au = include('map/softbank2au.php');
            }
            preg_match_all("/\(\(s:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapSoftbank2Au[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '<img src="'.$this->_imageUrl.'s/'.$v[1].'.gif" border="0" width="12" height="12" />';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        return $str;
    }


    function _toStringSoftbank($str) {
        if (strpos($str,'((d:') !== false) {
            if (empty($this->_mapDocomo2Softbank)){
                $this->_mapDocomo2Softbank = include('map/docomo2softbank.php');
            }
            preg_match_all("/\(\(d:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapDocomo2Softbank[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '<img src="'.$this->_imageUrl.'d/'.$v[1].'.gif" border="0" width="12" height="12" />';
                }
                if (strlen($code) === 4) {
                    $replace = chr(27) . chr(36) . chr(hexdec(substr($code, 0, 2)))
                        . chr(hexdec(substr($code, 2, 2))) . chr(15);
                }
                if (strlen($code) === 8) {
                    $replace = chr(27) . chr(36) . chr(hexdec(substr($code, 0, 2)))
                        . chr(hexdec(substr($code, 2, 2))) . chr(15)
                        . chr(27) . chr(36) . chr(hexdec(substr($code, 4, 2)))
                        . chr(hexdec(substr($code, 6, 2))) . chr(15);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((a:') !== false) {
            if (empty($this->_mapAu2Softbank)){
                $this->_mapAu2Softbank = include('map/au2softbank.php');
            }
            preg_match_all("/\(\(a:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapAu2Softbank[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '<img src="'.$this->_imageUrl.'a/'.$v[1].'.gif" border="0" width="12" height="12" />';
                }
                if (strlen($code) === 4) {
                    $replace = chr(27) . chr(36) . chr(hexdec(substr($code, 0, 2)))
                        . chr(hexdec(substr($code, 2, 2))) . chr(15);
                }
                if (strlen($code) === 8) {
                    $replace = chr(27) . chr(36) . chr(hexdec(substr($code, 0, 2)))
                        . chr(hexdec(substr($code, 2, 2))) . chr(15)
                        . chr(27) . chr(36) . chr(hexdec(substr($code, 4, 2)))
                        . chr(hexdec(substr($code, 6, 2))) . chr(15);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((s:') !== false) {
            $str = preg_replace("/\(\(s:([0-9a-f]{2})([0-9a-f]{2})\)\)/e", "chr(27).chr(36).chr(hexdec('\\1')).chr(hexdec('\\2')).chr(15)", $str);
        }

        return $str;
    }


    function _toStringBot($str) {
        if (strpos($str,'((d:') !== false) {
            if (empty($this->_mapDocomo2Bot)){
                $this->_mapDocomo2Bot = include('map/docomo2bot.php');
            }
            preg_match_all("/\(\(d:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapDocomo2Bot[$v[1]];

                $str = str_replace($v[0], $code, $str);
            }
        }

        return $str;
    }


    function _toStringPc($str) {
        if (strpos($str,'((d:') !== false || strpos($str,'((a:') !== false || strpos($str,'((s:') !== false) {
            $str = preg_replace("/\(\(((?:d|a|s)):([0-9a-f]{4})\)\)/", '<img src="'.$this->_imageUrl.'$1/$2.gif" border="0" width="12" height="12" />', $str);
        }

        return $str;
    }


    function _toStringMailDocomo($str) {
        if (strpos($str,'((d:') !== false) {
            $str = preg_replace("/\(\(d:([0-9a-f]{2})([0-9a-f]{2})\)\)/e", "chr(hexdec('\\1')).chr(hexdec('\\2'))", $str);
        }

        if (strpos($str,'((a:') !== false) {
            if (empty($this->_mapAu2Docomo)){
                $this->_mapAu2Docomo = include('map/au2docomo.php');
            }
            preg_match_all("/\(\(a:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapAu2Docomo[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '  ';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);

                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((s:') !== false) {
            if (empty($this->_mapSoftbank2Docomo)){
                $this->_mapSoftbank2Docomo = include('map/softbank2docomo.php');
            }
            preg_match_all("/\(\(s:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapSoftbank2Docomo[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '  ';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);

                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        return $str;
    }


    function _toStringMailAu($str) {
        if (strpos($str,'((d:') !== false) {
            if (empty($this->_mapDocomo2Au)){
                $this->_mapDocomo2Au = include('map/docomo2au.php');
            }
            preg_match_all("/\(\(d:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapDocomo2Au[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '  ';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);

                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((a:') !== false) {
            $str = preg_replace("/\(\(a:([0-9a-f]{2})([0-9a-f]{2})\)\)/e", "chr(hexdec('\\1')).chr(hexdec('\\2'))", $str);
        }

        if (strpos($str,'((s:') !== false) {
            if (empty($this->_mapSoftbank2Au)){
                $this->_mapSoftbank2Au = include('map/softbank2au.php');
            }
            preg_match_all("/\(\(s:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapSoftbank2Au[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '  ';
                }
                if (strlen($code) === 4) {
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $replace = pack('H*',$code);

                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        return $str;
    }


    function _toStringMailSoftbank($str) {
        if (empty($this->mapSoftbank2SoftbankMail)){
            $this->mapSoftbank2SoftbankMail = include('map/softbank2softbankMail.php');
        }

        if (strpos($str,'((d:') !== false) {
            if (empty($this->_mapDocomo2Softbank)){
                $this->_mapDocomo2Softbank = include('map/docomo2softbank.php');
            }
            preg_match_all("/\(\(d:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapDocomo2Softbank[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '  ';
                }
                if (strlen($code) === 4) {
                    $code = $this->mapSoftbank2SoftbankMail[$code];
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $code = $this->mapSoftbank2SoftbankMail[substr($code, 0, 4)] . $this->mapSoftbank2SoftbankMail[substr($code, 4, 4)];
                    $replace = pack('H*',$code);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((a:') !== false) {
            if (empty($this->_mapAu2Softbank)){
                $this->_mapAu2Softbank = include('map/au2softbank.php');
            }
            preg_match_all("/\(\(a:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapAu2Softbank[$v[1]];

                if (strlen($code) === 0) {
                    $replace = '  ';
                }
                if (strlen($code) === 4) {
                    $code = $this->mapSoftbank2SoftbankMail[$code];
                    $replace = pack('H*',$code);
                }
                if (strlen($code) === 8) {
                    $code = $this->mapSoftbank2SoftbankMail[substr($code, 0, 4)] . $this->mapSoftbank2SoftbankMail[substr($code, 4, 4)];
                    $replace = pack('H*',$code);
                }

                $str = str_replace($v[0], $replace, $str);
            }
        }

        if (strpos($str,'((s:') !== false) {
            preg_match_all("/\(\(s:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->mapSoftbank2SoftbankMail[$v[1]];
                $replace = pack('H*',$code);

                $str = str_replace($v[0], $replace, $str);
            }
        }

        return $str;
    }


    function _toStringMailWillcom($str) {
        if (strpos($str,'((d:') !== false) {
            if (empty($this->_mapDocomo2WillcomMail)){
                $this->_mapDocomo2WillcomMail = include('map/docomo2willcomMail.php');
            }
            preg_match_all("/\(\(d:([0-9a-f]{4})\)\)/", $str, $matches, PREG_SET_ORDER);

            foreach ($matches as $v) {
                $code = $this->_mapDocomo2WillcomMail[$v[1]];

                $str = str_replace($v[0], $code, $str);
            }
        }

        return $str;
    }


    function _toStringMailPc($str) {
        if (strpos($str,'((d:') !== false || strpos($str,'((a:') !== false || strpos($str,'((s:') !== false) {
            $str = preg_replace("/\(\(((?:d|a|s)):([0-9a-f]{4})\)\)/", '  ', $str);
        }

        return $str;
    }
}
?>

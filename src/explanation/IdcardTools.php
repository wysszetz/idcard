<?php


namespace Idcard\explanation;


class IdcardTools
{
    private $init;
    private $idcard = '';

    public function __construct($init)
    {
        $this->init = $init;
        $this->idcard = $this->init->getParams('idcard');
    }

    /**
     * 15位身份证号码转18位长度号码
     * @return string
     */
    public function get18LengthFrom15Length()
    {
        // 若是15位，则转换成18位；否则直接返回ID
        if (15 == strlen($this->idcard)) {
            $W = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1);
            $A = array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2");
            $s = 0;
            $idCard18 = substr(self::$idcard, 0, 6) . "19" . substr($this->idcard, 6);
            $idCard18_len = strlen($idCard18);
            for ($i = 0; $i < $idCard18_len; $i++) {
                $s = $s + substr($idCard18, $i, 1) * $W [$i];
            }
            $idCard18 .= $A [$s % 11];
            return $idCard18;
        } else {
            return $this->idcard;
        }
    }

    public function getIdcardFormat($format = '*', $left = 4, $right = 4)
    {
        $left = intval($left) >= 0 ? $left : 4;
        $right = intval($right) >= 0 ? $right : 4;

        if (($left + $right) > 18)
            $left = $right = 4;


        $sublen = mb_strlen($this->idcard, 'UTF-8') - $left - $right;
        return mb_substr($this->idcard, 0, $left, 'UTF-8') . str_repeat($format, $sublen) . mb_substr($this->idcard, $sublen + $left, null, 'UTF-8');
    }

}
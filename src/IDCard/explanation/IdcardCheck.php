<?php
/**
 * 检查身份证号码是否正确.
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:46
 */

namespace Idcard\explanation;


class IdcardCheck
{
    private $init;

    private $idcard = '';

    public function __construct($init)
    {
        $this->init = $init;
        $this->idcard = $this->init->getParams('idcard');
    }

    /**
     * 检查身份证号码是否正确
     * @return bool
     */
    public function check()
    {
        $vCity = array(
            '11', '12', '13', '14', '15', '21', '22',
            '23', '31', '32', '33', '34', '35', '36',
            '37', '41', '42', '43', '44', '45', '46',
            '50', '51', '52', '53', '54', '61', '62',
            '63', '64', '65', '71', '81', '82'
        );

        if (!preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $this->idcard)) return false;

        if (!in_array(substr($this->idcard, 0, 2), $vCity)) return false;

        $this->idcard = preg_replace('/[xX]$/i', 'a', $this->idcard);
        $vLength = strlen($this->idcard);

        if ($vLength == 18) {
            $vBirthday = substr($this->idcard, 6, 4) . '-' . substr($this->idcard, 10, 2) . '-' . substr($this->idcard, 12, 2);
        } else {
            $vBirthday = '19' . substr($this->idcard, 6, 2) . '-' . substr($this->idcard, 8, 2) . '-' . substr($this->idcard, 10, 2);
        }

        if (date('Y-m-d', strtotime($vBirthday)) != $vBirthday) return false;
        if ($vLength == 18) {
            $vSum = 0;

            for ($i = 17; $i >= 0; $i--) {
                $vSubStr = substr($this->idcard, 17 - $i, 1);
                $vSum += (pow(2, $i) % 11) * (($vSubStr == 'a') ? 10 : intval($vSubStr, 11));
            }

            if ($vSum % 11 != 1) return false;
        }
        return true;
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
            $idCard18 = substr($this->idcard, 0, 6) . "19" . substr($this->idcard, 6);
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
}
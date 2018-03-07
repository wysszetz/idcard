<?php
/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:52
 */

namespace idcard\explanation;


class IdcardAge
{
    private $init;

    private $idcard = '';

    public function __construct($init)
    {
        $this->init = $init;
        $this->idcard = $this->init->getParams('idcard');
    }

    /**
     * 获取年龄
     * @return bool|false|int|string
     */
    public function getAge()
    {
        $birth_year = substr($this->idcard, 6, 4);
        $year = date('Y');
        $diff_year = $year - $birth_year;

        $birth_month = substr($this->idcard, 10, 2);
        $month = date('m');

        if ($month == $birth_month) {
            $birth_day = substr($this->idcard, 12, 2);
            $day = date('d');
            if ($birth_day > $day) {
                $age = $diff_year - 1;
            } else {
                $age = $diff_year;
            }
        } else if ($month > $birth_month) {
            $age = $diff_year;
        } else if ($month < $birth_month) {
            $age = $diff_year - 1;
        }
        return $age;
    }

    /**
     * 获取生日
     * @param string $format
     * @return false|string
     */
    public function getBirthday($format = 'Y-m-d')
    {
        return date($format, strtotime($this->getBirthdayString()));
    }

    /**
     * 获取出生年
     * @return false|string
     */
    public function getBirthdayYear()
    {
        return $this->getBirthday('Y');
    }

    /**
     * 获取出生月
     * @return false|string
     */
    public function getBirthdayMonth()
    {
        return $this->getBirthday('m');
    }

    /**
     * 获取出生日
     * @return false|string
     */
    public function getBirthdayDay()
    {
        return $this->getBirthday('d');
    }

    /**
     * 获取身份证号码中生日信息
     * @return bool|string
     */
    private function getBirthdayString()
    {
        return substr($this->idcard, 6, 8);
    }

    /**
     * 获取生肖
     * @return string
     */
    public function getChineseZodiac()
    {
        $start = 1901;
        $end = $end = (int)substr($this->idcard, 6, 4);
        $x = ($start - $end) % 12;
        $value = "";
        if ($x == 1 || $x == -11) {
            $value = "鼠";
        }
        if ($x == 0) {
            $value = "牛";
        }
        if ($x == 11 || $x == -1) {
            $value = "虎";
        }
        if ($x == 10 || $x == -2) {
            $value = "兔";
        }
        if ($x == 9 || $x == -3) {
            $value = "龙";
        }
        if ($x == 8 || $x == -4) {
            $value = "蛇";
        }
        if ($x == 7 || $x == -5) {
            $value = "马";
        }
        if ($x == 6 || $x == -6) {
            $value = "羊";
        }
        if ($x == 5 || $x == -7) {
            $value = "猴";
        }
        if ($x == 4 || $x == -8) {
            $value = "鸡";
        }
        if ($x == 3 || $x == -9) {
            $value = "狗";
        }
        if ($x == 2 || $x == -10) {
            $value = "猪";
        }
        return $value;
    }

    /**
     * 获取星座
     * @return string
     */
    public function getConstellation()
    {
        $bir = substr($this->idcard, 10, 4);
        $month = (int)substr($bir, 0, 2);
        $day = (int)substr($bir, 2);
        $strValue = '';
        if (($month == 1 && $day <= 21) || ($month == 2 && $day <= 19)) {
            $strValue = "水瓶座";
        } else if (($month == 2 && $day > 20) || ($month == 3 && $day <= 20)) {
            $strValue = "双鱼座";
        } else if (($month == 3 && $day > 20) || ($month == 4 && $day <= 20)) {
            $strValue = "白羊座";
        } else if (($month == 4 && $day > 20) || ($month == 5 && $day <= 21)) {
            $strValue = "金牛座";
        } else if (($month == 5 && $day > 21) || ($month == 6 && $day <= 21)) {
            $strValue = "双子座";
        } else if (($month == 6 && $day > 21) || ($month == 7 && $day <= 22)) {
            $strValue = "巨蟹座";
        } else if (($month == 7 && $day > 22) || ($month == 8 && $day <= 23)) {
            $strValue = "狮子座";
        } else if (($month == 8 && $day > 23) || ($month == 9 && $day <= 23)) {
            $strValue = "处女座";
        } else if (($month == 9 && $day > 23) || ($month == 10 && $day <= 23)) {
            $strValue = "天秤座";
        } else if (($month == 10 && $day > 23) || ($month == 11 && $day <= 22)) {
            $strValue = "天蝎座";
        } else if (($month == 11 && $day > 22) || ($month == 12 && $day <= 21)) {
            $strValue = "射手座";
        } else if (($month == 12 && $day > 21) || ($month == 1 && $day <= 20)) {
            $strValue = "魔羯座";
        }
        return $strValue;
    }
}
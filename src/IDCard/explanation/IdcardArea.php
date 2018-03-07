<?php
/**
 * 获取归属
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午4:30
 */

namespace Idcard\explanation;


class IdcardArea
{
    private $init;

    private $idcard = '';

    //城市编码
    private $hometownArr = array();

    public function __construct($init)
    {
        $this->init = $init;
        $this->idcard = $this->init->getParams('idcard');
        $this->hometownArr = require_once dirname(__FILE__) . '../config/hometown.php';
    }

    /**
     * 获取省份
     * @return mixed|string
     */
    public function getProvince()
    {
        return $this->getInfo(2);
    }

    /**
     * 获取城市
     * @return mixed|string
     */
    public function getCity()
    {
        return $this->getInfo(4);
    }

    /**
     * 获取全部地址
     * @return mixed|string
     */
    public function getArea()
    {
        return $this->getInfo(6);
    }

    private function getCode($length)
    {
        $num = (int)substr($this->idcard, 0, $length);
        return str_pad($num, 6, 0, STR_PAD_RIGHT);

    }

    private function getInfo($length)
    {
        $key = $this->getCode($length);
        return isset($this->hometownArr[$key]) ? $this->hometownArr[$key] : '';
    }


}
<?php
/**
 * 判断性别.
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午4:00
 */

namespace Idcard\explanation;


class IdcardGender
{
    private $init;

    private $idcard = '';

    public function __construct($init)
    {
        $this->init = $init;
        $this->idcard = $this->init->getParams('idcard');
    }

    /**
     * 判断性别
     * @return string
     */
    public function getGender()
    {
        $sexint = (int)substr($this->idcard, 16, 1);
        return $sexint % 2 === 0 ? '女' : '男';
    }
}
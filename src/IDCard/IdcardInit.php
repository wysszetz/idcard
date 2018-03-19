<?php
/**
 * 身份证解读初始化
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:39
 */

namespace Idcard;


use Idcard\exceptions\IdcardExceptions;
use Idcard\explanation\IdcardAge;
use Idcard\explanation\IdcardArea;
use Idcard\explanation\IdcardCheck;
use Idcard\explanation\IdcardSex;

class IdcardInit
{
    //初始化参数：身份证号码
    private $idcard = '';

    /**
     * IdcardInit constructor.
     * @param $idcard
     * @throws IdcardExceptions
     */
    public function __construct($idcard)
    {
        if (empty($idcard)) {
            throw new IdcardExceptions(ERR_PARAMS_CONTENT, ERR_PARAMS);
        }
        //判断身份证号码长度是否为15位或者18位
        $length = strlen($idcard);
        if ($length != 15 || $length != 18) {
            throw new IdcardExceptions(ERR_IDCARD_LENGTH_CONTENT, ERR_IDCARD_LENGTH);
        }
        $this->idcard = $idcard;
    }

    /**
     * 获取参数
     * @param $key
     * @return mixed
     */
    public function getParams($key)
    {
        return $this->$key;
    }

    /**
     * 方法入口集成
     * @param $scenes
     * @return IdcardAge|IdcardArea|IdcardCheck|IdcardSex
     * @throws IdcardExceptions
     */
    public function getPlat($scenes)
    {
        switch ($scenes) {
            case 'check':
                $obj = $this->check();
                break;
            case 'birth':
                $obj = $this->getAge();
                break;
            case 'area':
                $obj = $this->getArea();
                break;
            case 'sex':
                $obj = $this->getSex();
                break;
            default:
                throw new IdcardExceptions(ERR_PLAT_CONTENT, ERR_PLAT);
                break;
        }
        return $obj;
    }

    /**
     * 检查身份证号码是否正确
     * @return IdcardCheck
     */
    public function check()
    {
        return new IdcardCheck($this);
    }

    /**
     * 解读身份证年龄、出生年月等信息
     * @return IdcardAge
     * @throws IdcardExceptions
     */
    public function getAge()
    {
        if ($this->check()->check()) {
            return new IdcardAge($this);
        } else {
            throw new IdcardExceptions(ERR_CHECK_CONTENT, ERR_CHECK);
        }

    }

    /**
     * 解读身份证性别
     * @return IdcardSex
     * @throws IdcardExceptions
     */
    public function getSex()
    {
        if ($this->check()->check()) {
            return new IdcardSex($this);
        } else {
            throw new IdcardExceptions(ERR_CHECK_CONTENT, ERR_CHECK);
        }

    }

    /**
     * 解析地域
     * @return IdcardArea
     * @throws IdcardExceptions
     */
    public function getArea()
    {
        if ($this->check()->check()) {
            return new IdcardArea($this);
        } else {
            throw new IdcardExceptions(ERR_CHECK_CONTENT, ERR_CHECK);
        }

    }
}
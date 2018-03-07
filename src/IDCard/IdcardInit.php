<?php
/**
 * 身份证解读初始化
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:39
 */

namespace idcard;


use idcard\exceptions\IdcardExceptions;
use idcard\explanation\IdcardAge;
use idcard\explanation\IdcardCheck;
use idcard\explanation\IdcardSex;

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
     */
    public function getAge()
    {
        $this->check()->check();
        return new IdcardAge($this);
    }

    /**
     * 解读身份证性别
     * @return IdcardSex
     */
    public function getSex()
    {
        $this->check()->check();
        return new IdcardSex($this);
    }
}
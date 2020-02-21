<?php
/**
 * 身份证解读初始化
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:39
 */

namespace Idcard;


use Idcard\exceptions\IdcardExceptions;
use Idcard\explanation\IdcardBirth;
use Idcard\explanation\IdcardArea;
use Idcard\explanation\IdcardCheck;
use Idcard\explanation\IdcardGender;
use Idcard\explanation\IdcardTools;

class IdcardInit
{
    //初始化参数：身份证号码
    private $idcard = '';

    //检查身份证号是否正确
    private $check = false;

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
        if ($length != 15 && $length != 18) {
            throw new IdcardExceptions(ERR_IDCARD_LENGTH_CONTENT, ERR_IDCARD_LENGTH);
        }
        $this->idcard = $idcard;

        //对身份证号码进行检测判断
        $check = new IdcardCheck($this);
        $this->check = $check->check();
        if (!$this->check) {
            throw new IdcardExceptions(ERR_CHECK_CONTENT, ERR_CHECK);
        }
    }

    /**
     * 获取生日信息
     * @return IdcardBirth
     */
    public function birth()
    {
        return new IdcardBirth($this);
    }

    /**
     * 获取地域信息
     * @return IdcardArea
     */
    public function area()
    {
        return new IdcardArea($this);
    }

    /**
     * 获取性别信息
     * @return IdcardGender
     */
    public function gender()
    {
        return new IdcardGender($this);
    }

    /**
     * 特殊工具
     * @return IdcardTools
     */
    public function tools()
    {
        return new IdcardTools($this);
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
}
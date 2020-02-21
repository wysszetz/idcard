<?php
/**
 * 异常信息.
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:40
 */

namespace Idcard\exceptions;


use Throwable;

class IdcardExceptions extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

define('ERR_PARAMS', 10001);
define('ERR_PARAMS_CONTENT', '参数异常');
define('ERR_CHECK', 10002);
define('ERR_CHECK_CONTENT', '身份证检验无效');
define('ERR_IDCARD_LENGTH', 10003);
define('ERR_IDCARD_LENGTH_CONTENT', '身份证号码长度异常，请输入15位或者18位长度');
define('ERR_PLAT', 10004);
define('ERR_PLAT_CONTENT', '请确认获取身份证信息解读场景');
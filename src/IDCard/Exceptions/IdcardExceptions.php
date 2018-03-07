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
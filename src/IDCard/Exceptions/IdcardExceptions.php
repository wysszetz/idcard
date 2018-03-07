<?php
/**
 * 异常信息.
 * User: wangyi
 * Date: 2018/3/7
 * Time: 下午3:40
 */

namespace idcard\exceptions;


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
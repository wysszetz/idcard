<?php
/**
 * Created by PhpStorm.
 * User: wangyi
 * Date: 2018/3/17
 * Time: 上午11:52
 */

namespace Idcard\Tests;

use Idcard\IdcardInit;
use PHPUnit\Framework\TestCase;

class IdcardCheckTest extends TestCase
{
    public function testCheck()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $this->assertTrue($idcardObj->getParams('check') ? true : false);
        $this->assertEquals($idcard, $idcardObj->getParams('idcard'));
    }


}
<?php


namespace Idcard\Tests\IDCard;


use Idcard\IdcardInit;
use PHPUnit\Framework\TestCase;

class IdcardToolsTest extends TestCase
{
    public function testIdcardFormat()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $toolsObj = $idcardObj->tools();
        $this->assertEquals('1301**********8697', $toolsObj->getIdcardFormat());

    }
}
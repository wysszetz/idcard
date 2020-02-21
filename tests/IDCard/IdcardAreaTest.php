<?php


namespace Idcard\Tests\IDCard;


use Idcard\IdcardInit;
use PHPUnit\Framework\TestCase;

class IdcardAreaTest extends TestCase
{
    public function testArea()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $areaObj = $idcardObj->area();
        $this->assertEquals('河北省石家庄市长安区', $areaObj->getArea());
    }

    public function testProvince()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $areaObj = $idcardObj->area();
        $this->assertEquals('河北省', $areaObj->getProvince());
    }

    public function testCity()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $areaObj = $idcardObj->area();
        $this->assertEquals('河北省石家庄市', $areaObj->getCity());
    }
}
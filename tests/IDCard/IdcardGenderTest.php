<?php


namespace Idcard\Tests\IDCard;


use Idcard\IdcardInit;
use PHPUnit\Framework\TestCase;

class IdcardGenderTest extends TestCase
{
    public function testMale()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $gender = $idcardObj->gender();
        $this->assertEquals('男', $gender->getGender());
    }

    public function testFemale()
    {
        $idcard = '110101199003071946';
        $idcardObj = new IdcardInit($idcard);
        $gender = $idcardObj->gender();
        $this->assertEquals('女', $gender->getGender());
    }
}
<?php


namespace Idcard\Tests\IDCard;


use Idcard\IdcardInit;
use PHPUnit\Framework\TestCase;

class IdcardBirthTest extends TestCase
{
    public function testBirthdayInfo()
    {
        $idcard = '130102199003078697';
        $idcardObj = new IdcardInit($idcard);
        $birthObj = $idcardObj->birth();
        $this->assertEquals($idcard, $birthObj->getIdCardBirthInfo()->idcard);
        $this->assertEquals(29, $birthObj->getIdCardBirthInfo()->age);
        $this->assertEquals('1990-03-07', $birthObj->getIdCardBirthInfo()->birthday);
        $this->assertEquals('1990', $birthObj->getIdCardBirthInfo()->birthday_year);
        $this->assertEquals('03', $birthObj->getIdCardBirthInfo()->birthday_month);
        $this->assertEquals('07', $birthObj->getIdCardBirthInfo()->birthday_day);
        $this->assertEquals('马', $birthObj->getIdCardBirthInfo()->chinese_zodiac);
        $this->assertEquals('双鱼座', $birthObj->getIdCardBirthInfo()->constellation);
    }
}
<?php

namespace test\Workshop\Auction\Domain\Entity;

use DateTime;
use Workshop\Auction\Domain\Value\Bid;
use Workshop\Auction\Domain\Value\Money;
use Workshop\Auction\Domain\Value\UserId;

class BidTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_belong_to_user()
    {
        $userId = UserId::generate();
        $money = Money::fromValues(123, 'EUR');

        $bid = Bid::fromValues($userId, $money, new DateTime());

        $this->assertInstanceOf(Bid::class, $bid);
        $this->assertEquals($userId, $bid->getUserID());
        $this->assertEquals($money, $bid->getPrice());
    }

    /**
     * @test
     */
    public function it_could_be_restored_from_string()
    {
        $string = '1234567890';
        $userId = UserId::fromString($string);

        $this->assertInstanceOf(UserId::class, $userId);
        $this->assertEquals($string, $userId->toString());

        return $userId;
    }

    /**
     * @test
     * @depends it_could_be_restored_from_string
     *
     * @param UserId $userId
     */
    public function it_could_be_casted_to_string(UserId $userId)
    {
        $this->assertInternalType('string', (string) $userId);
        $this->assertEquals($userId->toString(), (string) $userId);
    }
}

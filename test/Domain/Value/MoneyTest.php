<?php

namespace test\Workshop\Auction\Domain\Value;

use Workshop\Auction\Domain\Value\Money;

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_created()
    {
        $cents = 1234;
        $currency = 1234;

        $money = Money::fromValues($cents, $currency);

        $this->assertEquals($cents, $money->getAmount());
        $this->assertEquals($currency, $money->getCurrency());
    }

    /**
     * @test
     */
    public function it_returns_formatted_value()
    {
        $amount = 123;
        $currency = 'EUR';

        $money = Money::fromValues($amount, $currency);

        $this->assertRegExp('#^[\d]+\.[\d]{2} EUR$#', $money->format());
    }
}

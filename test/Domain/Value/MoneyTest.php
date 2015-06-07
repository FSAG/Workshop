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
        $currency = 'EUR';

        $money = Money::fromValues($cents, $currency, 3);

        $this->assertEquals($cents, $money->getAmount());
        $this->assertEquals($currency, $money->getCurrency());

        return $money;
    }

    /**
     * @test
     * @depends it_can_be_created
     *
     * @param Money $money
     */
    public function it_returns_formatted_value(Money $money)
    {
        $fraction = $money->getFraction();

        $this->assertRegExp('#^\d+\.\d{'. $fraction .'} EUR#', $money->format());
    }
}

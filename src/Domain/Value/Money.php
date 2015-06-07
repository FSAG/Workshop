<?php

namespace Workshop\Auction\Domain\Value;

final class Money
{
    /**
     * Lowest fraction (Eg. cents).
     *
     * @var int
     */
    private $amount;
    /**
     * @var string
     */
    private $currency;

    /**
     * @param int $amount
     * @param string $currency
     * @param int $fraction
     *
     * @return Money
     */
    public static function fromValues($amount, $currency, $fraction = 2)
    {
        return new self($amount, $currency, $fraction);
    }

    /**
     * @param int $amount
     * @param string $currency
     * @param int $fraction
     */
    private function __construct($amount, $currency, $fraction)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->fraction = $fraction;
    }

    /**
     * @return UserId
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    public function format()
    {
        $amount = $this->amount * pow(10, 0 - $this->fraction);

        return number_format($amount, $this->fraction, '.', '') .' '. $this->currency;
    }
}

<?php

namespace Workshop\Auction\Domain\Value;

final class Money
{
    /**
     * Lowest fraction value (Eg. cents).
     *
     * @var int
     */
    private $amount;
    /**
     * @var int
     */
    private $fraction;
    /**
     * @var string
     */
    private $currency;

    /**
     * @param int    $amount
     * @param string $currency
     * @param int    $fraction
     *
     * @return Money
     */
    public static function fromValues($amount, $currency, $fraction = 2)
    {
        $self = new self();

        $self->amount = (int) $amount;
        $self->currency = strtoupper($currency);
        $self->fraction = max(0, (int) $fraction);

        return $self;
    }

    /**
     * Disabled in favor of named constructors.
     */
    final private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getFraction()
    {
        return $this->fraction;
    }

    /**
     * @return string
     */
    public function format()
    {
        $amount = $this->amount * pow(10, 0 - $this->fraction);

        return number_format($amount, $this->fraction).' '.$this->currency;
    }

    /**
     * @param Money $that
     *
     * @return int 0 if equals, -1 if less, 1 if more
     *
     * @throws \InvalidArgumentException
     */
    public function compare(Money $that)
    {
        if (strcmp($this->currency, $that->currency)) {
            throw new \InvalidArgumentException('Different currency used');
        }

        if ($this->fraction !== $that->fraction) {
            throw new \InvalidArgumentException('Different fraction used');
        }

        if ($this->getAmount() === $that->getAmount()) {
            return 0;
        }

        return $that->getAmount() < $this->getAmount() ? -1 : 1;
    }
}

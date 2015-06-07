<?php

namespace Workshop\Auction\Domain\Value;

final class AuctionId
{
    /**
     * @var
     */
    private $value;

    /**
     * @return AuctionId
     */
    public static function generate()
    {
        $random = sprintf('a%s%s', time(),  mt_rand(100, 999));
        return new self($random);
    }

    /**
     * @param string $string
     * @return AuctionId
     */
    public static function fromString($string)
    {
        return new self($string);
    }

    /**
     * @todo add assertion
     *
     * @param $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }
}

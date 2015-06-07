<?php

namespace Workshop\Auction\Domain\Value;

use DateTime;

final class Bid
{
    /**
     * @var UserId
     */
    private $userId;
    /**
     * @var Money
     */
    private $price;
    /**
     * @var DateTime
     */
    private $time;

    /**
     * @param UserId   $userId
     * @param Money    $price
     * @param DateTime $time
     *
     * @return Bid
     */
    public static function fromValues(UserId $userId, Money $price, DateTime $time)
    {
        $self = new self();

        $self->userId = $userId;
        $self->price = $price;
        $self->time = $time;

        return $self;
    }

    /**
     * Disabled in favor of named constructors.
     */
    final private function __construct()
    {
    }

    /**
     * @return UserId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return Money
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
}

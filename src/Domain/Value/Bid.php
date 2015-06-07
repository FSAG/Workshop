<?php

namespace Workshop\Auction\Domain\Value;

use DateTime;

class Bid
{
    /**
     * @var UserId
     */
    private $userId;
    /**
     * @var Money
     */
    private $value;

    /**
     * @param UserId $userId
     * @param Money $value
     *
     * @return Bid
     */
    public static function fromValues(UserId $userId, Money $value)
    {
        return new self($userId, $value);
    }

    /**
     * @param UserId $userId
     * @param Money $value
     */
    function __construct(UserId $userId, Money $value)
    {
        $this->userId = $userId;
        $this->value = $value;
        $this->time = new DateTime();
    }

    /**
     * @return UserId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
}

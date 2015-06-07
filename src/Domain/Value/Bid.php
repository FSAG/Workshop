<?php

namespace Workshop\Auction\Domain\Value;

class Bid
{
    /**
     * @var UserId
     */
    private $userId;
    /**
     * @var float
     */
    private $value;

    /**
     * @param UserId $userId
     * @param float $value
     *
     * @return Bid
     */
    public static function fromValues(UserId $userId, $value)
    {
        $value = (float) $value;
        return new self($userId, $value);
    }

    /**
     * @param UserId $userId
     * @param $value
     */
    function __construct(UserId $userId, $value)
    {
        $this->userId = $userId;
        $this->value = $value;
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
}

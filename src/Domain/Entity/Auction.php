<?php

namespace Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Value\AuctionId;
use Workshop\Auction\Domain\Value\UserId;
use DateTime;

class Auction
{
    /**
     * @var AuctionId
     */
    private $id;
    /**
     * @var userId
     */
    private $ownerId;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var DateTime
     */
    private $startTime;
    /**
     * @var DateTime
     */
    private $endTime;

    /**
     * @param AuctionId $id
     * @param UserId $ownerId
     * @param DateTime $startTime
     * @param DateTime $endTime
     *
     * @return Auction
     */
    public static function register(AuctionId $id, UserId $ownerId, DateTime $startTime, DateTime $endTime)
    {
        $self = new static();

        $self->id = $id;
        $self->ownerId = $ownerId;
        $self->startTime = $startTime;
        $self->endTime = $endTime;

        return $self;
    }

    final private function __construct()
    {
    }


    /**
     * @return AuctionId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return UserId
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @return DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }
}

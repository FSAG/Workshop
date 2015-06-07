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
     * @todo add assertion
     *
     * @param string $title
     * @param string $description
     * @param DateTime $startTime
     * @param DateTime $endTime
     */
    final private function __construct($title, $description, DateTime $startTime, DateTime $endTime)
    {
        $this->title = $title;
        $this->description = $description;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * @param AuctionId $id
     * @param UserId $ownerId
     * @param string $title
     * @param string $description
     * @param DateTime $startTime
     * @param DateTime $endTime
     *
     * @return Auction
     */
    public static function createByUser(AuctionId $id, UserId $ownerId, $title, $description, DateTime $startTime, DateTime $endTime)
    {
        $self = new static($title, $description, $startTime, $endTime);

        $self->id = $id;
        $self->ownerId = $ownerId;

        return $self;
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

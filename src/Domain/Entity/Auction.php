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
     * @param UserId $userId
     * @param string $title
     * @param string $description
     * @param DateTime $startTime
     * @param DateTime $endTime
     * @return static
     */
    public static function register(UserId $userId, $title, $description, DateTime $startTime, DateTime $endTime)
    {
        $self = new static($title, $description, $startTime, $endTime);

        $self->ownerId = $userId;

        return $self;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getTitle()
    {}

    /**
     * {@inheritdoc}
     *
     */
    public function getDescription()
    {}

    /**
     * {@inheritdoc}
     *
     */
    public function getStartTime()
    {}

    /**
     * {@inheritdoc}
     *
     */
    public function getEndTime()
    {}

}

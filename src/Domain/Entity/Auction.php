<?php

namespace Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Exception\ArticleAlreadyAddedException;
use Workshop\Auction\Domain\Exception\DomainException;
use Workshop\Auction\Domain\Value\Article;
use Workshop\Auction\Domain\Value\AuctionId;
use Workshop\Auction\Domain\Value\Money;
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
     * @var Money
     */
    private $startingPrice;
    /**
     * @var bool
     */
    private $isBuyNowAvailable;
    /**
     * @var Article
     */
    private $article;

    /**
     * @param AuctionId $id
     * @param UserId    $ownerId
     * @param DateTime  $startTime
     * @param DateTime  $endTime
     * @param string    $title
     * @param string    $description
     * @param Money     $startingPrice
     * @param bool      $isBuyNowAvailable
     *
     * @return Auction
     */
    public static function register(
        AuctionId $id,
        UserId $ownerId,
        DateTime $startTime,
        DateTime $endTime,
        $title,
        $description,
        $startingPrice,
        $isBuyNowAvailable = false
    ) {
        $self = new self();

        $self->id = $id;
        $self->ownerId = $ownerId;

        $self->startTime = $startTime;
        $self->endTime = $endTime;

        $self->title = $title;
        $self->description = $description;

        $self->startingPrice = $startingPrice;
        $self->isBuyNowAvailable = $isBuyNowAvailable;

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

    /**
     * @param Article $article
     */
    public function addArticle(Article $article)
    {
        if ($this->article) {
            throw DomainException::ArticleAlreadyAddedException($this->getId(), $article);
        }

        $this->article = $article;
    }

    /**
     * @return Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @return Money
     */
    public function getStartingPrice()
    {
        return $this->startingPrice;
    }

    /**
     * @return boolean
     */
    public function isBuyNowAvailable()
    {
        return $this->isBuyNowAvailable;
    }


}

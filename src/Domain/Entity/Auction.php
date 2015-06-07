<?php

namespace Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Exception\ArticleAlreadyAddedException;
use Workshop\Auction\Domain\Exception\DomainException;
use Workshop\Auction\Domain\Value\Article;
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
     *
     * @return Auction
     */
    public static function register(AuctionId $id, UserId $ownerId, DateTime $startTime, DateTime $endTime, $title, $description)
    {
        $self = new self();

        $self->id = $id;
        $self->ownerId = $ownerId;

        $self->startTime = $startTime;
        $self->endTime = $endTime;

        $self->title = $title;
        $self->description = $description;

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
}

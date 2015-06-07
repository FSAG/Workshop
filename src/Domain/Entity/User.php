<?php

namespace Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Value\Article;
use Workshop\Auction\Domain\Value\Email;
use Workshop\Auction\Domain\Value\UserId;

class User
{
    /**
     * @var UserId
     */
    private $id;
    /**
     * @var Email
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    /**
     * @var Article[]
     */
    private $soldArticles;

    /**
     * @var Article[]
     */
    private $boughtArticles;

    /**
     * @param Email $email
     * @param $username
     *
     * @return User
     */
    public static function fromValues(Email $email, $username)
    {
        return new self($email, $username);
    }

    /**
     * @param Email $email
     * @param $username
     */
    private function __construct(Email $email, $username)
    {
        $this->email = $email;
        $this->username = $username;
        $this->id = UserId::generate();
    }

    public function createAuction($title, $description, $startTime, $endTime, $startingPrice, $isBuyNow = false)
    {
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return Auction[]
     */
    public function getSoldAuctions()
    {
        return $this->soldArticles;
    }

    /**
     * @return Auction[]
     */
    public function getBoughtAuctions()
    {
        return $this->boughtArticles;
    }
}

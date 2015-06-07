<?php

namespace Workshop\Auction\Domain\Contract;

use Workshop\Auction\Domain\Value\Article;
use Workshop\Auction\Domain\Value\UserId;

interface AuctionRepository
{
    /**
     * @param UserId $userId
     *
     * @return Article[]
     */
    public function getSoldArticlesByUserId(UserId $userId);

    /**
     * @param UserId $userId
     *
     * @return Article[]
     */
    public function getBoughtArticlesByUserId(UserId $userId);
}

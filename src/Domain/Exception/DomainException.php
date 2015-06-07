<?php

namespace Workshop\Auction\Domain\Exception;

use Workshop\Auction\Domain\Value\Article;
use Workshop\Auction\Domain\Value\AuctionId;

class DomainException extends \RuntimeException
{
    /**
     * @param AuctionId $auctionId
     * @param Article   $article
     *
     * @return ArticleAlreadyAddedException
     */
    public static function ArticleAlreadyAddedException(AuctionId $auctionId, Article $article)
    {
        // $message = sprintf('Article "%s" is already added to %s auction.', $article->getTitle(), $auctionId);

        return new ArticleAlreadyAddedException();
    }
}

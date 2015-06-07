<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Entity\Auction;
use DateTime;
use Workshop\Auction\Domain\Value\Article;
use Workshop\Auction\Domain\Value\AuctionId;
use Workshop\Auction\Domain\Value\UserId;

class AutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @return Auction
     */
    public function it_could_be_registered()
    {
        $userId = UserId::generate();
        $auctionId = AuctionId::generate();

        $startTime = new DateTime('2015-06-08T15:20:00Z');
        $endTime = new DateTime('2015-06-12T23:59:59Z');

        $title = 'Sample title';
        $description = 'Lorem Ipsum bla bla bla';

        $auction = Auction::register($auctionId, $userId, $startTime, $endTime, $title, $description);

        $this->assertInstanceOf(Auction::class, $auction);
        $this->assertEquals($auctionId, $auction->getId());
        $this->assertEquals($userId, $auction->getOwnerId());
        $this->assertEquals($startTime, $auction->getStartTime());
        $this->assertEquals($endTime, $auction->getEndTime());
        $this->assertEquals($title, $auction->getTitle());
        $this->assertEquals($description, $auction->getDescription());

        return $auction;
    }

    /**
     * @test
     * @depends it_could_be_registered
     *
     * @return Auction
     */
    public function it_should_have_an_article(Auction $auction)
    {
        $article = $this->getMockBuilder(Article::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $auction->addArticle($article);

        $this->assertEquals($article, $auction->getArticle());
    }
}

<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Entity\Auction;
use DateTime;
use Workshop\Auction\Domain\Value\Article;
use Workshop\Auction\Domain\Value\AuctionId;
use Workshop\Auction\Domain\Value\Money;
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

        $startTime = new DateTime('now');
        $endTime = new DateTime('midnight +5 days');

        $title = 'Sample title';
        $description = 'Lorem Ipsum bla bla bla';

        $startingPrice = Money::fromValues(0, 'EUR');

        $auction = Auction::register($auctionId, $userId, $startTime, $endTime, $title, $description, $startingPrice);

        $this->assertInstanceOf(Auction::class, $auction);

        $this->assertEquals($auctionId, $auction->getId());
        $this->assertEquals($userId, $auction->getOwnerId());
        $this->assertEquals($startTime, $auction->getStartTime());
        $this->assertEquals($endTime, $auction->getEndTime());
        $this->assertEquals($title, $auction->getTitle());
        $this->assertEquals($description, $auction->getDescription());
        $this->assertEquals($startingPrice, $auction->getStartingPrice());
        $this->assertFalse($auction->isBuyNowAvailable());

        return $auction;
    }

    /**
     * @test
     * @depends it_could_be_registered
     *
     * @return Auction
     */
    public function it_should_be_valid_until_end_time(Auction $auction)
    {
        $this->assertTrue($auction->isRunning());
    }

    /**
     * @test
     * @depends it_could_be_registered
     *
     * @return Auction
     */
    public function it_should_be_finished_by_the_end_time()
    {
        $userId = UserId::generate();
        $auctionId = AuctionId::generate();

        $startTime = new DateTime('-5 days');
        $endTime = new DateTime('-1 days');

        $auction = Auction::register($auctionId, $userId, $startTime, $endTime, 'zzz', 'xxx');

        $this->assertFalse($auction->isRunning());
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

    /**
     * @test
     * @depends it_could_be_registered
     * @expectedException \Workshop\Auction\Domain\Exception\ArticleAlreadyAddedException
     *
     * @return Auction
     */
    public function it_is_not_allowed_to_add_more_articles(Auction $auction)
    {
        $article = $this->getMockBuilder(Article::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $auction->addArticle($article);
    }
}

<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Entity\Auction;
use Workshop\Auction\Domain\Entity\User;
use DateTime;
use Workshop\Auction\Domain\Value\AuctionId;
use Workshop\Auction\Domain\Value\UserId;

class AutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider validAuctionProvider
     *
     * @param string $title
     * @param string $description
     * @param DateTime $startTime
     * @param DateTime $endTime
     */
    public function it_could_be($title, $description, DateTime $startTime, DateTime $endTime)
    {
        $userId = UserId::generate();
        $auctionId = AuctionId::generate();

        $auction = Auction::createByUser($auctionId, $userId, $title, $description, $startTime, $endTime);

        $this->assertEquals($auctionId, $auction->getId());
        $this->assertEquals($userId, $auction->getOwnerId());
        $this->assertEquals($title, $auction->getTitle());
        $this->assertEquals($description, $auction->getDescription());
        $this->assertEquals($startTime, $auction->getStartTime());
        $this->assertEquals($endTime, $auction->getEndTime());
    }

    public function validAuctionProvider()
    {
        return [
            [
                'title' => 'Sample title',
                'description' => 'Lorem Ipsum bla bla bla',
                'startTime' => new DateTime('2015-06-08T15:20:00Z'),
                'endTime' => new DateTime('2015-06-12T23:59:59Z')
            ],
        ];
    }
}

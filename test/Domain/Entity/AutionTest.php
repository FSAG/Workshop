<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Entity\Auction;
use Workshop\Auction\Domain\Entity\User;
use DateTime;

class AutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider validAuctionProvider
     */
    public function it_could_be($title, $description, DateTime $startTime, DateTime $endTime)
    {
        $user = $this->getMock(User::class);
        $user->expects($this->any())
            ->method('getId')
            ->willReturn(12)
        ;

        $auction = Auction::register($user);

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

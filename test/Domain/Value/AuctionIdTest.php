<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Value\AuctionId;

class AuctionIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_could_be_generate()
    {
        $auctionId = AuctionId::generate();

        $this->assertInstanceOf(AuctionId::class, $auctionId);
    }

    /**
     * @test
     */
    public function it_could_be_restored_from_string()
    {
        $string = '1234567890';
        $auctionId = AuctionId::fromString($string);

        $this->assertInstanceOf(AuctionId::class, $auctionId);
        $this->assertEquals($string, $auctionId->toString());

        return $auctionId;
    }

    /**
     * @test
     * @depends it_could_be_restored_from_string
     *
     * @param AuctionId $auctionId
     */
    public function it_could_be_casted_to_string(AuctionId $auctionId)
    {
        $this->assertInternalType('string', (string) $auctionId);
        $this->assertEquals($auctionId->toString(), (string) $auctionId);
    }
}

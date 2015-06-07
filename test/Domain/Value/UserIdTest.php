<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Value\UserId;

class UserIdTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_could_be_generate()
    {
        $userId = UserId::generate();

        $this->assertInstanceOf(UserId::class, $userId);
    }

    /**
     * @test
     */
    public function it_could_be_restored_from_string()
    {
        $string = '1234567890';
        $userId = UserId::fromString($string);

        $this->assertInstanceOf(UserId::class, $userId);
        $this->assertEquals($string, $userId->toString());

        return $userId;
    }

    /**
     * @test
     * @depends it_could_be_restored_from_string
     *
     * @param UserId $userId
     */
    public function it_could_be_casted_to_string(UserId $userId)
    {
        $this->assertInternalType('string', (string) $userId);
        $this->assertEquals($userId->toString(), (string) $userId);
    }
}

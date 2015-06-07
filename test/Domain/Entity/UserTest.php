<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Entity\User;
use Workshop\Auction\Domain\Contract\AuctionRepository;
use Workshop\Auction\Domain\Value\Email;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @return User
     */
    public function it_has_email_and_nickname()
    {
        $email = Email::fromEmailString('valid@email.com');
        $username = 'creativeUserName';

        $user = User::fromValues($email, $username);

        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($username, $user->getUsername());

        return $user;
    }

    /**
     * @test
     *
     * @depends it_has_email_and_nickname
     *
     * @param User $user
     */
    public function it_can_create_an_auction(User $user)
    {

    }

    /**
     * @test
     *
     * @depends it_has_email_and_nickname
     *
     * @param User $user
     */
    public function it_can_bid_on_every_valid_auction(User $user)
    {
        $repository = $this->getMock(AuctionRepository::class);


    }

    public function createUserProvider()
    {
        return [
            [ Email::fromEmailString('valid@email.com'), 'creativeUserName' ],
        ];
    }
}

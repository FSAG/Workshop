<?php

namespace Workshop\Auction\Domain\Value;

class Email
{
    /**
     * @var string
     */
    private $emailString;

    /**
     * @param string $emailString
     * @return Email
     */
    public static function fromEmailString($emailString)
    {
        $self = new Email();

        $self->emailString = $emailString;

        return $self;
    }

    private function __construct()
    {}
}

<?php

namespace Workshop\Auction\Domain\Value;

class UserId
{
    /**
     * @return UserId
     */
    public static function generate()
    {
        return new UserId();
    }

}

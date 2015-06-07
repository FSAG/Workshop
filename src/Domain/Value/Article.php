<?php

namespace Workshop\Auction\Domain\Value;

class Article
{
    /**
     * @return Article
     */
    public static function create()
    {
        return new self();
    }

    private function __construct()
    {
    }
}

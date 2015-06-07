<?php

namespace Workshop\Auction\Domain\Value;

class Article
{
    /**
     * @var string
     */
    private $title;

    /**
     * @param string $title
     *
     * @return Article
     */
    public static function create($title)
    {
        return new self($title);
    }

    /**
     * @param string $title
     */
    private function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}

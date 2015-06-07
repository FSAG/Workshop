<?php

namespace test\Workshop\Auction\Domain\Entity;

use Workshop\Auction\Domain\Value\Article;

class ArticleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_a_title()
    {
        $title = 'Curious Article';

        $article = Article::create($title);

        $this->assertEquals($title, $article->getTitle());
    }
}

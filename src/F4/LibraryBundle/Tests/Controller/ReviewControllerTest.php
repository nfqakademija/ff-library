<?php

namespace F4\LibraryBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use F4\LibraryBundle\Controller\ReviewController;

class DefaultControllerTest extends WebTestCase
{
    public function testRatingChecker()
    {
        $a = new ReviewController();
        $b = $a->checkRating(5);

        $this->assertEquals(1, $b);
    }
}

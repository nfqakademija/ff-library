<?php
namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\LibraryBundle\Entity\Review;

class ReviewFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $review1 = new Review();
        $review1->setRating('1');
        $review1->setUser('Anonimas');
        $review1->setBook($manager->merge($this->getReference('book-1')));
        $review1->setReview('Nuostabi knyga, rekomenduoju visiems.');
        $manager->persist($review1);

        $review2 = new Review();
        $review2->setRating('0');
        $review2->setUser('Rimtas anonimas');
        $review2->setBook($manager->merge($this->getReference('book-1')));
        $review2->setReview('Parašyčiau kur kas geriau.');
        $manager->persist($review2);

        $manager->flush();
    }

    public function getOrder() {
        return 5;
    }

}

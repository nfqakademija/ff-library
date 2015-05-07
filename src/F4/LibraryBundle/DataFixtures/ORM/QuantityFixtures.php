<?php
namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\LibraryBundle\Entity\Quantity;

class QuantityFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $quantity1 = new Quantity();
        $quantity1->setSerial('114124543543');
        $quantity1->setBook($manager->merge($this->getReference('book-1')));
        $manager->persist($quantity1);

        $quantity2 = new Quantity();
        $quantity2->setSerial('543534534534');
        $quantity2->setBook($manager->merge($this->getReference('book-2')));
        $manager->persist($quantity2);

        $quantity3 = new Quantity();
        $quantity3->setSerial('6546464564566');
        $quantity3->setBook($manager->merge($this->getReference('book-3')));
        $manager->persist($quantity3);

        $quantity4 = new Quantity();
        $quantity4->setSerial('23423424234');
        $quantity4->setBook($manager->merge($this->getReference('book-4')));
        $manager->persist($quantity4);

        $quantity5 = new Quantity();
        $quantity5->setSerial('353453453453');
        $quantity5->setBook($manager->merge($this->getReference('book-5')));
        $manager->persist($quantity5);

        $quantity6 = new Quantity();
        $quantity6->setSerial('798978978978');
        $quantity6->setBook($manager->merge($this->getReference('book-6')));
        $manager->persist($quantity6);

        $quantity7 = new Quantity();
        $quantity7->setSerial('198978978978');
        $quantity7->setBook($manager->merge($this->getReference('book-6')));
        $manager->persist($quantity7);

        $manager->flush();
    }

    public function getOrder() {
        return 4;
    }

}

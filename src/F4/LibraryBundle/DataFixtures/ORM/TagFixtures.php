<?php
namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\LibraryBundle\Entity\Tag;

class TagFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tag1 = new Tag();
        $tag1->setName('Grožinė literatūra');
        $tag1->setFullName('Grožinė literatūra');
        $manager->persist($tag1);

        $tag2 = new Tag();
        $tag2->setName('Detektyvas');
        $tag2->setFullName('Detektyvas');
        $manager->persist($tag2);

        $tag3 = new Tag();
        $tag3->setName('Drama');
        $tag3->setFullName('Drama');
        $manager->persist($tag3);

        $manager->flush();

        $this->addReference('tag-1', $tag1);
        $this->addReference('tag-2', $tag2);
        $this->addReference('tag-3', $tag3);
    }

    public function getOrder() {
        return 2;
    }

}

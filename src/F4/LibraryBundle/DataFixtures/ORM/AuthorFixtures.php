<?php
namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\LibraryBundle\Entity\Author;

class AuthorFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $author1 = new Author();
        $author1->setName('Roman Dirge');
        $author1->setPhoto('https://d.gr-assets.com/authors/1303760965p2/45461.jpg');
        $author1->setBornAt('1972/04/29');
        //$author1->setDiedAt('');
        //$author1->setHometown('');
        $manager->persist($author1);

        $author2 = new Author();
        $author2->setName('Tim O\'Reilly');
        $author2->setPhoto('https://d.gr-assets.com/authors/1199698411p2/18541.jpg');
        //$author2->setBornAt('');
        //$author2->setDiedAt('');
        $author2->setHometown('Ireland, Cork');
        $manager->persist($author2);

        $manager->flush();

        $this->addReference('author-1', $author1);
        $this->addReference('author-2', $author2);
    }

    public function getOrder() {
        return 1;
    }

}

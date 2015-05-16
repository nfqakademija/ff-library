<?php

namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\UserBundle\Entity\User;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('demo');
        $user->setEmail('demo@demo.com');
        $user->setPlainPassword('demo');
        $user->setEnabled(true);
        $user->addReadBook($manager->merge($this->getReference('book-1')));
        $user->addReadBook($manager->merge($this->getReference('book-4')));

        $manager->persist($user);
        $manager->flush();

        $this->addReference('user', $user);
    }

    public function getOrder() {
        return 5;
    }
}

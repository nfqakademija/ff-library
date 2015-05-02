<?php
namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\LibraryBundle\Entity\Book;

class BlogFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Book();
        $book1->setIsbn('9789955238119');
        $book1->setTitle('Tigro beieškant');
        $book1->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book1->setImage('http://www.pegasas.lt/out/3/html/0/dyn_images/0/cdb_9786098105209_th.jpg');
        $book1->setAuthor('Liza Klaussmann');
        $book1->setReleaseDate(new \DateTime());
        $manager->persist($book1);

        $book2 = new Book();
        $book2->setIsbn('9719955638119');
        $book2->setTitle('Aš esu Livija');
        $book2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book2->setImage('http://www.pegasas.lt/out/3/html/0/dyn_images/0/cdb_9786094660887_As_esu_Livija_th.jpg');
        $book2->setAuthor('Nikolajus Kunas');
        $book2->setReleaseDate(new \DateTime());
        $manager->persist($book2);

        $book3 = new Book();
        $book3->setIsbn('9719955638119');
        $book3->setTitle('Galutinė kelionė');
        $book3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book3->setImage('http://www.pegasas.lt/out/3/html/0/dyn_images/0/cdb_9786094680243_th.jpg');
        $book3->setAuthor('Mons Kallentoft');
        $book3->setReleaseDate(new \DateTime());
        $manager->persist($book3);

        $book4 = new Book();
        $book4->setIsbn('9719955638119');
        $book4->setTitle('Galutinė kelionė');
        $book4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book4->setImage('http://www.pegasas.lt/out/3/html/0/dyn_images/0/cdb_9786094680243_th.jpg');
        $book4->setAuthor('Mons Kallentoft');
        $book4->setReleaseDate(new \DateTime());
        $manager->persist($book4);

        $book5 = new Book();
        $book5->setIsbn('9719955638119');
        $book5->setTitle('Galutinė kelionė');
        $book5->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book5->setImage('http://www.pegasas.lt/out/3/html/0/dyn_images/0/cdb_9786094680243_th.jpg');
        $book5->setAuthor('Mons Kallentoft');
        $book5->setReleaseDate(new \DateTime());
        $manager->persist($book5);

        $book6 = new Book();
        $book6->setIsbn('9719955638119');
        $book6->setTitle('Galutinė kelionė');
        $book6->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book6->setImage('http://www.pegasas.lt/out/3/html/0/dyn_images/0/cdb_9786094680243_th.jpg');
        $book6->setAuthor('Mons Kallentoft');
        $book6->setReleaseDate(new \DateTime());
        $manager->persist($book6);

        $manager->flush();
    }

}
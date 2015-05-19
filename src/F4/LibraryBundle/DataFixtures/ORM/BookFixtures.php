<?php
namespace F4\LibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use F4\LibraryBundle\Entity\Book;

class BookFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Book();
        $book1->addAuthor($manager->merge($this->getReference('author-1')));
        $book1->addAuthor($manager->merge($this->getReference('author-2')));
        $book1->addTag($manager->merge($this->getReference('tag-1')));
        $book1->addTag($manager->merge($this->getReference('tag-2')));
        $book1->addTag($manager->merge($this->getReference('tag-3')));
        $book1->setIsbn('9786099528786');
        $book1->setTitle('KGB vaikai');
        $book1->setDescription('Justino Žilinsko romane „KGB vaikai“ veiksmas vyksta Lietuvoje 1996-aisiais. Tai pasakojimas apie persekiojamus jaunuolius Rasą ir Vilių, besiaiškinančius KGB paslaptis, atrandančius, kad jie ir patys tapo represinės struktūros darytų eksperimentų su žmonėmis aukomis – tiesioginėmis ir ne visai. Taip pat – tai savotiškas 1996-ųjų aktualijų ir žmonių gyvenimo paveikslas. Tai – nuotykių romanas: daug šnekų, važiavimo, bėgimo ir mažai filosofijos. Tai – istorinis romanas: šeštųjų nepriklausomos Lietuvos metų tikrovė, politinė situacija ir kasdienybė su sovietinio laikotarpio reliktais. Tai – detektyvinis romanas: veikėjai sprendžia tradicines užduotis: Kas? Kodėl? Qui bono? Tai – šiek tiek mistinis romanas: šie žmonės ne veltui pavadinti „KGB vaikais“. Šokote „makareną“, žiūrėjote tą klaikų serialą „Beverli Hills“ ir dar atsimenate „Motorolos“ mobiliojo plytą ar mistišką prietaisą peidžerį? Tada šis romanas visiškai panardins jus į jau istoriją tapusios jaunystės atmosferą. Jaunesniems skaitytojams gal bus sunkoka suvokti, kiek daug lėmė mobiliojo telefono turėjimas ir kodėl veikėjai neguglina, tačiau skaitydami jie galės žavėtis tikroviškais jų paveikslais ir pašėlusiais nuotykiais. O iš tiesų – tai romanas apie jus.');
        $book1->setImage('https://d.gr-assets.com/books/1359126077m/17284608.jpg');
        $book1->setLargeImage('https://d.gr-assets.com/books/1359126077l/17284608.jpg');
        $book1->setSmallImage('https://d.gr-assets.com/books/1359126077s/17284608.jpg');
        $book1->setReleaseDate(new \DateTime());
        $manager->persist($book1);

        $book2 = new Book();
        $book2->addAuthor($manager->merge($this->getReference('author-1')));
        $book2->addTag($manager->merge($this->getReference('tag-1')));
        $book2->setIsbn('9786094037801');
        $book2->setTitle('Pirmykštė moteris. Uolų prieglobstis');
        $book2->setDescription('Nors mylimojo artimieji priima šiltai, kai kam atvykėlė atrodo pernelyg keista ir gąsdinanti. Kas iš tikro ta svetimšalė, kalbanti su vilku ir savo arkliais? Kodėl ji taip aistringai gina plokščiagalvius ir vadina Gentimi? Atrodo, kad laiko juos... žmonėmis! Kaip visad, jaunajai moteriai teks pasitelkti visą savo išmintį, instinktus ir talentus, kad būtų priimta ir ne tik pasirodytų verta likti su Jondalaru, bet ir pelnytų Devintojo urvo bendruomenės pagarbą. Negailestingos uolos atėmė iš Ailos artimuosius, išplėšė iš mylimos savųjų genties. Ji vėl grįš į uolų prieglobstį su savo brangiausiais, pasiryžusi sušildyti juos karšta meile ir stipria dvasia.');
        $book2->setImage('https://d.gr-assets.com/books/1427313742m/25218557.jpg');
        $book2->setLargeImage('https://d.gr-assets.com/books/1427313742l/25218557.jpg');
        $book2->setSmallImage('https://d.gr-assets.com/books/1427313742s/25218557.jpg');
        $book2->setReleaseDate(new \DateTime());
        $manager->persist($book2);

        $book3 = new Book();
        $book3->addAuthor($manager->merge($this->getReference('author-1')));
        $book3->addTag($manager->merge($this->getReference('tag-1')));
        $book3->setIsbn('9789955237952');
        $book3->setTitle('Vaiduoklis (Harry Hole, #9)');
        $book3->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book3->setImage('https://d.gr-assets.com/books/1421303085m/24506926.jpg');
        $book3->setLargeImage('https://d.gr-assets.com/books/1421303085l/24506926.jpg');
        $book3->setSmallImage('https://d.gr-assets.com/books/1421303085s/24506926.jpg');
        $book3->setReleaseDate(new \DateTime());
        $manager->persist($book3);

        $book4 = new Book();
        $book4->addAuthor($manager->merge($this->getReference('author-2')));
        $book4->addTag($manager->merge($this->getReference('tag-2')));
        $book4->setIsbn('9786094271687');
        $book4->setTitle('Alamutas');
        $book4->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book4->setImage('https://d.gr-assets.com/books/1420632959m/24342796.jpg');
        $book4->setLargeImage('https://d.gr-assets.com/books/1420632959l/24342796.jpg');
        $book4->setSmallImage('https://d.gr-assets.com/books/1420632959s/24342796.jpg');
        $book4->setReleaseDate(new \DateTime());
        $manager->persist($book4);

        $book5 = new Book();
        $book5->addAuthor($manager->merge($this->getReference('author-2')));
        $book5->setIsbn('9785415023141');
        $book5->setTitle('Moteris smėlynuose');
        $book5->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book5->setImage('https://d.gr-assets.com/books/1385902865m/19082603.jpg');
        $book5->setLargeImage('https://d.gr-assets.com/books/1385902865l/19082603.jpg');
        $book5->setSmallImage('https://d.gr-assets.com/books/1385902865s/19082603.jpg');
        $book5->setReleaseDate(new \DateTime());
        $manager->persist($book5);

        $book6 = new Book();
        $book6->addAuthor($manager->merge($this->getReference('author-2')));
        $book6->setIsbn('9789955237877');
        $book6->setTitle('Palata nr. 6');
        $book6->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $book6->setImage('https://d.gr-assets.com/books/1415441706m/23515566.jpg');
        $book6->setLargeImage('https://d.gr-assets.com/books/1415441706l/23515566.jpg');
        $book6->setSmallImage('https://d.gr-assets.com/books/1415441706s/23515566.jpg');
        $book6->setReleaseDate(new \DateTime());
        $manager->persist($book6);

        $manager->flush();

        $this->addReference('book-1', $book1);
        $this->addReference('book-2', $book2);
        $this->addReference('book-3', $book3);
        $this->addReference('book-4', $book4);
        $this->addReference('book-5', $book5);
        $this->addReference('book-6', $book6);
    }

    public function getOrder() {
        return 3;
    }

}

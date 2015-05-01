<?php
namespace F4\LibraryBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function getBooks()
    {
        $q = $this->createQueryBuilder('b')
            ->select('b')
            ->addOrderBy('b.releaseDate', 'DESC')
            ->getQuery();
        return $q->getResult();
    }
}
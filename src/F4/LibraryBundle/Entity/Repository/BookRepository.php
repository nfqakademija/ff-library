<?php
namespace F4\LibraryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function getNewestBooks($param = null)
    {
        if (array_key_exists('limit', $param)) {
            $result = $this->findBy(array(), array('releaseDate' => 'ASC'), $param['limit'], $param['offset']);
        } else {
            $result = count($this->findBy(array(), array('releaseDate' => 'ASC'), 90));
        }
        return $result;
    }

    public function getPositiveBooks($param = null)
    {
        $result = $this->createQueryBuilder('b')
            ->innerJoin('b.reviews', 'r');

        if (array_key_exists('limit', $param)) {
            $result->addSelect('sum(r.rating) AS HIDDEN total')
                ->addOrderBy('total', 'DESC')
                ->groupBy('r.book')
                ->setMaxResults($param['limit'])
                ->setFirstResult($param['offset']);

            return $result->getQuery()->getResult();
        } else {
            $result->select('count(DISTINCT r.book)');
            return $result->getQuery()->getSingleScalarResult();
        }
    }

    public function getBooksByTag($param = null)
    {
        $result = $this->createQueryBuilder('b');
        $result->innerJoin('b.tags', 't', 'WITH', 't.id = :tagId')
            ->setParameter('tagId', $param['uid']);

        if (array_key_exists('limit', $param)) {
            $result->setMaxResults($param['limit'])
                ->setFirstResult($param['offset']);

            return $result->getQuery()->getResult();
        } else {
            $result->select('count(b.id)');
            return $result->getQuery()->getSingleScalarResult();
        }
    }

    public function getBooksByAuthor($param = null)
    {
        $result = $this->createQueryBuilder('b');
        $result->innerJoin('b.authors', 'a', 'WITH', 'a.id = :authorId')
            ->setParameter('authorId', $param['uid']);

        if (array_key_exists('limit', $param)) {
            $result->setMaxResults($param['limit'])
                ->setFirstResult($param['offset']);

            return $result->getQuery()->getResult();
        } else {
            $result->select('count(b.id)');
            return $result->getQuery()->getSingleScalarResult();
        }
    }
}

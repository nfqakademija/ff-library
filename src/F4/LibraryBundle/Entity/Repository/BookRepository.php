<?php
namespace F4\LibraryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function getNewestBooks($id = null, $param = null)
    {
        if (true === is_null($param)) {
            $result = count($this->findBy(array(), array('releaseDate' => 'ASC'), 90));
        } else {
            $result = $this->findBy(array(), array('releaseDate' => 'ASC'), $param['limit'], $param['offset']);
        }
        return $result;
    }

    public function getBooksByTag($id, $param = null)
    {
        $result = $this->createQueryBuilder('b');
        $result->innerJoin('b.tags', 't', 'WITH', 't.id = :tagId')
            ->setParameter('tagId', $id);

        if (false === is_null($param)) {
            if (array_key_exists('limit', $param)) {
                $result->setMaxResults($param['limit']);
            }

            if (array_key_exists('offset', $param)) {
                $result->setFirstResult($param['offset']);
            }
            return $result->getQuery()->getResult();
        } else {
            $result->select('count(b.id)');
            return $result->getQuery()->getSingleScalarResult();
        }
    }

    public function getBooksByAuthor($id, $param = null)
    {
        $result = $this->createQueryBuilder('b');
        $result->innerJoin('b.authors', 'a', 'WITH', 'a.id = :authorId')
            ->setParameter('authorId', $id);

        if (false === is_null($param)) {
            if (array_key_exists('limit', $param)) {
                $result->setMaxResults($param['limit']);
            }

            if (array_key_exists('offset', $param)) {
                $result->setFirstResult($param['offset']);
            }
            return $result->getQuery()->getResult();
        } else {
            $result->select('count(b.id)');
            return $result->getQuery()->getSingleScalarResult();
        }
    }
}

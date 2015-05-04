<?php
namespace F4\LibraryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function getBookList($param, $count = null)
    {
        if (!array_key_exists('alias', $param))
            $param['alias'] = 'b';

        $q = $this->createQueryBuilder($param['alias']);

        if (false === is_null($count))
            $q->select('count('.$param['alias'].')');
        else
            $q->select($param['alias']);

        if (array_key_exists('where', $param))
            $q->where($param['alias'].'.'.$param['where']);

        if (array_key_exists('addOrderBy', $param))
            $q->addOrderBy($param['alias'].'.'.$param['addOrderBy'], 'ASC');

        if (array_key_exists('setMaxResults', $param))
            $q->setMaxResults($param['setMaxResults']);

        if (array_key_exists('setFirstResult', $param))
            $q->setFirstResult($param['setFirstResult']);

        if (false === is_null($count))
            return $q->getQuery()->getSingleScalarResult();
        else
            return $q->getQuery()->getResult();
    }
}

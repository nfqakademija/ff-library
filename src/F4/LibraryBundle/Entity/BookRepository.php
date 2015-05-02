<?php
namespace F4\LibraryBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function getBookList($param) {
        $p = array();
        $p['order'] = $param['order'];
        $p['where'] = 'id > 0';
        $p['limit'] = $param['limit'];
        $p['first'] = $param['first'];

        $q = $this->getBookListQuery('b', $p['order'], $p['where'], $p['limit'], $p['first']);
        return $q->getQuery()->getResult();
    }

    public function getBookListQnt($param) {
        $p = array();
        $p['order'] = $param['order'];
        $p['where'] = 'id > 0';
        $p['limit'] = 60;
        $p['first'] = 0;

        $q = $this->getBookListQuery('count(b)',$p['order'], $p['where'], $p['limit'], $p['first']);
        return $q->getQuery()->getSingleScalarResult();
    }

    private function getBookListQuery($select, $order, $where = "id > 0", $limit = 9, $first = 0)
    {
        $q = $this->createQueryBuilder('b')
            ->select($select)
            ->where('b.' . $where)
            ->addOrderBy('b.' . $order, 'ASC')
            ->setMaxResults($limit)
            ->setFirstResult($first);

        return $q;
    }
}
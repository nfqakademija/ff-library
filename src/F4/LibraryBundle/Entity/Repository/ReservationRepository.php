<?php

namespace F4\LibraryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ReservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservationRepository extends EntityRepository
{
    public function getReservedBooks($user, $taken = false) {
        $result = $this->findBy(array('user' => $user, 'bookTaken' => $taken), array('id' => 'DESC'));

        return $result;
    }
}

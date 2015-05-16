<?php

namespace F4\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="F4\LibraryBundle\Entity\Review", mappedBy="user")
     */
    protected $reviews;

    /**
     * @ORM\ManyToMany(targetEntity="F4\LibraryBundle\Entity\Book")
     * @ORM\JoinTable(name="user_read_books")
     */
    protected $readBooks;

    /**
     * @ORM\OneToMany(targetEntity="F4\LibraryBundle\Entity\Reservation", mappedBy="user")
     */
    protected $reservedBooks;

    public function __construct()
    {
        parent::__construct();
        $this->reservedBooks = new ArrayCollection();
        $this->readBooks = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add reviews
     *
     * @param \F4\LibraryBundle\Entity\Review $reviews
     * @return User
     */
    public function addReview(\F4\LibraryBundle\Entity\Review $reviews)
    {
        $this->reviews[] = $reviews;

        return $this;
    }

    /**
     * Remove reviews
     *
     * @param \F4\LibraryBundle\Entity\Review $reviews
     */
    public function removeReview(\F4\LibraryBundle\Entity\Review $reviews)
    {
        $this->reviews->removeElement($reviews);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * Add readBooks
     *
     * @param \F4\LibraryBundle\Entity\Book $readBooks
     * @return User
     */
    public function addReadBook(\F4\LibraryBundle\Entity\Book $readBooks)
    {
        $this->readBooks[] = $readBooks;

        return $this;
    }

    /**
     * Remove readBooks
     *
     * @param \F4\LibraryBundle\Entity\Book $readBooks
     */
    public function removeReadBook(\F4\LibraryBundle\Entity\Book $readBooks)
    {
        $this->readBooks->removeElement($readBooks);
    }

    /**
     * Get readBooks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReadBooks()
    {
        return $this->readBooks;
    }

    /**
     * Add reservedBooks
     *
     * @param \F4\LibraryBundle\Entity\Reservation $reservedBooks
     * @return User
     */
    public function addReservedBook(\F4\LibraryBundle\Entity\Reservation $reservedBooks)
    {
        $this->reservedBooks[] = $reservedBooks;

        return $this;
    }

    /**
     * Remove reservedBooks
     *
     * @param \F4\LibraryBundle\Entity\Reservation $reservedBooks
     */
    public function removeReservedBook(\F4\LibraryBundle\Entity\Reservation $reservedBooks)
    {
        $this->reservedBooks->removeElement($reservedBooks);
    }

    /**
     * Get reservedBooks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReservedBooks()
    {
        return $this->reservedBooks;
    }
}

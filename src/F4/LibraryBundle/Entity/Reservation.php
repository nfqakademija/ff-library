<?php
namespace F4\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="F4\LibraryBundle\Entity\Repository\ReservationRepository")
 * @ORM\Table(name="user_reserved_books")
 * @ORM\HasLifecycleCallbacks
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

    /**
     * @ORM\OneToOne(targetEntity="Quantity")
     * @ORM\JoinColumn(name="quantity_id", referencedColumnName="id", nullable=true)
     */
    protected $bookUnit;

    /**
     * @ORM\ManyToOne(targetEntity="F4\UserBundle\Entity\User", inversedBy="reservedBooks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(name="book_taken", type="boolean")
     */
    protected $bookTaken;

    public function __construct()
    {
        $this->setBookTaken(true);
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
     * Set bookTaken
     *
     * @param boolean $bookTaken
     * @return Reservation
     */
    public function setBookTaken($bookTaken)
    {
        $this->bookTaken = $bookTaken;

        return $this;
    }

    /**
     * Get bookTaken
     *
     * @return boolean 
     */
    public function getBookTaken()
    {
        return $this->bookTaken;
    }

    /**
     * Set book
     *
     * @param \F4\LibraryBundle\Entity\Book $book
     * @return Reservation
     */
    public function setBook(\F4\LibraryBundle\Entity\Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \F4\LibraryBundle\Entity\Book 
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set bookUnit
     *
     * @param \F4\LibraryBundle\Entity\Quantity $bookUnit
     * @return Reservation
     */
    public function setBookUnit(\F4\LibraryBundle\Entity\Quantity $bookUnit = null)
    {
        $this->bookUnit = $bookUnit;

        return $this;
    }

    /**
     * Get bookUnit
     *
     * @return \F4\LibraryBundle\Entity\Quantity 
     */
    public function getBookUnit()
    {
        return $this->bookUnit;
    }

    /**
     * Set user
     *
     * @param \F4\UserBundle\Entity\User $user
     * @return Reservation
     */
    public function setUser(\F4\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \F4\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}

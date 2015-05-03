<?php
namespace F4\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="F4\LibraryBundle\Entity\Repository\QuantityRepository")
 * @ORM\Table(name="quantity")
 * @ORM\HasLifecycleCallbacks
 */
class Quantity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $serial;

    /**
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="quantities")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

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
     * Set serial
     *
     * @param string $serial
     * @return Quantity
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set book
     *
     * @param \F4\LibraryBundle\Entity\Book $book
     * @return Quantity
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
}

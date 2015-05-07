<?php
namespace F4\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="F4\LibraryBundle\Entity\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $photo;

    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     */
    protected $hometown;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $born_at;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $died_at;

    /**
     * @ORM\ManyToMany(targetEntity="Book", mappedBy="authors")
     */
    protected $books;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Author
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set hometown
     *
     * @param string $hometown
     * @return Author
     */
    public function setHometown($hometown)
    {
        $this->hometown = $hometown;

        return $this;
    }

    /**
     * Get hometown
     *
     * @return string 
     */
    public function getHometown()
    {
        return $this->hometown;
    }

    /**
     * Set born_at
     *
     * @param string $bornAt
     * @return Author
     */
    public function setBornAt($bornAt)
    {
        $this->born_at = $bornAt;

        return $this;
    }

    /**
     * Get born_at
     *
     * @return string 
     */
    public function getBornAt()
    {
        return $this->born_at;
    }

    /**
     * Set died_at
     *
     * @param string $diedAt
     * @return Author
     */
    public function setDiedAt($diedAt)
    {
        $this->died_at = $diedAt;

        return $this;
    }

    /**
     * Get died_at
     *
     * @return string 
     */
    public function getDiedAt()
    {
        return $this->died_at;
    }

    /**
     * Add books
     *
     * @param \F4\LibraryBundle\Entity\Book $books
     * @return Author
     */
    public function addBook(\F4\LibraryBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \F4\LibraryBundle\Entity\Book $books
     */
    public function removeBook(\F4\LibraryBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }
}

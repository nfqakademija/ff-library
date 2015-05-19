<?php
namespace F4\LibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="F4\LibraryBundle\Entity\Repository\BookRepository")
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=13)
     */
    protected $isbn;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $title;

    /**
     * @ORM\Column(type="date")
     */
    protected $releaseDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="books")
     * @ORM\JoinTable(name="books_tags")
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="Quantity", mappedBy="book")
     */
    protected $quantities;

    /**
     * @ORM\ManyToMany(targetEntity="Author", inversedBy="books")
     * @ORM\JoinTable(name="books_authors")
     */
    protected $authors;

    /**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="book")
     */
    protected $reviews;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $small_image;

    /**
     * @ORM\Column(type="string", length=256)
     */
    protected $large_image;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quantities = new ArrayCollection();
        $this->authors = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTitle();
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
     * Set isbn
     *
     * @param string $isbn
     * @return Book
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string 
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     * @return Book
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime 
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Book
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add quantities
     *
     * @param \F4\LibraryBundle\Entity\Quantity $quantities
     * @return Book
     */
    public function addQuantity(\F4\LibraryBundle\Entity\Quantity $quantities)
    {
        $this->quantities[] = $quantities;

        return $this;
    }

    /**
     * Remove quantities
     *
     * @param \F4\LibraryBundle\Entity\Quantity $quantities
     */
    public function removeQuantity(\F4\LibraryBundle\Entity\Quantity $quantities)
    {
        $this->quantities->removeElement($quantities);
    }

    /**
     * Get quantities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuantities()
    {
        return $this->quantities;
    }

    /**
     * Add authors
     *
     * @param \F4\LibraryBundle\Entity\Author $authors
     * @return Book
     */
    public function addAuthor(\F4\LibraryBundle\Entity\Author $authors)
    {
        $this->authors[] = $authors;

        return $this;
    }

    /**
     * Remove authors
     *
     * @param \F4\LibraryBundle\Entity\Author $authors
     */
    public function removeAuthor(\F4\LibraryBundle\Entity\Author $authors)
    {
        $this->authors->removeElement($authors);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Add reviews
     *
     * @param \F4\LibraryBundle\Entity\Review $reviews
     * @return Book
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
     * Add tags
     *
     * @param \F4\LibraryBundle\Entity\Tag $tags
     * @return Book
     */
    public function addTag(\F4\LibraryBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \F4\LibraryBundle\Entity\Tag $tags
     */
    public function removeTag(\F4\LibraryBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set small_image
     *
     * @param string $smallImage
     * @return Book
     */
    public function setSmallImage($smallImage)
    {
        $this->small_image = $smallImage;

        return $this;
    }

    /**
     * Get small_image
     *
     * @return string 
     */
    public function getSmallImage()
    {
        return $this->small_image;
    }

    /**
     * Set large_image
     *
     * @param string $largeImage
     * @return Book
     */
    public function setLargeImage($largeImage)
    {
        $this->large_image = $largeImage;

        return $this;
    }

    /**
     * Get large_image
     *
     * @return string 
     */
    public function getLargeImage()
    {
        return $this->large_image;
    }
}

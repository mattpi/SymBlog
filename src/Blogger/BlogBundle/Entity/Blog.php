<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blogger\BlogBundle\Entity\Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Blog
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string $blog
     *
     * @ORM\Column(name="blog", type="text")
     */
    private $blog;

    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string $tags
     *
     * @ORM\Column(name="tags", type="text")
     */
    private $tags;

   
    private $comments;

    /**
     * @var string $created
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var string $updated
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;


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
     * Set title
     *
     * @param string $title
     * @return Blog
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
     * Set author
     *
     * @param string $author
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set blog
     *
     * @param string $blog
     * @return Blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;
        return $this;
    }

    /**
     * Get blog
     *
     * @return string 
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Blog
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
     * Set tags
     *
     * @param string $tags
     * @return Blog
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Blog
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set created
     *
     * @param string $created
     * @return Blog
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return string 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param string $updated
     * @return Blog
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return string 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
    * @ORM\PrePersist()
    */
    public function prePersist() {
    $this->setUpdated(null); // if possible: notice set nullable = true...
    $this->setCreated(new \DateTime());
    }
    /**
    * @ORM\PreUpdate()
    */
    public function preUpdate() {
    $this->setUpdated(new \DateTime());
    }
}
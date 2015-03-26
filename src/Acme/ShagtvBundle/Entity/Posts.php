<?php

namespace Acme\ShagtvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Posts
 *
 * @ORM\Table(name="posts", indexes={@ORM\Index(name="FK_posts_posts", columns={"user_id"})})
 * @ORM\Entity
 */
class Posts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=5000, nullable=true)
     */
    private $text;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Acme\ShagtvBundle\Entity\Comments", mappedBy="post")
     */
    private $comments;

    /**
     * @var \Acme\ShagtvBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Acme\ShagtvBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Posts
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
     * Set text
     *
     * @param string $text
     * @return Posts
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Add comments
     *
     * @param \Acme\ShagtvBundle\Entity\Comments $comments
     * @return Posts
     */
    public function addComment(\Acme\ShagtvBundle\Entity\Comments $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Acme\ShagtvBundle\Entity\Comments $comments
     */
    public function removeComment(\Acme\ShagtvBundle\Entity\Comments $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set user
     *
     * @param \Acme\ShagtvBundle\Entity\Users $user
     * @return Posts
     */
    public function setUser(\Acme\ShagtvBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Acme\ShagtvBundle\Entity\Users 
     */
    public function getUser()
    {
        return $this->user;
    }
}

<?php

namespace Acme\ShagtvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="FK__users", columns={"user_id"}), @ORM\Index(name="FK_comments_posts", columns={"post_id"})})
 * @ORM\Entity
 */
class Comments
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
     * @ORM\Column(name="text", type="string", length=5000, nullable=true)
     */
    private $text;

    /**
     * @var \Acme\ShagtvBundle\Entity\Posts
     *
     * @ORM\ManyToOne(targetEntity="Acme\ShagtvBundle\Entity\Posts", inversedBy="comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     * })
     */
    private $post;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Comments
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
     * Set post
     *
     * @param \Acme\ShagtvBundle\Entity\Posts $post
     * @return Comments
     */
    public function setPost(\Acme\ShagtvBundle\Entity\Posts $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Acme\ShagtvBundle\Entity\Posts 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set user
     *
     * @param \Acme\ShagtvBundle\Entity\Users $user
     * @return Comments
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

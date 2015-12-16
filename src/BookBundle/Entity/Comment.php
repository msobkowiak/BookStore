<?php
namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Exclude;

/**
 * @ORM\Entity
 * @ORM\Table(name="comments")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id()
     * @ORM\Column(name="id", type="integer")
     *
     * @Exclude()
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     */
    protected $book;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string")
     */
    protected $content;

    /**
     * @return int
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param int $book
     * @return $this
     */
    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}

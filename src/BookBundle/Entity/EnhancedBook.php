<?php
namespace BookBundle\Entity;

class EnhancedBook extends Book
{
    public function __construct(Book $book)
    {
        $this
            ->setId($book->getId())
            ->setTitle($book->getType())
            ->setAuthor($book->getAuthor())
            ->setType($book->getType())
            ->setYear($book->getYear())
            ->setPrice($book->getPrice());
    }

    /**
     * @var Comment[]
     */
    protected $comments = array();

    /**
     * @return Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment[] $comments
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }
}

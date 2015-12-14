<?php
namespace BookBundle\Entity;

class BooksList
{

    protected $paginator;

    /**
     * @var Book[]
     */
    protected $books;

    public function __construct()
    {
        $this->books = array();
    }

    /**
     * @return Book[]
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param Book[] $book
     * @return $this
     */
    public function addBook($book)
    {
        $this->books[] = $book;
        return $this;
    }
}

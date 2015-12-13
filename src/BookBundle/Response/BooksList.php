<?php
namespace BookBundle\Response;

class BooksList
{
    /**
     * @var Book[]
     */
    private $books;

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
     * @param Book $book
     * @return $this
     */
    public function addBook($book)
    {
        $this->books[] = $book;
        return $this;
    }
}

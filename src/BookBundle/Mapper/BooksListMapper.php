<?php
namespace BookBundle\Mapper;

use BookBundle\Response\BooksList;

class BooksListMapper
{
    /**
     * @var BookMapper
     */
    private $bookMapper;

    public function setBookMapper(BookMapper $bookMapper)
    {
        $this->bookMapper = $bookMapper;
    }

    public function map($booksData)
    {
        $books = new BooksList();
        foreach ($booksData as $bookData) {
            $books->addBook($this->bookMapper->map($bookData));
        }

        return $books;
    }

}
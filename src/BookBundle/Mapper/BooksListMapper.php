<?php
namespace BookBundle\Mapper;

use BookBundle\Entity\Book;
use BookBundle\Entity\BooksList;
use BookBundle\Entity\EnhancedBook;

class BooksListMapper
{

    /**
     * @param Book[] $booksData
     * @return BooksList
     */
    public function map($booksData)
    {
        $books = new BooksList();
        foreach ($booksData as $book) {
            $books->addBook(new EnhancedBook($book));
        }

        return $books;
    }

}
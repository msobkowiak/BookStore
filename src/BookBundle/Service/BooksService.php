<?php
namespace BookBundle\Service;

use BookBundle\Entity\Book;
use BookBundle\Entity\BooksList;
use BookBundle\Entity\EnhancedBook;
use BookBundle\Exception\BookNotFountException;
use BookBundle\Mapper\BooksListMapper;
use Doctrine\ORM\EntityManager;

class BooksService
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var BooksListMapper
     */
    private $booksListMapper;

    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setBooksListMapper(BooksListMapper $booksListMapper)
    {
        $this->booksListMapper = $booksListMapper;
    }

    /**
     * @return BooksList[]
     */
    public function getBooksList()
    {
        $repo = $this->entityManager->getRepository('BookBundle:Book');
        $books = $repo->findAll();

        return $this->booksListMapper->map($books);
    }

    /**
     * @param $id
     * @return Book
     * @throws BookNotFountException
     */
    public function getBook($id)
    {
        $repo = $this->entityManager->getRepository('BookBundle:Book');
        $book = $repo->find($id);

        if (!$book) {
            throw new BookNotFountException("Book not found");
        }

        $enhancedBook = new EnhancedBook($book);
        $enhancedBook->setComments(array());

        return $enhancedBook;
    }
}

<?php
namespace BookBundle\Service;

use BookBundle\Mapper\BooksListMapper;
use BookBundle\Response\Book;
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
     * @return Book[]
     */
    public function getBookingList()
    {
        $repo = $this->entityManager->getRepository('BookBundle:Book');
        $books = $repo->findAll();

        return $this->booksListMapper->map($books);
    }
}

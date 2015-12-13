<?php
namespace BookBundle\Mapper;

use BookBundle\Response\Book as BookRepresentation;
use BookBundle\Entity\Book as BookEntity;

class BookMapper
{
    /**
     * @param BookEntity $bookData
     * @return BookRepresentation
     */
    public function map(BookEntity $bookData)
    {
        $book = new BookRepresentation();

        $book
            ->setUri($this->buildUri($bookData->getId()))
            ->setTitle($bookData->getTitle())
            ->setAuthor($bookData->getAuthor())
            ->setType($bookData->getType())
            ->setYear($bookData->getYear())
            ->setPrice($bookData->getPrice());

        return $book;
    }

    private function buildUri($id)
    {
        return "/books/$id";
    }
}
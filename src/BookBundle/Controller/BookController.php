<?php
namespace BookBundle\Controller;

use BookBundle\Exception\BookNotFountException;
use BookBundle\Service\BooksService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @NamePrefix("api_bookstore_books_book_")
 */
class BookController extends FOSRestController
{
    /**
     * @Rest\View()
     */
    public function getAction($id)
    {
        try {
            /** @var BooksService $booksService */
            $booksService = $this->container->get('api.service.books_service');
            $response = $booksService->getBook($id);
        } catch (BookNotFountException $e) {
            throw new NotFoundHttpException($e->getMessage());
        }

        return $response;
    }

    public function postAction($id)
    {
        throw new MethodNotAllowedHttpException(array());
    }

    public function putAction($id)
    {
        throw new MethodNotAllowedHttpException(array());
    }

    public function deleteAction($id)
    {
        throw new MethodNotAllowedHttpException(array());
    }
}

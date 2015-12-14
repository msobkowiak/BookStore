<?php

namespace BookBundle\Controller;

use ApiBundle\Controller\ControllerInterface;
use BookBundle\Service\BooksService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

/**
 * @NamePrefix("api_bookstore_books_book_list_")
 */
class BookListController extends FOSRestController implements ControllerInterface
{
    /**
     * @Rest\View()
     */
    public function getAction()
    {
        /** @var BooksService $booksService */
        $booksService = $this->container->get('api.service.books_service');
        $response = $booksService->getBooksList();

        return $response;
    }

    public function postAction()
    {
        throw new MethodNotAllowedHttpException(array(static::HTTP_METHOD_POST));
    }

    public function putAction()
    {
        throw new MethodNotAllowedHttpException(array(static::HTTP_METHOD_PUT));
    }

    public function deleteAction()
    {
        throw new MethodNotAllowedHttpException(array(static::HTTP_METHOD_DELETE));
    }
}

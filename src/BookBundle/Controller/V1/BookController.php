<?php

namespace BookBundle\Controller\V1;

use ApiBundle\Controller\BaseController;
use BookBundle\Service\BooksService;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

class BookController extends BaseController
{
    /**
     * @Rest\Get("/books")
     * @return Response
     */
    public function getBookAction()
    {
        /** @var BooksService $booksService */
        $booksService = $this->container->get('api.service.books_service');
        $response = $booksService->getBookingList();

        return new Response($this->serialize($response));
    }
}

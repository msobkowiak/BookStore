<?php

namespace ApiBundle\Controller\V1;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;


class BookController extends FOSRestController
{
    /**
     * @Rest\Get("/books")
     * @return Response
     */
    public function getBookAction()
    {
        return new Response("Hello, Monika!");
    }
}

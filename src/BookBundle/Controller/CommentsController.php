<?php
namespace BookBundle\Controller;

use BookBundle\Entity\CommentRequest;
use BookBundle\Service\CommentsService;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

/**
 * @NamePrefix("api_bookstore_books_comments_")
 * @RouteResource("Book")
 */
class CommentsController extends FOSRestBundle implements ClassResourceInterface
{

    public function getCommentsAction($id)
    {
        throw new MethodNotAllowedHttpException(array());
    }

    public function postCommentAction($id, Request $request)
    {
        $body = $request->getContent();
        /** @var CommentRequest $requestEntity */
        $requestEntity = $this->getSerializer()->deserialize($body, CommentRequest::FULL_CLASS_NAME, 'json');

        /** @var CommentsService $commentsService */
        $commentsService = $this->container->get('api.service.comments_service');

        return $commentsService->saveComment($requestEntity, $id);
    }

    public function putCommentsAction($id)
    {
        throw new MethodNotAllowedHttpException(array());
    }

    public function deleteCommentsAction($id)
    {
        throw new MethodNotAllowedHttpException(array());
    }

    protected function getSerializer()
    {
        return $this->container->get('jms_serializer');
    }
}
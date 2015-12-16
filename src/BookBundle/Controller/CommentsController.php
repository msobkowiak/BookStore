<?php
namespace BookBundle\Controller;

use BookBundle\Entity\CommentRequest;
use BookBundle\Exception\BookNotFountException;
use BookBundle\Service\CommentsService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Acl\Exception\Exception;
use UserBundle\Exception\UserNotFoundException;

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

    /**
     * @Rest\View()
     */
    public function postCommentAction($id, Request $request)
    {
        $body = $request->getContent();
        try {
            /** @var CommentRequest $requestEntity */
            $requestEntity = $this->getSerializer()->deserialize($body, CommentRequest::FULL_CLASS_NAME, 'json');

            /** @var CommentsService $commentsService */
            $commentsService = $this->container->get('api.service.comments_service');

        } catch (BookNotFountException $e) {
            throw new NotFoundHttpException($e->getMessage());
        } catch (UserNotFoundException $e) {
            throw new NotFoundHttpException($e->getMessage());
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }


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
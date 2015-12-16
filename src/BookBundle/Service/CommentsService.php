<?php

namespace BookBundle\Service;

use BookBundle\BookBundle;
use BookBundle\Entity\Comment;
use BookBundle\Entity\CommentRequest;
use BookBundle\Exception\BookNotFountException;
use BookBundle\Repository\BooksRepository;
use Doctrine\ORM\EntityManager;
use UserBundle\Exception\UserNotFoundException;
use UserBundle\UserBundle;

class CommentsService
{
    /**
     * @var EntityManager
     */
    protected $entityManager;


    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function saveComment(CommentRequest $request, $bookId)
    {
        $repo = $this->entityManager->getRepository('BookBundle:Book');
        $book = $repo->find($bookId);
        $this->validateBook($book);

        /** User $user */
        $repo = $this->entityManager->getRepository('UserBundle:User');
        $user = $repo->findOneBy(array('username' => $request->getUsername()));
        $this->validateUser($user);

        $comment = new Comment();
        $comment
            ->setUser($user)
            ->setBook($book)
            ->setContent($request->getContent());

        $this->entityManager->persist($comment);
        $this->entityManager->flush();

        return $comment;
    }

    protected function validateUser($user)
    {
        if (!$user) {
            throw new UserNotFoundException("Invalid user");
        }
    }

    protected function validateBook($book)
    {
        if (!$book) {
            throw new BookNotFountException("Book not found");
        }
    }
}

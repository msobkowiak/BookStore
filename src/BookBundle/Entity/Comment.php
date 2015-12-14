<?php
namespace BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comments")
 */
class Comment
{
    protected $book;

    protected $user;

    protected $content;

}

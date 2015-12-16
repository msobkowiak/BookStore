<?php
namespace BookBundle\Entity;

use JMS\Serializer\Annotation\Type;

class CommentRequest
{
    const FULL_CLASS_NAME = 'BookBundle\Entity\CommentRequest';

    /**
     * @var string
     * @Type("string")
     */
    protected $username;

    /**
     * @var string
     * @Type("string")
     */
    protected $content;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}
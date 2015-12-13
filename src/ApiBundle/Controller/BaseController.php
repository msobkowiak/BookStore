<?php
namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializerBuilder;

class BaseController extends FOSRestController
{
    /**
     * @param $data
     * @param string $format
     * @return mixed|string
     */
    protected function serialize($data, $format = 'json')
    {
        $serializer = SerializerBuilder::create()->build();
        return $serializer->serialize($data, $format);
    }
}

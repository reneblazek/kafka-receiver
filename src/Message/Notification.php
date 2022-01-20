<?php

namespace App\Message;


use App\Entity\Message;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Notification
{
    private $context;

    public function __construct(Message $message){
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $this->context = $serializer->serialize($message, 'json');
    }

    public function getContext(): string
    {
        return $this->context;
    }

}
<?php

namespace App\Message;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Messenger\Stamp\StampInterface;

class UniqueIdStamp implements StampInterface
{

    private $uniqueId;

    public function __construct(){
        $this->uniqueId = uniqid();
    }

    /**
     * @return string
     */
    public function getUniqueId(): string
    {
        return $this->uniqueId;
    }

}
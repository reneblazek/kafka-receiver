<?php

namespace App\Messenger;

use App\Message\UniqueIdStamp;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class AuditMiddleware implements MiddlewareInterface
{

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        if(null === $envelope->last(UniqueIdStamp::class)){
            $envelope = $envelope->with(new UniqueIdStamp());
        }
        /** @var UniqueIdStamp $stamp */
        $stamp = $envelope->last(UniqueIdStamp::class);

        return $stack->next()->handle($envelope, $stack);
    }
}
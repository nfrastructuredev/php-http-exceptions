<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class NotAuthenticatedException extends \DomainException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_UNAUTHORIZED)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_UNAUTHORIZED);
    }
}
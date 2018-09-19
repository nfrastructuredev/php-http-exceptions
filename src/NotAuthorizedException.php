<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class NotAuthorizedException extends \DomainException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_FORBIDDEN)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_FORBIDDEN);
    }
}
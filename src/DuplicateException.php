<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class DuplicateException extends \DomainException
{
    public function __construct( $message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_CONFLICT)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_CONFLICT);
    }
}
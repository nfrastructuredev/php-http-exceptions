<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class NotFoundException extends \OutOfBoundsException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_NOT_FOUND)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_NOT_FOUND);
    }
}
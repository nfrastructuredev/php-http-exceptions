<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class FileTooLongException extends \OutOfRangeException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_UNPROCESSABLE_ENTITY)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_UNPROCESSABLE_ENTITY);
    }
}
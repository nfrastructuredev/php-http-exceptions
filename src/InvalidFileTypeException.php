<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class InvalidFileTypeException extends \InvalidArgumentException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_UNSUPPORTED_MEDIA_TYPE)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_UNSUPPORTED_MEDIA_TYPE);
    }
}
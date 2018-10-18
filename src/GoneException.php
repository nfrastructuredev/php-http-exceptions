<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class GoneException extends \OutOfRangeException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_GONE)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_GONE);
    }
}
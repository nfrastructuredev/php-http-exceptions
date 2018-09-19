<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class FeatureDisabledException extends \BadMethodCallException
{
    public function __construct($message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_METHOD_NOT_ALLOWED)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_METHOD_NOT_ALLOWED);
    }
}
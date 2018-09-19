<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatuscodes;

class ValidationException extends \InvalidArgumentException
{
    /**
     * @var string[]
     */
    protected $errors = [];

    public function __construct(array $errors, $message = null)
    {
        $message = null === $message
            ? StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_BAD_REQUEST)
            : $message;

        parent::__construct($message, Httpstatuscodes::HTTP_BAD_REQUEST);
        $this->errors = $errors;
    }

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
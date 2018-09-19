<?php

namespace Nfra\Exceptions;

use Lukasoppermann\Httpstatus\Httpstatus;
use Lukasoppermann\Httpstatus\Httpstatuscodes;

class StaticStatusFactory
{
    /**
     * @var Httpstatus
     */
    protected static $statues;

    public static function factory(): Httpstatus
    {
        if ( null === static::$statues ) {
            static::$statues = new Httpstatus();
        }

        return static::$statues;
    }

    public static function getStatusCodeFromException(\Exception $exception): int
    {
        return static::factory()->hasStatusCode($exception->getCode())
            ? $exception->getCode()
            : Httpstatuscodes::HTTP_INTERNAL_SERVER_ERROR;
    }

    public static function getReasonPhraseFromException(\Exception $exception): string
    {
        return static::factory()->getReasonPhrase(static::getStatusCodeFromException($exception));
    }
}
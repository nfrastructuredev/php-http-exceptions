<?php

namespace Nfra\ExceptionsTest;

use Nfra\Exceptions\InvalidFileTypeException;
use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class InvalidFileTypeExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(InvalidFileTypeException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_UNSUPPORTED_MEDIA_TYPE)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_UNSUPPORTED_MEDIA_TYPE);

        throw new InvalidFileTypeException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(InvalidFileTypeException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_UNSUPPORTED_MEDIA_TYPE);

        throw new InvalidFileTypeException('Foo not found');
    }
}

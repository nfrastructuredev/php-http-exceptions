<?php

namespace Nfra\ExceptionsTest;

use Nfra\Exceptions\FileTooLongException;
use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class FileTooLongExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(FileTooLongException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_UNPROCESSABLE_ENTITY)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_UNPROCESSABLE_ENTITY);

        throw new FileTooLongException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(FileTooLongException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_UNPROCESSABLE_ENTITY);

        throw new FileTooLongException('Foo not found');
    }
}

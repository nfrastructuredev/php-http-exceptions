<?php

namespace Nfra\ExceptionsTest;

use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\DuplicateException;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class DuplicateExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(DuplicateException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_CONFLICT)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_CONFLICT);

        throw new DuplicateException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(DuplicateException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_CONFLICT);

        throw new DuplicateException('Foo not found');
    }
}

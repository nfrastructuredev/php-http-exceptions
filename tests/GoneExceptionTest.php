<?php

namespace Nfra\ExceptionsTest;

use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\GoneException;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class GoneExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(GoneException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_GONE)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_GONE);

        throw new GoneException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(GoneException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_GONE);

        throw new GoneException('Foo not found');
    }
}

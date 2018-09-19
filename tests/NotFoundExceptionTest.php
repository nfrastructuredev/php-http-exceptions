<?php

namespace Nfra\ExceptionsTest;

use Nfra\Exceptions\NotFoundException;
use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class NotFoundExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_NOT_FOUND)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_NOT_FOUND);

        throw new NotFoundException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_NOT_FOUND);

        throw new NotFoundException('Foo not found');
    }
}

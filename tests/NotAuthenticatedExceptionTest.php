<?php

namespace Nfra\ExceptionsTest;

use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\NotAuthenticatedException;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class NotAuthenticatedExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(NotAuthenticatedException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_UNAUTHORIZED)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_UNAUTHORIZED);

        throw new NotAuthenticatedException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(NotAuthenticatedException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_UNAUTHORIZED);

        throw new NotAuthenticatedException('Foo not found');
    }
}

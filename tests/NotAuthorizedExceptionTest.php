<?php

namespace Nfra\ExceptionsTest;

use Nfra\Exceptions\NotAuthorizedException;
use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;


class NotAuthorizedExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(NotAuthorizedException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_FORBIDDEN)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_FORBIDDEN);

        throw new NotAuthorizedException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(NotAuthorizedException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_FORBIDDEN);

        throw new NotAuthorizedException('Foo not found');
    }
}

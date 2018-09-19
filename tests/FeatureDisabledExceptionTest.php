<?php

namespace Nfra\ExceptionsTest;

use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\FeatureDisabledException;
use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class FeatureDisabledExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(FeatureDisabledException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_METHOD_NOT_ALLOWED)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_METHOD_NOT_ALLOWED);

        throw new FeatureDisabledException();
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(FeatureDisabledException::class);
        $this->expectExceptionMessage('Foo not found');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_METHOD_NOT_ALLOWED);

        throw new FeatureDisabledException('Foo not found');
    }
}

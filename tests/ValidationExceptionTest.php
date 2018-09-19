<?php

namespace Nfra\ExceptionsTest;

use Lukasoppermann\Httpstatus\Httpstatuscodes;
use Nfra\Exceptions\StaticStatusFactory;
use Nfra\Exceptions\ValidationException;
use PHPUnit\Framework\TestCase;

class ValidationExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithNoMessage()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage(
            StaticStatusFactory::factory()->getReasonPhrase(Httpstatuscodes::HTTP_BAD_REQUEST)
        );
        $this->expectExceptionCode(Httpstatuscodes::HTTP_BAD_REQUEST);

        throw new ValidationException(['foo' => 'bar']);
    }

    /**
     * @test
     */
    public function testItShouldSetCorrectCodeWithMessage()
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Invalid foo');
        $this->expectExceptionCode(Httpstatuscodes::HTTP_BAD_REQUEST);

        throw new ValidationException(['foo' => 'bar'], 'Invalid foo');
    }

    /**
     * @test
     */
    public function testItShouldStoreErrors()
    {
        $exception = new ValidationException(['foo' => 'bar'], 'Invalid foo');
        $this->assertEquals(
            ['foo' => 'bar'],
            $exception->getErrors(),
            ValidationException::class . ' did not store the errors correctly'
        );
    }
}

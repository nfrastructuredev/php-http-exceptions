<?php

namespace Nfra\ExceptionsTest;

use Nfra\Exceptions\StaticStatusFactory;
use PHPUnit\Framework\TestCase;

class StaticStatusFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function testItShouldGetStatusCodeFromException()
    {
        $exception = new \Exception('foo', 404);
        $this->assertEquals(
            404,
            StaticStatusFactory::getStatusCodeFromException($exception),
            StaticStatusFactory::class . ' did not generate 404 status code'
        );
    }

    /**
     * @test
     */
    public function testItShouldDefaultToInternalServerErrorWithNoCode()
    {
        $exception = new \Exception('foo');
        $this->assertEquals(
            500,
            StaticStatusFactory::getStatusCodeFromException($exception),
            StaticStatusFactory::class . ' did not generate 500 status code with no code'
        );
    }

    /**
     * @test
     */
    public function testItShouldDefaultToInternalServerErrorWithNonHttpStatus()
    {
        $exception = new \Exception('foo', 42);
        $this->assertEquals(
            500,
            StaticStatusFactory::getStatusCodeFromException($exception),
            StaticStatusFactory::class . ' did not generate 500 status code with non http status code'
        );
    }

    /**
     * @test
     */
    public function testItShouldGenerateCorrectStatusMessage()
    {
        $exception = new \Exception('foo', 500);
        $this->assertEquals(
            'Internal Server Error',
            StaticStatusFactory::getReasonPhraseFromException($exception),
            StaticStatusFactory::class . ' did not generate correct response message'
        );
    }
}

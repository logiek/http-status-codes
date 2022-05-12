<?php

declare(strict_types=1);

namespace Logiek\Http\Tests;

use Logiek\Http\Exceptions\InvalidReasonPhraseException;
use Logiek\Http\Exceptions\InvalidStatusCodeException;
use Logiek\Http\StatusCode;
use PHPUnit\Framework\TestCase;

class StatusCodeTest extends TestCase
{
    public function testIsArrayOnGet(): void
    {
        $this->assertIsArray(StatusCode::get());
    }

    public function testIsStringOnGetReasonPhrase(): void
    {
        $this->assertIsString(StatusCode::getReasonPhrase(StatusCode::HTTP_OK));
    }

    public function testGetReasonPhrase(): void
    {
        $this->assertEquals('Not Found', StatusCode::getReasonPhrase(404));
    }

    public function testExpectInvalidStatusCodeExceptionOnGetReasonPhraseWithNonExistentStatusCode(): void
    {
        $this->expectException(InvalidStatusCodeException::class);

        StatusCode::getReasonPhrase(rand(600, getrandmax()));
    }

    public function testIsIntOnGetStatusCode(): void
    {
        $this->assertIsInt(StatusCode::getStatusCode('Not Found'));
    }

    public function testGetStatusCode(): void
    {
        $this->assertEquals(404, StatusCode::getStatusCode('Not Found'));
    }

    public function testExpectInvalidReasonPhraseExceptionOnGetStatusCodeWithNonExistentReasonPhrase(): void
    {
        $this->expectException(InvalidReasonPhraseException::class);

        StatusCode::getStatusCode('Lorem ipsum');
    }
}

<?php

declare(strict_types=1);

namespace Logiek\Http\Tests;

use InvalidArgumentException;
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

    public function testExpectExceptionOnGetReasonPhraseWithNonExistentStatusCode(): void
    {
        $this->expectException(InvalidArgumentException::class);

        StatusCode::getReasonPhrase(rand(600, getrandmax()));
    }
}

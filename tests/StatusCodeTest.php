<?php

declare(strict_types=1);

namespace Logiek\Http\Tests;

use InvalidArgumentException;
use Logiek\Http\StatusCode;
use PHPUnit\Framework\TestCase;

final class StatusCodeTest extends TestCase
{
    public function testIsExistentReasonPhraseOnExistentStatusCode()
    {
        $this->assertEquals('OK', StatusCode::getReasonPhrase(StatusCode::HTTP_OK));
    }

    public function testIsNonExistentReasonPhraseOnNonExistentStatusCode()
    {
        $this->expectException(InvalidArgumentException::class);

        StatusCode::getReasonPhrase(rand(600, getrandmax()));
    }
}

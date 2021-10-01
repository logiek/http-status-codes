<?php

declare(strict_types=1);

namespace Logiek\Http\Tests;

use InvalidArgumentException;
use Logiek\Http\StatusCodes;
use PHPUnit\Framework\TestCase;

final class StatusCodesTest extends TestCase
{
    public function testIsExistentReasonPhraseOnExistentStatusCode()
    {
        $this->assertEquals('OK', StatusCodes::getReasonPhrase(StatusCodes::HTTP_OK));
    }

    public function testIsNonExistentReasonPhraseOnNonExistentStatusCode()
    {
        $this->expectException(InvalidArgumentException::class);

        StatusCodes::getReasonPhrase(rand(600, getrandmax()));
    }
}

<?php

declare(strict_types=1);

namespace Logiek\Http\Exceptions;

use Exception;
use Throwable;

class InvalidReasonPhraseException extends Exception implements StatusCodeException
{
    public function __construct($message = 'The HTTP status code is not found by the given reason phrase.', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

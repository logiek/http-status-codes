<?php

declare(strict_types=1);

namespace Logiek\Http\Exceptions;

use Exception;
use Throwable;

class InvalidStatusCodeException extends Exception implements StatusCodeException
{
    public function __construct($message = 'The given HTTP status code doesn\'t exist.', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

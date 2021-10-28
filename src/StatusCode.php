<?php

declare(strict_types=1);

namespace Logiek\Http;

use InvalidArgumentException;

abstract class StatusCode
{
    public const HTTP_CONTINUE = 100; // RFC7231

    public const HTTP_SWITCHING_PROTOCOLS = 101; // RFC7231

    public const HTTP_PROCESSING = 102; // RFC2518

    public const HTTP_EARLY_HINTS = 103; // RFC8297

    public const HTTP_OK = 200; // RFC7231

    public const HTTP_CREATED = 201; // RFC7231

    public const HTTP_ACCEPTED = 202; // RFC7231

    public const HTTP_NON_AUTHORITATIVE_INFORMATION = 203; // RFC7231

    public const HTTP_NO_CONTENT = 204; // RFC7231

    public const HTTP_RESET_CONTENT = 205; // RFC7231

    public const HTTP_PARTIAL_CONTENT = 206; // RFC7233

    public const HTTP_MULTI_STATUS = 207; // RFC4918

    public const HTTP_ALREADY_REPORTED = 208; // RFC5842

    public const HTTP_IM_USED = 226; // RFC3229

    public const HTTP_MULTIPLE_CHOICES = 300; // RFC7231

    public const HTTP_MOVED_PERMANENTLY = 301; // RFC7231

    public const HTTP_FOUND = 302; // RFC7231

    public const HTTP_SEE_OTHER = 303; // RFC7231

    public const HTTP_NOT_MODIFIED = 304; // RFC7232

    public const HTTP_USE_PROXY = 305; // RFC7231

    public const HTTP_SWITCH_PROXY = 306; // RFC7231

    public const HTTP_TEMPORARY_REDIRECT = 307; // RFC7231

    public const HTTP_PERMANENT_REDIRECT = 308; // RFC7538

    public const HTTP_BAD_REQUEST = 400; // RFC7231

    public const HTTP_UNAUTHORIZED = 401; // RFC7235

    public const HTTP_PAYMENT_REQUIRED = 402; // RFC7231

    public const HTTP_FORBIDDEN = 403; // RFC7231

    public const HTTP_NOT_FOUND = 404; // RFC7231

    public const HTTP_METHOD_NOT_ALLOWED = 405; // RFC7231

    public const HTTP_NOT_ACCEPTABLE = 406; // RFC7231

    public const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407; // RFC7235

    public const HTTP_REQUEST_TIMEOUT = 408; // RFC7231

    public const HTTP_CONFLICT = 409; // RFC7231

    public const HTTP_GONE = 410; // RFC7231

    public const HTTP_LENGTH_REQUIRED = 411; // RFC7231

    public const HTTP_PRECONDITION_FAILED = 412; // RFC7232, RFC8144

    public const HTTP_PAYLOAD_TOO_LARGE = 413; // RFC7231

    public const HTTP_URI_TOO_LONG = 414; // RFC7231

    public const HTTP_UNSUPPORTED_MEDIA_TYPE = 415; // RFC7231, RFC7694

    public const HTTP_RANGE_NOT_SATISFIABLE = 416; // RFC7233

    public const HTTP_EXPECTATION_FAILED = 417; // RFC7231

    public const HTTP_MISDIRECTED_REQUEST = 421; // RFC7540

    public const HTTP_UNPROCESSABLE_ENTITY = 422;  // RFC4918

    public const HTTP_LOCKED = 423; // RFC4918

    public const HTTP_FAILED_DEPENDENCY = 424; // RFC4918

    public const HTTP_TOO_EARLY = 425; // RFC8470

    public const HTTP_UPGRADE_REQUIRED = 426; // RFC7231

    public const HTTP_PRECONDITION_REQUIRED = 428; // RFC6585

    public const HTTP_TOO_MANY_REQUESTS = 429; // RFC6585

    public const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431; // RFC6585

    public const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451; // RFC7725

    public const HTTP_INTERNAL_SERVER_ERROR = 500; // RFC7231

    public const HTTP_NOT_IMPLEMENTED = 501; // RFC7231

    public const HTTP_BAD_GATEWAY = 502; // RFC7231

    public const HTTP_SERVICE_UNAVAILABLE = 503; // RFC7231

    public const HTTP_GATEWAY_TIMEOUT = 504; // RFC7231

    public const HTTP_VERSION_NOT_SUPPORTED = 505; // RFC7231

    public const HTTP_VARIANT_ALSO_NEGOTIATES = 506; // RFC2295

    public const HTTP_INSUFFICIENT_STORAGE = 507; // RFC4918

    public const HTTP_LOOP_DETECTED = 508; // RFC5842

    public const HTTP_NOT_EXTENDED = 510; // RFC2774

    public const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511; // RFC6585

    /**
     * @var string[]
     */
    private static array $reasonPhrases = [
        self::HTTP_CONTINUE => 'Continue',
        self::HTTP_SWITCHING_PROTOCOLS => 'Switching Protocols',
        self::HTTP_PROCESSING => 'Processing',
        self::HTTP_EARLY_HINTS => 'Early Hints',
        self::HTTP_OK => 'OK',
        self::HTTP_CREATED => 'Created',
        self::HTTP_ACCEPTED => 'Accepted',
        self::HTTP_NON_AUTHORITATIVE_INFORMATION => 'Non-Authoritative Information',
        self::HTTP_NO_CONTENT => 'No Content',
        self::HTTP_RESET_CONTENT => 'Reset Content',
        self::HTTP_PARTIAL_CONTENT => 'Partial Content',
        self::HTTP_MULTI_STATUS => 'Multi-Status',
        self::HTTP_ALREADY_REPORTED => 'Already Reported',
        self::HTTP_IM_USED => 'IM Used',
        self::HTTP_MULTIPLE_CHOICES => 'Multiple Choices',
        self::HTTP_MOVED_PERMANENTLY => 'Moved Permanently',
        self::HTTP_FOUND => 'Found',
        self::HTTP_SEE_OTHER => 'See Other',
        self::HTTP_NOT_MODIFIED => 'Not Modified',
        self::HTTP_USE_PROXY => 'Use Proxy',
        self::HTTP_SWITCH_PROXY => 'Switch Proxy', // No longer used
        self::HTTP_TEMPORARY_REDIRECT => 'Temporary Redirect',
        self::HTTP_PERMANENT_REDIRECT => 'Permanent Redirect',
        self::HTTP_BAD_REQUEST => 'Bad Request',
        self::HTTP_UNAUTHORIZED => 'Unauthorized',
        self::HTTP_PAYMENT_REQUIRED => 'Payment Required',
        self::HTTP_FORBIDDEN => 'Forbidden',
        self::HTTP_NOT_FOUND => 'Not Found',
        self::HTTP_METHOD_NOT_ALLOWED => 'Method Not Allowed',
        self::HTTP_NOT_ACCEPTABLE => 'Not Acceptable',
        self::HTTP_PROXY_AUTHENTICATION_REQUIRED => 'Proxy Authentication Required',
        self::HTTP_REQUEST_TIMEOUT => 'Request Timeout',
        self::HTTP_CONFLICT => 'Conflict',
        self::HTTP_GONE => 'Gone',
        self::HTTP_LENGTH_REQUIRED => 'Length Required',
        self::HTTP_PRECONDITION_FAILED => 'Precondition Failed',
        self::HTTP_PAYLOAD_TOO_LARGE => 'Payload Too Large',
        self::HTTP_URI_TOO_LONG => 'URI Too Long',
        self::HTTP_UNSUPPORTED_MEDIA_TYPE => 'Unsupported Media Type',
        self::HTTP_RANGE_NOT_SATISFIABLE => 'Range Not Satisfiable',
        self::HTTP_EXPECTATION_FAILED => 'Expectation Failed',
        self::HTTP_MISDIRECTED_REQUEST => 'Misdirected Request',
        self::HTTP_UNPROCESSABLE_ENTITY => 'Unprocessable Entity',
        self::HTTP_LOCKED => 'Locked',
        self::HTTP_FAILED_DEPENDENCY => 'Failed Dependency',
        self::HTTP_TOO_EARLY => 'Too Early',
        self::HTTP_UPGRADE_REQUIRED => 'Upgrade Required',
        self::HTTP_PRECONDITION_REQUIRED => 'Precondition Required',
        self::HTTP_TOO_MANY_REQUESTS => 'Too Many Requests',
        self::HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE => 'Request Header Fields Too Large',
        self::HTTP_UNAVAILABLE_FOR_LEGAL_REASONS => 'Unavailable For Legal Reasons',
        self::HTTP_INTERNAL_SERVER_ERROR => 'Internal Server Error',
        self::HTTP_NOT_IMPLEMENTED => 'Not Implemented',
        self::HTTP_BAD_GATEWAY => 'Bad Gateway',
        self::HTTP_SERVICE_UNAVAILABLE => 'Service Unavailable',
        self::HTTP_GATEWAY_TIMEOUT => 'Gateway Timeout',
        self::HTTP_VERSION_NOT_SUPPORTED => 'HTTP Version Not Supported',
        self::HTTP_VARIANT_ALSO_NEGOTIATES => 'Variant Also Negotiates',
        self::HTTP_INSUFFICIENT_STORAGE => 'Insufficient Storage',
        self::HTTP_LOOP_DETECTED => 'Loop Detected',
        self::HTTP_NOT_EXTENDED => 'Not Extended',
        self::HTTP_NETWORK_AUTHENTICATION_REQUIRED => 'Network Authentication Required',
    ];

    public static function getReasonPhrase(int $statusCode): string
    {
        if (isset(self::$reasonPhrases[$statusCode])) {
            return self::$reasonPhrases[$statusCode];
        }

        throw new InvalidArgumentException('The HTTP status code "' . $statusCode . '" is not valid.');
    }
}

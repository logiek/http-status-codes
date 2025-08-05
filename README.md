⚠️ THIS PACKAGE IS NO LONGER MAINTAINED ⚠️  
This repository has been discontinued and is no longer receiving updates or support.  

# http-status-codes

[![Latest Stable Version](https://poser.pugx.org/logiek/http-status-codes/v/stable)](https://packagist.org/packages/logiek/http-status-codes) [![Total Downloads](https://poser.pugx.org/logiek/http-status-codes/downloads)](https://packagist.org/packages/logiek/http-status-codes) [![License](https://poser.pugx.org/logiek/http-status-codes/license)](https://packagist.org/packages/logiek/http-status-codes) [![PHP Version Require](http://poser.pugx.org/logiek/http-status-codes/require/php)](https://packagist.org/packages/logiek/http-status-codes)

Constants enumerating the HTTP Status Codes. Based on the [HTTP Status Code Registry](https://www.iana.org/assignments/http-status-codes/http-status-codes.xml).

## Installation

You can install the package via Composer:

``` bash
composer require logiek/http-status-codes
```

## Usage

```php
use Logiek\Http\StatusCode;

StatusCode::HTTP_OK; // 200
StatusCode::get(); // [100 => 'Continue', 101 => 'Switching Protocols', ...]
StatusCode::getReasonPhrase(StatusCode::HTTP_OK); // OK
StatusCode::getStatusCode('Not Found'); // 404
```

## Changelog

Please see the [CHANGELOG](CHANGELOG.md) for more information about recent changes.

## Testing

Run the tests with:

``` bash
composer test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

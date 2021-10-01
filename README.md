# http-status-codes

[![Latest Stable Version](https://poser.pugx.org/logiek/http-status-codes/v/stable)](https://packagist.org/packages/logiek/http-status-codes) [![Total Downloads](https://poser.pugx.org/logiek/http-status-codes/downloads)](https://packagist.org/packages/logiek/http-status-codes) [![License](https://poser.pugx.org/logiek/http-status-codes/license)](https://packagist.org/packages/logiek/http-status-codes) [![PHP Version Require](http://poser.pugx.org/logiek/http-status-codes/require/php)](https://packagist.org/packages/logiek/http-status-codes)

Constants enumerating the HTTP Status Codes. Based on the [HTTP Status Code Registry](https://www.iana.org/assignments/http-status-codes/http-status-codes.xml).

## Usage
```php
use Logiek\Http\StatusCodes;

echo StatusCodes::HTTP_OK; // 200
echo StatusCodes::getReasonPhrase(StatusCodes::HTTP_OK); // OK
```

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

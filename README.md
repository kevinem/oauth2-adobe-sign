# Adobe Sign Provider for OAuth 2.0 Client

https://acrobat.adobe.com/us/en/sign.html

This package provides Adobe Sign OAuth 2.0 support for The PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).

[![Latest Stable Version](https://poser.pugx.org/kevinem/oauth2-adobe-sign/v/stable?format=flat-square)](https://packagist.org/packages/kevinem/oauth2-adobe-sign)
[![License](https://poser.pugx.org/kevinem/oauth2-adobe-sign/license?format=flat-square)](https://packagist.org/packages/kevinem/oauth2-adobe-sign)

## Installation

To install, use composer:

```
composer require kevinem/oauth2-adobe-sign
```

## Usage

Use [The League's OAuth2 Client](https://github.com/thephpleague/oauth2-client) with `\KevinEm\OAuth2\Client\AdobeSign` as the provider.

### Authorization Code Flow

```php
$provider = new KevinEm\OAuth2\Client\AdobeSign([
    'clientId'          => 'your_client_id',
    'clientSecret'      => 'your_client_secret',
    'redirectUri'       => 'your_callback',
    'scope'             => [
          'scope1:type',
          'scope2:type'
    ]
]);
```

## License 

The MIT License (MIT)
Copyright (c) 2016 Kevin Em

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of
the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.

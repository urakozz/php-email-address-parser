PHP Email Address Parser
==============

[![Build Status](https://travis-ci.org/urakozz/php-email-address-parser.svg?branch=master)](https://travis-ci.org/urakozz/php-email-address-parser)
[![Coverage Status](https://img.shields.io/coveralls/urakozz/php-email-address-parser.svg)](https://coveralls.io/r/urakozz/php-email-address-parser?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/urakozz/php-email-address-parser/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/urakozz/php-email-address-parser/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/kozz/email-address-parser/v/stable.svg)](https://packagist.org/packages/kozz/email-address-parser)
[![Latest Unstable Version](https://poser.pugx.org/kozz/email-address-parser/v/unstable.svg)](https://packagist.org/packages/kozz/email-address-parser)
[![License](http://img.shields.io/packagist/l/kozz/email-address-parser.svg)](https://packagist.org/packages/kozz/email-address-parser)

Library that allows you simply parse your email addresses from string or array and autocomplete domain name if needed.

Installation
------------

Add the package to your `composer.json` and run `composer update`.

    {
        "require": {
            "kozz/email-address-parser": "*"
        }
    }
    
Examples
--------

#### Parse String

```php
    $emails = 'example0@gmail.com , example1@gmail.com example2@gmail.com';
    $array = AddressParser::parse($emails)->toArray();
    //$array = ['example0@gmail.com','example1@gmail.com', 'example2@gmail.com']
```

#### Autocomplete domain

```php
    $emails = 'john@, aaron@, no-reply@gmail.com';
    $array = AddressParser::parse($emails, 'company.com')->toArray();
    //$array = ['john@company.com', 'aaron@company.com', 'no-reply@gmail.com']
```

#### Built-in email validation

```php
    $emails = 'john@, no-reply@gmail.com, ... skjs  sljfasfn afs, jhsldf.sdfjk"""85;@#$ ';
    $array = AddressParser::parse($emails, 'company.com')->toArray();
    //$array = ['john@company.com', 'no-reply@gmail.com']
```

[![Latest Stable Version](https://poser.pugx.org/bentools/doctrine-ulid/v/stable)](https://packagist.org/packages/bentools/doctrine-ulid)
[![License](https://poser.pugx.org/bentools/doctrine-ulid/license)](https://packagist.org/packages/bentools/doctrine-ulid)
[![Build Status](https://img.shields.io/travis/bpolaszek/doctrine-ulid/master.svg?style=flat-square)](https://travis-ci.org/bpolaszek/doctrine-ulid)
[![Coverage Status](https://coveralls.io/repos/github/bpolaszek/doctrine-ulid/badge.svg?branch=master)](https://coveralls.io/github/bpolaszek/doctrine-ulid?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/bpolaszek/doctrine-ulid.svg?style=flat-square)](https://scrutinizer-ci.com/g/bpolaszek/doctrine-ulid)
[![Total Downloads](https://poser.pugx.org/bentools/doctrine-ulid/downloads)](https://packagist.org/packages/bentools/doctrine-ulid)

# Doctrine ULID generator

This small library adds support for [ULID](https://github.com/ulid/spec) in Doctrine.

ULIDs act like UUIDs that can be lexicographically sorted. ULIDs also have a smaller footprint (26 ANSI characters vs. 36 for UUIDs);

Installation
------------

```bash
composer require bentools/doctrine-ulid
```

Usage
-----

Use the provided class as a custom ID generator:

```php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Foo
{

    /**
     * @var string
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="\BenTools\ULIDGenerator")
     * @ORM\Column(type="string", length=26)
     */
    private $id;
    
    // ...
    
}
```

Tests
-----

```bash
./vendor/bin/phpunit
```

License
-------

MIT.
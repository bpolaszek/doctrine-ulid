[![Latest Stable Version](https://poser.pugx.org/bentools/doctrine-ulid/v/stable)](https://packagist.org/packages/bentools/doctrine-ulid)
[![License](https://poser.pugx.org/bentools/doctrine-ulid/license)](https://packagist.org/packages/bentools/doctrine-ulid)
[![Build Status](https://img.shields.io/travis/bpolaszek/doctrine-ulid/master.svg?style=flat-square)](https://travis-ci.org/bpolaszek/doctrine-ulid)
[![Coverage Status](https://coveralls.io/repos/github/bpolaszek/doctrine-ulid/badge.svg?branch=master)](https://coveralls.io/github/bpolaszek/doctrine-ulid?branch=master)
[![Quality Score](https://img.shields.io/scrutinizer/g/bpolaszek/doctrine-ulid.svg?style=flat-square)](https://scrutinizer-ci.com/g/bpolaszek/doctrine-ulid)
[![Total Downloads](https://poser.pugx.org/bentools/doctrine-ulid/downloads)](https://packagist.org/packages/bentools/doctrine-ulid)

# Doctrine ULID generator

This small library adds support for [ULID](https://github.com/ulid/spec) in Doctrine.

ULIDs act like UUIDs that can be lexicographically sorted. ULIDs also have a smaller footprint (26 ANSI characters vs. 36 for UUIDs);

This package integrates [robinvdvleuten/ulid](https://github.com/robinvdvleuten/php-ulid) as a `CustomIdGenerator`.

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

Or use the following trait:


```php
use Doctrine\ORM\Mapping as ORM;
use BenTools\GeneratedULIDTrait;

/**
 * @ORM\Entity()
 */
class Foo
{

    use GeneratedULIDTrait;
    
    // ... 
    
}
```

If you want to set ULIDs by yourself (this way, they can be generated on the client side), use the `EditableULIDTrait` which will expose a `setId()` method:


```php
use Doctrine\ORM\Mapping as ORM;
use BenTools\EditableULIDTrait;

/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Foo
{

    use EditableULIDTrait;
    
    // ... 
    
}
```

- If `setId()` is not called, an ULID will be automatically generated on persist.
- Don't forget to add a `@HasLifecycleCallbacks()` annotation on top of your entity for this behavior to work properly.


Tests
-----

```bash
./vendor/bin/phpunit
```

License
-------

MIT.

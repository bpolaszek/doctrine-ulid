<?php

namespace BenTools\ULID\Tests\Entity;

use BenTools\GeneratedULIDTrait;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity()
 */
class GeneratedULIDEntity extends ULIDEntity
{
    use GeneratedULIDTrait;
}

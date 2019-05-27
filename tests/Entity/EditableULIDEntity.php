<?php

namespace BenTools\ULID\Tests\Entity;

use BenTools\EditableULIDTrait;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

/**
 * @Entity()
 * @HasLifecycleCallbacks()
 */
class EditableULIDEntity extends ULIDEntity
{

    use EditableULIDTrait;
}

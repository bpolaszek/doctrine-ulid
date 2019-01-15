<?php

namespace BenTools;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use Ulid\Ulid;

final class ULIDGenerator extends AbstractIdGenerator
{
    /**
     * @inheritDoc
     */
    public function generate(EntityManager $em, $entity)
    {
        return (string) Ulid::generate();
    }
}

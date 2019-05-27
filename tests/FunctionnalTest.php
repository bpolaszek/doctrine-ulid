<?php

namespace BenTools\ULID\Tests;

use BenTools\ULID\Tests\Entity\EditableULIDEntity;
use BenTools\ULID\Tests\Entity\GeneratedULIDEntity;
use BenTools\ULID\Tests\Entity\ULIDEntity;
use Noback\PHPUnitTestServiceContainer\PHPUnit\TestCaseWithEntityManager;
use PHPUnit\Framework\TestCase;
use Ulid\Ulid;

class FunctionnalTest extends TestCase
{
    use TestCaseWithEntityManager;

    protected function getEntityDirectories(): array
    {
        return [
            __DIR__.'/Entity',
        ];
    }

    public function ulidEntityClasses()
    {
        yield [GeneratedULIDEntity::class];
        yield [EditableULIDEntity::class];
    }

    /**
     * @test
     * @dataProvider ulidEntityClasses
     */
    public function it_sets_a_different_ulid_on_each_entity(string $class)
    {
        $entities = [];
        for ($i = 0; $i < 10000; $i++) {
            $entities[] = $entity = new $class();
            $this->getEntityManager()->persist($entity);
        }

        $this->getEntityManager()->flush();

        $ulids = \array_map(
            function (ULIDEntity $entity): string {
                $this->assertEquals(26, \strlen($entity->getId()));

                return $entity->getId();
            },
            $entities
        );

        $this->assertCount(10000, \array_unique($ulids));
    }

    /**
     * @test
     */
    public function editable_entity_is_editable()
    {
        $ulid = (string) Ulid::generate();
        $entity = new EditableULIDEntity();
        $entity->setId($ulid);
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        $this->assertEquals($ulid, $entity->getId());
    }
}

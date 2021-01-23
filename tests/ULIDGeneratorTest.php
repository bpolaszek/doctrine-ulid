<?php

namespace BenTools\ULID\Tests;

use BenTools\ULIDGenerator;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class ULIDGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_generates_an_ulid()
    {
        $generator = new ULIDGenerator();
        $em = $this->createMock(EntityManager::class);
        $entity = new \stdClass();
        $generated = $generator->generate($em, $entity);
        $this->assertEquals('string', gettype($generated));
        $this->assertMatchesRegularExpression('/[0-9][A-Z]/', $generated);
        $this->assertEquals(26, strlen($generated));
    }
    /**
     * @test
     */
    public function it_generates_a_different_ulid_each_time_it_is_called()
    {
        $generator = new ULIDGenerator();
        $em = $this->createMock(EntityManager::class);
        $entity = new \stdClass();

        $generated = [];

        for ($i = 1; $i <= 1000; $i++) {
            $generated[] = $generator->generate($em, $entity);
        }

        $this->assertSame($generated, array_unique($generated));
    }
}

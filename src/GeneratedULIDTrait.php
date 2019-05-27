<?php

namespace BenTools;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

trait GeneratedULIDTrait
{
    /**
     * @var string
     *
     * @Id()
     * @GeneratedValue(strategy="CUSTOM")
     * @CustomIdGenerator(class="\BenTools\ULIDGenerator")
     * @Column(type="string", length=26)
     */
    private $id;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
}

<?php

namespace BenTools;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\PrePersist;
use Ulid\Ulid;

trait EditableULIDTrait
{
    /**
     * @var string
     *
     * @Id()
     * @GeneratedValue(strategy="NONE")
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

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @PrePersist()
     * @internal
     * @codingStandardsIgnoreStart
     */
    public function _setIdOnPersist()
    { // codingStandardsIgnoreEnd
        if (null !== $this->id) {
            return;
        }

        $this->id = (string) Ulid::generate();
    }
}

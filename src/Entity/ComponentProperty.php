<?php

namespace App\Entity;

use App\Repository\ComponentPropertyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComponentPropertyRepository::class)
 */
class ComponentProperty
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Component::class, inversedBy="componentProperties")
     */
    private $component;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metaKey;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metaValue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metaUnit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metaSelector;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metaAddition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetaKey(): ?string
    {
        return $this->metaKey;
    }

    public function setMetaKey(string $metaKey): self
    {
        $this->metaKey = $metaKey;

        return $this;
    }

    public function getMetaValue(): ?string
    {
        return $this->metaValue;
    }

    public function setMetaValue(string $metaValue): self
    {
        $this->metaValue = $metaValue;

        return $this;
    }

    public function getComponent(): ?Component
    {
        return $this->component;
    }

    public function setComponent(?Component $component): self
    {
        $this->component = $component;

        return $this;
    }

    public function getMetaUnit(): ?string
    {
        return $this->metaUnit;
    }

    public function setMetaUnit(string $metaUnit): self
    {
        $this->metaUnit = $metaUnit;

        return $this;
    }

    public function getMetaSelector(): ?string
    {
        return $this->metaSelector;
    }

    public function setMetaSelector(string $metaSelector): self
    {
        $this->metaSelector = $metaSelector;

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getMetaAddition(): ?string
    {
        return $this->metaAddition;
    }

    public function setMetaAddition(string $metaAddition): self
    {
        $this->metaAddition = $metaAddition;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ComponentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComponentRepository::class)
 */
class Component
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $html;

    /**
     * @ORM\OneToMany(targetEntity=ComponentProperty::class, mappedBy="component")
     */
    private $componentProperties;

    public function __construct()
    {
        $this->componentProperties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(string $html): self
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return Collection<int, ComponentProperty>
     */
    public function getComponentProperties(): Collection
    {
        return $this->componentProperties;
    }

    public function addComponentProperty(ComponentProperty $componentProperty): self
    {
        if (!$this->componentProperties->contains($componentProperty)) {
            $this->componentProperties[] = $componentProperty;
            $componentProperty->setComponent($this);
        }

        return $this;
    }

    public function removeComponentProperty(ComponentProperty $componentProperty): self
    {
        if ($this->componentProperties->removeElement($componentProperty)) {
            // set the owning side to null (unless already changed)
            if ($componentProperty->getComponent() === $this) {
                $componentProperty->setComponent(null);
            }
        }

        return $this;
    }

    public function getPropertyByName($name)
    {
        foreach ($this->componentProperties as $property) {
            if($property->getMetaKey() === $name) {
                return $property->getMetaValue();
            }
        }

        return null;
    }
}

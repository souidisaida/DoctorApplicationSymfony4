<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class
Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\vetementfemme", mappedBy="category")
     */
    private $vetementfemmes;

    public function __construct()
    {
        $this->vetementfemmes = new ArrayCollection();
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

    /**
     * @return Collection|vetementfemme[]
     */
    public function getVetementfemmes(): Collection
    {
        return $this->vetementfemmes;
    }

    public function addVetementfemme(vetementfemme $vetementfemme): self
    {
        if (!$this->vetementfemmes->contains($vetementfemme)) {
            $this->vetementfemmes[] = $vetementfemme;
            $vetementfemme->setCategory($this);
        }

        return $this;
    }

    public function removeVetementfemme(vetementfemme $vetementfemme): self
    {
        if ($this->vetementfemmes->contains($vetementfemme)) {
            $this->vetementfemmes->removeElement($vetementfemme);
            // set the owning side to null (unless already changed)
            if ($vetementfemme->getCategory() === $this) {
                $vetementfemme->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return "some string representation of your object";
}
}

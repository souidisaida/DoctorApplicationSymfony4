<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\vetementfemme", mappedBy="user")
     */
    private $vetementfemmes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        parent::__construct();
        $this->vetementfemmes = new ArrayCollection();
        // your own logic
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
            $vetementfemme->setUser($this);
        }

        return $this;
    }

    public function removeVetementfemme(vetementfemme $vetementfemme): self
    {
        if ($this->vetementfemmes->contains($vetementfemme)) {
            $this->vetementfemmes->removeElement($vetementfemme);
            // set the owning side to null (unless already changed)
            if ($vetementfemme->getUser() === $this) {
                $vetementfemme->setUser(null);
            }
        }

        return $this;
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
}
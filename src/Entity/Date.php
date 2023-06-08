<?php

namespace App\Entity;

use App\Repository\DateRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DateRepository::class)]
class Date
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'alim:read',
        'carteMere:read',
        'clavier:read',
        'cpu:read',
        'hdd:read',
        'lecteur:read',
        'onduleur:read',
        'ram:read',
        'souris:read',
        'user:read'
    ])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups([
        'alim:read', 'alim:write',
        'cable:read', 'cable:write',
        'carteMere:read', 'carteMere:write',
        'clavier:read', 'clavier:write',
        'cpu:read', 'cpu:write',
        'hdd:read', 'hdd:write',
        'lecteur:read', 'lecteur:write',
        'onduleur:read', 'onduleur:write',
        'ram:read', 'ram:write',
        'souris:read', 'souris:write',
        'user:read', 'user:write'
    ])]
    private ?\DateTimeImmutable $CreatedAt = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Souris $souris = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Clavier $clavier = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Onduleur $onduleur = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Cable $cable = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Ram $ram = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Hdd $hdd = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Lecteur $lecteur = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?CPU $cPU = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?CarteMere $carteMere = null;

    #[ORM\OneToOne(mappedBy: 'date', cascade: ['persist', 'remove'])]
    private ?Alimentation $alimentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getSouris(): ?Souris
    {
        return $this->souris;
    }

    public function setSouris(?Souris $souris): self
    {
        // unset the owning side of the relation if necessary
        if ($souris === null && $this->souris !== null) {
            $this->souris->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($souris !== null && $souris->getDate() !== $this) {
            $souris->setDate($this);
        }

        $this->souris = $souris;

        return $this;
    }

    public function getClavier(): ?Clavier
    {
        return $this->clavier;
    }

    public function setClavier(?Clavier $clavier): self
    {
        // unset the owning side of the relation if necessary
        if ($clavier === null && $this->clavier !== null) {
            $this->clavier->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($clavier !== null && $clavier->getDate() !== $this) {
            $clavier->setDate($this);
        }

        $this->clavier = $clavier;

        return $this;
    }

    public function getOnduleur(): ?Onduleur
    {
        return $this->onduleur;
    }

    public function setOnduleur(?Onduleur $onduleur): self
    {
        // unset the owning side of the relation if necessary
        if ($onduleur === null && $this->onduleur !== null) {
            $this->onduleur->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($onduleur !== null && $onduleur->getDate() !== $this) {
            $onduleur->setDate($this);
        }

        $this->onduleur = $onduleur;

        return $this;
    }

    public function getCable(): ?Cable
    {
        return $this->cable;
    }

    public function setCable(?Cable $cable): self
    {
        // unset the owning side of the relation if necessary
        if ($cable === null && $this->cable !== null) {
            $this->cable->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($cable !== null && $cable->getDate() !== $this) {
            $cable->setDate($this);
        }

        $this->cable = $cable;

        return $this;
    }

    public function getRam(): ?Ram
    {
        return $this->ram;
    }

    public function setRam(?Ram $ram): self
    {
        // unset the owning side of the relation if necessary
        if ($ram === null && $this->ram !== null) {
            $this->ram->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($ram !== null && $ram->getDate() !== $this) {
            $ram->setDate($this);
        }

        $this->ram = $ram;

        return $this;
    }

    public function getHdd(): ?Hdd
    {
        return $this->hdd;
    }

    public function setHdd(?Hdd $hdd): self
    {
        // unset the owning side of the relation if necessary
        if ($hdd === null && $this->hdd !== null) {
            $this->hdd->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($hdd !== null && $hdd->getDate() !== $this) {
            $hdd->setDate($this);
        }

        $this->hdd = $hdd;

        return $this;
    }

    public function getLecteur(): ?Lecteur
    {
        return $this->lecteur;
    }

    public function setLecteur(?Lecteur $lecteur): self
    {
        // unset the owning side of the relation if necessary
        if ($lecteur === null && $this->lecteur !== null) {
            $this->lecteur->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($lecteur !== null && $lecteur->getDate() !== $this) {
            $lecteur->setDate($this);
        }

        $this->lecteur = $lecteur;

        return $this;
    }

    public function getCPU(): ?CPU
    {
        return $this->cPU;
    }

    public function setCPU(?CPU $cPU): self
    {
        // unset the owning side of the relation if necessary
        if ($cPU === null && $this->cPU !== null) {
            $this->cPU->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($cPU !== null && $cPU->getDate() !== $this) {
            $cPU->setDate($this);
        }

        $this->cPU = $cPU;

        return $this;
    }

    public function getCarteMere(): ?CarteMere
    {
        return $this->carteMere;
    }

    public function setCarteMere(?CarteMere $carteMere): self
    {
        // unset the owning side of the relation if necessary
        if ($carteMere === null && $this->carteMere !== null) {
            $this->carteMere->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($carteMere !== null && $carteMere->getDate() !== $this) {
            $carteMere->setDate($this);
        }

        $this->carteMere = $carteMere;

        return $this;
    }

    public function getAlimentation(): ?Alimentation
    {
        return $this->alimentation;
    }

    public function setAlimentation(?Alimentation $alimentation): self
    {
        // unset the owning side of the relation if necessary
        if ($alimentation === null && $this->alimentation !== null) {
            $this->alimentation->setDate(null);
        }

        // set the owning side of the relation if necessary
        if ($alimentation !== null && $alimentation->getDate() !== $this) {
            $alimentation->setDate($this);
        }

        $this->alimentation = $alimentation;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'alim:read',
        'mark:read',
        'carteMere:read',
        'clavier:read',
        'cpu:read',
        'ecran:read',
        'hdd:read',
        'lecteur:read',
        'ram:read',
        'souris:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'alim:read', 'alim:write',
        'mark:read', 'mark:write',
        'carteMere:read', 'carteMere:write',
        'clavier:read', 'clavier:write',
        'cpu:read', 'cpu:write',
        'ecran:read', 'ecran:write',
        'hdd:read', 'hdd:write',
        'lecteur:read', 'lecteur:write',
        'ram:read', 'ram:write',
        'souris:read', 'souris:write'
    ])]
    private ?string $designation = null;

    #[ORM\OneToOne(inversedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Clavier $clavier = null;

    #[ORM\OneToOne(inversedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Ecran $ecran = null;

    #[ORM\OneToOne(inversedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Souris $souris = null;

    #[ORM\OneToOne(mappedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Ram $ram = null;

    #[ORM\OneToOne(mappedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Hdd $hdd = null;

    #[ORM\OneToOne(mappedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Lecteur $lecteur = null;

    #[ORM\OneToOne(mappedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?CPU $cPU = null;

    #[ORM\OneToOne(mappedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?CarteMere $carteMere = null;

    #[ORM\OneToOne(mappedBy: 'marque', cascade: ['persist', 'remove'])]
    private ?Alimentation $alimentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getClavier(): ?Clavier
    {
        return $this->clavier;
    }

    public function setClavier(?Clavier $clavier): self
    {
        $this->clavier = $clavier;

        return $this;
    }

    public function getEcran(): ?Ecran
    {
        return $this->ecran;
    }

    public function setEcran(?Ecran $ecran): self
    {
        $this->ecran = $ecran;

        return $this;
    }

    public function getSouris(): ?Souris
    {
        return $this->souris;
    }

    public function setSouris(?Souris $souris): self
    {
        $this->souris = $souris;

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
            $this->ram->setMarque(null);
        }

        // set the owning side of the relation if necessary
        if ($ram !== null && $ram->getMarque() !== $this) {
            $ram->setMarque($this);
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
            $this->hdd->setMarque(null);
        }

        // set the owning side of the relation if necessary
        if ($hdd !== null && $hdd->getMarque() !== $this) {
            $hdd->setMarque($this);
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
            $this->lecteur->setMarque(null);
        }

        // set the owning side of the relation if necessary
        if ($lecteur !== null && $lecteur->getMarque() !== $this) {
            $lecteur->setMarque($this);
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
            $this->cPU->setMarque(null);
        }

        // set the owning side of the relation if necessary
        if ($cPU !== null && $cPU->getMarque() !== $this) {
            $cPU->setMarque($this);
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
            $this->carteMere->setMarque(null);
        }

        // set the owning side of the relation if necessary
        if ($carteMere !== null && $carteMere->getMarque() !== $this) {
            $carteMere->setMarque($this);
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
            $this->alimentation->setMarque(null);
        }

        // set the owning side of the relation if necessary
        if ($alimentation !== null && $alimentation->getMarque() !== $this) {
            $alimentation->setMarque($this);
        }

        $this->alimentation = $alimentation;

        return $this;
    }
}

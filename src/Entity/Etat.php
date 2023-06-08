<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EtatRepository::class)]
class Etat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'alim:read',
        'etat:read',
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

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Ecran $ecran = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'alim:read', 'alim:write',
        'etat:read', 'etat:write',
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
    private ?string $designationEtat = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([
        'alim:read', 'alim:write',
        'etat:read', 'etat:write',
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
    private ?string $description = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Souris $souris = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Clavier $clavier = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Onduleur $onduleur = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Cable $cable = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Ram $ram = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Hdd $hdd = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Lecteur $lecteur = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?CPU $cPU = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?CarteMere $carteMere = null;

    #[ORM\OneToOne(mappedBy: 'etat', cascade: ['persist', 'remove'])]
    private ?Alimentation $alimentation = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDesignationEtat(): ?string
    {
        return $this->designationEtat;
    }

    public function setDesignationEtat(string $designationEtat): self
    {
        $this->designationEtat = $designationEtat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $this->souris->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($souris !== null && $souris->getEtat() !== $this) {
            $souris->setEtat($this);
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
            $this->clavier->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($clavier !== null && $clavier->getEtat() !== $this) {
            $clavier->setEtat($this);
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
            $this->onduleur->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($onduleur !== null && $onduleur->getEtat() !== $this) {
            $onduleur->setEtat($this);
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
            $this->cable->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($cable !== null && $cable->getEtat() !== $this) {
            $cable->setEtat($this);
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
            $this->ram->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($ram !== null && $ram->getEtat() !== $this) {
            $ram->setEtat($this);
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
            $this->hdd->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($hdd !== null && $hdd->getEtat() !== $this) {
            $hdd->setEtat($this);
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
            $this->lecteur->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($lecteur !== null && $lecteur->getEtat() !== $this) {
            $lecteur->setEtat($this);
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
            $this->cPU->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($cPU !== null && $cPU->getEtat() !== $this) {
            $cPU->setEtat($this);
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
            $this->carteMere->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($carteMere !== null && $carteMere->getEtat() !== $this) {
            $carteMere->setEtat($this);
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
            $this->alimentation->setEtat(null);
        }

        // set the owning side of the relation if necessary
        if ($alimentation !== null && $alimentation->getEtat() !== $this) {
            $alimentation->setEtat($this);
        }

        $this->alimentation = $alimentation;

        return $this;
    }
}

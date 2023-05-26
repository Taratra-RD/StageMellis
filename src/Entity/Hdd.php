<?php

namespace App\Entity;

use App\Repository\HddRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: HddRepository::class)]
class Hdd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'hdd:read',
        'boitier:read'
    ])]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'hdd', cascade: ['persist', 'remove'])]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Marque $marque = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $capacite = null;

    #[ORM\ManyToOne(inversedBy: 'hdds')]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Boitier $boitier = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $sn = null;

    #[ORM\OneToOne(inversedBy: 'hdd', cascade: ['persist', 'remove'])]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'hdd', cascade: ['persist', 'remove'])]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read'
    ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'hdd', cascade: ['persist', 'remove'])]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read'
    ])]
    private ?TypeHdd $typeHdd = null;

    #[ORM\OneToOne(mappedBy: 'hdd', cascade: ['persist', 'remove'])]
    #[Groups([
        'hdd:read', 'hdd:write',
        'boitier:read'
    ])]
    private ?Taille $taille = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCapacite(): ?string
    {
        return $this->capacite;
    }

    public function setCapacite(string $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getBoitier(): ?Boitier
    {
        return $this->boitier;
    }

    public function setBoitier(?Boitier $boitier): self
    {
        $this->boitier = $boitier;

        return $this;
    }

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(string $sn): self
    {
        $this->sn = $sn;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?Date
    {
        return $this->date;
    }

    public function setDate(?Date $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTypeHdd(): ?TypeHdd
    {
        return $this->typeHdd;
    }

    public function setTypeHdd(?TypeHdd $typeHdd): self
    {
        // unset the owning side of the relation if necessary
        if ($typeHdd === null && $this->typeHdd !== null) {
            $this->typeHdd->setHdd(null);
        }

        // set the owning side of the relation if necessary
        if ($typeHdd !== null && $typeHdd->getHdd() !== $this) {
            $typeHdd->setHdd($this);
        }

        $this->typeHdd = $typeHdd;

        return $this;
    }

    public function getTaille(): ?Taille
    {
        return $this->taille;
    }

    public function setTaille(?Taille $taille): self
    {
        // unset the owning side of the relation if necessary
        if ($taille === null && $this->taille !== null) {
            $this->taille->setHdd(null);
        }

        // set the owning side of the relation if necessary
        if ($taille !== null && $taille->getHdd() !== $this) {
            $taille->setHdd($this);
        }

        $this->taille = $taille;

        return $this;
    }
}

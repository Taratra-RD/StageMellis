<?php

namespace App\Entity;

use App\Repository\RamRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: RamRepository::class)]
class Ram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'ram:read',
        'boitier:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $frequence = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $capacite = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $sn = null;

    #[ORM\OneToOne(inversedBy: 'ram', cascade: ['persist', 'remove'])]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read'
    ])]
    private ?Marque $marque = null;

    #[ORM\ManyToOne(inversedBy: 'rams')]
    private ?Boitier $boitier = null;

    #[ORM\OneToOne(inversedBy: 'ram', cascade: ['persist', 'remove'])]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'ram', cascade: ['persist', 'remove'])]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read'
    ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'ram', cascade: ['persist', 'remove'])]
    #[Groups([
        'ram:read', 'ram:write',
        'boitier:read'
    ])]
    private ?TypeRam $typeRam = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(string $frequence): self
    {
        $this->frequence = $frequence;

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

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(string $sn): self
    {
        $this->sn = $sn;

        return $this;
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

    public function getBoitier(): ?Boitier
    {
        return $this->boitier;
    }

    public function setBoitier(?Boitier $boitier): self
    {
        $this->boitier = $boitier;

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

    public function getTypeRam(): ?TypeRam
    {
        return $this->typeRam;
    }

    public function setTypeRam(?TypeRam $typeRam): self
    {
        // unset the owning side of the relation if necessary
        if ($typeRam === null && $this->typeRam !== null) {
            $this->typeRam->setRam(null);
        }

        // set the owning side of the relation if necessary
        if ($typeRam !== null && $typeRam->getRam() !== $this) {
            $typeRam->setRam($this);
        }

        $this->typeRam = $typeRam;

        return $this;
    }
}

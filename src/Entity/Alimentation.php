<?php

namespace App\Entity;

use App\Repository\AlimentationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AlimentationRepository::class)]
class Alimentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'alim:read',
        'boitier:read',
        'user:read', 'user:write'
    ])]
    private ?int $id = null;

    #[Groups([
        'alim:read', 'alim:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    #[ORM\OneToOne(inversedBy: 'alimentation', cascade: ['persist', 'remove'])]
    private ?Marque $marque = null;

    #[Groups([
        'alim:read', 'alim:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    #[ORM\Column(length: 255)]
    private ?string $puissance = null;

    #[Groups(['alim:read'])]
    #[ORM\OneToOne(inversedBy: 'alimentation', cascade: ['persist', 'remove'])]
    private ?Boitier $boitier = null;

    #[Groups([
        'alim:read', 'alim:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    #[ORM\Column(length: 255)]
    private ?string $sn = null;

    #[Groups([
        'alim:read', 'alim:write',
        'boitier:read', 'boitier:write'
    ])]
    #[ORM\OneToOne(inversedBy: 'alimentation', cascade: ['persist', 'remove'])]
    private ?Etat $etat = null;

    #[Groups([
        'alim:read', 'alim:write',
        'boitier:read', 'boitier:write'
    ])]
    #[ORM\OneToOne(inversedBy: 'alimentation', cascade: ['persist', 'remove'])]
    private ?Date $date = null;

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

    public function getPuissance(): ?string
    {
        return $this->puissance;
    }

    public function setPuissance(string $puissance): self
    {
        $this->puissance = $puissance;

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
}

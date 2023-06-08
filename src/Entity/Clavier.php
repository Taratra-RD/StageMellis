<?php

namespace App\Entity;

use App\Repository\ClavierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ClavierRepository::class)]
class Clavier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'clavier:read',
        'user:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups([
        'clavier:read', 'clavier:write',
        'user:read', 'user:write'
    ])]
    private ?string $sn = null;

    #[ORM\OneToOne(inversedBy: 'clavier', cascade: ['persist', 'remove'])]
    #[Groups([
        'clavier:read', 'clavier:write',
        'user:read', 'user:write'
    ])]
    private ?InterfacePort $interface = null;

    #[ORM\ManyToOne(inversedBy: 'claviers')]
    #[Groups([
        'clavier:read', 'clavier:write'
    ])]
    private ?User $utilisateur = null;

    #[ORM\OneToOne(inversedBy: 'clavier', cascade: ['persist', 'remove'])]
    #[Groups([
        'clavier:read', 'clavier:write',
        'user:read', 'user:write'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'clavier', cascade: ['persist', 'remove'])]
    #[Groups([
        'clavier:read', 'clavier:write',
        'user:read', 'user:write'
    ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'clavier', cascade: ['persist', 'remove'])]
    #[Groups([
        'clavier:read', 'clavier:write',
        'user:read', 'user:write'
    ])]
    private ?Marque $marque = null;

    #[ORM\OneToOne(mappedBy: 'clavier', cascade: ['persist', 'remove'])]
    #[Groups([
        'clavier:read', 'clavier:write',
        'user:read', 'user:write'
    ])]
    private ?TypeClavier $typeClavier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(?string $sn): self
    {
        $this->sn = $sn;

        return $this;
    }

    public function getInterface(): ?InterfacePort
    {
        return $this->interface;
    }

    public function setInterface(?InterfacePort $interface): self
    {
        $this->interface = $interface;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        // unset the owning side of the relation if necessary
        if ($marque === null && $this->marque !== null) {
            $this->marque->setClavier(null);
        }

        // set the owning side of the relation if necessary
        if ($marque !== null && $marque->getClavier() !== $this) {
            $marque->setClavier($this);
        }

        $this->marque = $marque;

        return $this;
    }

    public function getTypeClavier(): ?TypeClavier
    {
        return $this->typeClavier;
    }

    public function setTypeClavier(?TypeClavier $typeClavier): self
    {
        // unset the owning side of the relation if necessary
        if ($typeClavier === null && $this->typeClavier !== null) {
            $this->typeClavier->setClavier(null);
        }

        // set the owning side of the relation if necessary
        if ($typeClavier !== null && $typeClavier->getClavier() !== $this) {
            $typeClavier->setClavier($this);
        }

        $this->typeClavier = $typeClavier;

        return $this;
    }
}

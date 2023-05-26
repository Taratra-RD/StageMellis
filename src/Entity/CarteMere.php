<?php

namespace App\Entity;

use App\Repository\CarteMereRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CarteMereRepository::class)]
class CarteMere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'carteMere:read',
        'boitier:read'
    ])]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'carteMere', cascade: ['persist', 'remove'])]
    #[Groups(['carteMere:read', 'carteMere:write'])]
    private ?Marque $marque = null;

    #[ORM\OneToOne(inversedBy: 'carteMere', cascade: ['persist', 'remove'])]
    private ?Boitier $boitier = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'carteMere:read', 'carteMere:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $typeMB = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'carteMere:read', 'carteMere:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $sn = null;

    #[ORM\OneToOne(inversedBy: 'carteMere', cascade: ['persist', 'remove'])]
    #[Groups([
        'carteMere:read', 'carteMere:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'carteMere', cascade: ['persist', 'remove'])]
    #[Groups([
        'carteMere:read', 'carteMere:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'cartemere', cascade: ['persist', 'remove'])]
    #[Groups([
        'carteMere:read', 'carteMere:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?ReferenceMB $referenceMB = null;

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

    public function getBoitier(): ?Boitier
    {
        return $this->boitier;
    }

    public function setBoitier(?Boitier $boitier): self
    {
        $this->boitier = $boitier;

        return $this;
    }

    public function getTypeMB(): ?string
    {
        return $this->typeMB;
    }

    public function setTypeMB(string $typeMB): self
    {
        $this->typeMB = $typeMB;

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

    public function getReferenceMB(): ?ReferenceMB
    {
        return $this->referenceMB;
    }

    public function setReferenceMB(?ReferenceMB $referenceMB): self
    {
        // unset the owning side of the relation if necessary
        if ($referenceMB === null && $this->referenceMB !== null) {
            $this->referenceMB->setCartemere(null);
        }

        // set the owning side of the relation if necessary
        if ($referenceMB !== null && $referenceMB->getCartemere() !== $this) {
            $referenceMB->setCartemere($this);
        }

        $this->referenceMB = $referenceMB;

        return $this;
    }
}

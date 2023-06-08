<?php

namespace App\Entity;

use App\Repository\CableRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CableRepository::class)]
class Cable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'cable:read',
        'user:read'
        ])]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Groups([
        'cable:read', 'cable:write',
        'user:read', 'user:write'
        ])]
    private ?int $longueur = null;

    #[ORM\OneToOne(inversedBy: 'cable', cascade: ['persist', 'remove'])]
    #[Groups([
        'cable:read', 'cable:write',
        'user:read', 'user:write'
        ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'cable', cascade: ['persist', 'remove'])]
    #[Groups([
        'cable:read', 'cable:write',
        'user:read', 'user:write'
        ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'cable', cascade: ['persist', 'remove'])]
    #[Groups([
        'cable:read', 'cable:write',
        'user:read', 'user:write'
        ])]
    private ?TypeCable $typeCable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(?int $longueur): self
    {
        $this->longueur = $longueur;

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

    public function getTypeCable(): ?TypeCable
    {
        return $this->typeCable;
    }

    public function setTypeCable(?TypeCable $typeCable): self
    {
        // unset the owning side of the relation if necessary
        if ($typeCable === null && $this->typeCable !== null) {
            $this->typeCable->setCable(null);
        }

        // set the owning side of the relation if necessary
        if ($typeCable !== null && $typeCable->getCable() !== $this) {
            $typeCable->setCable($this);
        }

        $this->typeCable = $typeCable;

        return $this;
    }
}

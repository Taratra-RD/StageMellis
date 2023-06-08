<?php

namespace App\Entity;

use App\Repository\EcranRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EcranRepository::class)]
class Ecran
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'ecran:read',
        'user:read'
        ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'ecran:read', 'ecran:write',
        'user:read', 'user:write'
        ])]
    private ?string $reference = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'ecran:read', 'ecran:write',
        'user:read', 'user:write'
        ])]
    private ?string $dimension = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'ecran:read', 'ecran:write',
        'user:read', 'user:write'
        ])]
    private ?string $sn = null;

    #[ORM\ManyToOne(inversedBy: 'ecrans')]
    #[Groups([
        'ecran:read', 'ecran:write'
        ])]
    private ?User $utilisateur = null;

    #[ORM\OneToOne(mappedBy: 'ecran', cascade: ['persist', 'remove'])]
    #[Groups([
        'ecran:read', 'ecran:write',
        'user:read', 'user:write'
        ])]
    private ?Marque $marque = null;

    #[ORM\OneToOne(mappedBy: 'ecran', cascade: ['persist', 'remove'])]
    #[Groups([
        'ecran:read', 'ecran:write',
        'user:read', 'user:write'
        ])]
    private ?Port $port = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDimension(): ?string
    {
        return $this->dimension;
    }

    public function setDimension(string $dimension): self
    {
        $this->dimension = $dimension;

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

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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
            $this->marque->setEcran(null);
        }

        // set the owning side of the relation if necessary
        if ($marque !== null && $marque->getEcran() !== $this) {
            $marque->setEcran($this);
        }

        $this->marque = $marque;

        return $this;
    }

    public function getPort(): ?Port
    {
        return $this->port;
    }

    public function setPort(?Port $port): self
    {
        // unset the owning side of the relation if necessary
        if ($port === null && $this->port !== null) {
            $this->port->setEcran(null);
        }

        // set the owning side of the relation if necessary
        if ($port !== null && $port->getEcran() !== $this) {
            $port->setEcran($this);
        }

        $this->port = $port;

        return $this;
    }
}

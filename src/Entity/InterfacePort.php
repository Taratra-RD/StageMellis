<?php

namespace App\Entity;

use App\Repository\InterfacePortRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: InterfacePortRepository::class)]
class InterfacePort
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'clavier:read',
        'interfacePort:read',
        'souris:read', 'souris:write'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'clavier:read', 'clavier:write',
        'interfacePort:read', 'interfacePort:write',
        'souris:read', 'souris:write'
    ])]
    private ?string $typeInterface = null;

    #[ORM\OneToOne(inversedBy: 'interfacePort', cascade: ['persist', 'remove'])]
    private ?Souris $souris = null;

    #[ORM\OneToOne(mappedBy: 'interface', cascade: ['persist', 'remove'])]
    private ?Clavier $clavier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeInterface(): ?string
    {
        return $this->typeInterface;
    }

    public function setTypeInterface(string $typeInterface): self
    {
        $this->typeInterface = $typeInterface;

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

    public function getClavier(): ?Clavier
    {
        return $this->clavier;
    }

    public function setClavier(?Clavier $clavier): self
    {
        // unset the owning side of the relation if necessary
        if ($clavier === null && $this->clavier !== null) {
            $this->clavier->setInterface(null);
        }

        // set the owning side of the relation if necessary
        if ($clavier !== null && $clavier->getInterface() !== $this) {
            $clavier->setInterface($this);
        }

        $this->clavier = $clavier;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\TypeClavierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeClavierRepository::class)]
class TypeClavier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'typeClavier:read',
        'clavier:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'typeClavier:read', 'typeClavier:write',
        'clavier:read', 'clavier:write'
        ])]
    private ?string $designationTypeClavier = null;

    #[ORM\OneToOne(inversedBy: 'typeClavier', cascade: ['persist', 'remove'])]
    private ?Clavier $clavier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationTypeClavier(): ?string
    {
        return $this->designationTypeClavier;
    }

    public function setDesignationTypeClavier(string $designationTypeClavier): self
    {
        $this->designationTypeClavier = $designationTypeClavier;

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
}

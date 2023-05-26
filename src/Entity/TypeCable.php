<?php

namespace App\Entity;

use App\Repository\TypeCableRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeCableRepository::class)]
class TypeCable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('typeCable:read')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'typeCable:read', 'typeCable:write',
        'cable:read', 'cable:write'
    ])]
    private ?string $designationTypeCable = null;

    #[ORM\OneToOne(inversedBy: 'typeCable', cascade: ['persist', 'remove'])]
    private ?Cable $cable = null;

    #[ORM\OneToOne(inversedBy: 'typeCable', cascade: ['persist', 'remove'])]
    private ?User $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationTypeCable(): ?string
    {
        return $this->designationTypeCable;
    }

    public function setDesignationTypeCable(string $designationTypeCable): self
    {
        $this->designationTypeCable = $designationTypeCable;

        return $this;
    }

    public function getCable(): ?Cable
    {
        return $this->cable;
    }

    public function setCable(?Cable $cable): self
    {
        $this->cable = $cable;

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
}

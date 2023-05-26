<?php

namespace App\Entity;

use App\Repository\TypeEcranRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeEcranRepository::class)]
class TypeEcran
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('typeEcran:read')]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Ecran $ecran = null;

    #[ORM\Column(length: 255)]
    #[Groups('typeEcran:read', 'typeEcran:write')]
    private ?string $designationTypeEcran = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEcran(): ?Ecran
    {
        return $this->ecran;
    }

    public function setEcran(?Ecran $ecran): self
    {
        $this->ecran = $ecran;

        return $this;
    }

    public function getDesignationTypeEcran(): ?string
    {
        return $this->designationTypeEcran;
    }

    public function setDesignationTypeEcran(string $designationTypeEcran): self
    {
        $this->designationTypeEcran = $designationTypeEcran;

        return $this;
    }
}

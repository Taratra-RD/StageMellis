<?php

namespace App\Entity;

use App\Repository\TypeHddRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeHddRepository::class)]
class TypeHdd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'typeHdd:read',
        'hdd:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'typeHdd:read', 'typeHdd:write',
        'hdd:read', 'hdd:write'
    ])]
    private ?string $designationTypeHdd = null;

    #[ORM\OneToOne(inversedBy: 'typeHdd', cascade: ['persist', 'remove'])]
    private ?Hdd $hdd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationTypeHdd(): ?string
    {
        return $this->designationTypeHdd;
    }

    public function setDesignationTypeHdd(string $designationTypeHdd): self
    {
        $this->designationTypeHdd = $designationTypeHdd;

        return $this;
    }

    public function getHdd(): ?Hdd
    {
        return $this->hdd;
    }

    public function setHdd(?Hdd $hdd): self
    {
        $this->hdd = $hdd;

        return $this;
    }
}

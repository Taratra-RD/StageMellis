<?php

namespace App\Entity;

use App\Repository\TypeRamRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeRamRepository::class)]
class TypeRam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'typeRam:read',
        'ram:read',
        'user:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'typeRam:read', 'typeRam:write',
        'ram:read', 'ram:write',
        'user:read', 'user:write'
    ])]
    private ?string $designationTypeRam = null;

    #[ORM\OneToOne(inversedBy: 'typeRam', cascade: ['persist', 'remove'])]
    private ?Ram $ram = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationTypeRam(): ?string
    {
        return $this->designationTypeRam;
    }

    public function setDesignationTypeRam(string $designationTypeRam): self
    {
        $this->designationTypeRam = $designationTypeRam;

        return $this;
    }

    public function getRam(): ?Ram
    {
        return $this->ram;
    }

    public function setRam(?Ram $ram): self
    {
        $this->ram = $ram;

        return $this;
    }
}

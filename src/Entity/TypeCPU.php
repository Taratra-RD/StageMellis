<?php

namespace App\Entity;

use App\Repository\TypeCPURepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeCPURepository::class)]
class TypeCPU
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'typeCpu:read',
        'cpu:read',
        'user:read'
        ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'typeCpu:read', 'typeCpu:write',
        'cpu:read', 'cpu:write',
        'user:read', 'user:write'
        ])]
    private ?string $designationTypeCpu = null;

    #[ORM\OneToOne(inversedBy: 'typeCPU', cascade: ['persist', 'remove'])]
    private ?CPU $cpu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationTypeCpu(): ?string
    {
        return $this->designationTypeCpu;
    }

    public function setDesignationTypeCpu(string $designationTypeCpu): self
    {
        $this->designationTypeCpu = $designationTypeCpu;

        return $this;
    }

    public function getCpu(): ?CPU
    {
        return $this->cpu;
    }

    public function setCpu(?CPU $cpu): self
    {
        $this->cpu = $cpu;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ReferenceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ReferenceRepository::class)]
class Reference
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'reference:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'reference:read', 'reference:write'
    ])]
    private ?string $designationCpuRef = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?CPU $cpu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationCpuRef(): ?string
    {
        return $this->designationCpuRef;
    }

    public function setDesignationCpuRef(string $designationCpuRef): self
    {
        $this->designationCpuRef = $designationCpuRef;

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

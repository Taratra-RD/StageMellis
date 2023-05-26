<?php

namespace App\Entity;

use App\Repository\ReferenceMBRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReferenceMBRepository::class)]
class ReferenceMB
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\OneToOne(inversedBy: 'referenceMB', cascade: ['persist', 'remove'])]
    private ?CarteMere $cartemere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getCartemere(): ?CarteMere
    {
        return $this->cartemere;
    }

    public function setCartemere(?CarteMere $cartemere): self
    {
        $this->cartemere = $cartemere;

        return $this;
    }
}

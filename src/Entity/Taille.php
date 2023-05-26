<?php

namespace App\Entity;

use App\Repository\TailleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TailleRepository::class)]
class Taille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'tailleHdd:read',
        'hdd:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'tailleHdd:read', 'tailleHdd:write',
        'hdd:read', 'hdd:write'
    ])]
    private ?string $designationTailleHdd = null;

    #[ORM\OneToOne(inversedBy: 'taille', cascade: ['persist', 'remove'])]
    private ?Hdd $hdd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationTailleHdd(): ?string
    {
        return $this->designationTailleHdd;
    }

    public function setDesignationTailleHdd(string $designationTailleHdd): self
    {
        $this->designationTailleHdd = $designationTailleHdd;

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

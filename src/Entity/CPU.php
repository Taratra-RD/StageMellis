<?php

namespace App\Entity;

use App\Repository\CPURepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CPURepository::class)]
class CPU
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'cpu:read',
        'boitier:read',
        'user:read'
    ])]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'cPU', cascade: ['persist', 'remove'])]
    #[Groups([
        'cpu:read', 'cpu:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?Marque $marque = null;

    #[ORM\ManyToOne(inversedBy: 'cPUs')]
    private ?Boitier $boitier = null;

    #[ORM\OneToOne(inversedBy: 'cPU', cascade: ['persist', 'remove'])]
    #[Groups([
        'cpu:read', 'cpu:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'cPU', cascade: ['persist', 'remove'])]
    #[Groups([
        'cpu:read', 'cpu:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'cpu', cascade: ['persist', 'remove'])]
    #[Groups([
        'cpu:read', 'cpu:write',
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?TypeCPU $typeCPU = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getBoitier(): ?Boitier
    {
        return $this->boitier;
    }

    public function setBoitier(?Boitier $boitier): self
    {
        $this->boitier = $boitier;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?Date
    {
        return $this->date;
    }

    public function setDate(?Date $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTypeCPU(): ?TypeCPU
    {
        return $this->typeCPU;
    }

    public function setTypeCPU(?TypeCPU $typeCPU): self
    {
        // unset the owning side of the relation if necessary
        if ($typeCPU === null && $this->typeCPU !== null) {
            $this->typeCPU->setCpu(null);
        }

        // set the owning side of the relation if necessary
        if ($typeCPU !== null && $typeCPU->getCpu() !== $this) {
            $typeCPU->setCpu($this);
        }

        $this->typeCPU = $typeCPU;

        return $this;
    }
}

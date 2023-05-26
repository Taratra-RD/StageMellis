<?php

namespace App\Entity;

use App\Repository\OnduleurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: OnduleurRepository::class)]
class Onduleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'onduleur:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'onduleur:read', 'onduleur:write'
    ])]
    private ?string $autonomie = null;

    #[ORM\ManyToOne(inversedBy: 'onduleurs')]
    private ?User $utilisateur = null;

    #[ORM\OneToOne(inversedBy: 'onduleur', cascade: ['persist', 'remove'])]
    #[Groups([
        'onduleur:read', 'onduleur:write'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'onduleur', cascade: ['persist', 'remove'])]
    #[Groups([
        'onduleur:read', 'onduleur:write'
    ])]
    private ?Date $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutonomie(): ?string
    {
        return $this->autonomie;
    }

    public function setAutonomie(string $autonomie): self
    {
        $this->autonomie = $autonomie;

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
}

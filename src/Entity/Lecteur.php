<?php

namespace App\Entity;

use App\Repository\LecteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LecteurRepository::class)]
class Lecteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'lecteur:read',
        'boitier:read'
    ])]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'lecteur', cascade: ['persist', 'remove'])]
    #[Groups([
        'lecteur:read', 'lecteur:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Marque $marque = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'lecteur:read', 'lecteur:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $typeLecteur = null;

    #[ORM\OneToOne(inversedBy: 'lecteur', cascade: ['persist', 'remove'])]
    private ?Boitier $boitier = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'lecteur:read', 'lecteur:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?string $sn = null;

    #[ORM\OneToOne(inversedBy: 'lecteur', cascade: ['persist', 'remove'])]
    #[Groups([
        'lecteur:read', 'lecteur:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'lecteur', cascade: ['persist', 'remove'])]
    #[Groups([
        'lecteur:read', 'lecteur:write',
        'boitier:read', 'boitier:write'
    ])]
    private ?Date $date = null;

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

    public function getTypeLecteur(): ?string
    {
        return $this->typeLecteur;
    }

    public function setTypeLecteur(string $typeLecteur): self
    {
        $this->typeLecteur = $typeLecteur;

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

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function setSn(string $sn): self
    {
        $this->sn = $sn;

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

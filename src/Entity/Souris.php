<?php

namespace App\Entity;

use App\Repository\SourisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SourisRepository::class)]
class Souris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'souris:read'
    ])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups([
        'souris:read', 'souris:write'
    ])]
    private ?int $nbrBouton = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'souris:read', 'souris:write'
    ])]
    private ?string $sn = null;

    #[ORM\ManyToOne(inversedBy: 'souris')]
    private ?User $utilisateur = null;

    #[ORM\OneToOne(inversedBy: 'souris', cascade: ['persist', 'remove'])]
    #[Groups([
        'souris:read', 'souris:write'
    ])]
    private ?Etat $etat = null;

    #[ORM\OneToOne(inversedBy: 'souris', cascade: ['persist', 'remove'])]
    #[Groups([
        'souris:read', 'souris:write'
    ])]
    private ?Date $date = null;

    #[ORM\OneToOne(mappedBy: 'souris', cascade: ['persist', 'remove'])]
    #[Groups([
        'souris:read', 'souris:write'
    ])]
    private ?InterfacePort $interfacePort = null;

    #[ORM\OneToOne(mappedBy: 'souris', cascade: ['persist', 'remove'])]
    #[Groups([
        'souris:read', 'souris:write'
    ])]
    private ?Marque $marque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrBouton(): ?int
    {
        return $this->nbrBouton;
    }

    public function setNbrBouton(int $nbrBouton): self
    {
        $this->nbrBouton = $nbrBouton;

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

    public function getInterfacePort(): ?InterfacePort
    {
        return $this->interfacePort;
    }

    public function setInterfacePort(?InterfacePort $interfacePort): self
    {
        // unset the owning side of the relation if necessary
        if ($interfacePort === null && $this->interfacePort !== null) {
            $this->interfacePort->setSouris(null);
        }

        // set the owning side of the relation if necessary
        if ($interfacePort !== null && $interfacePort->getSouris() !== $this) {
            $interfacePort->setSouris($this);
        }

        $this->interfacePort = $interfacePort;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        // unset the owning side of the relation if necessary
        if ($marque === null && $this->marque !== null) {
            $this->marque->setSouris(null);
        }

        // set the owning side of the relation if necessary
        if ($marque !== null && $marque->getSouris() !== $this) {
            $marque->setSouris($this);
        }

        $this->marque = $marque;

        return $this;
    }
}

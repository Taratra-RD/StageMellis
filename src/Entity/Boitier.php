<?php

namespace App\Entity;

use App\Repository\BoitierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BoitierRepository::class)]
class Boitier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'boitier:read',
        'user:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'boitiers')]
    private ?User $utilisateur = null;

    #[ORM\OneToMany(mappedBy: 'boitier', targetEntity: Ram::class, cascade: ['persist', 'remove'])]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private Collection $rams;

    #[ORM\OneToMany(mappedBy: 'boitier', targetEntity: Hdd::class, cascade: ['persist', 'remove'])]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private Collection $hdds;

    #[ORM\OneToOne(mappedBy: 'boitier', cascade: ['persist', 'remove'])]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?Lecteur $lecteur = null;

    #[ORM\OneToMany(mappedBy: 'boitier', targetEntity: CPU::class, cascade: ['persist', 'remove'])]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private Collection $cPUs;

    #[ORM\OneToOne(mappedBy: 'boitier', cascade: ['persist', 'remove'])]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?CarteMere $carteMere = null;

    #[ORM\OneToOne(mappedBy: 'boitier', cascade: ['persist', 'remove'])]
    #[Groups([
        'boitier:read', 'boitier:write',
        'user:read', 'user:write'
    ])]
    private ?Alimentation $alimentation = null;

    public function __construct()
    {
        $this->rams = new ArrayCollection();
        $this->hdds = new ArrayCollection();
        $this->cPUs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    /**
     * @return Collection<int, Ram>
     */
    public function getRams(): Collection
    {
        return $this->rams;
    }

    public function addRam(Ram $ram): self
    {
        if (!$this->rams->contains($ram)) {
            $this->rams->add($ram);
            $ram->setBoitier($this);
        }

        return $this;
    }

    public function removeRam(Ram $ram): self
    {
        if ($this->rams->removeElement($ram)) {
            // set the owning side to null (unless already changed)
            if ($ram->getBoitier() === $this) {
                $ram->setBoitier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Hdd>
     */
    public function getHdds(): Collection
    {
        return $this->hdds;
    }

    public function addHdd(Hdd $hdd): self
    {
        if (!$this->hdds->contains($hdd)) {
            $this->hdds->add($hdd);
            $hdd->setBoitier($this);
        }

        return $this;
    }

    public function removeHdd(Hdd $hdd): self
    {
        if ($this->hdds->removeElement($hdd)) {
            // set the owning side to null (unless already changed)
            if ($hdd->getBoitier() === $this) {
                $hdd->setBoitier(null);
            }
        }

        return $this;
    }

    public function getLecteur(): ?Lecteur
    {
        return $this->lecteur;
    }

    public function setLecteur(?Lecteur $lecteur): self
    {
        // unset the owning side of the relation if necessary
        if ($lecteur === null && $this->lecteur !== null) {
            $this->lecteur->setBoitier(null);
        }

        // set the owning side of the relation if necessary
        if ($lecteur !== null && $lecteur->getBoitier() !== $this) {
            $lecteur->setBoitier($this);
        }

        $this->lecteur = $lecteur;

        return $this;
    }

    /**
     * @return Collection<int, CPU>
     */
    public function getCPUs(): Collection
    {
        return $this->cPUs;
    }

    public function addCPUs(CPU $cPUs): self
    {
        if (!$this->cPUs->contains($cPUs)) {
            $this->cPUs->add($cPUs);
            $cPUs->setBoitier($this);
        }

        return $this;
    }

    public function removeCPUs(CPU $cPUs): self
    {
        if ($this->cPUs->removeElement($cPUs)) {
            // set the owning side to null (unless already changed)
            if ($cPUs->getBoitier() === $this) {
                $cPUs->setBoitier(null);
            }
        }

        return $this;
    }

    public function getCarteMere(): ?CarteMere
    {
        return $this->carteMere;
    }

    public function setCarteMere(?CarteMere $carteMere): self
    {
        // unset the owning side of the relation if necessary
        if ($carteMere === null && $this->carteMere !== null) {
            $this->carteMere->setBoitier(null);
        }

        // set the owning side of the relation if necessary
        if ($carteMere !== null && $carteMere->getBoitier() !== $this) {
            $carteMere->setBoitier($this);
        }

        $this->carteMere = $carteMere;

        return $this;
    }

    public function getAlimentation(): ?Alimentation
    {
        return $this->alimentation;
    }

    public function setAlimentation(?Alimentation $alimentation): self
    {
        // unset the owning side of the relation if necessary
        if ($alimentation === null && $this->alimentation !== null) {
            $this->alimentation->setBoitier(null);
        }

        // set the owning side of the relation if necessary
        if ($alimentation !== null && $alimentation->getBoitier() !== $this) {
            $alimentation->setBoitier($this);
        }

        $this->alimentation = $alimentation;

        return $this;
    }
}

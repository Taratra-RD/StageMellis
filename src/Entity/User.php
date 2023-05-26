<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'user:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $username = null;

    #[ORM\Column]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private array $roles = [];

    #[ORM\Column(length: 255)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $matricule = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $ip = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $contact = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?string $mail = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Ecran::class)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private Collection $ecrans;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Souris::class)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private Collection $souris;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Clavier::class)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private Collection $claviers;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Onduleur::class)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private Collection $onduleurs;

    #[ORM\OneToOne(mappedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private ?TypeCable $typeCable = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Boitier::class)]
    #[Groups([
        'user:read', 'user:write'
    ])]
    private Collection $boitiers;

    public function __construct()
    {
        $this->ecrans = new ArrayCollection();
        $this->souris = new ArrayCollection();
        $this->claviers = new ArrayCollection();
        $this->onduleurs = new ArrayCollection();
        $this->boitiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection<int, Ecran>
     */
    public function getEcrans(): Collection
    {
        return $this->ecrans;
    }

    public function addEcran(Ecran $ecran): self
    {
        if (!$this->ecrans->contains($ecran)) {
            $this->ecrans->add($ecran);
            $ecran->setUtilisateur($this);
        }

        return $this;
    }

    public function removeEcran(Ecran $ecran): self
    {
        if ($this->ecrans->removeElement($ecran)) {
            // set the owning side to null (unless already changed)
            if ($ecran->getUtilisateur() === $this) {
                $ecran->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Souris>
     */
    public function getSouris(): Collection
    {
        return $this->souris;
    }

    public function addSouri(Souris $souri): self
    {
        if (!$this->souris->contains($souri)) {
            $this->souris->add($souri);
            $souri->setUtilisateur($this);
        }

        return $this;
    }

    public function removeSouri(Souris $souri): self
    {
        if ($this->souris->removeElement($souri)) {
            // set the owning side to null (unless already changed)
            if ($souri->getUtilisateur() === $this) {
                $souri->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Clavier>
     */
    public function getClaviers(): Collection
    {
        return $this->claviers;
    }

    public function addClavier(Clavier $clavier): self
    {
        if (!$this->claviers->contains($clavier)) {
            $this->claviers->add($clavier);
            $clavier->setUtilisateur($this);
        }

        return $this;
    }

    public function removeClavier(Clavier $clavier): self
    {
        if ($this->claviers->removeElement($clavier)) {
            // set the owning side to null (unless already changed)
            if ($clavier->getUtilisateur() === $this) {
                $clavier->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Onduleur>
     */
    public function getOnduleurs(): Collection
    {
        return $this->onduleurs;
    }

    public function addOnduleur(Onduleur $onduleur): self
    {
        if (!$this->onduleurs->contains($onduleur)) {
            $this->onduleurs->add($onduleur);
            $onduleur->setUtilisateur($this);
        }

        return $this;
    }

    public function removeOnduleur(Onduleur $onduleur): self
    {
        if ($this->onduleurs->removeElement($onduleur)) {
            // set the owning side to null (unless already changed)
            if ($onduleur->getUtilisateur() === $this) {
                $onduleur->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getTypeCable(): ?TypeCable
    {
        return $this->typeCable;
    }

    public function setTypeCable(?TypeCable $typeCable): self
    {
        // unset the owning side of the relation if necessary
        if ($typeCable === null && $this->typeCable !== null) {
            $this->typeCable->setUtilisateur(null);
        }

        // set the owning side of the relation if necessary
        if ($typeCable !== null && $typeCable->getUtilisateur() !== $this) {
            $typeCable->setUtilisateur($this);
        }

        $this->typeCable = $typeCable;

        return $this;
    }

    /**
     * @return Collection<int, Boitier>
     */
    public function getBoitiers(): Collection
    {
        return $this->boitiers;
    }

    public function addBoitier(Boitier $boitier): self
    {
        if (!$this->boitiers->contains($boitier)) {
            $this->boitiers->add($boitier);
            $boitier->setUtilisateur($this);
        }

        return $this;
    }

    public function removeBoitier(Boitier $boitier): self
    {
        if ($this->boitiers->removeElement($boitier)) {
            // set the owning side to null (unless already changed)
            if ($boitier->getUtilisateur() === $this) {
                $boitier->setUtilisateur(null);
            }
        }

        return $this;
    }
}
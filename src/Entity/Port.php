<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PortRepository::class)]
class Port
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'port:read',
        'ecran:read'
    ])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'port:read', 'port:write',
        'ecran:read', 'ecran:write'
    ])]
    private ?string $designationPort = null;

    #[ORM\OneToOne(inversedBy: 'port', cascade: ['persist', 'remove'])]
    private ?Ecran $ecran = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationPort(): ?string
    {
        return $this->designationPort;
    }

    public function setDesignationPort(string $designationPort): self
    {
        $this->designationPort = $designationPort;

        return $this;
    }

    public function getEcran(): ?Ecran
    {
        return $this->ecran;
    }

    public function setEcran(?Ecran $ecran): self
    {
        $this->ecran = $ecran;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\DateMisAJourRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DateMisAJourRepository::class)]
class DateMisAJour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups([
        'alim:read',
        'carteMere:read',
        'clavier:read',
        'cpu:read',
        'hdd:read',
        'lecteur:read',
        'onduleur:read',
        'ram:read',
        'souris:read'
    ])]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Groups([
        'alim:read', 'alim:write',
        'cable:read', 'cable:write',
        'carteMere:read', 'carteMere:write',
        'clavier:read', 'clavier:write',
        'cpu:read', 'cpu:write',
        'hdd:read', 'hdd:write',
        'lecteur:read', 'lecteur:write',
        'onduleur:read', 'onduleur:write',
        'ram:read', 'ram:write',
        'souris:read', 'souris:write'
    ])]
    private ?Date $date = null;

    #[ORM\Column(length: 255)]
    #[Groups([
        'alim:read', 'alim:write',
        'cable:read', 'cable:write',
        'carteMere:read', 'carteMere:write',
        'clavier:read', 'clavier:write',
        'cpu:read', 'cpu:write',
        'hdd:read', 'hdd:write',
        'lecteur:read', 'lecteur:write',
        'onduleur:read', 'onduleur:write',
        'ram:read', 'ram:write',
        'souris:read', 'souris:write'
    ])]
    private ?string $typeDate = null;

    #[ORM\Column]
    #[Groups([
        'alim:read', 'alim:write',
        'cable:read', 'cable:write',
        'carteMere:read', 'carteMere:write',
        'clavier:read', 'clavier:write',
        'cpu:read', 'cpu:write',
        'hdd:read', 'hdd:write',
        'lecteur:read', 'lecteur:write',
        'onduleur:read', 'onduleur:write',
        'ram:read', 'ram:write',
        'souris:read', 'souris:write'
    ])]
    private ?\DateTimeImmutable $updateAt = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTypeDate(): ?string
    {
        return $this->typeDate;
    }

    public function setTypeDate(string $typeDate): self
    {
        $this->typeDate = $typeDate;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}

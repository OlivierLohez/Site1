<?php

namespace App\Entity;

use App\Repository\TelechargerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TelechargerRepository::class)]
class Telecharger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $nbtelechargement;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'telechargers')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDuser;

    #[ORM\ManyToOne(targetEntity: Fichier::class, inversedBy: 'telechargers')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbtelechargement(): ?int
    {
        return $this->nbtelechargement;
    }

    public function setNbtelechargement(int $nbtelechargement): self
    {
        $this->nbtelechargement = $nbtelechargement;

        return $this;
    }

    public function getIDuser(): ?User
    {
        return $this->IDuser;
    }

    public function setIDuser(?User $IDuser): self
    {
        $this->IDuser = $IDuser;

        return $this;
    }

    public function getIDFichier(): ?Fichier
    {
        return $this->IDFichier;
    }

    public function setIDFichier(?Fichier $IDFichier): self
    {
        $this->IDFichier = $IDFichier;

        return $this;
    }
}

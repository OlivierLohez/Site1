<?php

namespace App\Entity;

use App\Repository\CantineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CantineRepository::class)]
class Cantine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'string', length: 50)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 50)]
    private $Email;


    #[ORM\Column(type: 'string', length: 100)]
    private $NomEcole;

    #[ORM\Column(type: 'datetime')]
    private $JourRepas;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }


    public function getNomEcole(): ?string
    {
        return $this->NomEcole;
    }

    public function setNomEcole(string $NomEcole): self
    {
        $this->NomEcole = $NomEcole;

        return $this;
    }

    public function getJourRepas(): ?\DateTimeInterface
    {
        return $this->JourRepas;
    }

    public function setJourRepas(\DateTimeInterface $JourRepas): self
    {
        $this->JourRepas = $JourRepas;

        return $this;
    }
}

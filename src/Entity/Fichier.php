<?php

namespace App\Entity;

use App\Repository\FichierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FichierRepository::class)]
class Fichier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomOriginal;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomServeur;

    #[ORM\Column(type: 'datetime')]
    private $dateEnvoi;

    #[ORM\Column(type: 'string', length: 10)]
    private $extension;

    #[ORM\Column(type: 'float')]
    private $taille;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'fichiers')]
    #[ORM\JoinColumn(nullable: false)]
    private $proprietaire;

    #[ORM\Column(type: 'integer')]
    private $IDfichier;

    #[ORM\OneToMany(mappedBy: 'IDFichier', targetEntity: Telecharger::class, orphanRemoval: true)]
    private $telechargers;

    public function __construct()
    {
        $this->telechargers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOriginal(): ?string
    {
        return $this->nomOriginal;
    }

    public function setNomOriginal(string $nomOriginal): self
    {
        $this->nomOriginal = $nomOriginal;

        return $this;
    }

    public function getNomServeur(): ?string
    {
        return $this->nomServeur;
    }

    public function setNomServeur(string $nomServeur): self
    {
        $this->nomServeur = $nomServeur;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getProprietaire(): ?User
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?User $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getIDfichier(): ?int
    {
        return $this->IDfichier;
    }

    public function setIDfichier(int $IDfichier): self
    {
        $this->IDfichier = $IDfichier;

        return $this;
    }

    /**
     * @return Collection|Telecharger[]
     */
    public function getTelechargers(): Collection
    {
        return $this->telechargers;
    }

    public function addTelecharger(Telecharger $telecharger): self
    {
        if (!$this->telechargers->contains($telecharger)) {
            $this->telechargers[] = $telecharger;
            $telecharger->setIDFichier($this);
        }

        return $this;
    }

    public function removeTelecharger(Telecharger $telecharger): self
    {
        if ($this->telechargers->removeElement($telecharger)) {
            // set the owning side to null (unless already changed)
            if ($telecharger->getIDFichier() === $this) {
                $telecharger->setIDFichier(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ApplicationEquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationEquipeRepository::class)
 */
class ApplicationEquipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationClub::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToMany(targetEntity=ApplicationEvenement::class, mappedBy="equipe")
     */
    private $applicationEvenements;

    public function __construct()
    {
        $this->applicationEvenements = new ArrayCollection();
    }

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

    public function getClub(): ?ApplicationClub
    {
        return $this->club;
    }

    public function setClub(?ApplicationClub $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection|ApplicationEvenement[]
     */
    public function getApplicationEvenements(): Collection
    {
        return $this->applicationEvenements;
    }

    public function addApplicationEvenement(ApplicationEvenement $applicationEvenement): self
    {
        if (!$this->applicationEvenements->contains($applicationEvenement)) {
            $this->applicationEvenements[] = $applicationEvenement;
            $applicationEvenement->addEquipe($this);
        }

        return $this;
    }

    public function removeApplicationEvenement(ApplicationEvenement $applicationEvenement): self
    {
        if ($this->applicationEvenements->removeElement($applicationEvenement)) {
            $applicationEvenement->removeEquipe($this);
        }

        return $this;
    }
}

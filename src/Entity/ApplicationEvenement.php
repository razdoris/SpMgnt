<?php

namespace App\Entity;

use App\Repository\ApplicationEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationEvenementRepository::class)
 */
class ApplicationEvenement
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
    private $titre;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationClub::class, inversedBy="applicationEvenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * @ORM\ManyToMany(targetEntity=ApplicationEquipe::class, inversedBy="applicationEvenements")
     */
    private $equipe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationAdresseVille::class)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationCalendarEventsSort::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->equipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    /**
     * @return Collection|ApplicationEquipe[]
     */
    public function getEquipe(): Collection
    {
        return $this->equipe;
    }

    public function addEquipe(ApplicationEquipe $equipe): self
    {
        if (!$this->equipe->contains($equipe)) {
            $this->equipe[] = $equipe;
        }

        return $this;
    }

    public function removeEquipe(ApplicationEquipe $equipe): self
    {
        $this->equipe->removeElement($equipe);

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?ApplicationAdresseVille
    {
        return $this->ville;
    }

    public function setVille(?ApplicationAdresseVille $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getType(): ?ApplicationCalendarEventsSort
    {
        return $this->type;
    }

    public function setType(?ApplicationCalendarEventsSort $type): self
    {
        $this->type = $type;

        return $this;
    }
}

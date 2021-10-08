<?php

namespace App\Entity;

use App\Repository\ApplicationSeanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationSeanceRepository::class)
 */
class ApplicationSeance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=ApplicationEvenement::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $evenement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motPresidentAvantSeance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motCoachAvantSeance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $objectif;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sousObjectif;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motPresidentApresSeance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motCoachApresSeance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvenement(): ?ApplicationEvenement
    {
        return $this->evenement;
    }

    public function setEvenement(ApplicationEvenement $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }

    public function getMotPresidentAvantSeance(): ?string
    {
        return $this->motPresidentAvantSeance;
    }

    public function setMotPresidentAvantSeance(?string $motPresidentAvantSeance): self
    {
        $this->motPresidentAvantSeance = $motPresidentAvantSeance;

        return $this;
    }

    public function getMotCoachAvantSeance(): ?string
    {
        return $this->motCoachAvantSeance;
    }

    public function setMotCoachAvantSeance(?string $motCoachAvantSeance): self
    {
        $this->motCoachAvantSeance = $motCoachAvantSeance;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getSousObjectif(): ?string
    {
        return $this->sousObjectif;
    }

    public function setSousObjectif(?string $sousObjectif): self
    {
        $this->sousObjectif = $sousObjectif;

        return $this;
    }

    public function getMotPresidentApresSeance(): ?string
    {
        return $this->motPresidentApresSeance;
    }

    public function setMotPresidentApresSeance(?string $motPresidentApresSeance): self
    {
        $this->motPresidentApresSeance = $motPresidentApresSeance;

        return $this;
    }

    public function getMotCoachApresSeance(): ?string
    {
        return $this->motCoachApresSeance;
    }

    public function setMotCoachApresSeance(?string $motCoachApresSeance): self
    {
        $this->motCoachApresSeance = $motCoachApresSeance;

        return $this;
    }
}

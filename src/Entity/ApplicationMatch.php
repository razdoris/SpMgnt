<?php

namespace App\Entity;

use App\Repository\ApplicationMatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationMatchRepository::class)
 */
class ApplicationMatch
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomPrenomArbitre;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Adversaire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $domicile;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motPresidentAvantMatch;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motCoachAvantMatch;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motARetenir;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motPresidentApresMatch;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motCoachApresMatch;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comptRendu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $noteDuMatch;

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

    public function getNomPrenomArbitre(): ?string
    {
        return $this->nomPrenomArbitre;
    }

    public function setNomPrenomArbitre(?string $nomPrenomArbitre): self
    {
        $this->nomPrenomArbitre = $nomPrenomArbitre;

        return $this;
    }

    public function getAdversaire(): ?string
    {
        return $this->Adversaire;
    }

    public function setAdversaire(string $Adversaire): self
    {
        $this->Adversaire = $Adversaire;

        return $this;
    }

    public function getDomicile(): ?bool
    {
        return $this->domicile;
    }

    public function setDomicile(bool $domicile): self
    {
        $this->domicile = $domicile;

        return $this;
    }

    public function getMotPresidentAvantMatch(): ?string
    {
        return $this->motPresidentAvantMatch;
    }

    public function setMotPresidentAvantMatch(?string $motPresidentAvantMatch): self
    {
        $this->motPresidentAvantMatch = $motPresidentAvantMatch;

        return $this;
    }

    public function getMotCoachAvantMatch(): ?string
    {
        return $this->motCoachAvantMatch;
    }

    public function setMotCoachAvantMatch(?string $motCoachAvantMatch): self
    {
        $this->motCoachAvantMatch = $motCoachAvantMatch;

        return $this;
    }

    public function getMotARetenir(): ?string
    {
        return $this->motARetenir;
    }

    public function setMotARetenir(?string $motARetenir): self
    {
        $this->motARetenir = $motARetenir;

        return $this;
    }

    public function getMotPresidentApresMatch(): ?string
    {
        return $this->motPresidentApresMatch;
    }

    public function setMotPresidentApresMatch(?string $motPresidentApresMatch): self
    {
        $this->motPresidentApresMatch = $motPresidentApresMatch;

        return $this;
    }

    public function getMotCoachApresMatch(): ?string
    {
        return $this->motCoachApresMatch;
    }

    public function setMotCoachApresMatch(?string $motCoachApresMatch): self
    {
        $this->motCoachApresMatch = $motCoachApresMatch;

        return $this;
    }

    public function getComptRendu(): ?string
    {
        return $this->comptRendu;
    }

    public function setComptRendu(?string $comptRendu): self
    {
        $this->comptRendu = $comptRendu;

        return $this;
    }

    public function getNoteDuMatch(): ?int
    {
        return $this->noteDuMatch;
    }

    public function setNoteDuMatch(?int $noteDuMatch): self
    {
        $this->noteDuMatch = $noteDuMatch;

        return $this;
    }
}

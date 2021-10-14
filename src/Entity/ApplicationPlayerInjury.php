<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerInjuryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerInjuryRepository::class)
 */
class ApplicationPlayerInjury
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationPlayer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationPlayerInjuryLocalisation::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $localisation;

    /**
     * @ORM\Column(type="integer")
     */
    private $intensity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $beginDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationPlayerEventInformation::class, inversedBy="injuryDeclarations")
     */
    private $applicationPlayerEventInformation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlayer(): ?ApplicationPlayer
    {
        return $this->player;
    }

    public function setPlayer(?ApplicationPlayer $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getLocalisation(): ?ApplicationPlayerInjuryLocalisation
    {
        return $this->localisation;
    }

    public function setLocalisation(?ApplicationPlayerInjuryLocalisation $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getIntensity(): ?int
    {
        return $this->intensity;
    }

    public function setIntensity(int $intensity): self
    {
        $this->intensity = $intensity;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBeginDate(): ?\DateTimeInterface
    {
        return $this->beginDate;
    }

    public function setBeginDate(\DateTimeInterface $beginDate): self
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getApplicationPlayerEventInformation(): ?ApplicationPlayerEventInformation
    {
        return $this->applicationPlayerEventInformation;
    }

    public function setApplicationPlayerEventInformation(?ApplicationPlayerEventInformation $applicationPlayerEventInformation): self
    {
        $this->applicationPlayerEventInformation = $applicationPlayerEventInformation;

        return $this;
    }
}

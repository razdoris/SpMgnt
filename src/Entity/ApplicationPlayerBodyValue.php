<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerBodyValueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerBodyValueRepository::class)
 */
class ApplicationPlayerBodyValue
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
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMass;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $leanMass;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $waterLevel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lactate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $shoulder;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $breast;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hips;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $waist;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $upperThigh;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lowerThigh;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lowerThighLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $upperThighLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $calveRight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $calfLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $bicepsRight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $bicepsLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tricepsLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tricepsRight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $visceralFat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $muscularMass;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $muscularMassArmRight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $muscularMassArmLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $muscularMassBody;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $muscularMassLegRight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $muscularMassLegLeft;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $boneMass;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMassPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMassArmRightPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMassArmLeftPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMassBodyPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMassLegRightPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fatMassLegLeftPercent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $leanMassPercent;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(?float $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getFatMass(): ?float
    {
        return $this->fatMass;
    }

    public function setFatMass(?float $fatMass): self
    {
        $this->fatMass = $fatMass;

        return $this;
    }

    public function getLeanMass(): ?float
    {
        return $this->leanMass;
    }

    public function setLeanMass(?float $leanMass): self
    {
        $this->leanMass = $leanMass;

        return $this;
    }

    public function getWaterLevel(): ?float
    {
        return $this->waterLevel;
    }

    public function setWaterLevel(?float $waterLevel): self
    {
        $this->waterLevel = $waterLevel;

        return $this;
    }

    public function getLactate(): ?float
    {
        return $this->lactate;
    }

    public function setLactate(?float $lactate): self
    {
        $this->lactate = $lactate;

        return $this;
    }

    public function getShoulder(): ?float
    {
        return $this->shoulder;
    }

    public function setShoulder(?float $shoulder): self
    {
        $this->shoulder = $shoulder;

        return $this;
    }

    public function getBreast(): ?float
    {
        return $this->breast;
    }

    public function setBreast(?float $breast): self
    {
        $this->breast = $breast;

        return $this;
    }

    public function getHips(): ?float
    {
        return $this->hips;
    }

    public function setHips(?float $hips): self
    {
        $this->hips = $hips;

        return $this;
    }

    public function getWaist(): ?float
    {
        return $this->waist;
    }

    public function setWaist(?float $waist): self
    {
        $this->waist = $waist;

        return $this;
    }

    public function getUpperThigh(): ?float
    {
        return $this->upperThigh;
    }

    public function setUpperThigh(?float $upperThigh): self
    {
        $this->upperThigh = $upperThigh;

        return $this;
    }

    public function getLowerThigh(): ?float
    {
        return $this->lowerThigh;
    }

    public function setLowerThigh(?float $lowerThigh): self
    {
        $this->lowerThigh = $lowerThigh;

        return $this;
    }

    public function getLowerThighLeft(): ?float
    {
        return $this->lowerThighLeft;
    }

    public function setLowerThighLeft(?float $lowerThighLeft): self
    {
        $this->lowerThighLeft = $lowerThighLeft;

        return $this;
    }

    public function getUpperThighLeft(): ?float
    {
        return $this->upperThighLeft;
    }

    public function setUpperThighLeft(?float $upperThighLeft): self
    {
        $this->upperThighLeft = $upperThighLeft;

        return $this;
    }

    public function getCalveRight(): ?float
    {
        return $this->calveRight;
    }

    public function setCalveRight(?float $calveRight): self
    {
        $this->calveRight = $calveRight;

        return $this;
    }

    public function getCalfLeft(): ?float
    {
        return $this->calfLeft;
    }

    public function setCalfLeft(?float $calfLeft): self
    {
        $this->calfLeft = $calfLeft;

        return $this;
    }

    public function getBicepsRight(): ?float
    {
        return $this->bicepsRight;
    }

    public function setBicepsRight(?float $bicepsRight): self
    {
        $this->bicepsRight = $bicepsRight;

        return $this;
    }

    public function getBicepsLeft(): ?float
    {
        return $this->bicepsLeft;
    }

    public function setBicepsLeft(?float $bicepsLeft): self
    {
        $this->bicepsLeft = $bicepsLeft;

        return $this;
    }

    public function getTricepsLeft(): ?float
    {
        return $this->tricepsLeft;
    }

    public function setTricepsLeft(?float $tricepsLeft): self
    {
        $this->tricepsLeft = $tricepsLeft;

        return $this;
    }

    public function getTricepsRight(): ?float
    {
        return $this->tricepsRight;
    }

    public function setTricepsRight(?float $tricepsRight): self
    {
        $this->tricepsRight = $tricepsRight;

        return $this;
    }

    public function getVisceralFat(): ?float
    {
        return $this->visceralFat;
    }

    public function setVisceralFat(?float $visceralFat): self
    {
        $this->visceralFat = $visceralFat;

        return $this;
    }

    public function getMuscularMass(): ?float
    {
        return $this->muscularMass;
    }

    public function setMuscularMass(?float $muscularMass): self
    {
        $this->muscularMass = $muscularMass;

        return $this;
    }

    public function getMuscularMassArmRight(): ?float
    {
        return $this->muscularMassArmRight;
    }

    public function setMuscularMassArmRight(?float $muscularMassArmRight): self
    {
        $this->muscularMassArmRight = $muscularMassArmRight;

        return $this;
    }

    public function getMuscularMassArmLeft(): ?float
    {
        return $this->muscularMassArmLeft;
    }

    public function setMuscularMassArmLeft(?float $muscularMassArmLeft): self
    {
        $this->muscularMassArmLeft = $muscularMassArmLeft;

        return $this;
    }

    public function getMuscularMassBody(): ?float
    {
        return $this->muscularMassBody;
    }

    public function setMuscularMassBody(?float $muscularMassBody): self
    {
        $this->muscularMassBody = $muscularMassBody;

        return $this;
    }

    public function getMuscularMassLegRight(): ?float
    {
        return $this->muscularMassLegRight;
    }

    public function setMuscularMassLegRight(?float $muscularMassLegRight): self
    {
        $this->muscularMassLegRight = $muscularMassLegRight;

        return $this;
    }

    public function getMuscularMassLegLeft(): ?float
    {
        return $this->muscularMassLegLeft;
    }

    public function setMuscularMassLegLeft(?float $muscularMassLegLeft): self
    {
        $this->muscularMassLegLeft = $muscularMassLegLeft;

        return $this;
    }

    public function getBoneMass(): ?float
    {
        return $this->boneMass;
    }

    public function setBoneMass(?float $boneMass): self
    {
        $this->boneMass = $boneMass;

        return $this;
    }

    public function getFatMassPercent(): ?float
    {
        return $this->fatMassPercent;
    }

    public function setFatMassPercent(?float $fatMassPercent): self
    {
        $this->fatMassPercent = $fatMassPercent;

        return $this;
    }

    public function getFatMassArmRightPercent(): ?float
    {
        return $this->fatMassArmRightPercent;
    }

    public function setFatMassArmRightPercent(?float $fatMassArmRightPercent): self
    {
        $this->fatMassArmRightPercent = $fatMassArmRightPercent;

        return $this;
    }

    public function getFatMassArmLeftPercent(): ?float
    {
        return $this->fatMassArmLeftPercent;
    }

    public function setFatMassArmLeftPercent(?float $fatMassArmLeftPercent): self
    {
        $this->fatMassArmLeftPercent = $fatMassArmLeftPercent;

        return $this;
    }

    public function getFatMassBodyPercent(): ?float
    {
        return $this->fatMassBodyPercent;
    }

    public function setFatMassBodyPercent(?float $fatMassBodyPercent): self
    {
        $this->fatMassBodyPercent = $fatMassBodyPercent;

        return $this;
    }

    public function getFatMassLegRightPercent(): ?float
    {
        return $this->fatMassLegRightPercent;
    }

    public function setFatMassLegRightPercent(?float $fatMassLegRightPercent): self
    {
        $this->fatMassLegRightPercent = $fatMassLegRightPercent;

        return $this;
    }

    public function getFatMassLegLeftPercent(): ?float
    {
        return $this->fatMassLegLeftPercent;
    }

    public function setFatMassLegLeftPercent(?float $fatMassLegLeftPercent): self
    {
        $this->fatMassLegLeftPercent = $fatMassLegLeftPercent;

        return $this;
    }

    public function getLeanMassPercent(): ?float
    {
        return $this->leanMassPercent;
    }

    public function setLeanMassPercent(?float $leanMassPercent): self
    {
        $this->leanMassPercent = $leanMassPercent;

        return $this;
    }
}

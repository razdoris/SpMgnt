<?php

namespace App\Entity;

use App\Repository\ApplicationTestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationTestRepository::class)
 */
class ApplicationTest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationClub::class)
     */
    private $club;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forAll;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $testName;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfValues;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName1;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName2;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName3;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName4;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName5;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName6;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName7;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName8;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName9;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName10;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName11;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName12;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName13;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName14;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $valueName15;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit1;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit2;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit3;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit4;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit5;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit6;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit7;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit8;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit9;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit10;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit11;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit12;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit13;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit14;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $valueUnit15;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $abaque;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getForAll(): ?bool
    {
        return $this->forAll;
    }

    public function setForAll(bool $forAll): self
    {
        $this->forAll = $forAll;

        return $this;
    }

    public function getTestName(): ?string
    {
        return $this->testName;
    }

    public function setTestName(string $testName): self
    {
        $this->testName = $testName;

        return $this;
    }

    public function getNumberOfValues(): ?int
    {
        return $this->numberOfValues;
    }

    public function setNumberOfValues(int $numberOfValues): self
    {
        $this->numberOfValues = $numberOfValues;

        return $this;
    }

    public function getValueName1(): ?string
    {
        return $this->valueName1;
    }

    public function setValueName1(?string $valueName1): self
    {
        $this->valueName1 = $valueName1;

        return $this;
    }

    public function getValueName2(): ?string
    {
        return $this->valueName2;
    }

    public function setValueName2(?string $valueName2): self
    {
        $this->valueName2 = $valueName2;

        return $this;
    }

    public function getValueName3(): ?string
    {
        return $this->valueName3;
    }

    public function setValueName3(?string $valueName3): self
    {
        $this->valueName3 = $valueName3;

        return $this;
    }

    public function getValueName4(): ?string
    {
        return $this->valueName4;
    }

    public function setValueName4(?string $valueName4): self
    {
        $this->valueName4 = $valueName4;

        return $this;
    }

    public function getValueName5(): ?string
    {
        return $this->valueName5;
    }

    public function setValueName5(?string $valueName5): self
    {
        $this->valueName5 = $valueName5;

        return $this;
    }

    public function getValueName6(): ?string
    {
        return $this->valueName6;
    }

    public function setValueName6(?string $valueName6): self
    {
        $this->valueName6 = $valueName6;

        return $this;
    }

    public function getValueName7(): ?string
    {
        return $this->valueName7;
    }

    public function setValueName7(?string $valueName7): self
    {
        $this->valueName7 = $valueName7;

        return $this;
    }

    public function getValueName8(): ?string
    {
        return $this->valueName8;
    }

    public function setValueName8(?string $valueName8): self
    {
        $this->valueName8 = $valueName8;

        return $this;
    }

    public function getValueName9(): ?string
    {
        return $this->valueName9;
    }

    public function setValueName9(?string $valueName9): self
    {
        $this->valueName9 = $valueName9;

        return $this;
    }

    public function getValueName10(): ?string
    {
        return $this->valueName10;
    }

    public function setValueName10(?string $valueName10): self
    {
        $this->valueName10 = $valueName10;

        return $this;
    }

    public function getValueName11(): ?string
    {
        return $this->valueName11;
    }

    public function setValueName11(?string $valueName11): self
    {
        $this->valueName11 = $valueName11;

        return $this;
    }

    public function getValueName12(): ?string
    {
        return $this->valueName12;
    }

    public function setValueName12(?string $valueName12): self
    {
        $this->valueName12 = $valueName12;

        return $this;
    }

    public function getValueName13(): ?string
    {
        return $this->valueName13;
    }

    public function setValueName13(?string $valueName13): self
    {
        $this->valueName13 = $valueName13;

        return $this;
    }

    public function getValueName14(): ?string
    {
        return $this->valueName14;
    }

    public function setValueName14(?string $valueName14): self
    {
        $this->valueName14 = $valueName14;

        return $this;
    }

    public function getValueName15(): ?string
    {
        return $this->valueName15;
    }

    public function setValueName15(?string $valueName15): self
    {
        $this->valueName15 = $valueName15;

        return $this;
    }

    public function getValueUnit1(): ?string
    {
        return $this->valueUnit1;
    }

    public function setValueUnit1(?string $valueUnit1): self
    {
        $this->valueUnit1 = $valueUnit1;

        return $this;
    }

    public function getValueUnit2(): ?string
    {
        return $this->valueUnit2;
    }

    public function setValueUnit2(?string $valueUnit2): self
    {
        $this->valueUnit2 = $valueUnit2;

        return $this;
    }

    public function getValueUnit3(): ?string
    {
        return $this->valueUnit3;
    }

    public function setValueUnit3(?string $valueUnit3): self
    {
        $this->valueUnit3 = $valueUnit3;

        return $this;
    }

    public function getValueUnit4(): ?string
    {
        return $this->valueUnit4;
    }

    public function setValueUnit4(?string $valueUnit4): self
    {
        $this->valueUnit4 = $valueUnit4;

        return $this;
    }

    public function getValueUnit5(): ?string
    {
        return $this->valueUnit5;
    }

    public function setValueUnit5(?string $valueUnit5): self
    {
        $this->valueUnit5 = $valueUnit5;

        return $this;
    }

    public function getValueUnit6(): ?string
    {
        return $this->valueUnit6;
    }

    public function setValueUnit6(?string $valueUnit6): self
    {
        $this->valueUnit6 = $valueUnit6;

        return $this;
    }

    public function getValueUnit7(): ?string
    {
        return $this->valueUnit7;
    }

    public function setValueUnit7(?string $valueUnit7): self
    {
        $this->valueUnit7 = $valueUnit7;

        return $this;
    }

    public function getValueUnit8(): ?string
    {
        return $this->valueUnit8;
    }

    public function setValueUnit8(?string $valueUnit8): self
    {
        $this->valueUnit8 = $valueUnit8;

        return $this;
    }

    public function getValueUnit9(): ?string
    {
        return $this->valueUnit9;
    }

    public function setValueUnit9(?string $valueUnit9): self
    {
        $this->valueUnit9 = $valueUnit9;

        return $this;
    }

    public function getValueUnit10(): ?string
    {
        return $this->valueUnit10;
    }

    public function setValueUnit10(?string $valueUnit10): self
    {
        $this->valueUnit10 = $valueUnit10;

        return $this;
    }

    public function getValueUnit11(): ?string
    {
        return $this->valueUnit11;
    }

    public function setValueUnit11(?string $valueUnit11): self
    {
        $this->valueUnit11 = $valueUnit11;

        return $this;
    }

    public function getValueUnit12(): ?string
    {
        return $this->valueUnit12;
    }

    public function setValueUnit12(?string $valueUnit12): self
    {
        $this->valueUnit12 = $valueUnit12;

        return $this;
    }

    public function getValueUnit13(): ?string
    {
        return $this->valueUnit13;
    }

    public function setValueUnit13(?string $valueUnit13): self
    {
        $this->valueUnit13 = $valueUnit13;

        return $this;
    }

    public function getValueUnit14(): ?string
    {
        return $this->valueUnit14;
    }

    public function setValueUnit14(?string $valueUnit14): self
    {
        $this->valueUnit14 = $valueUnit14;

        return $this;
    }

    public function getValueUnit15(): ?string
    {
        return $this->valueUnit15;
    }

    public function setValueUnit15(?string $valueUnit15): self
    {
        $this->valueUnit15 = $valueUnit15;

        return $this;
    }

    public function getAbaque(): ?string
    {
        return $this->abaque;
    }

    public function setAbaque(?string $abaque): self
    {
        $this->abaque = $abaque;

        return $this;
    }
}

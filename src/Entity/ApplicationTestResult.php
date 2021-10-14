<?php

namespace App\Entity;

use App\Repository\ApplicationTestResultRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationTestResultRepository::class)
 */
class ApplicationTestResult
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationTest::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $test;

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
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result1;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result2;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result3;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result4;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result5;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result6;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result7;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result8;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result9;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result10;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result11;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result12;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result13;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result14;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $result15;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTest(): ?ApplicationTest
    {
        return $this->test;
    }

    public function setTest(?ApplicationTest $test): self
    {
        $this->test = $test;

        return $this;
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

    public function getResult1(): ?string
    {
        return $this->result1;
    }

    public function setResult1(?string $result1): self
    {
        $this->result1 = $result1;

        return $this;
    }

    public function getResult2(): ?string
    {
        return $this->result2;
    }

    public function setResult2(?string $result2): self
    {
        $this->result2 = $result2;

        return $this;
    }

    public function getResult3(): ?string
    {
        return $this->result3;
    }

    public function setResult3(?string $result3): self
    {
        $this->result3 = $result3;

        return $this;
    }

    public function getResult4(): ?string
    {
        return $this->result4;
    }

    public function setResult4(?string $result4): self
    {
        $this->result4 = $result4;

        return $this;
    }

    public function getResult5(): ?string
    {
        return $this->result5;
    }

    public function setResult5(?string $result5): self
    {
        $this->result5 = $result5;

        return $this;
    }

    public function getResult6(): ?string
    {
        return $this->result6;
    }

    public function setResult6(?string $result6): self
    {
        $this->result6 = $result6;

        return $this;
    }

    public function getResult7(): ?string
    {
        return $this->result7;
    }

    public function setResult7(?string $result7): self
    {
        $this->result7 = $result7;

        return $this;
    }

    public function getResult8(): ?string
    {
        return $this->result8;
    }

    public function setResult8(?string $result8): self
    {
        $this->result8 = $result8;

        return $this;
    }

    public function getResult9(): ?string
    {
        return $this->result9;
    }

    public function setResult9(?string $result9): self
    {
        $this->result9 = $result9;

        return $this;
    }

    public function getResult10(): ?string
    {
        return $this->result10;
    }

    public function setResult10(?string $result10): self
    {
        $this->result10 = $result10;

        return $this;
    }

    public function getResult11(): ?string
    {
        return $this->result11;
    }

    public function setResult11(?string $result11): self
    {
        $this->result11 = $result11;

        return $this;
    }

    public function getResult12(): ?string
    {
        return $this->result12;
    }

    public function setResult12(?string $result12): self
    {
        $this->result12 = $result12;

        return $this;
    }

    public function getResult13(): ?string
    {
        return $this->result13;
    }

    public function setResult13(?string $result13): self
    {
        $this->result13 = $result13;

        return $this;
    }

    public function getResult14(): ?string
    {
        return $this->result14;
    }

    public function setResult14(?string $result14): self
    {
        $this->result14 = $result14;

        return $this;
    }

    public function getResult15(): ?string
    {
        return $this->result15;
    }

    public function setResult15(?string $result15): self
    {
        $this->result15 = $result15;

        return $this;
    }
}

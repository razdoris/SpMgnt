<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerLicenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerLicenceRepository::class)
 */
class ApplicationPlayerLicence
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
     * @ORM\Column(type="boolean")
     */
    private $isOk;

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

    public function getIsOk(): ?bool
    {
        return $this->isOk;
    }

    public function setIsOk(bool $isOk): self
    {
        $this->isOk = $isOk;

        return $this;
    }
}

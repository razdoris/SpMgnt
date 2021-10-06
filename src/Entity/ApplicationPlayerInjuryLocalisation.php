<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerInjuryLocalisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerInjuryLocalisationRepository::class)
 */
class ApplicationPlayerInjuryLocalisation
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
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lateralite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getLateralite(): ?string
    {
        return $this->lateralite;
    }

    public function setLateralite(?string $lateralite): self
    {
        $this->lateralite = $lateralite;

        return $this;
    }
}

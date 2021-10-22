<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerInjuryLocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerInjuryLocationRepository::class)
 */
class ApplicationPlayerInjuryLocation
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
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $laterality;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLaterality(): ?string
    {
        return $this->laterality;
    }

    public function setLaterality(?string $laterality): self
    {
        $this->laterality = $laterality;

        return $this;
    }
}

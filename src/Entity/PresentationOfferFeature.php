<?php

namespace App\Entity;

use App\Repository\PresentationOfferFeatureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationOfferFeatureRepository::class)
 */
class PresentationOfferFeature
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
    private $featureName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFeatureName(): ?string
    {
        return $this->featureName;
    }

    public function setFeatureName(string $featureName): self
    {
        $this->featureName = $featureName;

        return $this;
    }
}
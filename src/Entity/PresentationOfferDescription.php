<?php

namespace App\Entity;

use App\Repository\PresentationOfferDescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationOfferDescriptionRepository::class)
 */
class PresentationOfferDescription
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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $lowPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hightPrice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $periodicity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\ManyToMany(targetEntity=PresentationOfferFeature::class)
     */
    private $features;

    /**
     * @ORM\OneToOne(targetEntity=PresentationContactSubject::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $contactSubject;

    public function __construct()
    {
        $this->features = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLowPrice(): ?float
    {
        return $this->lowPrice;
    }

    public function setLowPrice(float $lowPrice): self
    {
        $this->lowPrice = $lowPrice;

        return $this;
    }

    public function getHightPrice(): ?float
    {
        return $this->hightPrice;
    }

    public function setHightPrice(?float $hightPrice): self
    {
        $this->hightPrice = $hightPrice;

        return $this;
    }

    public function getPeriodicity(): ?string
    {
        return $this->periodicity;
    }

    public function setPeriodicity(string $periodicity): self
    {
        $this->periodicity = $periodicity;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection|PresentationOfferFeature[]
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(PresentationOfferFeature $feature): self
    {
        if (!$this->features->contains($feature)) {
            $this->features[] = $feature;
        }

        return $this;
    }

    public function removeFeature(PresentationOfferFeature $feature): self
    {
        $this->features->removeElement($feature);

        return $this;
    }

    public function getContactSubject(): ?PresentationContactSubject
    {
        return $this->contactSubject;
    }

    public function setContactSubject(PresentationContactSubject $contactSubject): self
    {
        $this->contactSubject = $contactSubject;

        return $this;
    }
}

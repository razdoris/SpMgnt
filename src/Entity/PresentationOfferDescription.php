<?php

namespace App\Entity;

use App\Repository\PresentationOfferDescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PresentationOfferDescriptionRepository::class)
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="offerIllustrations", fileNameProperty="imageName")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=PresentationOfferFeature::class)
     */
    private $features;

    /**
     * @ORM\ManyToOne(targetEntity=PresentationContactSubject::class, cascade={"persist", "remove"})
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



    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable();;
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }
}

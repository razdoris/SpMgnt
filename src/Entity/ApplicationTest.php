<?php

namespace App\Entity;

use App\Repository\ApplicationTestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ApplicationTestRepository::class)
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="testAbaque", fileNameProperty="abaqueName")
     * @var File|null
     */
    private $abaqueFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $abaqueName;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTimeInterface|null
     */
    private $updatedAt;


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
    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $abaqueFile
     */

    public function setAbaqueFile(File $abaque = null)
    {
        $this->abaqueFile = $abaque;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($abaque) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable();;
        }
    }

    public function getAbaqueFile(): ?File
    {
        return $this->abaqueFile;
    }

    public function getAbaqueName(): ?string
    {
        return $this->abaqueName;
    }

    public function setAbaqueName(?string $abaqueName): self
    {
        $this->abaqueName = $abaqueName;

        return $this;
    }

}

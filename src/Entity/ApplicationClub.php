<?php

namespace App\Entity;

use App\Repository\ApplicationClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ApplicationClubRepository::class)
 * @Vich\Uploadable
 */
class ApplicationClub
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Presentation;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="club")
     */
    private $users;

    /**
     * @Vich\UploadableField(mapping="clubLogo", fileNameProperty="imageName")
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
     * @ORM\OneToMany(targetEntity=ApplicationEvenement::class, mappedBy="club")
     */
    private $applicationEvenements;


    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->applicationEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->Presentation;
    }

    public function setPresentation(?string $Presentation): self
    {
        $this->Presentation = $Presentation;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setClub($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClub() === $this) {
                $user->setClub(null);
            }
        }

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

    /**
     * @return Collection|ApplicationEvenement[]
     */
    public function getApplicationEvenements(): Collection
    {
        return $this->applicationEvenements;
    }

    public function addApplicationEvenement(ApplicationEvenement $applicationEvenement): self
    {
        if (!$this->applicationEvenements->contains($applicationEvenement)) {
            $this->applicationEvenements[] = $applicationEvenement;
            $applicationEvenement->setClub($this);
        }

        return $this;
    }

    public function removeApplicationEvenement(ApplicationEvenement $applicationEvenement): self
    {
        if ($this->applicationEvenements->removeElement($applicationEvenement)) {
            // set the owning side to null (unless already changed)
            if ($applicationEvenement->getClub() === $this) {
                $applicationEvenement->setClub(null);
            }
        }

        return $this;
    }
}

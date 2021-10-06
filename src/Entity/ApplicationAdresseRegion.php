<?php

namespace App\Entity;

use App\Repository\ApplicationAdresseRegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationAdresseRegionRepository::class)
 */
class ApplicationAdresseRegion
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
    private $nomRegion;

    /**
     * @ORM\Column(type="integer")
     */
    private $codeRegion;

    /**
     * @ORM\OneToMany(targetEntity=ApplicationAdresseDepartement::class, mappedBy="region", orphanRemoval=true)
     */
    private $applicationAdresseDepartements;

    public function __construct()
    {
        $this->applicationAdresseDepartements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRegion(): ?string
    {
        return $this->nomRegion;
    }

    public function setNomRegion(string $nomRegion): self
    {
        $this->nomRegion = $nomRegion;

        return $this;
    }

    public function getCodeRegion(): ?int
    {
        return $this->codeRegion;
    }

    public function setCodeRegion(int $codeRegion): self
    {
        $this->codeRegion = $codeRegion;

        return $this;
    }

    /**
     * @return Collection|ApplicationAdresseDepartement[]
     */
    public function getApplicationAdresseDepartements(): Collection
    {
        return $this->applicationAdresseDepartements;
    }

    public function addApplicationAdresseDepartement(ApplicationAdresseDepartement $applicationAdresseDepartement): self
    {
        if (!$this->applicationAdresseDepartements->contains($applicationAdresseDepartement)) {
            $this->applicationAdresseDepartements[] = $applicationAdresseDepartement;
            $applicationAdresseDepartement->setRegion($this);
        }

        return $this;
    }

    public function removeApplicationAdresseDepartement(ApplicationAdresseDepartement $applicationAdresseDepartement): self
    {
        if ($this->applicationAdresseDepartements->removeElement($applicationAdresseDepartement)) {
            // set the owning side to null (unless already changed)
            if ($applicationAdresseDepartement->getRegion() === $this) {
                $applicationAdresseDepartement->setRegion(null);
            }
        }

        return $this;
    }
}

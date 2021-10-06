<?php

namespace App\Entity;

use App\Repository\ApplicationAdresseDepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationAdresseDepartementRepository::class)
 */
class ApplicationAdresseDepartement
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
    private $nomDepartement;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $codeDepartement;

    /**
     * @ORM\OneToMany(targetEntity=ApplicationAdresseVille::class, mappedBy="departement", orphanRemoval=true)
     */
    private $applicationAdresseVilles;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationAdresseRegion::class, inversedBy="applicationAdresseDepartements")
     * @ORM\JoinColumn(nullable=true)
     */
    private $region;

    public function __construct()
    {
        $this->applicationAdresseVilles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDepartement(): ?string
    {
        return $this->nomDepartement;
    }

    public function setNomDepartement(string $nomDepartement): self
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    public function getCodeDerpartement(): ?string
    {
        return $this->codeDerpartement;
    }

    public function setCodeDerpartement(string $codeDerpartement): self
    {
        $this->codeDerpartement = $codeDerpartement;

        return $this;
    }

    public function getCodeDepartement(): ?int
    {
        return $this->codeDepartement;
    }

    public function setCodeDepartement(int $codeDepartement): self
    {
        $this->codeDepartement = $codeDepartement;

        return $this;
    }

    /**
     * @return Collection|ApplicationAdresseVille[]
     */
    public function getApplicationAdresseVilles(): Collection
    {
        return $this->applicationAdresseVilles;
    }

    public function addApplicationAdresseVille(ApplicationAdresseVille $applicationAdresseVille): self
    {
        if (!$this->applicationAdresseVilles->contains($applicationAdresseVille)) {
            $this->applicationAdresseVilles[] = $applicationAdresseVille;
            $applicationAdresseVille->setDepartement($this);
        }

        return $this;
    }

    public function removeApplicationAdresseVille(ApplicationAdresseVille $applicationAdresseVille): self
    {
        if ($this->applicationAdresseVilles->removeElement($applicationAdresseVille)) {
            // set the owning side to null (unless already changed)
            if ($applicationAdresseVille->getDepartement() === $this) {
                $applicationAdresseVille->setDepartement(null);
            }
        }

        return $this;
    }

    public function getRegion(): ?ApplicationAdresseRegion
    {
        return $this->region;
    }

    public function setRegion(?ApplicationAdresseRegion $region): self
    {
        $this->region = $region;

        return $this;
    }
}

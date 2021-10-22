<?php

namespace App\Entity;

use App\Repository\ApplicationAddressDepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationAddressDepartmentRepository::class)
 */
class ApplicationAddressDepartment
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
    private $departmentName;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $departmentCode;

    /**
     * @ORM\OneToMany(targetEntity=ApplicationAddresscity::class, mappedBy="departement", orphanRemoval=true)
     */
    private $cities;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationAddressRegion::class, inversedBy="departments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $region;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    public function setDepartmentName(string $departmentName): self
    {
        $this->departmentName = $departmentName;

        return $this;
    }

    public function getDepartmentCode(): ?string
    {
        return $this->departmentCode;
    }

    public function setDepartmentCode(string $departmentCode): self
    {
        $this->departmentCode = $departmentCode;

        return $this;
    }

    public function getCodeDepartement(): ?int
    {
        return $this->departmentCode;
    }

    public function setCodeDepartement(int $departmentCode): self
    {
        $this->departmentCode = $departmentCode;

        return $this;
    }

    /**
     * @return Collection|ApplicationAddressCity[]
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(ApplicationAddressCity $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setDepartment($this);
        }

        return $this;
    }

    public function removeCity(ApplicationAddressCity $city): self
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getDepartment() === $this) {
                $city->setDepartment(null);
            }
        }

        return $this;
    }

    public function getRegion(): ?ApplicationAddressRegion
    {
        return $this->region;
    }

    public function setRegion(?ApplicationAddressRegion $region): self
    {
        $this->region = $region;

        return $this;
    }
}

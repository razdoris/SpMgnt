<?php

namespace App\Entity;

use App\Repository\ApplicationAddressRegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationAddressRegionRepository::class)
 */
class ApplicationAddressRegion
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
    private $regionName;

    /**
     * @ORM\Column(type="integer")
     */
    private $regionCode;

    /**
     * @ORM\OneToMany(targetEntity=ApplicationAddressDepartment::class, mappedBy="region", orphanRemoval=true)
     */
    private $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegionName(): ?string
    {
        return $this->regionName;
    }

    public function setRegionName(string $regionName): self
    {
        $this->regionName = $regionName;

        return $this;
    }

    public function getRegionCode(): ?int
    {
        return $this->regionCode;
    }

    public function setRegionCode(int $regionCode): self
    {
        $this->regionCode = $regionCode;

        return $this;
    }

    /**
     * @return Collection|ApplicationAddressDepartment[]
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(ApplicationAddressDepartment $departments): self
    {
        if (!$this->departments->contains($departments)) {
            $this->departments[] = $departments;
            $departments->setRegion($this);
        }

        return $this;
    }

    public function removeDepartment(ApplicationAddressDepartment $departments): self
    {
        if ($this->departments->removeElement($departments)) {
            // set the owning side to null (unless already changed)
            if ($departments->getRegion() === $this) {
                $departments->setRegion(null);
            }
        }

        return $this;
    }
}

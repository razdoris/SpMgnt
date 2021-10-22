<?php

namespace App\Entity;

use App\Repository\ApplicationAddressCityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationAddressCityRepository::class)
 */
class ApplicationAddressCity
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
    private $cityName;

    /**
     * @ORM\Column(type="integer")
     */
    private $cityCode;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationAddressDepartment::class, inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(string $cityName): self
    {
        $this->cityName = $cityName;

        return $this;
    }

    public function getCityCode(): ?int
    {
        return $this->cityCode;
    }

    public function setCityCode(int $cityCode): self
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    public function getDepartment(): ?ApplicationAddressDepartment
    {
        return $this->department;
    }

    public function setDepartment(?ApplicationAddressDepartment $department): self
    {
        $this->department = $department;

        return $this;
    }
}

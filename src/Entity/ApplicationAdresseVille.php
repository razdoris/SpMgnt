<?php

namespace App\Entity;

use App\Repository\ApplicationAdresseVilleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationAdresseVilleRepository::class)
 */
class ApplicationAdresseVille
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
    private $nomVille;

    /**
     * @ORM\Column(type="integer")
     */
    private $codeVille;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationAdresseDepartement::class, inversedBy="applicationAdresseVilles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): self
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getCodeVille(): ?int
    {
        return $this->codeVille;
    }

    public function setCodeVille(int $codeVille): self
    {
        $this->codeVille = $codeVille;

        return $this;
    }

    public function getDepartement(): ?ApplicationAdresseDepartement
    {
        return $this->departement;
    }

    public function setDepartement(?ApplicationAdresseDepartement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }
}

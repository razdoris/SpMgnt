<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerRepository::class)
 */
class ApplicationPlayer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="applicationJoueur", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postes;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $lateralite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPostes(): ?string
    {
        return $this->postes;
    }

    public function setPostes(?string $postes): self
    {
        $this->postes = $postes;

        return $this;
    }

    public function getLateralite(): ?string
    {
        return $this->lateralite;
    }

    public function setLateralite(?string $lateralite): self
    {
        $this->lateralite = $lateralite;

        return $this;
    }
}

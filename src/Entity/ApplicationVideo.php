<?php

namespace App\Entity;

use App\Repository\ApplicationVideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationVideoRepository::class)
 */
class ApplicationVideo
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
     * @ORM\Column(type="string", length=255)
     */
    private $videoName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

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

    public function getVideoName(): ?string
    {
        return $this->videoName;
    }

    public function setVideoName(string $videoName): self
    {
        $this->videoName = $videoName;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }
}

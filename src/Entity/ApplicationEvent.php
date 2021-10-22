<?php

namespace App\Entity;

use App\Repository\ApplicationEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationEvenementRepository::class)
 */
class ApplicationEvent
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
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationClub::class, inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * @ORM\ManyToMany(targetEntity=ApplicationTeam::class, inversedBy="events")
     */
    private $teams;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationAddressCity::class)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationCalendarEventsSort::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->team = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    /**
     * @return Collection|ApplicationTeam[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addEquipe(ApplicationTeam $team): self
    {
        if (!$this->team->contains($team)) {
            $this->teams[] = $team;
        }

        return $this;
    }

    public function removeEquipe(ApplicationTeam $team): self
    {
        $this->teams->removeElement($team);

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?ApplicationAddressCity
    {
        return $this->city;
    }

    public function setCity(?ApplicationAddressCity $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getType(): ?ApplicationCalendarEventsSort
    {
        return $this->type;
    }

    public function setType(?ApplicationCalendarEventsSort $type): self
    {
        $this->type = $type;

        return $this;
    }
}

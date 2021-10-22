<?php

namespace App\Entity;

use App\Repository\ApplicationTeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationTeamRepository::class)
 */
class ApplicationTeam
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationClub::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $championship;

    /**
     * @ORM\ManyToMany(targetEntity=ApplicationEvent::class, mappedBy="teams")
     */
    private $events;

    public function __construct()
    {
        $this->events = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getChampionship(): ?string
    {
        return $this->championship;
    }

    public function setChampionship(string $championship): self
    {
        $this->championship = $championship;

        return $this;
    }

    /**
     * @return Collection|ApplicationEvent[]
     */
    public function getApplicationEvenements(): Collection
    {
        return $this->events;
    }

    public function addEvent(ApplicationEvent $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addEquipe($this);
        }

        return $this;
    }

    public function removeEvent(ApplicationEvent $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removeEquipe($this);
        }

        return $this;
    }
}

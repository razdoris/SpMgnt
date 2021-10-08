<?php

namespace App\Entity;

use App\Repository\ApplicationMatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationMatchRepository::class)
 */
class ApplicationMatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationStandings::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $awayTeam;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationStandings::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $homeTeam;

    /**
     * @ORM\Column(type="integer")
     */
    private $matchDay;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $awayTeamGoal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $homeTeamGoal;

    /**
     * @ORM\Column(type="integer")
     */
    private $idApi;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAwayTeam(): ?ApplicationStandings
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?ApplicationStandings $awayTeam): self
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    public function getHomeTeam(): ?ApplicationStandings
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?ApplicationStandings $homeTeam): self
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getMatchDay(): ?int
    {
        return $this->matchDay;
    }

    public function setMatchDay(int $matchDay): self
    {
        $this->matchDay = $matchDay;

        return $this;
    }

    public function getAwayTeamGoal(): ?int
    {
        return $this->awayTeamGoal;
    }

    public function setAwayTeamGoal(?int $awayTeamGoal): self
    {
        $this->awayTeamGoal = $awayTeamGoal;

        return $this;
    }

    public function getHomeTeamGoal(): ?int
    {
        return $this->homeTeamGoal;
    }

    public function setHomeTeamGoal(?int $homeTeamGoal): self
    {
        $this->homeTeamGoal = $homeTeamGoal;

        return $this;
    }

    public function getIdApi(): ?int
    {
        return $this->idApi;
    }

    public function setIdApi(int $idApi): self
    {
        $this->idApi = $idApi;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}

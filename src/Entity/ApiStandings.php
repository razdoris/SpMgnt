<?php

namespace App\Entity;

use App\Repository\ApiStandingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApiStandingsRepository::class)
 */
class ApiStandings
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
    private $clubName;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubPoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubPlayedGames;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubWon;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubDraw;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubLost;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubgoalFor;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubGoalAgainst;

    /**
     * @ORM\Column(type="integer")
     */
    private $clubPosition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="integer")
     */
    private $idApi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubName(): ?string
    {
        return $this->clubName;
    }

    public function setClubName(string $clubName): self
    {
        $this->clubName = $clubName;

        return $this;
    }

    public function getClubPoints(): ?int
    {
        return $this->clubPoints;
    }

    public function setClubPoints(int $clubPoints): self
    {
        $this->clubPoints = $clubPoints;

        return $this;
    }

    public function getClubPlayedGames(): ?int
    {
        return $this->clubPlayedGames;
    }

    public function setClubPlayedGames(int $clubPlayedGames): self
    {
        $this->clubPlayedGames = $clubPlayedGames;

        return $this;
    }

    public function getClubWon(): ?int
    {
        return $this->clubWon;
    }

    public function setClubWon(int $clubWon): self
    {
        $this->clubWon = $clubWon;

        return $this;
    }

    public function getClubDraw(): ?int
    {
        return $this->clubDraw;
    }

    public function setClubDraw(int $clubDraw): self
    {
        $this->clubDraw = $clubDraw;

        return $this;
    }

    public function getClubLost(): ?int
    {
        return $this->clubLost;
    }

    public function setClubLost(int $clubLost): self
    {
        $this->clubLost = $clubLost;

        return $this;
    }

    public function getClubgoalFor(): ?int
    {
        return $this->clubgoalFor;
    }

    public function setClubgoalFor(int $clubgoalFor): self
    {
        $this->clubgoalFor = $clubgoalFor;

        return $this;
    }

    public function getClubGoalAgainst(): ?int
    {
        return $this->clubGoalAgainst;
    }

    public function setClubGoalAgainst(int $clubGoalAgainst): self
    {
        $this->clubGoalAgainst = $clubGoalAgainst;

        return $this;
    }

    public function getClubPosition(): ?int
    {
        return $this->clubPosition;
    }

    public function setClubPosition(int $clubPosition): self
    {
        $this->clubPosition = $clubPosition;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

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
}

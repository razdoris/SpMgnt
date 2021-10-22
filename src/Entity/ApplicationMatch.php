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
     * @ORM\OneToOne(targetEntity=ApplicationEvent::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refereeName;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $opponent;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $atHome;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presidentSpeechBefore;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $coachSpeechBefore;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $importantItem;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presidentSpeechAfter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $coachSpeechAfter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $debriefing;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $grade;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?ApplicationEvent
    {
        return $this->event;
    }

    public function setEvent(ApplicationEvent $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getRefereeName(): ?string
    {
        return $this->refereeName;
    }

    public function setRefereeName(?string $refereeName): self
    {
        $this->refereeName = $refereeName;

        return $this;
    }

    public function getOpponent(): ?string
    {
        return $this->opponent;
    }

    public function setOpponent(string $opponent): self
    {
        $this->opponent = $opponent;

        return $this;
    }

    public function getAtHome(): ?bool
    {
        return $this->atHome;
    }

    public function setAtHome(bool $atHome): self
    {
        $this->atHome = $atHome;

        return $this;
    }

    public function getPresidentSpeechBefore(): ?string
    {
        return $this->presidentSpeechBefore;
    }

    public function setPresidentSpeechBefore(?string $presidentSpeechBefore): self
    {
        $this->presidentSpeechBefore = $presidentSpeechBefore;

        return $this;
    }

    public function getCoachSpeechBefore(): ?string
    {
        return $this->coachSpeechBefore;
    }

    public function setCoachSpeechBefore(?string $coachSpeechBefore): self
    {
        $this->coachSpeechBefore = $coachSpeechBefore;

        return $this;
    }

    public function getImportantItem(): ?string
    {
        return $this->importantItem;
    }

    public function setImportantItem(?string $importantItem): self
    {
        $this->importantItem = $importantItem;

        return $this;
    }

    public function getPresidentSpeechAfter(): ?string
    {
        return $this->presidentSpeechAfter;
    }

    public function setPresidentSpeechAfter(?string $presidentSpeechAfter): self
    {
        $this->presidentSpeechAfter = $presidentSpeechAfter;

        return $this;
    }

    public function getCoachSpeechAfter(): ?string
    {
        return $this->coachSpeechAfter;
    }

    public function setCoachSpeechAfter(?string $coachSpeechAfter): self
    {
        $this->coachSpeechAfter = $coachSpeechAfter;

        return $this;
    }

    public function getDebriefing(): ?string
    {
        return $this->debriefing;
    }

    public function setDebriefing(?string $debriefing): self
    {
        $this->debriefing = $debriefing;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(?int $grade): self
    {
        $this->grade = $grade;

        return $this;
    }
}

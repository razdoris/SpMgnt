<?php

namespace App\Entity;

use App\Repository\ApplicationTrainingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationTrainingRepository::class)
 */
class ApplicationTraining
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
    private $trainingGoal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $subTrainingGoal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $presidentSpeechAfter;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $coachSpeechAfter;

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

    public function getTrainingGoal(): ?string
    {
        return $this->trainingGoal;
    }

    public function setTrainingGoal(?string $trainingGoal): self
    {
        $this->trainingGoal = $trainingGoal;

        return $this;
    }

    public function getSubTrainingGoal(): ?string
    {
        return $this->subTrainingGoal;
    }

    public function setSubTrainingGoal(?string $subTrainingGoal): self
    {
        $this->subTrainingGoal = $subTrainingGoal;

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
}

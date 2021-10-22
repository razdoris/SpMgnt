<?php

namespace App\Entity;

use App\Repository\ApplicationPlayerEventInformationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationPlayerEventInformationRepository::class)
 */
class ApplicationPlayerEventInformation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationEvent::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationPlayer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationPlayerDisponibility::class)
     */
    private $disponibility;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isNotify;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pleasureText;

    /**
     * @ORM\Column(type="integer")
     */
    private $SleepingTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sleepingQuality;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $borring;

    /**
     * @ORM\Column(type="integer")
     */
    private $noSportingLoad;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $injuryDeclaration;

    /**
     * @ORM\OneToMany(targetEntity=ApplicationPlayerInjury::class, mappedBy="applicationPlayerEventInformation")
     */
    private $injuryDeclarations;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $RPEIntensity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $matchFeeling;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $otherInformation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $handoff;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shot;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $defense;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $coachText;

    /**
     * @ORM\ManyToMany(targetEntity=ApplicationVideo::class)
     */
    private $video;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPresent;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isLate;

    public function __construct()
    {
        $this->injuryDeclarations = new ArrayCollection();
        $this->video = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?ApplicationEvent
    {
        return $this->event;
    }

    public function setEvent(?ApplicationEvent $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getPlayer(): ?ApplicationPlayer
    {
        return $this->player;
    }

    public function setPlayer(?ApplicationPlayer $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getDisponibility(): ?ApplicationPlayerDisponibility
    {
        return $this->disponibility;
    }

    public function setDisponibility(?ApplicationPlayerDisponibility $disponibility): self
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    public function getIsNotify(): ?bool
    {
        return $this->isNotify;
    }

    public function setIsNotify(bool $isNotify): self
    {
        $this->isNotify = $isNotify;

        return $this;
    }

    public function getPleasureText(): ?string
    {
        return $this->pleasureText;
    }

    public function setPleasureText(?string $pleasureText): self
    {
        $this->pleasureText = $pleasureText;

        return $this;
    }

    public function getSleepingTime(): ?int
    {
        return $this->SleepingTime;
    }

    public function setSleepingTime(int $SleepingTime): self
    {
        $this->SleepingTime = $SleepingTime;

        return $this;
    }

    public function getSleepingQuality(): ?string
    {
        return $this->sleepingQuality;
    }

    public function setSleepingQuality(?string $sleepingQuality): self
    {
        $this->sleepingQuality = $sleepingQuality;

        return $this;
    }

    public function getBorring(): ?int
    {
        return $this->borring;
    }

    public function setBorring(?int $borring): self
    {
        $this->borring = $borring;

        return $this;
    }

    public function getNoSportingLoad(): ?int
    {
        return $this->noSportingLoad;
    }

    public function setNoSportingLoad(int $noSportingLoad): self
    {
        $this->noSportingLoad = $noSportingLoad;

        return $this;
    }

    public function getInjuryDeclaration(): ?string
    {
        return $this->injuryDeclaration;
    }

    public function setInjuryDeclaration(?string $injuryDeclaration): self
    {
        $this->injuryDeclaration = $injuryDeclaration;

        return $this;
    }

    /**
     * @return Collection|ApplicationPlayerInjury[]
     */
    public function getInjuryDeclarations(): Collection
    {
        return $this->injuryDeclarations;
    }

    public function addInjuryDeclaration(ApplicationPlayerInjury $injuryDeclaration): self
    {
        if (!$this->injuryDeclarations->contains($injuryDeclaration)) {
            $this->injuryDeclarations[] = $injuryDeclaration;
            $injuryDeclaration->setApplicationPlayerEventInformation($this);
        }

        return $this;
    }

    public function removeInjuryDeclaration(ApplicationPlayerInjury $injuryDeclaration): self
    {
        if ($this->injuryDeclarations->removeElement($injuryDeclaration)) {
            // set the owning side to null (unless already changed)
            if ($injuryDeclaration->getApplicationPlayerEventInformation() === $this) {
                $injuryDeclaration->setApplicationPlayerEventInformation(null);
            }
        }

        return $this;
    }

    public function getRPEIntensity(): ?int
    {
        return $this->RPEIntensity;
    }

    public function setRPEIntensity(?int $RPEIntensity): self
    {
        $this->RPEIntensity = $RPEIntensity;

        return $this;
    }

    public function getMatchFeeling(): ?string
    {
        return $this->matchFeeling;
    }

    public function setMatchFeeling(?string $matchFeeling): self
    {
        $this->matchFeeling = $matchFeeling;

        return $this;
    }

    public function getOtherInformation(): ?string
    {
        return $this->otherInformation;
    }

    public function setOtherInformation(?string $otherInformation): self
    {
        $this->otherInformation = $otherInformation;

        return $this;
    }

    public function getHandoff(): ?int
    {
        return $this->handoff;
    }

    public function setHandoff(?int $handoff): self
    {
        $this->handoff = $handoff;

        return $this;
    }

    public function getShot(): ?int
    {
        return $this->shot;
    }

    public function setShot(?int $shot): self
    {
        $this->shot = $shot;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(?int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getCoachText(): ?string
    {
        return $this->coachText;
    }

    public function setCoachText(?string $coachText): self
    {
        $this->coachText = $coachText;

        return $this;
    }

    /**
     * @return Collection|ApplicationVideo[]
     */
    public function getVideo(): Collection
    {
        return $this->video;
    }

    public function addVideo(ApplicationVideo $video): self
    {
        if (!$this->video->contains($video)) {
            $this->video[] = $video;
        }

        return $this;
    }

    public function removeVideo(ApplicationVideo $video): self
    {
        $this->video->removeElement($video);

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getIsPresent(): ?bool
    {
        return $this->isPresent;
    }

    public function setIsPresent(?bool $isPresent): self
    {
        $this->isPresent = $isPresent;

        return $this;
    }

    public function getIsLate(): ?bool
    {
        return $this->isLate;
    }

    public function setIsLate(?bool $isLate): self
    {
        $this->isLate = $isLate;

        return $this;
    }
}

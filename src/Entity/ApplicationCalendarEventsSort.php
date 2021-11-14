<?php

namespace App\Entity;

use App\Repository\ApplicationCalendarEventsSortRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ApplicationCalendarEventsSortRepository::class)
 */
class ApplicationCalendarEventsSort
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *     pattern="^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$^",
     *     match=true,
     *     message="ceci n'est pas une couleur valide")
     */
    private $backgroundColor;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *     pattern="^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$^",
     *     match=true,
     *     message="ceci n'est pas une couleur valide")
     */
    private $borderColor;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(
     *     pattern="^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$^",
     *     match=true,
     *     message="ceci n'est pas une couleur valide")
     */
    private $TextColor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor): self
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getBorderColor(): ?string
    {
        return $this->borderColor;
    }

    public function setBorderColor(string $borderColor): self
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    public function getTextColor(): ?string
    {
        return $this->TextColor;
    }

    public function setTextColor(string $TextColor): self
    {
        $this->TextColor = $TextColor;

        return $this;
    }
}

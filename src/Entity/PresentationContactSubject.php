<?php

namespace App\Entity;

use App\Repository\PresentationContactSubjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationContactSubjectRepository::class)
 */
class PresentationContactSubject
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
    private $subjectText;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubjectText(): ?string
    {
        return $this->subjectText;
    }

    public function setSubjectText(string $subjectText): self
    {
        $this->subjectText = $subjectText;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ContactMessageRepository;
use Symfony\Component\Validator\Constraints as Assert;


class PresentationContactMessage
{


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $firstName;


    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastName;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/[0-9]{10}/"
     * )
     */
    private $phoneNumber;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $mailAddress;

    /**
     * @var string|null
     * @Assert\Length(min=2, max=100)
     */
    private $club;

    /**
     * @var string|null
     * @Assert\Length(min=2, max=100)
     */
    private $division;

    /**
     * @var string|null
     * @Assert\Length(min=10, max=500)
     */
    private $question;

    /**
     * @var PresentationContactSubject
     * @Assert\NotBlank()
     */
    private $subject;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMailAddress(): ?string
    {
        return $this->mailAddress;
    }

    public function setMailAddress(string $mailAddress): self
    {
        $this->mailAddress = $mailAddress;

        return $this;
    }

    public function getClub(): ?string
    {
        return $this->club;
    }

    public function setClub(?string $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getDivision(): ?string
    {
        return $this->division;
    }

    public function setDivision(?string $division): self
    {
        $this->division = $division;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getSubject(): ?PresentationContactSubject
    {
        return $this->subject;
    }

    public function setSubject(?PresentationContactSubject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
}

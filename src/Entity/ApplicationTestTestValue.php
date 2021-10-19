<?php

namespace App\Entity;

use App\Repository\ApplicationTestTestValueRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ApplicationTestTestValueRepository::class)
 */
class ApplicationTestTestValue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationTest::class, inversedBy="applicationTestTestValues")
     * @ORM\JoinColumn(nullable=false)
     */
    private $test;

    /**
     * @ORM\ManyToOne(targetEntity=ApplicationTestValue::class)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $testValue;


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

    public function getTest(): ?ApplicationTest
    {
        return $this->test;
    }

    public function setTest(?ApplicationTest $test): self
    {
        $this->test = $test;

        return $this;
    }

    public function gettestValue(): ?ApplicationTestValue
    {
        return $this->testValue;
    }

    public function settestValue(?ApplicationTestValue $testValue): self
    {
        $this->testValue = $testValue;

        return $this;
    }

}

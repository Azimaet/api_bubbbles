<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GazRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=GazRepository::class)
 */
class Gaz
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
     * @ORM\Column(type="integer")
     */
    private $startPressure;

    /**
     * @ORM\Column(type="integer")
     */
    private $endPressure;

    /**
     * @ORM\Column(type="integer")
     */
    private $oxygen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nitrogen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $helium;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hydrogen;

    /**
     * @ORM\ManyToOne(targetEntity=Dive::class, inversedBy="gazs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dive;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gazs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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

    public function getStartPressure(): ?int
    {
        return $this->startPressure;
    }

    public function setStartPressure(int $startPressure): self
    {
        $this->startPressure = $startPressure;

        return $this;
    }

    public function getEndPressure(): ?int
    {
        return $this->endPressure;
    }

    public function setEndPressure(int $endPressure): self
    {
        $this->endPressure = $endPressure;

        return $this;
    }

    public function getOxygen(): ?int
    {
        return $this->oxygen;
    }

    public function setOxygen(int $oxygen): self
    {
        $this->oxygen = $oxygen;

        return $this;
    }

    public function getNitrogen(): ?int
    {
        return $this->nitrogen;
    }

    public function setNitrogen(?int $nitrogen): self
    {
        $this->nitrogen = $nitrogen;

        return $this;
    }

    public function getHelium(): ?int
    {
        return $this->helium;
    }

    public function setHelium(?int $helium): self
    {
        $this->helium = $helium;

        return $this;
    }

    public function getHydrogen(): ?int
    {
        return $this->hydrogen;
    }

    public function setHydrogen(?int $hydrogen): self
    {
        $this->hydrogen = $hydrogen;

        return $this;
    }

    public function getDive(): ?Dive
    {
        return $this->dive;
    }

    public function setDive(?Dive $dive): self
    {
        $this->dive = $dive;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

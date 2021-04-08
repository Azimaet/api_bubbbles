<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
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
     * @ORM\ManyToMany(targetEntity=Dive::class, inversedBy="themes")
     */
    private $dive;

    public function __construct()
    {
        $this->dive = new ArrayCollection();
    }

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

    /**
     * @return Collection|Dive[]
     */
    public function getDive(): Collection
    {
        return $this->dive;
    }

    public function addDive(Dive $dive): self
    {
        if (!$this->dive->contains($dive)) {
            $this->dive[] = $dive;
        }

        return $this;
    }

    public function removeDive(Dive $dive): self
    {
        $this->dive->removeElement($dive);

        return $this;
    }
}

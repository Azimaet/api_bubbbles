<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DiveRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get"={
 *              "normalization_context"={"groups"={"dive:read", "dive:item:get"}},
 *          },
 *          "put"
 *     },
 *     shortName="Dive",
 *     normalizationContext={"groups"={"dive:read"}, "swagger_definition_name"="Read"},
 *     denormalizationContext={"groups"={"dive:write"}, "swagger_definition_name"="Write"},
 *     attributes={
 *          "pagination_items_per_page"=10,
 *          "formats"={"jsonld", "json", "html", "csv"={"text/csv"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass=DiveRepository::class)
 */
class Dive
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"dive:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"dive:read", "dive:write", "user:read"})
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"dive:read", "dive:write", "user:read"})
     */
    private $totalTime;

    /**
     * @ORM\Column(type="float")
     * @Groups({"dive:read", "dive:write", "user:read"})
     */
    private $maxDepth;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"dive:read"})
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"dive:read"})
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="dives")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"dive:read", "dive:write"})
     * @Assert\Valid()
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity=Gaz::class, mappedBy="dive", orphanRemoval=true, cascade={"persist"})
     * @Groups({"dive:read", "dive:write"})
     */
    private $gazs;

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
        $this->gazs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotalTime(): ?int
    {
        return $this->totalTime;
    }

    public function setTotalTime(int $totalTime): self
    {
        $this->totalTime = $totalTime;

        return $this;
    }

    public function getMaxDepth(): ?float
    {
        return $this->maxDepth;
    }

    public function setMaxDepth(float $maxDepth): self
    {
        $this->maxDepth = $maxDepth;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Gaz[]
     */
    public function getGazs(): Collection
    {
        return $this->gazs;
    }

    public function addGaz(Gaz $gaz): self
    {
        if (!$this->gazs->contains($gaz)) {
            $this->gazs[] = $gaz;
            $gaz->setDive($this);
            $gaz->setUser($this->getOwner());
        }

        return $this;
    }

    public function removeGaz(Gaz $gaz): self
    {
        if ($this->gazs->removeElement($gaz)) {
            // set the owning side to null (unless already changed)
            if ($gaz->getDive() === $this) {
                $gaz->setDive(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DiveRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"dive:read"}},
 *     denormalizationContext={"groups"={"dive:write"}},
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
     * @Groups({"dive:read", "dive:write"})
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"dive:read", "dive:write"})
     */
    private $totalTime;

    /**
     * @ORM\Column(type="float")
     * @Groups({"dive:read", "dive:write"})
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
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="dives")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addDive($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeDive($this);
        }

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
}

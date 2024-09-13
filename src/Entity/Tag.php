<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Geste::class, mappedBy: 'tags')]
    private Collection $geste;

    public function __construct(string $nom="")
    {
        $this->nom = $nom;
        $this->geste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Geste>
     */
    public function getGeste(): Collection
    {
        return $this->geste;
    }

    public function addGeste(Geste $geste): static
    {
        if (!$this->geste->contains($geste)) {
            $this->geste->add($geste);
            $geste->addTag($this);
        }

        return $this;
    }

    public function removeGeste(Geste $geste): static
    {
        if ($this->geste->removeElement($geste)) {
            $geste->removeTag($this);
        }

        return $this;
    }
}

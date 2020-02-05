<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProgrammeRepository")
 */
class Programme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureDemarrage;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureFin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Intervenant", inversedBy="programmes")
     */
    private $AnimerPar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Salle;

    /**
     * @ORM\Column(type="text")
     */
    private $Explicatif;

    public function __construct()
    {
        $this->AnimerPar = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getHeureDemarrage(): ?\DateTimeInterface
    {
        return $this->HeureDemarrage;
    }

    public function setHeureDemarrage(\DateTimeInterface $HeureDemarrage): self
    {
        $this->HeureDemarrage = $HeureDemarrage;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->HeureFin;
    }

    public function setHeureFin(\DateTimeInterface $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    /**
     * @return Collection|Intervenant[]
     */
    public function getAnimerPar(): Collection
    {
        return $this->AnimerPar;
    }

    public function addAnimerPar(Intervenant $animerPar): self
    {
        if (!$this->AnimerPar->contains($animerPar)) {
            $this->AnimerPar[] = $animerPar;
        }

        return $this;
    }

    public function removeAnimerPar(Intervenant $animerPar): self
    {
        if ($this->AnimerPar->contains($animerPar)) {
            $this->AnimerPar->removeElement($animerPar);
        }

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->Salle;
    }

    public function setSalle(string $Salle): self
    {
        $this->Salle = $Salle;

        return $this;
    }

    public function getExplicatif(): ?string
    {
        return $this->Explicatif;
    }

    public function setExplicatif(string $Explicatif): self
    {
        $this->Explicatif = $Explicatif;

        return $this;
    }
    public function __toString()
    {
        return $this->Titre;
    }
}

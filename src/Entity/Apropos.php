<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource()
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\AproposRepository")
 */
class Apropos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Ouverture;

    /**
     * @ORM\Column(type="date")
     */
    private $Fermeture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="text")
     */
    private $APropos;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $Postere;
    /**
     * @Vich\UploadableField(mapping="postere_images", fileNameProperty="Postere")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOuverture(): ?\DateTimeInterface
    {
        return $this->Ouverture;
    }

    public function setOuverture(\DateTimeInterface $Ouverture): self
    {
        $this->Ouverture = $Ouverture;

        return $this;
    }

    public function getFermeture(): ?\DateTimeInterface
    {
        return $this->Fermeture;
    }

    public function setFermeture(\DateTimeInterface $Fermeture): self
    {
        $this->Fermeture = $Fermeture;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getAPropos(): ?string
    {
        return $this->APropos;
    }

    public function setAPropos(string $APropos): self
    {
        $this->APropos = $APropos;

        return $this;
    }

    public function getPostere(): ?string
    {
        return $this->Postere;
    }

    public function setPostere(string $Postere): self
    {
        $this->Postere = $Postere;

        return $this;
    }
    public function setImageFile(File $Postere = null)
    {
        $this->imageFile = $Postere;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($Postere) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
}

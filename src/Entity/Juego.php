<?php

namespace App\Entity;

use App\Repository\JuegoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JuegoRepository::class)]
class Juego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(nullable: true)]
    private ?int $ancho = null;

    #[ORM\Column]
    private ?int $alto = null;

    #[ORM\Column(nullable: true)]
    private ?int $min_person = null;

    #[ORM\Column(nullable: true)]
    private ?int $max_person = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getAncho(): ?int
    {
        return $this->ancho;
    }

    public function setAncho(?int $ancho): self
    {
        $this->ancho = $ancho;

        return $this;
    }

    public function getAlto(): ?int
    {
        return $this->alto;
    }

    public function setAlto(int $alto): self
    {
        $this->alto = $alto;

        return $this;
    }

    public function getMinPerson(): ?int
    {
        return $this->min_person;
    }

    public function setMinPerson(?int $min_person): self
    {
        $this->min_person = $min_person;

        return $this;
    }

    public function getMaxPerson(): ?int
    {
        return $this->max_person;
    }

    public function setMaxPerson(int $max_person): self
    {
        $this->max_person = $max_person;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\StatusSdlRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusSdlRepository::class)]
class StatusSdl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $status_sdl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusSdl(): ?int
    {
        return $this->status_sdl;
    }

    public function setStatusSdl(int $status_sdl): self
    {
        $this->status_sdl = $status_sdl;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\SiteRcpRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteRcpRepository::class)]
class SiteRcp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $site_conf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteConf(): ?int
    {
        return $this->site_conf;
    }

    public function setSiteConf(int $site_conf): self
    {
        $this->site_conf = $site_conf;

        return $this;
    }
}

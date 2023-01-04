<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_cmd = null;

    #[ORM\ManyToMany(targetEntity: Fournisseurs::class, inversedBy: 'fournisseurs_orders')]
    private Collection $fournisseur;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_cmd = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_rcp = null;

    #[ORM\Column(length: 255)]
    private ?string $article = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(length: 255)]
    private ?string $qte_cmd_uom = null;

    #[ORM\Column(length: 255)]
    private ?string $unite_cmd = null;

    

    public function __construct()
    {
        $this->fournisseur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCmd(): ?string
    {
        return $this->numero_cmd;
    }

    public function setNumeroCmd(string $numero_cmd): self
    {
        $this->numero_cmd = $numero_cmd;

        return $this;
    }

    /**
     * @return Collection<int, Fournisseurs>
     */
    public function getFournisseur(): Collection
    {
        return $this->fournisseur;
    }

    public function addFournisseur(Fournisseurs $fournisseur): self
    {
        if (!$this->fournisseur->contains($fournisseur)) {
            $this->fournisseur->add($fournisseur);
        }

        return $this;
    }

    public function removeFournisseur(Fournisseurs $fournisseur): self
    {
        $this->fournisseur->removeElement($fournisseur);

        return $this;
    }

    public function getDateCmd(): ?\DateTimeInterface
    {
        return $this->date_cmd;
    }

    public function setDateCmd(\DateTimeInterface $date_cmd): self
    {
        $this->date_cmd = $date_cmd;

        return $this;
    }

    public function getDateRcp(): ?\DateTimeInterface
    {
        return $this->date_rcp;
    }

    public function setDateRcp(\DateTimeInterface $date_rcp): self
    {
        $this->date_rcp = $date_rcp;

        return $this;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }

    public function setArticle(string $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getQteCmdUom(): ?string
    {
        return $this->qte_cmd_uom;
    }

    public function setQteCmdUom(string $qte_cmd_uom): self
    {
        $this->qte_cmd_uom = $qte_cmd_uom;

        return $this;
    }

    public function getUniteCmd(): ?string
    {
        return $this->unite_cmd;
    }

    public function setUniteCmd(string $unite_cmd): self
    {
        $this->unite_cmd = $unite_cmd;

        return $this;
    }

   
    public function __toString()
    {
        return this->$sct_name;
    }
   
}

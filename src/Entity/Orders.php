<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_commande = null;

    #[ORM\ManyToMany(targetEntity: Fournisseurs::class, inversedBy: 'orders_obj')]
    private Collection $fournisseur_name;

    public function __construct()
    {
        $this->fournisseur_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?string
    {
        return $this->numero_commande;
    }

    public function setNumeroCommande(string $numero_commande): self
    {
        $this->numero_commande = $numero_commande;

        return $this;
    }

    /**
     * @return Collection<int, Fournisseurs>
     */
    public function getFournisseurName(): Collection
    {
        return $this->fournisseur_name;
    }

    public function addFournisseurName(Fournisseurs $fournisseurName): self
    {
        if (!$this->fournisseur_name->contains($fournisseurName)) {
            $this->fournisseur_name->add($fournisseurName);
        }

        return $this;
    }

    public function removeFournisseurName(Fournisseurs $fournisseurName): self
    {
        $this->fournisseur_name->removeElement($fournisseurName);

        return $this;
    }
}

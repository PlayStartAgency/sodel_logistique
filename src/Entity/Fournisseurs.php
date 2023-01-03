<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseursRepository::class)]
class Fournisseurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_sct = null;

    #[ORM\Column(length: 255)]
    private ?string $rcs = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 8)]
    private ?string $cp = null;

    #[ORM\Column(length: 8)]
    private ?string $tel = null;

    #[ORM\OneToMany(mappedBy: 'fournisseur_name', targetEntity: Orders::class)]
    private Collection $orders;

    #[ORM\ManyToMany(targetEntity: Orders::class, mappedBy: 'fournisseur_name')]
    private Collection $orders_obj;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->orders_obj = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSct(): ?string
    {
        return $this->name_sct;
    }

    public function setNameSct(string $name_sct): self
    {
        $this->name_sct = $name_sct;

        return $this;
    }

    public function getRcs(): ?string
    {
        return $this->rcs;
    }

    public function setRcs(string $rcs): self
    {
        $this->rcs = $rcs;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * @return Collection<int, Orders>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setFournisseurName($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getFournisseurName() === $this) {
                $order->setFournisseurName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Orders>
     */
    public function getOrdersObj(): Collection
    {
        return $this->orders_obj;
    }

    public function addOrdersObj(Orders $ordersObj): self
    {
        if (!$this->orders_obj->contains($ordersObj)) {
            $this->orders_obj->add($ordersObj);
            $ordersObj->addFournisseurName($this);
        }

        return $this;
    }

    public function removeOrdersObj(Orders $ordersObj): self
    {
        if ($this->orders_obj->removeElement($ordersObj)) {
            $ordersObj->removeFournisseurName($this);
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneVenteRepository")
 */
class LigneVente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Client")
     */
    private $id_client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Produite")
     */
    private $id_produit;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_achat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_achat;

    public function __construct()
    {
        $this->id_client = new ArrayCollection();
        $this->id_produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Client[]
     */
    public function getIdClient(): Collection
    {
        return $this->id_client;
    }

    public function addIdClient(Client $idClient): self
    {
        if (!$this->id_client->contains($idClient)) {
            $this->id_client[] = $idClient;
        }

        return $this;
    }

    public function removeIdClient(Client $idClient): self
    {
        if ($this->id_client->contains($idClient)) {
            $this->id_client->removeElement($idClient);
        }

        return $this;
    }

    /**
     * @return Collection|Produite[]
     */
    public function getIdProduit(): Collection
    {
        return $this->id_produit;
    }

    public function addIdProduit(Produite $idProduit): self
    {
        if (!$this->id_produit->contains($idProduit)) {
            $this->id_produit[] = $idProduit;
        }

        return $this;
    }

    public function removeIdProduit(Produite $idProduit): self
    {
        if ($this->id_produit->contains($idProduit)) {
            $this->id_produit->removeElement($idProduit);
        }

        return $this;
    }

    public function getQuantiteAchat(): ?int
    {
        return $this->quantite_achat;
    }

    public function setQuantiteAchat(int $quantite_achat): self
    {
        $this->quantite_achat = $quantite_achat;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }
 
}

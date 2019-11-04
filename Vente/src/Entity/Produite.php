<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduiteRepository")
 */
class Produite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min=1)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull()
     */
    private $pu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPu(): ?int
    {
        return $this->pu;
    }

    public function setPu(int $pu): self
    {
        $this->pu = $pu;

        return $this;
    }
    /**
     * Generates the magic method
     * 
    */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->libelle;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

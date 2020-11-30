<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="float")
     */
    private $prixa;

    /**
     * @ORM\Column(type="float")
     */
    private $prixv;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockinit;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockalert;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_famille;

    /**
     * @ORM\ManyToMany(targetEntity=Commande::class, mappedBy="id_produit")
     */
    private $commande;

    /**
     * @ORM\OneToMany(targetEntity=LigneCommande::class, mappedBy="id_produit", orphanRemoval=true)
     */
    private $ligneCommandes;

    public function __construct()
    {
        $this->commande = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrixa(): ?float
    {
        return $this->prixa;
    }

    public function setPrixa(float $prixa): self
    {
        $this->prixa = $prixa;

        return $this;
    }

    public function getPrixv(): ?float
    {
        return $this->prixv;
    }

    public function setPrixv(float $prixv): self
    {
        $this->prixv = $prixv;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStockinit(): ?int
    {
        return $this->stockinit;
    }

    public function setStockinit(int $stockinit): self
    {
        $this->stockinit = $stockinit;

        return $this;
    }

    public function getStockalert(): ?int
    {
        return $this->stockalert;
    }

    public function setStockalert(int $stockalert): self
    {
        $this->stockalert = $stockalert;

        return $this;
    }

    public function getIdFamille(): ?Famille
    {
        return $this->id_famille;
    }

    public function setIdFamille(?Famille $id_famille): self
    {
        $this->id_famille = $id_famille;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getQuantite(): Collection
    {
        return $this->quantite;
    }

    public function addQuantite(Commande $quantite): self
    {
        if (!$this->quantite->contains($quantite)) {
            $this->quantite[] = $quantite;
            $quantite->addIdProduit($this);
        }

        return $this;
    }

    public function removeQuantite(Commande $quantite): self
    {
        if ($this->quantite->removeElement($quantite)) {
            $quantite->removeIdProduit($this);
        }

        return $this;
    }

    /**
     * @return Collection|LigneCommande[]
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): self
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes[] = $ligneCommande;
            $ligneCommande->setIdProduit($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getIdProduit() === $this) {
                $ligneCommande->setIdProduit(null);
            }
        }

        return $this;
    }
}

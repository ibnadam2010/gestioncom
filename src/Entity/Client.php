<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $designation;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomResponsable;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $responableFinance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adresseLivr;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adresseFact;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="float")
     */
    private $soldeInit;

    /**
     * @ORM\Column(type="float")
     */
    private $solde;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNomResponsable(): ?string
    {
        return $this->nomResponsable;
    }

    public function setNomResponsable(string $nomResponsable): self
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    public function getResponableFinance(): ?string
    {
        return $this->responableFinance;
    }

    public function setResponableFinance(string $responableFinance): self
    {
        $this->responableFinance = $responableFinance;

        return $this;
    }

    public function getAdresseLivr(): ?string
    {
        return $this->adresseLivr;
    }

    public function setAdresseLivr(string $adresseLivr): self
    {
        $this->adresseLivr = $adresseLivr;

        return $this;
    }

    public function getAdresseFact(): ?string
    {
        return $this->adresseFact;
    }

    public function setAdresseFact(string $adresseFact): self
    {
        $this->adresseFact = $adresseFact;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getSoldeInit(): ?float
    {
        return $this->soldeInit;
    }

    public function setSoldeInit(float $soldeInit): self
    {
        $this->soldeInit = $soldeInit;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }


}

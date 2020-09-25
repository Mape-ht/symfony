<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clerib;

    /**
     * @ORM\Column(type="decimal", precision=50, scale=2)
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeFrais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeCompte;

    /**
     * @ORM\Column(type="date")
     */
    private $dateOuverture;

    /**
     * @ORM\ManyToOne(targetEntity=ClientMoral::class, inversedBy="comptes")
     */
    private $clientMoral;

    /**
     * @ORM\ManyToOne(targetEntity=ClientPhysique::class, inversedBy="comptes")
     */
    private $clientPhysique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getClerib(): ?string
    {
        return $this->clerib;
    }

    public function setClerib(string $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getTypeFrais(): ?string
    {
        return $this->typeFrais;
    }

    public function setTypeFrais(string $typeFrais): self
    {
        $this->typeFrais = $typeFrais;

        return $this;
    }

    public function getTypeCompte(): ?string
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(string $typeCompte): self
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getClientMoral(): ?ClientMoral
    {
        return $this->clientMoral;
    }

    public function setClientMoral(?ClientMoral $clientMoral): self
    {
        $this->clientMoral = $clientMoral;

        return $this;
    }

    public function getClientPhysique(): ?ClientPhysique
    {
        return $this->clientPhysique;
    }

    public function setClientPhysique(?ClientPhysique $clientPhysique): self
    {
        $this->clientPhysique = $clientPhysique;

        return $this;
    }
}

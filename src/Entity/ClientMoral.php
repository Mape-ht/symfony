<?php

namespace App\Entity;

use App\Repository\ClientMoralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientMoralRepository::class)
 */
class ClientMoral
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
    private $raisonsocial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=ClientPhysique::class, mappedBy="clientmoral")
     */
    private $clientPhysiques;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="clientMoral")
     */
    private $comptes;

    public function __construct()
    {
        $this->clientPhysiques = new ArrayCollection();
        $this->comptes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonsocial(): ?string
    {
        return $this->raisonsocial;
    }

    public function setRaisonsocial(string $raisonsocial): self
    {
        $this->raisonsocial = $raisonsocial;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|ClientPhysique[]
     */
    public function getClientPhysiques(): Collection
    {
        return $this->clientPhysiques;
    }

    public function addClientPhysique(ClientPhysique $clientPhysique): self
    {
        if (!$this->clientPhysiques->contains($clientPhysique)) {
            $this->clientPhysiques[] = $clientPhysique;
            $clientPhysique->setClientmoral($this);
        }

        return $this;
    }

    public function removeClientPhysique(ClientPhysique $clientPhysique): self
    {
        if ($this->clientPhysiques->contains($clientPhysique)) {
            $this->clientPhysiques->removeElement($clientPhysique);
            // set the owning side to null (unless already changed)
            if ($clientPhysique->getClientmoral() === $this) {
                $clientPhysique->setClientmoral(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setClientMoral($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getClientMoral() === $this) {
                $compte->setClientMoral(null);
            }
        }

        return $this;
    }
}

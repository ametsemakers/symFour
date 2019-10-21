<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_util", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtil;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_util", type="string", length=50, nullable=false)
     */
    private $prenomUtil;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_util", type="string", length=50, nullable=false)
     */
    private $nomUtil;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=100, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="droits", type="string", length=10, nullable=false)
     */
    private $droits;

    public function getIdUtil(): ?int
    {
        return $this->idUtil;
    }

    public function getPrenomUtil(): ?string
    {
        return $this->prenomUtil;
    }

    public function setPrenomUtil(string $prenomUtil): self
    {
        $this->prenomUtil = $prenomUtil;

        return $this;
    }

    public function getNomUtil(): ?string
    {
        return $this->nomUtil;
    }

    public function setNomUtil(string $nomUtil): self
    {
        $this->nomUtil = $nomUtil;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getDroits(): ?string
    {
        return $this->droits;
    }

    public function setDroits(string $droits): self
    {
        $this->droits = $droits;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->idUtil;
    }


}

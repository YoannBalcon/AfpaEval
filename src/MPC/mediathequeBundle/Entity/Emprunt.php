<?php

namespace MPC\mediathequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt", indexes={@ORM\Index(name="ouvrage_id", columns={"ouvrage_id"}), @ORM\Index(name="utilisateur_id", columns={"utilisateur_id"})})
 * @ORM\Entity
 */
class Emprunt
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_retour", type="date", nullable=false)
     */
    private $dateRetour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_emprunt", type="date", nullable=false)
     */
    private $dateEmprunt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \MPC\mediathequeBundle\Entity\Ouvrage
     *
     * @ORM\ManyToOne(targetEntity="MPC\mediathequeBundle\Entity\Ouvrage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ouvrage_id", referencedColumnName="id")
     * })
     */
    private $ouvrage;

    /**
     * @var \MPC\mediathequeBundle\Entity\Utilisateurs
     *
     * @ORM\ManyToOne(targetEntity="MPC\mediathequeBundle\Entity\Utilisateurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * })
     */
    private $utilisateur;



    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Emprunt
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set dateEmprunt
     *
     * @param \DateTime $dateEmprunt
     *
     * @return Emprunt
     */
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    /**
     * Get dateEmprunt
     *
     * @return \DateTime
     */
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ouvrage
     *
     * @param \MPC\mediathequeBundle\Entity\Ouvrage $ouvrage
     *
     * @return Emprunt
     */
    public function setOuvrage(\MPC\mediathequeBundle\Entity\Ouvrage $ouvrage = null)
    {
        $this->ouvrage = $ouvrage;

        return $this;
    }

    /**
     * Get ouvrage
     *
     * @return \MPC\mediathequeBundle\Entity\Ouvrage
     */
    public function getOuvrage()
    {
        return $this->ouvrage;
    }

    /**
     * Set utilisateur
     *
     * @param \MPC\mediathequeBundle\Entity\Utilisateurs $utilisateur
     *
     * @return Emprunt
     */
    public function setUtilisateur(\MPC\mediathequeBundle\Entity\Utilisateurs $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \MPC\mediathequeBundle\Entity\Utilisateurs
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}

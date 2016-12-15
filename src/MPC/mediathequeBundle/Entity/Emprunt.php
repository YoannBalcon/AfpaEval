<?php

namespace MPC\mediathequeBundle\Entity;

/**
 * Emprunt
 */
class Emprunt
{
    /**
     * @var \DateTime
     */
    private $dateRetour;

    /**
     * @var \DateTime
     */
    private $dateEmprunt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MPC\mediathequeBundle\Entity\Ouvrage
     */
    private $ouvrage;


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
}


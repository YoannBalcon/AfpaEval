<?php

namespace MPC\mediathequeBundle\Entity;

/**
 * Livre
 */
class Livre
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MPC\mediathequeBundle\Entity\Ouvrage
     */
    private $ouvrage;


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
     * @return Livre
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


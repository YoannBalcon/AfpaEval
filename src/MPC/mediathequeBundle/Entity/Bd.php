<?php

namespace MPC\mediathequeBundle\Entity;

/**
 * Bd
 */
class Bd
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
     * @return Bd
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


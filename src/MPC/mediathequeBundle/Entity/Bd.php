<?php

namespace MPC\mediathequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bd
 *
 * @ORM\Table(name="bd", indexes={@ORM\Index(name="ouvrage_id", columns={"ouvrage_id"})})
 * @ORM\Entity
 */
class Bd
{
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

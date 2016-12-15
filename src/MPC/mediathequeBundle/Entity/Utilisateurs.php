<?php

namespace MPC\mediathequeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurs
 */
class Utilisateurs extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        /**
         * @var string
         */
    }

    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var \MPC\mediathequeBundle\Entity\Reservation
     */
    private $reservation;

    /**
     * @var \MPC\mediathequeBundle\Entity\Emprunt
     */
    private $emprunt;

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateurs
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateurs
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set reservation
     *
     * @param \MPC\mediathequeBundle\Entity\Reservation $reservation
     *
     * @return Utilisateurs
     */
    public function setReservation(\MPC\mediathequeBundle\Entity\Reservation $reservation = null) {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \MPC\mediathequeBundle\Entity\Reservation
     */
    public function getReservation() {
        return $this->reservation;
    }

    /**
     * Set emprunt
     *
     * @param \MPC\mediathequeBundle\Entity\Emprunt $emprunt
     *
     * @return Utilisateurs
     */
    public function setEmprunt(\MPC\mediathequeBundle\Entity\Emprunt $emprunt = null) {
        $this->emprunt = $emprunt;

        return $this;
    }

    /**
     * Get emprunt
     *
     * @return \MPC\mediathequeBundle\Entity\Emprunt
     */
    public function getEmprunt() {
        return $this->emprunt;
    }

}

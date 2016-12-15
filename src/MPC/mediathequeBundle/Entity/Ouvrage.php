<?php

namespace MPC\mediathequeBundle\Entity;

/**
 * Ouvrage
 */
class Ouvrage
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var integer
     */
    private $annee;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MPC\mediathequeBundle\Entity\Auteurs
     */
    private $auteur;

    /**
     * @var \MPC\mediathequeBundle\Entity\Genre
     */
    private $genre;


    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Ouvrage
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return Ouvrage
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Ouvrage
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
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
     * Set auteur
     *
     * @param \MPC\mediathequeBundle\Entity\Auteurs $auteur
     *
     * @return Ouvrage
     */
    public function setAuteur(\MPC\mediathequeBundle\Entity\Auteurs $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \MPC\mediathequeBundle\Entity\Auteurs
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set genre
     *
     * @param \MPC\mediathequeBundle\Entity\Genre $genre
     *
     * @return Ouvrage
     */
    public function setGenre(\MPC\mediathequeBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \MPC\mediathequeBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }
}


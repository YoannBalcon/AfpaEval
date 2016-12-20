<?php

namespace MPC\mediathequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ouvrage
 *
 * @ORM\Table(name="ouvrage", indexes={@ORM\Index(name="auteur_id", columns={"auteur_id"}), @ORM\Index(name="genre_id", columns={"genre_id"})})
 * @ORM\Entity
 */
class Ouvrage
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=250, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \MPC\mediathequeBundle\Entity\Genre
     *
     * @ORM\ManyToOne(targetEntity="MPC\mediathequeBundle\Entity\Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
     * })
     */
    private $genre;

    /**
     * @var \MPC\mediathequeBundle\Entity\Auteurs
     *
     * @ORM\ManyToOne(targetEntity="MPC\mediathequeBundle\Entity\Auteurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     * })
     */
    private $auteur;



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
     * Set photo
     *
     * @param string $photo
     *
     * @return Ouvrage
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
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
}

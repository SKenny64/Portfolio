<?php

namespace App\Entity;

require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="page") 
 */
class Page {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id_page;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_contenu;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="id_categorie", referencedColumnName="id_categorie")
     */
    private $categorie;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date = "";

    // Getters and setters

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of dateContenu
     */ 
    public function getDateContenu()
    {
        return $this->date_contenu;
    }

    /**
     * Set the value of dateContenu
     *
     * @return  self
     */ 
    public function setDateContenu($dateContenu)
    {
        $this->date_contenu = $dateContenu;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id_page;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id_page = $id;

        return $this;
    }
    /**
     * Get the value of dateContenu
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of dateContenu
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}


?>
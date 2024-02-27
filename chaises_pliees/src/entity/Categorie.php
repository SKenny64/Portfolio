<?php
namespace App\Entity;

require_once __DIR__ . '/../../vendor/autoload.php';

// Entité Categorie.php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 * @ORM\Table(name="categorie")
 */
class Categorie {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id_categorie;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libellé;

    // Getters and setters

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id_categorie = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libellé;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libellé = $libelle;

        return $this;
    }
}


?>
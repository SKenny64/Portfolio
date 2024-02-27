<?php

namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once "bootstrap.php";
require_once "BaseController.php";

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class UtilisateurController extends BaseController {


    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer l'utilisateur à partir de son identifiant
            $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
    
            if (!$utilisateur) {
                // Gérer l'erreur si l'utilisateur n'est pas trouvé
                // Par exemple, rediriger l'utilisateur vers une page d'erreur
                header('Location: /error-page');
                exit();
            }
    
            // Récupérer les données soumises depuis le formulaire
            $nom = $_POST['nom'];
            $motDePasse = $_POST['motDePasse'];
    
            // Mettre à jour les données de l'utilisateur
            $utilisateur->setNom($nom);
            $utilisateur->setMotDePasse($motDePasse);
    
            // Enregistrer les modifications dans la base de données
            $this->entityManager->flush();
    
            // Rediriger l'utilisateur vers une autre page après la mise à jour de l'utilisateur
            header('Location: /home');
            exit();
        }
    
        // Récupérer l'utilisateur à partir de son identifiant pour pré-remplir le formulaire
        $utilisateur = $this->entityManager->getRepository(Utilisateur::class)->find($id);
    
        // Afficher le formulaire de mise à jour d'utilisateur dans une vue Twig avec les données pré-remplies
        return $this->twig->render('Utilisateur/update.html.twig', ['utilisateur' => $utilisateur]);
    }
    




}
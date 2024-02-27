<?php

namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once "bootstrap.php";
require_once "BaseController.php";

use App\Entity\Page;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class PageController extends BaseController {

    
        public function create()
        {
            
            $categorie = $this->entityManager->getRepository(Categorie::class)->findAll();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['mytextarea'])) {
                    $mytextarea = $_POST['mytextarea'];
                }
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $categorieId = intval($_POST['categorieId']);
    
                // Récupérer la catégorie associée
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
    
                // Créer une nouvelle page
                $page = new Page();
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($mytextarea);
                $page->setCategorie($categorie);
    
                // Enregistrer la page dans la base de données
                $this->entityManager->persist($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la création de la page
                header('Location: /backOffice'); 
                exit();
            }
    
            // Afficher le formulaire de création de page dans une vue Twig
            return $this->twig->render('base/create.html.twig',['categories'=>$categorie]);
        }
    
        public function update($id)
        {
            $id = intval($id);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer la page à partir de son identifiant
                $page = $this->entityManager->getRepository(Page::class)->findOneBy(['id_page' => $id]);
    
                if (!$page) {
                    // Gérer l'erreur si la page n'est pas trouvée
                    // Par exemple, rediriger l'utilisateur vers une page d'erreur
                    header('Location: /error-page');
                    exit();
                }
    
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $contenu = $_POST['mytextarea'];

                // Mettre à jour les données de la page
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($contenu);
                
    
                // Enregistrer les modifications dans la base de données
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la mise à jour de la page
                header('Location: ../backOffice');
                exit();
            }
    
            // Récupérer la page à partir de son identifiant pour pré-remplir le formulaire
            $page = $this->entityManager->getRepository(Page::class)->findBy(["id_page"=>$id]);
    
            // Afficher le formulaire de mise à jour de page dans une vue Twig avec les données pré-remplies
            return $this->twig->render('base/update.html.twig', ['pages' => $page]);
        }
    
        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer la page à partir de son identifiant
                $page = $this->entityManager->getRepository(Page::class)->find($id);
    
                if (!$page) {
                    // Gérer l'erreur si la page n'est pas trouvée
                    // Par exemple, rediriger l'utilisateur vers une page d'erreur
                    header('Location: /error-page');
                    exit();
                }
    
                // Supprimer la page de la base de données
                $this->entityManager->remove($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la suppression de la page
                header('Location: backOffice');
                exit();
            }
    
            // Récupérer la page à partir de son identifiant pour afficher les détails dans la vue de confirmation de suppression
            $page = $this->entityManager->getRepository(Page::class)->find($id);
    
            // Afficher le formulaire de confirmation de suppression de page dans une vue Twig
            return $this->twig->render('Page/delete.html.twig', ['page' => $page]);
        }
        public function show($id)
        {
            // Récupérer la page à partir de son identifiant
            $page = $this->entityManager->getRepository(Page::class)->findOneBy(["id_page"=>$id]);
            
            

            if (!$page) {
                // Gérer l'erreur si la page n'est pas trouvée
                // Par exemple, rediriger l'utilisateur vers une page d'erreur
                header('Location: /error-page');
                exit();
            }

            // Afficher la page dans une vue Twig
            return $this->twig->render('base/show.html.twig', ['page' => $page]);
        }

        public function createRejoindre()
        {
            $id = 5;
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['mytextarea'])) {
                    $mytextarea = $_POST['mytextarea'];
                }
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $categorieId = intval($_POST['categorieId']);
    
                // Récupérer la catégorie associée
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
    
                // Créer une nouvelle page
                $page = new Page();
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($mytextarea);
                $page->setCategorie($categorie);
    
                // Enregistrer la page dans la base de données
                $this->entityManager->persist($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la création de la page
                header('Location: backOffice'); 
                exit();
            }
            return $this->twig->render('base/rejoindre/create.html.twig',['categories'=>$categorie]);
        }
        
        public function createSpectacle()
        {
            $id = 1;
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['mytextarea'])) {
                    $mytextarea = $_POST['mytextarea'];
                }
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $categorieId = intval($_POST['categorieId']);
                $dateSpectacle = new \DateTime($_POST['dateSpectacle']);
    
                // Récupérer la catégorie associée
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
    
                // Créer une nouvelle page
                $page = new Page();
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($mytextarea);
                $page->setCategorie($categorie);

                if (!empty($dateSpectacle)) {
                    $page->setDate($dateSpectacle);
                }
    
                // Enregistrer la page dans la base de données
                $this->entityManager->persist($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la création de la page
                header('Location: backOffice'); 
                exit();
            }
            return $this->twig->render('base/spectacle/create.html.twig',['categories'=>$categorie]);
        }
        public function createApropos()
        {
            $id = 3;
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['mytextarea'])) {
                    $mytextarea = $_POST['mytextarea'];
                }
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $categorieId = intval($_POST['categorieId']);
    
                // Récupérer la catégorie associée
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
    
                // Créer une nouvelle page
                $page = new Page();
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($mytextarea);
                $page->setCategorie($categorie);
    
                // Enregistrer la page dans la base de données
                $this->entityManager->persist($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la création de la page
                header('Location: backOffice'); 
                exit();
            }
            return $this->twig->render('base/apropos/create.html.twig',['categories'=>$categorie]);
        }
        public function createActu()
        {
            $id = 2;
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['mytextarea'])) {
                    $mytextarea = $_POST['mytextarea'];
                }
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $categorieId = intval($_POST['categorieId']);
    
                // Récupérer la catégorie associée
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
    
                // Créer une nouvelle page
                $page = new Page();
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($mytextarea);
                $page->setCategorie($categorie);
    
                // Enregistrer la page dans la base de données
                $this->entityManager->persist($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la création de la page
                header('Location: backOffice'); 
                exit();
            }
            return $this->twig->render('base/actu/create.html.twig',['categories'=>$categorie]);
        }
        public function createAccueil()
        {
            $id = 4;
            $categorie = $this->entityManager->getRepository(Categorie::class)->find($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['mytextarea'])) {
                    $mytextarea = $_POST['mytextarea'];
                }
                // Récupérer les données soumises depuis le formulaire
                $titre = $_POST['titre'];
                $dateContenu = new \DateTime($_POST['dateContenu']);
                $categorieId = intval($_POST['categorieId']);
    
                // Récupérer la catégorie associée
                $categorie = $this->entityManager->getRepository(Categorie::class)->find($categorieId);
    
                // Créer une nouvelle page
                $page = new Page();
                $page->setTitre($titre);
                $page->setDateContenu($dateContenu);
                $page->setContenu($mytextarea);
                $page->setCategorie($categorie);
    
                // Enregistrer la page dans la base de données
                $this->entityManager->persist($page);
                $this->entityManager->flush();
    
                // Rediriger l'utilisateur vers une autre page après la création de la page
                header('Location: /backOffice'); 
                exit();
            }
            return $this->twig->render('base/accueil/create.html.twig',['categories'=>$categorie]);
        }

        public function readAccueil()
        {
            $id=4;
            $page = $this->entityManager->getRepository(Page::class)->findBy(["categorie"=>$id]);
            return $this->twig->render('base/accueil/index.html.twig', ['pages' => $page]);
        }
        public function readApropos()
        {
            $id=3;
            $page = $this->entityManager->getRepository(Page::class)->findBy(["categorie"=>$id]);
            return $this->twig->render('base/apropos/index.html.twig', ['pages' => $page]);
        }
        public function readRejoindre()
        {
            $id=5;
            $page = $this->entityManager->getRepository(Page::class)->findBy(["categorie"=>$id]);
            return $this->twig->render('base/rejoindre/index.html.twig', ['pages' => $page]);
        }
        public function readSpectacle()
        {
            $id=1;
            $page = $this->entityManager->getRepository(Page::class)->findBy(["categorie"=>$id]);
            return $this->twig->render('base/spectacle/index.html.twig', ['pages' => $page]);
        }
        public function readActu()
        {
            $id=2;
            $page = $this->entityManager->getRepository(Page::class)->findBy(["categorie"=>$id]);
            return $this->twig->render('base/actu/index.html.twig', ['pages' => $page]);
        }
        


}




?>

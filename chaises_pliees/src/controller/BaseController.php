<?php

namespace App\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once "bootstrap.php";

use App\Entity\Utilisateur;
use App\Entity\Page;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;

class BaseController
{
    protected $entityManager;
    protected $twig;

    public function __construct(EntityManagerInterface $entityManager, Environment $twig)
    {
        $this->entityManager = $entityManager;
        $this->twig = $twig;
    }

    public function index()
    {
        $id = 4;
        $id2 = 2;
        $caroussel = $this->entityManager->getRepository(Page::class)->findBy(['categorie' => $id]);
        $actu = $this->entityManager->getRepository(Page::class)->findBy(['categorie' => $id2]);
        return ($this->twig->render('home.html.twig', ['caroussels' => $caroussel, "actus" => $actu]));
    }
    
    public function contact(){
        return ($this->twig->render('contact.html.twig'));
        
    }
    
    public function precommande($date){
        return $this->twig->render('contact.html.twig', ["date" => $date]);
    }
    public function priseDeCo(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $sujet = $_POST['sujet'];
            $date = isset($_POST['date']) ? $_POST['date'] : '';
            $nbPlace = $_POST['nbPlace'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];
            $message = $_POST['description1'];
            if ($sujet === "precommande") {
                $destinataire = "contact@chaisespliees.fr";
                // Sujet du mail pour le gestionnaire du site
                $sujetGestionnaire = "Nouveau message Pour Precommande";
                // Construction du message pour le gestionnaire du site
                $messageGestionnaire = "Vous avez reçu un nouveau message du formulaire de contact :\n\n";
                $messageGestionnaire .= "Sujet : $sujet\n";
                $messageGestionnaire .= "Date de représentation : $date\n";
                $messageGestionnaire .= "Nombre de place : $nbPlace\n";
                $messageGestionnaire .= "Nom : $nom\n";
                $messageGestionnaire .= "Prénom : $prenom\n";
                $messageGestionnaire .= "Email : $email\n";
                $messageGestionnaire .= "Téléphone : $telephone\n";
                $messageGestionnaire .= "Message : $message\n";
                // En-têtes additionnels pour le gestionnaire du site
                $headersGestionnaire = "From: $email" . "\r\n";
                // Envoyer l'e-mail au gestionnaire du site
                $envoiGestionnaire = mail($destinataire, $sujetGestionnaire, $messageGestionnaire, $headersGestionnaire);
                // Sujet du mail pour l'expéditeur
                $sujetExpediteur = "Confirmation de réception de votre message";
                // Construction du message pour l'expéditeur
                $messageExpediteur = "Nous avons bien reçu votre demande de précommande et nous vous en remercions. Nous vous répondrons dans les plus brefs délais.";
                // En-têtes additionnels pour l'expéditeur
                $headersExpediteur = "From: $destinataire" . "\r\n";
                // Envoyer l'e-mail à l'expéditeur
                $envoiExpediteur = mail($email, $sujetExpediteur, $messageExpediteur, $headersExpediteur);
                if ($envoiGestionnaire) {
                    echo "L'e-mail au gestionnaire a été envoyé avec succès.";
                } else {
                    echo "Une erreur s'est produite lors de l'envoi de l'e-mail au gestionnaire1.";
                }
                if ($envoiExpediteur) {
                    echo "L'e-mail à l'expéditeur a été envoyé avec succès.";
                } else {
                    echo "Une erreur s'est produite lors de l'envoi de l'e-mail à l'expéditeur.";
                }
            } else {
                // Adresse e-mail du gestionnaire du site
                $destinataire = "bastien.nicot@gmx.fr";
                // Sujet du mail pour le gestionnaire du site
                $sujetGestionnaire = "Nouveau message du formulaire de contact";
                // Construction du message pour le gestionnaire du site
                $messageGestionnaire = "Vous avez reçu un nouveau message du formulaire de contact :\n\n";
                $messageGestionnaire .= "Sujet : $sujet\n";
                $messageGestionnaire .= "Nom : $nom\n";
                $messageGestionnaire .= "Prénom : $prenom\n";
                $messageGestionnaire .= "Email : $email\n";
                $messageGestionnaire .= "Téléphone : $telephone\n";
                $messageGestionnaire .= "Message : $message\n";
                // En-têtes additionnels pour le gestionnaire du site
                $headersGestionnaire = "From: $email" . "\r\n";
                // Envoyer l'e-mail au gestionnaire du site
                $envoiGestionnaire = mail($destinataire, $sujetGestionnaire, $messageGestionnaire, $headersGestionnaire);
                // Sujet du mail pour l'expéditeur
                $sujetExpediteur = "Confirmation de réception de votre message";
                // Construction du message pour l'expéditeur
                $messageExpediteur = "Nous avons bien reçu votre message et nous vous en remercions. Nous vous répondrons dans les plus brefs délais.";
                // En-têtes additionnels pour l'expéditeur
                $headersExpediteur = "From: $destinataire" . "\r\n";
                // Envoyer l'e-mail à l'expéditeur
                $envoiExpediteur = mail($email, $sujetExpediteur, $messageExpediteur, $headersExpediteur);
                if ($envoiGestionnaire) {
                    echo "L'e-mail au gestionnaire a été envoyé avec succès.";
                } else {
                    echo "Une erreur s'est produite lors de l'envoi de l'e-mail au gestionnaire2.";
                }
                if ($envoiExpediteur) {
                    echo "L'e-mail à l'expéditeur a été envoyé avec succès.";
                } else {
                    echo "Une erreur s'est produite lors de l'envoi de l'e-mail à l'expéditeur.";
                }
            }
        }
    }
    
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
            }
            if (isset($_POST['mdp'])) {
                $motDePasse = $_POST['mdp'];
            }
            var_dump($motDePasse);
    
            // Récupérer l'utilisateur depuis la base de données
            $userRepository = $this->entityManager->getRepository(Utilisateur::class);
            $user = $userRepository->findOneBy(["nom" => $login]);
    
            if ($user && password_verify($motDePasse, $user->getMotDePasse())) { 
                // L'utilisateur est trouvé et le mot de passe correspond
    
                // Rediriger l'utilisateur vers une autre page par exemple
                header('Location: home');
                exit();
            } else {
                // L'utilisateur n'est pas trouvé ou le mot de passe ne correspond pas
                // Gérer l'erreur, par exemple afficher un message d'erreur à l'utilisateur
                $messageErreur = "Identifiants incorrects";
            }
        }

        return ($this->twig->render('connexion.html.twig'));
    }
    public function admin() {
        return ($this->twig->render('base/index.html.twig'));
    }
    public function apropos(){
        $id=3;
        $text = $this->entityManager->getRepository(Page::class)->findBy(['categorie' => $id]);
        
        return ($this->twig->render('apropos.html.twig',['textes' => $text]));
    }
    public function nousRejoindre()
    {
        $id=5;
        $text = $this->entityManager->getRepository(Page::class)->findBy(['categorie' => $id]);
        return ($this->twig->render('rejoindre.html.twig',['textes' => $text]));
    }
    public function representation() {
        $id=1;
        $text = $this->entityManager->getRepository(Page::class)->findBy(['categorie' => $id]);
        return ($this->twig->render('spectacle.html.twig',['textes' => $text]));
    }
    public function edit($id)
    {
        // Méthode pour afficher le formulaire d'édition d'un élément
    }
    public function create()
    {
        // Méthode pour creer des données
    }
    public function update($id)
    {
        // Méthode pour mettre à jour les données soumises depuis le formulaire d'édition
    }

    public function delete($id)
    {
        // Méthode pour supprimer un élément 
    }
    public function show($id)
    {
        // Méthode pour afficher les détails d'un élément spécifique
    }
    
}

function get_h1_h2_h3_h4_contents($content) {
    $h1_contents = [];
    $h2_contents = [];
    $h3_contents = [];
    $h4_contents = [];
    
    // Utiliser une expression régulière pour récupérer les contenus des balises <h1>, <h2> et <h4>
    preg_match_all('/<h1[^>]*>(.*?)<\/h1>/s', $content, $h1_matches);
    preg_match_all('/<h2[^>]*>(.*?)<\/h2>/s', $content, $h2_matches);
    preg_match_all('/<h3[^>]*>(.*?)<\/h3>/s', $content, $h3_matches);
    preg_match_all('/<h4[^>]*>(.*?)<\/h4>/s', $content, $h4_matches);

    if (!empty($h1_matches[1])) {
        $h1_contents = $h1_matches[1];
        $content = preg_replace('/<h1[^>]*>(.*?)<\/h1>/s', '', $content);
    }
    if (!empty($h2_matches[1])) {
        $h2_contents = $h2_matches[1];
        $content = preg_replace('/<h2[^>]*>(.*?)<\/h2>/s', '', $content);
    }
    if (!empty($h3_matches[1])) {
        $h3_contents = $h3_matches[1];
        $content = preg_replace('/<h2[^>]*>(.*?)<\/h2>/s', '', $content);
    }
    if (!empty($h4_matches[1])) {
        $h4_contents = $h4_matches[1];
        $content = preg_replace('/<h4[^>]*>(.*?)<\/h4>/s', '', $content);
    }
    
    // Retourner les contenus des balises <h2> et <h4>
    return [
        'h1' => $h1_contents,
        'h2' => $h2_contents,
        'h3' => $h3_contents,
        'h4' => $h4_contents
    ];
}

function get_image_urls(&$content) {
    $image_urls = [];

    // Utiliser une expression régulière pour récupérer les URLs des images
    preg_match_all('/<img[^>]+src="([^">]+)"/', $content, $matches);
    
    if (!empty($matches[1])) {
        $image_urls = $matches[1];
        // Supprimer les balises <img> du contenu initial
        $content = preg_replace('/<img[^>]+src="([^">]+)"/', '', $content);
    }
    // Retourner les URLs des images
    return $image_urls;
}

?>
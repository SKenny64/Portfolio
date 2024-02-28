<?php

require_once "vendor/autoload.php";
require_once "bootstrap.php";
require_once "src/Controller/BaseController.php";
require_once "src/controller/PageController.php";
require_once "src/entity/Utilisateur.php";
require_once "src/entity/Categorie.php";
require_once "src/entity/Page.php";

use App\Entity\Utilisateur;
use App\Entity\Categorie;
use App\Entity\Page;
use App\Controller\BaseController;
use App\Controller\PageController;

$route = $_GET['route'] ?? '';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
};
if (isset($_GET['date'])) {
    $date = $_GET['date'];
}
switch ($route) {

    case 'home':
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->index();
        break;
    case 'connexion':
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->connexion();
        break;
    case 'admin':
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->admin();
        break;
    case 'readApropos':
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->readApropos();
        break;
    case 'readActu':
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->readActu();
        break;
    case 'readAccueil':
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->readAccueil();
        break;
    case 'readSpectacle':
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->readSpectacle();
        break;
    case 'readRejoindre':
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->readRejoindre();
        break;
    case 'create' :
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->create();
        break;
    case "createRejoindre":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->createRejoindre(); 
        break;
    case "createAccueil":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->createAccueil();
        break;
    case "createActu":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->createActu();
        break;
    case "createApropos":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->createApropos();
        break;
    case "createSpectacle":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->createSpectacle();
        break;
    case "update":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->update($id);
        break;
    case "delete":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->delete($id);
        break;
    case "show":
        $pageController = new PageController($entityManager, $twig);
        echo $pageController->show($id);
        break;
    case "contact":
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->contact();
        break;
    case "rejoindre":
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->nousRejoindre();
        break;
    case "representation":
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->representation();
        break;
    case "apropos":
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->apropos();
        break;
    case "prisedeco":
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->priseDeCo();
        break;
    case "precommande":
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->precommande($date);
        break;


    default:
        $baseController = new BaseController($entityManager, $twig);
        echo $baseController->index();
        break;
}


?>
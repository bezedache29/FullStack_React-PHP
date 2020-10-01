<?php
session_start();

// On cré une constante pour ne pas avoir de pb d'access. Ce sera un chemin absolue
define('URL', str_replace('index.php', '', (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once "controllers/front/API.controller.php";
$apiController = new APIController();

require_once "controllers/back/admin.controller.php";
$adminController = new AdminController();

require_once "controllers/back/famille.controller.php";
$familleController = new FamilleController();

try {
    if(empty($_GET['page'])) {
        echo "On apelle la page d'accueil";
    }else {
        $url = explode('/', filter_var($_GET['page']),FILTER_SANITIZE_URL);

        if(empty($url[0]) || empty($url[1])) {
            throw new Exception("La page demandé n'existe pas");
        }

        switch($url[0]) {
            case 'back' :
                if($url[1] === 'login') {
                    $adminController->getPageLogin();
                }elseif($url[1] === 'connexion') {
                    $adminController->connexion();
                }elseif($url[1] === 'home') {
                    $adminController->getHome();
                }elseif($url[1] === 'deconnexion') {
                    $adminController->deconnexion();
                }elseif($url[1] === 'familles') {
                    if($url[2] === 'listeFamilles') {
                        $familleController->visualisation();
                    }elseif($url[2] === 'formAjouterFamille') {
                        $familleController->formAjoutFamille();
                    }elseif($url[2] === 'ajoutFamille') {
                        $familleController->ajoutFamille();
                    }elseif($url[2] === 'supprFamille') {
                        $familleController->supprFamille();
                    }elseif($url[2] === 'modifFamille') {
                        $familleController->modifFamille();
                    }else {
                        throw new Exception("Error !");
                    }
                }else {
                    throw new Exception("Quelle page ?");
                }
            break;
            case 'front' :
                if($url[1] === 'animaux') {
                    // Si on ne met pas de parametres a la liste d'animaux on affiche la liste complete
                    if(!isset($url[2]) || !isset($url[3])) {
                        $apiController->getAnimaux(-1,-1);
                    }else {
                        // Si on ajoute des parametres a animaux
                        if(is_numeric($url[2]) && is_numeric($url[3])) {
                            $apiController->getAnimaux((int)$url[2], (int)$url[3]);
                        }else {
                            throw new Exception("Vous devez renseigner des id");
                        }
                    }
                }elseif($url[1] === 'animal') {
                    if(empty($url[2]) || !(is_numeric($url[2]))) {
                        throw new Exception("L'id de l'animal n'est pas renseigné");
                    }else {
                        $apiController->getAnimal($url[2]);
                    }
                }elseif($url[1] === 'continents') {
                    $apiController->getContinents();
                }elseif($url[1] === 'familles') {
                    $apiController->getFamilles();
                }elseif($url[1] === 'sendForm') {
                    $apiController->sendForm();
                }else {
                    throw new Exception("La page n'existe pas");
                }
            break;
            default : throw new Exception("La page n'existe pas");
        }
    }
}catch(Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
    echo "<br>";
    echo "<a href='" . URL . "back/login'>login</a>";
}
?>
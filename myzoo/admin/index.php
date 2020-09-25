<?php
// On cré une constante pour ne pas avoir de pb d'access. Ce sera un chemin absolue
define('URL', str_replace('index.php', '', (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once "controllers/front/API.controller.php";
$apiController = new APIController();

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
                echo "On apelle la page back end";
            break;
            case 'front' :
                if($url[1] === 'animaux') {
                    if(!isset($url[2]) || !isset($url[3])) {
                        $apiController->getAnimaux(-1,-1);
                    }else {
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
}
?>
<?php

require_once "models/back/familles.manager.php";
require_once "models/Model.php";
require_once "controllers/back/Securite.class.php";

class FamilleController {
    private $famillesManager;

    public function __construct() {
        $this->famillesManager = new FamillesManager();
    }

    public function visualisation() {
        // On verifie si le user est connecté
        if(Securite::isAdmin()) {
            // On récupère les infos en DB
            // Cette variable pourra etre utilisé par la vue
            $listeFamilles = $this->famillesManager->getDBFamilles();
            // On affiche la page
            require_once "views/familles.view.php";
        }else {
            throw new Exception("Vous n'avez pas les accès");
        }
    }

    public function supprFamille() {
        if(Securite::isAdmin()) {
            $id_famille = Securite::testHTML($_POST['id_famille']);
            
            // On check s'il y a des animaux rataché aux familles
            if($this->famillesManager->cptAnimaux($id_famille) != null) {
                $_SESSION['alert']['message'] = "La famille possède des animaux";
                $_SESSION['alert']['color'] = "alert-danger";
            }else {
                $_SESSION['alert']['message'] = "La famille est supprimée";
                $_SESSION['alert']['color'] = "alert-success";
                $this->famillesManager->supprFamille($id_famille);
            }
            header('Location: ' . URL . 'back/familles/listeFamilles');
            
        }else {
            throw new Exception("Vous n'avez pas les accès");
        }
    }
}
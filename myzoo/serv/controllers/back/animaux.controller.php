<?php

require_once "models/back/animaux.manager.php";
require_once "controllers/back/Securite.class.php";
require_once "models/back/familles.manager.php";

class AnimauxController {
    private $animauxManager;

    public function __construct() {
        $this->animauxManager = new AnimauxManager();
    }

    public function getAnimaux() {
        if(Securite::isAdmin()) {
            $animaux = $this->animauxManager->getDBAnimaux();

            require_once "views/animaux.view.php";
        }else {
            throw new Exception("Vous n'avez pas l'accès");
        }
    }

    public function supprAnimal() {
        if(Securite::isAdmin()) {
            $id_animal = Securite::testHTML($_POST['id_animal']);
            $this->animauxManager->supprDBAnimalContinent(intval($id_animal));
            $this->animauxManager->supprDBAnimal(intval($id_animal));
            $_SESSION['alert']['message'] = "L'animal' a bien été supprimé";
            $_SESSION['alert']['color'] = "alert-success";

            header('Location: ' . URL . 'back/animaux/listeAnimaux');
        }else {
            throw new Exception("Vous n'avez pas l'accès");
        }
    }

    public function formAjouterAnimal() {
        if(Securite::isAdmin()) {
            // On apelle notre class familleManager pour recupérer les familles
            $familleManager = new FamillesManager();
            $familles = $familleManager->getDBFamilles();

            $continents = $this->animauxManager->getDBContinents();
            require_once "views/formAjoutAnimal.view.php";
        }else {
            throw new Exception("Vous n'avez pas l'accès");
        }
    }

    public function ajoutAnimal() {
        if(Securite::isAdmin()) {
            $type_animal = Securite::testHTML($_POST['type_animal']);
            $description_animal = Securite::testHTML($_POST['description_animal']);
            $id_famille = Securite::testHTML(intval($_POST['id_famille']));

            // On upload l'image
            $repertoire = "public/images/animaux/";
            $image_animal = $this->ajoutImage($_FILES['image_animal'], $repertoire);
            
            // On ajoute un animal avec l'id_famille
            $id_animal = $this->animauxManager->ajoutAnimal($type_animal, $description_animal, $image_animal, $id_famille);

            // On ajoute les continents_animaux
            foreach($_POST['continent'] as $continent) {
                $id_continent = Securite::testHTML($continent);
                $this->animauxManager->ajoutAnimalContinents($id_animal, $id_continent);
            }

            $_SESSION['alert']['message'] = "L'animal' a bien été ajouté";
            $_SESSION['alert']['color'] = "alert-success";

            header('Location: ' . URL . 'back/animaux/listeAnimaux');
        }else {
            throw new Exception("Vous n'avez pas l'accès");
        }
    }

    private function ajoutImage(array $image, string $dir) {
        if(!isset($image['name']) && !empty($image['name'])) {
            throw new Exception("Vous devez indiquer une image");
        }else {
            if(!file_exists($dir)) {
                mkdir($dir, 0777);
            }

            $taille_maxi = 2097152;
            $taille = filesize($image['tmp_name']);
            $extensionsValides = ['jpg', 'jpeg', 'gif', 'png'];
            
            if($image['size'] <= $taille_maxi) {
                $extensionUpload = strtolower(substr(strrchr($image['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionsValides)) {
                    $rand = (mt_rand(0, 1000).mt_rand(0, 1000));
                    $chemin = $dir.$rand.".".$extensionUpload;
                    $resultat = move_uploaded_file($image['tmp_name'], $chemin);
                    if($resultat) {
                        return $rand.".".$extensionUpload;
                    }else {
                        throw new Exception("Erreur durant l'importation de votre photo de profil");
                    }
                }else {
                    throw new Exception("Votre photo de profil doit être au format jpg, jpeg, gif ou png");
                }
            }else {
                throw new Exception("Votre photo de profil ne doit pas dépasser 2Mo");
            }
        }
    }
}
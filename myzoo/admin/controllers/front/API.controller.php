<?php

use function GuzzleHttp\json_decode;

require_once "models/front/API.manager.php";
require_once "models/Model.php";

class APIController {
    private $apiManager;

    public function __construct() {
        $this->apiManager = new APIManager();
    }

    public function getContinents() {
        $continents = $this->apiManager->getDBContinents();
        Model::sendJSON($continents);
    }

    public function getFamilles() {
        $familles = $this->apiManager->getDBFamilles();
        Model::sendJSON($familles);
    }

    public function getAnimaux(int $id_famille, int $id_continent) {
        $animaux = $this->apiManager->getDBAnimaux($id_famille, $id_continent);
        $dataAnimaux = $this->formatDataAnimaux($animaux);
        // echo "<pre>";
        // print_r($dataAnimaux);
        // echo "</pre>";
        Model::sendJSON($dataAnimaux);
    }

    public function getAnimal(int $id) {
        $animal = $this->apiManager->getDBAnimal($id);
        Model::sendJSON($this->formatDataAnimaux($animal));
    }

    private function formatDataAnimaux(array $animaux) {
        $tab = [];
        foreach($animaux as $animal) {
            // On verifie que l'animal n'est pas deja creer dans le tableau 
            // pour ne pas ecraser ses données a chque tour de boucle
            // S'il n'existe pas on le cré
            if(!array_key_exists($animal['id_animal'], $tab)) {
                $tab[$animal['id_animal']] = [
                    "id_animal" => $animal['id_animal'],
                    "type_animal" => $animal['type_animal'],
                    "description_animal" => $animal['description_animal'],
                    "image_animal" => URL."public/images/animaux/".$animal['image_animal'],
                    "deleted_animal" => $animal['deleted_animal'],
                    "famille" => [
                        "id_famille" => $animal['id_famille'],
                        "nom_famille" => $animal['nom_famille'],
                        "description_famille" => $animal['description_famille'],
                        "deleted_famille" => $animal['deleted_famille']
                    ]
                ];
            }

            // On ajoute les continents de l'animal
            $tab[$animal['id_animal']]['continents'][] = [
                'id_continent' => $animal['id_continent'],
                'nom_continent' => $animal['nom_continent'],
                'deleted_continent' => $animal['deleted_continent']
            ];
            
        }
        return $tab;
    }

    public function sendForm() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

        // On récupère les infos qui sont dans notre objet js
        $objet = json_decode(file_get_contents('php://input'));

        // Exemple : Pour récupérer le mail
        $mail = $objet->email;

        // On peut envoyer un mail ici
        // $to = "contact@myzoo.com";
        // $subject = "Message en provenance du formulaire de contact de : " . $objet->nom;
        // $message = $objet->message;
        // $headers = "From : " . $objet->email;

        // mail($to, $subject, $message, $headers);

        echo json_encode("Email envoyé");
    }
}
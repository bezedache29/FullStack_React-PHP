<?php

require_once "models/Model.php";

class APIMAnager extends Model {

    public function getDBAnimaux() {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM animaux 
            INNER JOIN familles on animaux.id_famille = familles.id_famille 
            INNER JOIN animaux_continents on animaux.id_animal = animaux_continents.id_animal 
            INNER JOIN continents on animaux_continents.id_continent = continents.id_continent 
            WHERE deleted_animal = 0');
        $query->execute();

        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        $query->closeCursor();

        return $donnees;
    }

    public function getDBAnimal(int $id) {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM animaux 
            INNER JOIN familles on animaux.id_famille = familles.id_famille 
            INNER JOIN animaux_continents on animaux.id_animal = animaux_continents.id_animal 
            INNER JOIN continents on animaux_continents.id_continent = continents.id_continent 
            WHERE deleted_animal = 0 AND animaux.id_animal = :id_animal');
        $value = [
            'id_animal' => $id
        ];

        $query->execute($value);

        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        $query->closeCursor();

        return $donnees;
    }

    public function getDBFamilles() {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM familles WHERE deleted_famille = 0');

        $query->execute();

        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        $query->closeCursor();

        return $donnees;
    }

    public function getDBContinents() {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM continents WHERE deleted_continent = 0');

        $query->execute();

        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);

        $query->closeCursor();

        return $donnees;
    }
}
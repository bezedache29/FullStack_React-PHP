<?php

require_once "models/Model.php";

class AnimauxManager extends Model {
    public function getDBAnimaux() {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM animaux INNER JOIN familles ON animaux.id_famille = familles.id_famille 
        WHERE animaux.deleted_animal = 0');
        $query->execute();
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        return $donnees;
    }

    public function supprDBAnimalContinent(int $id_animal) {
        $db = $this->getBdd();
        $query = $db->prepare('DELETE FROM animaux_continents WHERE id_animal = :id_animal');
        $value = [
            'id_animal' => $id_animal
        ];
        $query->execute($value);
        $query->closeCursor();
    }

    public function supprDBAnimal(int $id_animal) {
        $db = $this->getBdd();
        $query = $db->prepare('UPDATE animaux SET deleted_animal = 1 WHERE id_animal = :id_animal');
        $value = [
            'id_animal' => $id_animal
        ];
        $query->execute($value);
        $query->closeCursor();
    }

    // public function getFamilles() {
    //     $db = $this->getBdd();
    //     $query = $db->prepare('SELECT * FROM familles WHERE deleted_famille = 0');
    //     $query->execute();
    //     $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
    //     $query->closeCursor();

    //     return $donnees;
    // }

    public function getDBContinents() {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM continents WHERE deleted_continent = 0');
        $query->execute();
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        return $donnees;
    }

    public function ajoutAnimal(string $type_animal, string $description_animal, string $image_animal, int $id_famille) {
        $db = $this->getBdd();
        $query = $db->prepare('INSERT INTO animaux (type_animal, description_animal, image_animal, id_famille) 
        VALUES (:type_animal, :description_animal, :image_animal, :id_famille)');
        $values = [
            'type_animal' => $type_animal,
            'description_animal' => $description_animal,
            'image_animal' => $image_animal,
            'id_famille' => $id_famille
        ];
        $query->execute($values);
        $id_animal = $db->lastInsertId();
        $query->closeCursor();

        return $id_animal;
    }

    public function ajoutAnimalContinents(int $id_animal, int $id_continent) {
        $db = $this->getBdd();
        $query = $db->prepare('INSERT INTO animaux_continents (id_animal, id_continent) VALUES (:id_animal, :id_continent)');
        $values = [
            'id_animal' => $id_animal,
            'id_continent' => $id_continent
        ];
        $query->execute($values);
        $query->closeCursor();
    }
}
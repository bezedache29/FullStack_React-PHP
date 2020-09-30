<?php

require_once "models/Model.php";

class FamillesManager extends Model {
    public function getDBFamilles() {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM familles WHERE deleted_famille = 0');
        $query->execute();
        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        return $donnees;
    }

    public function cptAnimaux(int $id_famille) {
        $db = $this->getBdd();
        $query = $db->prepare('SELECT * FROM animaux WHERE id_famille = :id_famille AND deleted_animal = 0');
        $value = [
            'id_famille' => $id_famille
        ];
        $query->execute($value);

        $donnees = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return count($donnees);
    }

    public function supprFamille(int $id_famille) {
        $db = $this->getBdd();
        $query = $db->prepare('UPDATE familles SET deleted_famille = 1 WHERE id_famille = :id_famille');
        $value = [
            'id_famille' => $id_famille
        ];
        $query->execute($value);
        $query->closeCursor();
    }
}
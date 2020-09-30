<?php

require_once "models/Model.php";

class APIMAnager extends Model {

    public function getDBAnimaux(int $id_famille, int $id_continent) {
        $db = $this->getBdd();

        if($id_famille == -1 && $id_continent != -1) {
            $query = $db->prepare('SELECT * FROM animaux 
            INNER JOIN familles on animaux.id_famille = familles.id_famille 
            INNER JOIN animaux_continents on animaux.id_animal = animaux_continents.id_animal 
            INNER JOIN continents on animaux_continents.id_continent = continents.id_continent 
            WHERE animaux.id_animal IN (SELECT id_animal FROM animaux_continents WHERE id_continent = :id_continent)  
            AND animaux.deleted_animal = 0');
            $value = [
                'id_continent' => $id_continent
            ];
            $query->execute($value);
        }elseif($id_famille != -1 && $id_continent == -1) {
            $query = $db->prepare('SELECT * FROM animaux 
            INNER JOIN familles on animaux.id_famille = familles.id_famille 
            INNER JOIN animaux_continents on animaux.id_animal = animaux_continents.id_animal 
            INNER JOIN continents on animaux_continents.id_continent = continents.id_continent 
            WHERE familles.id_famille = :id_famille 
            AND animaux.deleted_animal = 0');
            $value = [
                'id_famille' => $id_famille
            ];
            $query->execute($value);
        }elseif($id_famille == -1 && $id_continent == -1) {
            $db = $this->getBdd();
            $query = $db->prepare('SELECT * FROM animaux 
            INNER JOIN familles on animaux.id_famille = familles.id_famille 
            INNER JOIN animaux_continents on animaux.id_animal = animaux_continents.id_animal 
            INNER JOIN continents on animaux_continents.id_continent = continents.id_continent 
            AND animaux.deleted_animal = 0');
            $query->execute();
        }elseif($id_famille != -1 && $id_continent != -1) {
            $query = $db->prepare('SELECT * FROM animaux 
            INNER JOIN familles on animaux.id_famille = familles.id_famille 
            INNER JOIN animaux_continents on animaux.id_animal = animaux_continents.id_animal 
            INNER JOIN continents on animaux_continents.id_continent = continents.id_continent 
            WHERE familles.id_famille = :id_famille 
            AND animaux.id_animal IN (SELECT id_animal FROM animaux_continents WHERE id_continent = :id_continent)  
            AND animaux.deleted_animal = 0');
            $values = [
                'id_famille' => $id_famille,
                'id_continent' => $id_continent
            ];
            $query->execute($values);
        }

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
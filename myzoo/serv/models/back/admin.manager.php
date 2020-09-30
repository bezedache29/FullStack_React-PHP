<?php

    require_once "models/Model.php";

    class AdminManager extends Model {
        public function verifLogin($nom, $pwd) {
            $db = $this->getBdd();

            $query = $db->prepare('SELECT * FROM admins WHERE nom_admin = :nom_admin AND deleted_admin = 0');
            $value = [
                'nom_admin' => $nom
            ];
            $query->execute($value);

            $donnee = $query->fetch(PDO::FETCH_ASSOC);

            $query->closeCursor();

            // Si le pwd existe, il retournera un booleen true, sinon false
            return (password_verify($pwd, $donnee['pwd_admin']));
        }
    }
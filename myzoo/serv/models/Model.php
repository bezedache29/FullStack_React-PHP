<?php
abstract class Model {
    private static $pdo;

    // Création d'une methode accessible uniquement par la class
    private static function setBdd() {
        self::$pdo = new PDO('mysql:host=mysql-tophe.alwaysdata.net;dbname=tophe_myzoo;charset=utf8', 'tophe', '!Diky!29');
        // self::$pdo = new PDO('mysql:host=db5000994539.hosting-data.io;dbname=dbs862627;charset=utf8', 'dbu361171', '!Diky!29');
        self::$pdo = new PDO('mysql:host=localhost;dbname=my_zoo;charset=utf8', 'root', '');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Création d'une methode accessible par les class filles
    protected function getBdd() {
        // On check s'il y a deja une instance pdo actif
        // Si null on crée l'instance
        if(self::$pdo === NULL) {
            self::setBdd();
        }
        return self::$pdo;
    }

    public static function sendJSON($info) {
        // Les demandes de faites peuvent aller vers une endroit (* pour que tout le monde utilise l'api rest)
        header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Origin: http://ripley.eu/php/react_php/");
        // header("Access-Control-Allow-Origin: http://tophe.alwaysdata.net/myzoo/");
        // On indique que les données généré sont au format JSON
        header("Content-Type: application/json");
        echo json_encode($info);
    }
}
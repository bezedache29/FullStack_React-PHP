<?php

    require_once "models/back/admin.manager.php";
    require_once "models/Model.php";
    require_once "controllers/back/Securite.class.php";

    class AdminController {
        private $adminManager;

        public function __construct() {
            $this->adminManager = new AdminManager();
        }

        public function getPageLogin() {
            require_once "views/login.view.php";
        }

        public function connexion() {
            $nom = Securite::testHTML($_POST['nom']);
            $pwd = Securite::testHTML($_POST['pwd']);

            $login = $this->adminManager->verifLogin($nom, $pwd);

            if($login == true) {
                // OK
                $_SESSION['admin'] = true;
                header('Location: ' . URL .'back/home');
            }else {
                // Non OK
                // require_once "views/login.view.php";
                header('Location: ' . URL .'back/login');
            }
            
        }

        public function getHome() {
            // On check que la session admin existe bien
            if(Securite::isAdmin()) {
                require_once "views/home.view.php";
            }else {
                header('Location: ' . URL .'back/login');
            }
        }

        public function deconnexion() {
            session_destroy();
            header('Location: ' . URL .'back/login');
        }
    }
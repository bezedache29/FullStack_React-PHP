<?php

class Securite {
    public static function testHTML(string $string) {
        // On retourne les infos des input strip_taggé
        return strip_tags($string);
    }

    public static function isAdmin() {
        // On retourne un booleen si la session admin existe et est bien a true
        return (isset($_SESSION['admin']) && $_SESSION['admin'] == true);
    }
}
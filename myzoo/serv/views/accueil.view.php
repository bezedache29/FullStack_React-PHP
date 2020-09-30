<?php
    ob_start();
?>
Page Accueil admin my zoo
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Bienvenue sur l'admin My Zoo";
    $title = "Admin MyZoo";
    $menu = true;
    require "views/commons/template.php";
?>
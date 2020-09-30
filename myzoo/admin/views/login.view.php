<?php
    ob_start();
?>
<form method="post" action="<?= URL . "back/connexion"; ?>">
    <div class="form-group">
        <label for="nom">Nom d'utilisateur</label>
        <input type="text" name="nom" class="form-control" id="nom">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" class="form-control" id="pwd">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Login";
    $title = "Admin MyZoo";
    $menu = false;
    require "views/commons/template.php";
?>
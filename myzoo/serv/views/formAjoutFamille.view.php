<?php
    ob_start();
?>
<form method="post" action="<?= URL . "back/familles/ajoutFamille"; ?>">
    <div class="form-group">
        <label for="nom_famille">Nom de la famille</label>
        <input type="text" name="nom_famille" class="form-control" id="nom_famille" aria-describedby="nomFamilleHelp">
    </div>
    <div class="form-group">
        <label for="description_famille">Description de la famille</label>
        <textarea name="description_famille" id="description_famille" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Ajout d'une famille d'animaux";
    $title = "Admin MyZoo";
    $menu = true;
    require "views/commons/template.php";
?>
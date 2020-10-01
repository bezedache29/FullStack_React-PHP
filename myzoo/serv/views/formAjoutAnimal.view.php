<?php
    ob_start();
?>
<form method="post" action="<?= URL . "back/animaux/ajoutAnimal"; ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="type_animal">Type d'animal</label>
        <input type="text" name="type_animal" class="form-control" id="type_animal" aria-describedby="type_animalHelp">
    </div>
    <div class="form-group">
        <label for="description_animal">Description de l'animal'</label>
        <textarea name="description_animal" id="description_animal" class="form-control" cols="30" rows="5"></textarea>
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" name="image_animal" class="custom-file-input" id="image_animal" lang="fr">
            <label class="custom-file-label" for="image_animal">Choisissez une image</label>
        </div>
    </div>
    <div class="form-group">
        <label for="familles">Selectionnez une famille</label>
        <select class="form-control" name="id_famille" id="familles">
            <option selected disabled value="">Liste des familles</option>
        <?php foreach($familles as $famille) : ?>
            <option value="<?= $famille['id_famille']; ?>"><?= $famille['nom_famille']; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <?php foreach($continents as $continent) : ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="continent[<?= $continent['id_continent']; ?>]" id="continent<?= $continent['id_continent']; ?>" value="<?= $continent['id_continent']; ?>">
            <label class="form-check-label" for="continent<?= $continent['id_continent']; ?>"><?= ucfirst($continent['nom_continent']); ?></label>
        </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Ajout d'un animal dans My Zoo";
    $title = "Admin MyZoo";
    $menu = true;
    require "views/commons/template.php";
?>
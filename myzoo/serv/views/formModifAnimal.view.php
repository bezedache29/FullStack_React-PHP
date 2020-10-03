<?php
    ob_start();
?>
<form method="post" action="<?= URL . "back/animaux/modifAnimal"; ?>" enctype="multipart/form-data">
    <input type="hidden" value="<?= $infosAnimal['id_animal']; ?>" name="id_animal">
    <div class="form-group">
        <label for="type_animal">Type d'animal</label>
        <input type="text" name="type_animal" value="<?= $infosAnimal['type_animal']; ?>" class="form-control" id="type_animal" aria-describedby="type_animalHelp">
    </div>
    <div class="form-group">
        <label for="description_animal">Description de l'animal</label>
        <textarea name="description_animal" id="description_animal" class="form-control" cols="30" rows="5"><?= $infosAnimal['description_animal']; ?></textarea>
    </div>
    <div class="form-group">
        <img src="<?= URL . "public/images/animaux/" . $infosAnimal['image_animal']; ?>" alt="image animal">
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
            <option selected value="<?= $infosAnimal['id_famille']; ?>"><?= $infosAnimal['nom_famille']; ?></option>
        <?php foreach($familles as $famille) : ?>
            <?php if($famille['id_famille'] != $infosAnimal['id_famille']) : ?>
            <option value="<?= $famille['id_famille']; ?>"><?= $famille['nom_famille']; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <?php foreach($continents as $continent) : ?> 
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="continent[<?= $continent['id_continent']; ?>]" id="continent<?= $continent['id_continent']; ?>" value="<?= $continent['id_continent']; ?>" <?= (in_array($continent['id_continent'],$tabContinent)) ? "checked" : null; ?>>
                <label class="form-check-label" for="continent<?= $continent['id_continent']; ?>"><?= ucfirst($continent['nom_continent']); ?></label>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Modification de l'animal : " . ucfirst($infosAnimal['type_animal']);
    $title = "Admin MyZoo";
    $menu = true;
    require "views/commons/template.php";
?>
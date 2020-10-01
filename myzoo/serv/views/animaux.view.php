<?php
    ob_start();
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Famille</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($animaux as $animal) : ?>
            <tr>
                <th scope="row"><?= $animal['id_animal']; ?></th>
                <td><?= ucfirst($animal['type_animal']); ?></td>
                <td><?= $animal['description_animal']; ?></td>
                <td><?= $animal['nom_famille']; ?></td>
                <td><button class="btn btn-warning">Modifier</button></td>
                <td>
                    <form action="<?= URL . "back/animaux/supprAnimal"; ?>" method="post" onSubmit="return confirm('Voulez-vous vraiment supprimer l\'animal ?')">
                        <input type="hidden" name="id_animal" value="<?= $animal['id_animal']; ?>" />
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Liste des animaux de My Zoo";
    $title = "Admin MyZoo";
    $menu = true;
    require "views/commons/template.php";
?>
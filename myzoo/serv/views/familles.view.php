<?php
    ob_start();
?>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom Famille</th>
            <th scope="col">Description</th>
            <th scope="col" colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($listeFamilles as $famille) : ?>
        <tr>
            <th scope="row"><?= $famille['id_famille']; ?></th>
            <td><?= $famille['nom_famille']; ?></td>
            <td><?= $famille['description_famille']; ?></td>
            <td><button class="btn btn-warning">Modifier</button></td>
            <td>
                <form action="<?= URL . "back/familles/supprFamille"; ?>" method="post" onSubmit="return confirm('Voulez-vous vraiement supprimer la famille ?')">
                    <input type="hidden" name="id_famille" value="<?= $famille['id_famille']; ?>">
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
    // On insère tout le contenu du dessus qui est en temporisation dans la variable $content qui est dans template.php
    $content = ob_get_clean();
    $titre = "Liste des familles d'animaux";
    $title = "Admin MyZoo";
    $menu = true;
    require "views/commons/template.php";
?>
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
        <?php if(isset($_POST['id_famille']) && $_POST['id_famille'] == $famille['id_famille']) : ?>
                <tr>
                    <th scope="row"><?= $famille['id_famille']; ?></th>
                    <form action="<?= URL . "back/familles/modifFamille"; ?>" method="post">
                        <td><input type="text" name="nom_famille" value="<?= $famille['nom_famille']; ?>" /></td>
                        <td><textarea class="w-100" name="description_famille" cols="30"><?= $famille['description_famille']; ?></textarea></td>
                        <td>
                            <!-- On envoie l'id_famille en $_POST lorqu'on veut modifier cette famille -->
                            <input type="hidden" name="id_famille" value="<?= $famille['id_famille']; ?>">
                            <button class="btn btn-primary">Enregistrer</button>
                        </td>
                    </form>
                    <td>
                        <form action="<?= URL . "back/familles/listeFamilles"; ?>" method="post">
                            <button class="btn btn-danger">Annuler</button>
                        </form>
                    </td>
                </tr>
        <?php else : ?>
            <tr>
                <th scope="row"><?= $famille['id_famille']; ?></th>
                <td><?= $famille['nom_famille']; ?></td>
                <td><?= $famille['description_famille']; ?></td>
                <td>
                    <form action="" method="post">
                        <!-- On envoie l'id_famille en $_POST lorqu'on veut modifier cette famille -->
                        <input type="hidden" name="id_famille" value="<?= $famille['id_famille']; ?>">
                        <button class="btn btn-warning">Modifier</button>
                    </form>
                </td>
                <td>
                    <form action="<?= URL . "back/familles/supprFamille"; ?>" method="post" onSubmit="return confirm('Voulez-vous vraiement supprimer la famille ?')">
                        <input type="hidden" name="id_famille" value="<?= $famille['id_famille']; ?>">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endif; ?>
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
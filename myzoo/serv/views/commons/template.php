<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?= $title; ?></title>
</head>
<body>
    <!-- On apelle le menu -->
    <?php ($menu != false) ? require_once "views/commons/menu.php" : null ; ?>
    <div class="container">
        <h1 class="rounded border border-dark mt-2 p-2 text-center text-white bg-info"><?= $titre; ?></h1>
        <?php if(!empty($_SESSION['alert'])) : ?>
            <div class="alert <?= $_SESSION['alert']['color']; ?>" role="alert">
                <?= $_SESSION['alert']['message']; ?>
            </div>
        <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>
        <!-- On apelle le contenu qui se trouve dans ob_start -->
        <?= $content; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // Pour afficher le nom du fichier dans un input file après que le user l'ai sélectionné depuis son HDD
        $('.custom-file input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });
    </script>
</body>
</html>
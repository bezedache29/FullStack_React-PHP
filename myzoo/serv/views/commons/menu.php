<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= URL . "back/home"; ?>">Accueil</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Animaux
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= URL . "back/animaux/listeAnimaux"; ?>">Liste des animaux</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= URL . "back/animaux/formAjouterAnimal"; ?>">Ajouter un animal</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Familles
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= URL . "back/familles/listeFamilles"; ?>">Liste des familles</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= URL . "back/familles/formAjouterFamille"; ?>">Ajouter une famille</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL . "back/deconnexion"; ?>">Deconnexion</a>
            </li>
        </ul>
    </div>
</nav>
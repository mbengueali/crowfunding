<?php

// s'il n'y a pas de connexion on redirige vers la page de connexion

if ( !isset($_SESSION['user']) ) {

    header('location: index.php?p=connexion');
}
else { // l'utilisateur s'est déja connecté

    // function d'interaction avec la base de donnee
    include __DIR__.'/../models/fonctionConnexionBdd.php';
    include __DIR__.'/../models/fonctionUser.php';

    // barre de navigation
    include __DIR__.'/../vues/navbar-top.php';

    ?>

    <div class="container" style="margin-bottom: 200px">

        <?php

        //recupération des donnees de l'utilisateur dans la database
        $user = selectUser($_SESSION['user']);

        // mise en forme des donnees avec la vue correspondante
        include __DIR__.'/../vues/userProfil.php';

        ?>

    </div>

    <?php

    // footer de la page
    include __DIR__.'/../vues/footer.php';
}
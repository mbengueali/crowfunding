<?php

// s'il n'y a pas de connexion on redirige vers la page de connexion

if ( !isset($_SESSION['user']) ) {

    header('location: index.php?p=connexion');
}
else { // l'utilisateur s'est déja connecté

    // function d'interaction avec la base de donnee
    include __DIR__.'/../models/fonctionConnexionBdd.php';
    include __DIR__.'/../models/fonctionUser.php';
    include __DIR__.'/../models/fonctionFormulaire.php';

    // barre de navigation
    include __DIR__.'/../vues/navbar-top.php';

    ?>

    <div class="container" style="margin-bottom: 200px">

        <!--recupération des donnees de l'utilisateur dans la database -->
        <?php $user = selectUser($_SESSION['user']); ?>

        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-success">Mes Contributions</h1>
                <br>

                <div class="row">
                    <div class="col-md-offset-1d col-md-12">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Date</th>
                                <th>Nom du projet</th>
                                <th>Auteur du projet</th>
                                <th>Etat</th>
                                <th>Statut</th>
                                <th>Montant</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>28/03/2014 23:14</td>
                                <td>Le nom de mon projet</td>
                                <td>Masta Flex</td>
                                <td>En cours</td>
                                <td class="text-info">60%</td>
                                <td class="text-warning">200.000 Fcfa</td>
                                <td>
                                    <button type="btn" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span>
                                    </button>
                                    <button type="btn" class="btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                    <button type="btn" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                    </button>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php

    // footer de la page
    include __DIR__.'/../vues/footer.php';
}
?>

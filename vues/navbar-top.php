<?php

?>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="btn navbar-btn navbar-toggle" data-toggle="collapse" data-target=".mycollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?p=accueil"><span class="glyphicon glyphicon-home"></span> Urgence Delta</a>
        </div>
        <div class="collapse navbar-collapse mycollapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="?p=projets"><span class="glyphicon glyphicon-check"></span> D&eacute;couvir les projets</a></li>
                <li><a href="?p=underconstruct"><span class="glyphicon glyphicon-save"></span> Pr&eacute;senter un projet</a></li>

                <?php

                if ( !isset($_SESSION['user']) ) { // il n'y a pas de connexion on affiche le lien de "connexion | d'inscription"

                    echo '<li><a href="?p=connexion"><span class="glyphicon glyphicon-user"></span> Incription | Connexion</a></li>';
                }
                else { // il y a une session en cours, on affiche l'utilisateur
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user']; ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?p=user"><span class="glyphicon glyphicon-user"></span> &nbsp;Mon Profil</a></li>
                            <li><a href="index.php?p=userEdit"><span class="glyphicon glyphicon-cog"></span> &nbsp;Modifier mon profil</a></li>
                            <li><a href="index.php?p=user"><span class="glyphicon glyphicon-heart"></span> &nbsp;Mes projets</a></li>
                            <li><a href="index.php?p=userContribution"><span class="glyphicon glyphicon-th-list"></span> &nbsp;Mes Contributions</a></li>

                            <li><a href="index.php?p=logout"><span class="glyphicon glyphicon-off"></span> &nbsp;Se d&eacute;connecter</a></li>
                        </ul>
                    </li>
                <?php
                }

                ?>

                <li><a href="?p=contactez"><span class="glyphicon glyphicon-question-sign"></span> Aide</a></li>
            </ul>
        </div>
    </div>
</div>

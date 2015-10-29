<?php
?>

<div class="row" >
    <div class="col-md-12">

        <br>

        <div class="row" style="">

            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="images/300x200.png" alt="image.jpg" width="250px" height="200px"/>
                </div>
            </div>

            <div class="col-md-9">
                <h2 class="text-success"><?php echo $user->pseudonyme; ?></h2>
                <hr>
                <div class="row">
                    <div class="col-md-3 text-right" style="font-family: Arial">
                        <ul class="list-unstyled">
                            <li>Pr&eacute;nom et Nom :</li>
                            <li>Date de naissance :</li>
                            <li>Email :</li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-left">
                        <ul class="list-unstyled">
                            <li><strong><?php echo $user->prenom.' '.$user->nom; ?></strong></li>
                            <li><strong><?php echo $user->date_de_naissance; ?></strong></li>
                            <li><strong><?php echo $user->mail; ?></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="index.php?p=userEdit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-edit"></span> Editer mon profil</a>

        </div>

        <br><br>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="#mesProjets" data-toggle="tab">
                            <strong>Mes Projets &nbsp;</strong><span class="badge">0</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#projetsSoutenus" data-toggle="tab">
                            <strong>Projets Soutenus &nbsp;</strong><span class="badge">0</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane text-center" id="mesProjets" style="margin-top: 30px">
                        <h4> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Pas de projet</h4>
                    </div>
                    <div class="tab-pane active text-center" id="projetsSoutenus" style="margin-top: 30px">
                        <h4> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;Pas de projet</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

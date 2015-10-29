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
            <div class="col-md-10 col-md-offset-1">
                <h1 class="text-center text-success">Modifier mon profil</h1>
                <br>

                <?php

                //permet de colorer les input sil y a erreur. variables utilisées dans le fichier formulaireInscription.php
                $erreurPseudonyme = false;
                $erreurMail = false;
                $erreurMotDePasse = false;

                if ( !isset($_POST['pseudonyme']) ) { // premiere fois sur le formulaire

                    // affichage du formulaire de modification des donnees
                    include __DIR__.'/../vues/formulaireEditProfil.php';

                }
                else { // clik sur le bouton de modification des donnees

                    // recuperation des nouvelles donnees saisies
                    $pseudonyme = securiserSaisie($_POST['pseudonyme']);
                    $nom = securiserSaisie($_POST['nom']);
                    $prenom = securiserSaisie($_POST['prenom']);
                    $dateNaiss = securiserSaisie($_POST['dateNaiss']);
                    $email = securiserSaisie($_POST['email']);
                    $motDePasse = securiserSaisie($_POST['motDePasse']);
                    $confirmation = securiserSaisie($_POST['confirmation']);
                    $sexe = securiserSaisie($_POST['sexe']);
                    $telephone = securiserSaisie($_POST['telephone']);
                    $adresse = securiserSaisie($_POST['adresse']);

                    // controle des donnees avec php

                    if ( checkAnotherMailExist($email, $user->id) or checkAnotherPseudonymeExist($pseudonyme, $user->id) or !samePasswords($motDePasse, $confirmation) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // erreur
                        ?>
                        <div class="alert alert-danger alert-dismissable col-md-offset-3 col-md-7">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span class="glyphicon glyphicon-warning-sign"></span>&nbsp;
                            Erreur de saisie.
                            <ul>
                                <?php

                                if ( checkAnotherPseudonymeExist($pseudonyme, $user->id) ) {
                                    echo '<li>Pseudonyme indisponible</li>';
                                    $erreurPseudonyme=true;
                                }
                                if ( checkAnotherMailExist($email, $user->id) or !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                                    echo '<li>Email indisponible</li>';
                                    $erreurMail=true;
                                }
                                if ( !samePasswords($motDePasse, $confirmation) ) {
                                    echo '<li>Mot de passes ne correspondent pas</li>';
                                    $erreurMotDePasse=true;
                                }

                                ?>
                            </ul>
                        </div>
                        <?php

                        include __DIR__.'/../vues/formulaireEditProfil.php';
                    }
                    else {
                        // toutes les controles sont passées avec succees

                        editUser($user->id, $pseudonyme, $nom, $prenom, $motDePasse, $email, $dateNaiss, $sexe, $telephone, $adresse);

                        // on modifie la variable de session puisque la session est en cours
                        $_SESSION['user'] = $pseudonyme;
                        header('location: index.php?p=user');
                    }


                }

                ?>

            </div>
        </div>


    </div>

    <?php

    // footer de la page
    include __DIR__.'/../vues/footer.php';
}
?>

<!-- permet de vérifier certaines saisies dans le formulaire d'inscription -->
<script language="javascript">

    //permet de verifier si une erreur à été déclenché afin de ne pas afficher 2 fois le meme message d'erreur
    var erreurMail = false;
    var erreurMotDePasse = false;

    function verificationInscription() {

        var mailInput = document.getElementById('email');
        var mail = mailInput.value;
        var div = mailInput.parentNode.parentNode;
        var mailRegex =  /^[a-zA-Z0-9]+[a-zA-Z0-9\.-_]+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;

        var motDePasse = document.getElementById('motDePasse');
        var motDepasseConfirmation = document.getElementById('confirmation');
        var noeudParentMotDePasse = motDePasse.parentNode.parentNode;
        var noeudParentConfirmation = motDepasseConfirmation.parentNode.parentNode;
        var p = document.createElement('div');

        //si l'une des conditions ci-dessus est vraie on envoie pas le formulaire

        //si l'email saisie ne correspond pas au regex
        if ( !mailRegex.test(mail) ) {

            if (erreurMail==false) {
                p.setAttribute('class', 'help-block');
                div.appendChild(p);
                p.appendChild(document.createTextNode('n\'est pas valide'));
                erreurMail = true;
            }

            div.className = div.className + " has-error";
            return false;
        }

        //si les deux mots de passe ne correspondent pas
        if (motDePasse.value != motDepasseConfirmation.value) {

            if (erreurMotDePasse==false) {
                p.setAttribute('class', 'help-block');
                noeudParentConfirmation.appendChild(p);
                p.appendChild(document.createTextNode('ne correspond pas'));
                erreurMotDePasse = true;
            }

            noeudParentConfirmation.className = noeudParentConfirmation.className + " has-error";

            return false;
        }


        return true;
    }
</script>

<?php

// fonctions d'interactions avec la base de donnees
include __DIR__.'/../models/fonctionConnexionBdd.php';
include __DIR__.'/../models/fonctionFormulaire.php';


include __DIR__.'/../vues/navbar-top.php'

?>

<div class="container">

    <?php if ( !isset($_SESSION['user']) ) {  ?>

        <div class="row" style="margin-bottom: 50px">

            <!-- formulaire de connexion -->

            <div class="col-md-4">
                <h1 class="text-center text-success">Connexion</h1>
                <br>

                <?php

                if (!isset($_POST['emailConnexion']) ) { //premiere fois sur la page de connexion

                    include __DIR__ . '/../vues/formulaireConnexion.php';
                }
                else { // clik sur le bouton de soumission du formulaire de connexion

                    //recupération des données

                    $emailConnexion = securiserSaisie($_POST['emailConnexion']);
                    $motDePasseConnexion = securiserSaisie($_POST['motDePasseConnexion']);

                    // controle des donnees

                    if ( !checkUserExist($emailConnexion, $motDePasseConnexion))  {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Email</strong> ou <strong>mot de passe</strong> incorrect
                        </div>
                        <?php
                        include __DIR__ . '/../vues/formulaireConnexion.php';

                    }
                    else { // connexion réussie

                        $_SESSION['user'] = selectPseudonyme($emailConnexion, $motDePasseConnexion);
                        header('location: index.php?p=user');
                    }
                }

                ?>

            </div><!-- fin formulaire de connexion -->


            <!-- formulaire d'inscription -->

            <div class="col-md-8">
                <h1 class="text-center text-success">Inscription</h1>
                <br>

                <?php

                //permet de colorer les input sil y a erreur. variables utilisées dans le fichier formulaireInscription.php
                $erreurPseudonyme = false;
                $erreurMail = false;
                $erreurMotDePasse = false;

                if (!isset($_POST['pseudonyme']) ) { //premiere fois sur le formulaire d'inscription

                    include __DIR__ . '/../vues/formulaireInscription.php';
                }
                else { // clik sur le bouton de soumission du formulaire d'inscription

                    //recupération des données saisies

                    $pseudonyme = securiserSaisie($_POST['pseudonyme']);
                    $nom = securiserSaisie($_POST['nom']);
                    $prenom = securiserSaisie($_POST['prenom']);
                    $dateNaiss = securiserSaisie($_POST['dateNaiss']);
                    $email = securiserSaisie($_POST['email']);
                    $motDePasse = securiserSaisie($_POST['motDePasse']);
                    $confirmation = securiserSaisie($_POST['confirmation']);

                    // controle des donnée avec php

                    if ( checkMailExist($email) or checkPseudonymeExist($pseudonyme) or !samePasswords($motDePasse, $confirmation) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        ?>
                        <div class="alert alert-danger alert-dismissable col-md-offset-3 col-md-7">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span class="glyphicon glyphicon-warning-sign"></span>&nbsp;
                            Erreur de saisie.
                            <ul>
                                <?php

                                if ( checkPseudonymeExist($pseudonyme) ) {
                                    echo '<li>Pseudonyme indisponible</li>';
                                    $erreurPseudonyme=true;
                                }
                                if ( checkMailExist($email) or !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
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

                        include __DIR__ .'/../vues/formulaireInscription.php';
                    }
                    else { // toutes les controles sont passees avec succes

                        ajouterUser($pseudonyme, $nom, $prenom, $dateNaiss, $email, $motDePasse);
                        ?>
                        <div class="alert alert-success alert-dismissable col-md-offset-2 col-md-8 text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Votre inscription &agrave; &eacute;t&eacute; &eacute;ffectu&eacute;e avec suss&egrave;s.
                        </div>
                    <?php
                    }
                }

                ?>

            </div>
        </div>

    <?php
    }
    else { // s'il y a une session cours
        header('location: index.php?p=user');
    }
    ?>

</div>

<!-- footer -->
<?php include 'vues/footer.php' ?>









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

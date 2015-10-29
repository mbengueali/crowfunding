<?php ?>

<form class="form-horizontal" role="form" action="" method="post" onsubmit="return verificationInscription();">
    <div class="form-group <?php if ($erreurPseudonyme) echo 'has-error'; ?> ">
        <label for="user" class="col-md-3 control-label text-right">Pseudonyme</label>
        <div class="col-md-7">
            <input type="text" id="pseudonyme" name="pseudonyme" class="form-control" placeholder="Choisissez un nom pseudonyme"
                   value="<?php if (isset($_POST['pseudonyme'])) echo $_POST['pseudonyme']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="nom" class="col-md-3 control-label text-right">Nom</label>
        <div class="col-md-7">
            <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom"
                   value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="prenom" class="col-md-3 control-label text-right">Pr&eacute;nom</label>
        <div class="col-md-7">
            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre Pr&eacute;nom"
                   value="<?php if (isset($_POST['prenom'])) echo $_POST['prenom']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="dateNaiss" class="col-md-3 control-label text-right">Date de naissance</label>
        <div class="col-md-7">
            <input type="text" id="dateNaiss" name="dateNaiss" class="form-control" placeholder="Date de naissance"
                   value="<?php if (isset($_POST['dateNaiss'])) echo $_POST['dateNaiss']; ?>" />
        </div>
    </div>
    <div class="form-group <?php if ($erreurMail) echo 'has-error'; ?>">
        <label for="email" class="col-md-3 control-label text-right">Email</label>
        <div class="col-md-7">
            <input type="text" id="email" name="email" class="form-control" placeholder="Votre adresse email" required
                   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label for="motDePasse" class="col-md-3 control-label text-right">Mot de passe</label>
        <div class="col-md-7">
            <input type="password" id="motDePasse" name="motDePasse" class="form-control" placeholder="Mot de passe" required/>
        </div>
    </div>
    <div class="form-group <?php if ($erreurMotDePasse) echo 'has-error'; ?>">
        <label for="confirmation" class="col-md-3 control-label text-right">Confirmation </label>
        <div class="col-md-7">
            <input type="password" id="confirmation" name="confirmation" class="form-control" placeholder="Confirmer votre mot de passe" required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-3 col-md-7">
            <div class="checkbox">
                <label for="conditions">
                    <input type="checkbox" id="conditions" class="checkbox"/>
                    J'ai lu et j'accepte les <a href="#">Conditions G&eacute;n&eacute;rales <br>d'Utilisations</a> du site Urgence Delta
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-3 col-md-7">
            <button type="submit" class="btn btn-success">
                S'inscrire <span class="glyphicon glyphicon-ok-sign"></span>
            </button>
        </div>
    </div>
</form>
<?php ?>

<form class="form-horizontal" role="form" action="" method="post" onsubmit="return verificationInscription();">
    <div class="form-group <?php if ($erreurPseudonyme) echo 'has-error'; ?> ">
        <label for="user" class="col-md-3 control-label text-right">Pseudonyme</label>
        <div class="col-md-7">
            <input type="text" id="pseudonyme" name="pseudonyme" class="form-control" placeholder="Choisissez un nom pseudonyme"
                   value="<?php if (isset($user->pseudonyme)) echo $user->pseudonyme; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="nom" class="col-md-3 control-label text-right">Nom</label>
        <div class="col-md-7">
            <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom"
                   value="<?php if (isset($user->nom)) echo $user->nom; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="prenom" class="col-md-3 control-label text-right">Pr&eacute;nom</label>
        <div class="col-md-7">
            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre Pr&eacute;nom"
                   value="<?php if (isset($user->prenom)) echo $user->prenom; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="dateNaiss" class="col-md-3 control-label text-right">Date de naissance</label>
        <div class="col-md-7">
            <input type="text" id="dateNaiss" name="dateNaiss" class="form-control" placeholder="Date de naissance"
                   value="<?php if (isset($user->date_de_naissance)) echo transformDateReverse($user->date_de_naissance); ?>" />
        </div>
    </div>
    <div class="form-group <?php if ($erreurMail) echo 'has-error'; ?>">
        <label for="email" class="col-md-3 control-label text-right">Email</label>
        <div class="col-md-7">
            <input type="text" id="email" name="email" class="form-control" placeholder="Votre adresse email" required
                   value="<?php if (isset($user->mail)) echo $user->mail; ?>" />
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
        <label for="sexe" class="col-md-3 control-label text-right">Sexe </label>
        <div class="col-md-2">
            <select class="form-control" name="sexe" id="sexe">
                <option>Masculin</option>
                <option>F&eacute;minin</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="telephone" class="col-md-3 control-label text-right">T&eacute;l&eacute;phone</label>
        <div class="col-md-7">
            <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Votre Num&eacute;ro de T&eacute;l&eacute;phone"
                   value="<?php if (isset($user->telephone)) echo $user->telephone; ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="adresse" class="col-md-3 control-label text-right">Adresse</label>
        <div class="col-md-7">
            <textarea class="form-control" rows="3" id="adresse" name="adresse">
                <?php if (isset($user->adresse)) echo $user->adresse; ?>
            </textarea>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-offset-3 col-md-7 text-right">
            <a class="btn btn-default" href="index.php?p=user">
                <span class="glyphicon glyphicon-chevron-left"></span>
                Annuler
            </a>
            <button type="submit" class="btn btn-info">
                <span class="glyphicon glyphicon-edit"></span> Modifier
            </button>
        </div>
    </div>
</form>
<?php ?>

<form role="form" action="" method="post">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> </span>
            <input type="text" class="form-control" placeholder="Votre adresse email" required name="emailConnexion"
                   value="<?php if (isset($_POST['emailConnexion'])) echo $_POST['emailConnexion']; ?>" />
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove-circle"></span> </span>
            <input type="password" class="form-control" placeholder="Votre mot de passe" required name="motDePasseConnexion"
                   value="<?php if (isset($_POST['motDePasseConnexion'])) echo $_POST['motDePasseConnexion']; ?>" />
        </div>
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-success pull-right">Connexion <span class="glyphicon glyphicon-log-in"></span></button>
    </div>
</form>
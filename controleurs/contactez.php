<?php include 'vues/navbar-top.php' ?>

<div class="container">
    <div class="row" style="margin-bottom: 50px">
        
        <div class="col-md-8">
            <h1 class="text-center text-success">Nous contacter</h1>
            <br>
            <form class="form-horizontal" role="form" action="?p=envoie" method="post">
               
                <div class="form-group">
                    <label for="nom" class="col-md-3 control-label text-right">Nom</label>
                    <div class="col-md-7">
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom"/>
                    </div>
                </div>
				 <div class="form-group">
                    <label for="email" class="col-md-3 control-label text-right">Email</label>
                    <div class="col-md-7">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Votre adresse email"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prenom" class="col-md-3 control-label text-right">Objet:</label>
                    <div class="col-md-7">
                        <input type="text" id="prenom" name="objet" class="form-control" placeholder="Votre Pr&eacute;nom"/>
                    </div>
                </div>
             
               
                
                <div class="form-group">
                    <label for="confirmation" class="col-md-3 control-label text-right">Texte </label>
                    <div class="col-md-7">
                        <textarea name="texte" rows="8" cols="63"></textarea><br>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-7">
                        <button type="submit" class="btn btn-success">
                            Envoyer <span class="glyphicon glyphicon-ok-sign"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- footer -->
<?php include 'vues/footer.php' ?>

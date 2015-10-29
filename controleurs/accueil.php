<?php include 'vues/navbar-top.php' ?>

<div class="container">

    <!-- header -->
    <?php include 'vues/header.php' ?>

    <?php include "vues/slider.php" ?>

    <div class="row" style="margin-top: 30px; margin-bottom: 30px">
        <div class="col-md-12">
            <h2 id="section-1" align="center">Financer vos projets en reseau </h2>
            <p>
               Appelé aussi financement participatif, le crowdfunding est le fait de financer des projets via 
			   un grand nombre de personnes physiques ou morales, chacune apportant une petite somme d’argent.
			   
			   Il est très largement développé dans les secteurs artistique, culturel et humanitaire.
			   N'attendez plus, venez aider les jeunes porteurs de projets à atteindre leur objectif.
            </p>
        </div>
    </div>

    <!-- liste des projets -->
    <div class="row">
        <div class="col-md-12">
            <h2 style="color: #339966 !important ;text-align:center">Les Projets Populaires</h2><br>
            <?php include "vues/projets.php" ?>
            <?php include "vues/projets2.php" ?>
        </div>
    </div>

    <!--contenu -->
    <?php include 'vues/content.php' ?>

    <!-- mentors -->
    <?php include 'vues/mentors.php'; ?>

</div>

<!-- footer -->
<?php include 'vues/footer.php' ?>

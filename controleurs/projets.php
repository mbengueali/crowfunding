<?php include 'vues/navbar-top.php'; ?>

<div class="container">
    <div class="row header">
        <h1 class="text-center" style="color: #339966">Les Projets</h1>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li><a href="#tous" data-toggle="tab">Tous &nbsp;<span class="badge">12</span></a></li>
                    <li class="active"><a href="#encours" data-toggle="tab">En cours &nbsp;<span class="badge">5</span></a></li>
                    <li><a href="#finances" data-toggle="tab">Financ&eacute;s &nbsp;<span class="badge">7</span></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tous" style="margin-top: 30px">
                        <?php include 'vues/projets.php'; ?>
                        <?php include 'vues/projets2.php'; ?>
                        <?php include 'vues/projets.php'; ?>
                    </div>
                    <div class="tab-pane active" id="encours" style="margin-top: 30px">
                        <?php include 'vues/projets2.php'; ?>
                    </div>
                    <div class="tab-pane fade" id="finances" style="argin-top: 30px">
                        <?php include 'vues/projets.php'; ?>
                        <?php include 'vues/projets.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- footer -->
<?php include 'vues/footer.php' ?>
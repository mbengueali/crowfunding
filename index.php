<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Urgence Delta | Le financement participatif de la vall&eacute;e du fleuve S&eacute;n&eacute;gal </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/normalize.css" rel="stylesheet" media="screen">
    <link href="css/style1.css" rel="stylesheet"/>
    <link href="css/datepicker.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php

if ( !empty($_GET['p']) && is_file('controleurs/'.$_GET['p'].'.php')) {
    include 'controleurs/'.$_GET['p'].'.php';
}
else {
    include 'controleurs/accueil.php';
}
?>


<!-- chargement des différents scripts  -->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/normalize.js"></script>
<script src="js/datepicker.js"></script>
<script>
    $(function() {

        $('#dateNaiss').datepicker();

        $('.pop').popover({
            'trigger': 'hover',
            'placement': 'left'
        });

        $('.carousel').carousel();

    });
</script>
</body>
</html>

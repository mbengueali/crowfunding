<?php

$vars = array("nom", "email","objet", "texte");
foreach($vars as $var)
	if(isset($_POST[$var]))
		$$var = $_POST[$var];
	else
		$$var = '';
$expediteur = "kingmef@gmail.com";
$expediteurIP = $_SERVER[REMOTE_ADDR];


$corpsDuMail = "Demande d'informations :
Nom : $nom
eMail : $email
Objet : $objet
Message :
$message";
mail($expediteur, "Nouveau message...", $corpsDuMail, "de: $mail");
print "Mail envoyé...";

	?>
	<script language="JavaScript">
	
	window.location.replace("?p=contactez");
	</script>
	<?php
?>

<?php

function selectUser($pseudonyme) {

    $query = "SELECT *,DATE_FORMAT(date_de_naissance, '%d-%m-%Y') as date_de_naissance FROM users WHERE pseudonyme='$pseudonyme'";
    $result = mysql_query($query) or die(mysql_error());
    $data = mysql_fetch_object($result);

    return $data;
}

function editUser($ancienId ,$pseudonyme, $nom, $prenom, $motDePasse, $mail, $dateNaiss, $sexe, $telephone, $adresse) {

    $query = "UPDATE users SET pseudonyme='$pseudonyme', nom='$nom', prenom='$prenom',
    mot_de_passe='$motDePasse', mail='$mail', date_de_naissance='".transformDate($dateNaiss)."',
    sexe='$sexe', telephone='$telephone', adresse='$adresse' WHERE id='$ancienId'";
    $result = mysql_query($query) or die(mysql_error());
}
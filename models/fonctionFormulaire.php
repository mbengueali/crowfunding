<?php

// permet de sécuriser la saise dans les champs de formulaires

function securiserSaisie($chaine) {

    $chaine = stripslashes($chaine);
    $chaine = htmlentities($chaine);
    $chaine = strip_tags($chaine);
    $chaine = addslashes($chaine);

    return $chaine;
}

// vérifie si un mail existe dans la database

function checkMailExist($mail) {

    $query = "SELECT mail FROM users WHERE mail='$mail'";
    $result = mysql_query($query)  or die (mysql_error());
    $data = mysql_fetch_object($result);

    if (is_object($data)) {
        return true;
    }
    else {
        return false;
    }
}

// vérifie si un mail existe autre que celui d'un user dans la database

function checkAnotherMailExist($mail, $id) {

    $query = "SELECT mail FROM users WHERE mail='$mail' AND id!='$id'";
    $result = mysql_query($query)  or die (mysql_error());
    $data = mysql_fetch_object($result);

    if (is_object($data)) {
        return true;
    }
    else {
        return false;
    }
}

// vérifie si un pseudonyme existe dans la database

function checkPseudonymeExist($pseudonyme) {

    $query ="SELECT pseudonyme FROM users WHERE pseudonyme ='$pseudonyme'";
    $result = mysql_query($query)  or die (mysql_error());
    $data = mysql_fetch_object($result);

    if (is_object($data)) {
        return true;
    }
    else {
        return false;
    }

}

// vérifie si un AUTRE pseudonyme que celui du user existe dans la database

function checkAnotherPseudonymeExist($pseudonyme, $id) {

    $query ="SELECT pseudonyme FROM users WHERE pseudonyme ='$pseudonyme' AND id!='$id'";
    $result = mysql_query($query)  or die (mysql_error());
    $data = mysql_fetch_object($result);

    if (is_object($data)) {
        return true;
    }
    else {
        return false;
    }

}

// verifie si c'est le meme mot de passe

function samePasswords($pwd1, $pwd2) {
    if ($pwd1 == $pwd2) {
        return true;
    }
    else {
        return false;
    }
}

// vérifie les parametres de connexion d'un user

function checkUserExist($email, $motDePasse) {

    $query = "SELECT pseudonyme FROM users WHERE mail='$email' AND mot_de_passe='$motDePasse'";
    $result = mysql_query($query) or die(mysql_error());
    $data = mysql_fetch_object($result);

    if (is_object($data)) {
        return true;
    }
    else {
        return false;
    }
}

// permet de transformer la date datepicker en date mysql

function transformDate($datePicker)
{
    list($mois, $jour, $annee) = explode("/", $datePicker);
    $dateMysql = $annee."-".$mois."-".$jour;
    return $dateMysql;
}

function transformDateReverse($dateMysql)
{
    list($jour, $mois, $annee) = explode("-", $dateMysql);
    $datePicker = $mois."/".$jour."/".$annee;
    return $datePicker;
}

// permet d'ajouter un nouveau user dans la database

function ajouterUser($pseudonyme, $nom, $prenom, $dateNaiss, $mail, $motDePasse) {

    $query = "INSERT INTO users(pseudonyme, nom, prenom, date_de_naissance, mail, mot_de_passe)
    VALUES('$pseudonyme', '$nom', '$prenom','".transformDate($dateNaiss)."' , '$mail', '$motDePasse')";

    $result = mysql_query($query) or die(mysql_error());
}

// permet de selectionner le pseudonyme afin de l'utiliser comme varaible de session

function selectPseudonyme($email, $motDePasse) {

    $query = "SELECT pseudonyme FROM users WHERE mail='$email' AND mot_de_passe='$motDePasse'";
    $result = mysql_query($query) or die(mysql_error());
    $data = mysql_fetch_object($result);

    if (is_object($data)) {
        return $data->pseudonyme;
    }
    else {
        return null;
    }
}
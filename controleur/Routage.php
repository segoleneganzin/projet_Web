<?php

/**
 *	Module du routing (routage).
 *	Chaque action est récupérée par la méthode : $_GET
 */

function redirigeVers($action = "defaut")
{

    $lesActions = [];
    $lesActions["defaut"] = "ChoixRole.php";
    $lesActions["deconnexion"] = "Deconnexion.php";
    $lesActions["connexion"] = "Authentification.php";
    //*********************************************************Parcours praticien
    $lesActions["inscription"] = "Inscription.php";
    $lesActions["connexion-praticien"] = "Authentification.php";
    $lesActions["rdv-praticien"] = "Rdv.php";
    $lesActions["creation-patient"] = "CreationPatient.php";
    $lesActions["recherche"] = "Recherche.php";
    $lesActions["fiche-patient"] = "FichePatient.php";
    //*********************************************************Parcours Patient
    $lesActions["connexion-patient"] = "Authentification.php";
    $lesActions["rdv-patient"] = "ProfilPatient.php";

    //Pour les tests
    $lesActions["scripts"] = "TestC.php";

    $controler_id = $lesActions[$action];

    //si le fichier n'existe pas :
    if (!file_exists(__DIR__ . '/' . $controler_id)) die("Le fichier : " . $controler_id . " n'existe pas !");

    //si la clé "action" existe dans notre tableau "lesActions" :
    if (array_key_exists($action, $lesActions)) {
        // le fichier à inclure sera retourné :
        return $controler_id;
    } else {
        return $lesActions["defaut"];
    }
}

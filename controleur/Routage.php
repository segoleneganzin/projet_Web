<?php

/**
 *	Module du routing (routage).
 *	Chaque action est récupérée par la méthode : $_GET
 */

function redirigeVers($action = "defaut")
{

    $lesActions = [];
    //pour les tests :
    // $lesActions["defaut"] = "TestC.php";
    // Sinon :
    $lesActions["defaut"] = "ChoixRole.php";
    $lesActions["deconnexion"] = "Deconnexion.php";
    $lesActions["notFound"] = "NotFound.php";
    //Pour l'authentification :
    $lesActions["connexion"] = "Authentification.php";
    //*********************************************************Parcours praticien
    $lesActions["inscription"] = "Inscription.php";
    $lesActions["connexion-praticien"] = "Authentification.php";
    $lesActions["rdv-praticien"] = "Rdv.php";
    $lesActions["profil-praticien"] = "ProfilPraticien.php";
    $lesActions["creation-patient"] = "CreationPatient.php";
    //*********************************************************Parcours Patient
    $lesActions["connexion-patient"] = "Authentification.php";
    $lesActions["rdv-patient"] = "Rdv.php";



    //Pour les tests
    $lesActions["accueil"] = "TestC.php";


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

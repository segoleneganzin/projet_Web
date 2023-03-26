<?php

/**
 *	Controleur secondaire : connexion 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// require_once "../metier/Authentification.php";

// creation du menu burger
// $menuBurger = array();
// $menuBurger[] = ["url" => "./?action=connexion", "label" => "Connexion"];
// $menuBurger[] = ["url" => "./?action=inscription", "label" => "Inscription"];

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mailU"]) && isset($_POST["mdpU"])) {
    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];
} else {
    $mailU = null;
    $mdpU = null;
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
// login($mailU, $mdpU);

// if (isLoggedOn()) { // si l'utilisateur est connecté on redirige vers le controleur monProfil
//     include RACINE . "/controleur/monProfil.php";
// } else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
//     // appel du script de vue 
$titre = "authentification";
include RACINE . "/vue/Entete.html.php";
include RACINE . "/vue/VueAuthentification.php";
include RACINE . "/vue/Pied.html.php";
// }

<?php

/**
 *	Controleur secondaire : authentification 
 */

// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, AUTHENTIFICATION);

// recuperation des donnees POST
if (isset($_POST["mail"]) && isset($_POST["mdp"])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    // connexion
    \Promed\Authentification\Authentification::login($mail, $mdp);
} else {
    $mail = null;
    $mdp = null;
}

if (\Promed\Authentification\Authentification::isLoggedOn()) { // si l'utilisateur est connecte on redirige vers le controleur praticien
    //if role = praticien :
    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        if ($role == "praticien") {
            header("Location: ?action=rdv-praticien");
        } else {
            header("Location: ?action=rdv-patient");
        }
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue avec le titre associé
    $titre = "Authentification";
    vueAuthentification($titre);
}

<?php

/**
 * Controleur secondaire : choix role
 */

// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, CHOIXROLE);

if (\Promed\Authentification\Authentification::isLoggedOn()) { // si l'utilisateur est connecte on le redirige
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") { // l'utilisateur est un praticien, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-praticien');
    } else { // l'utilisateur est un patient, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-patient');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le choix du role
    // appel du script de vue avec le titre associé
    $titre = "Bienvenue";
    vueChoixrole($titre);
}

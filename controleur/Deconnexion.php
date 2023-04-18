<?php

/**
 *	Controleur secondaire : deconnexion 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, DECONNEXION);

// traitement si necessaire des donnees recuperees
\Promed\Authentification\Authentification::logout();

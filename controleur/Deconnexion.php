<?php
require_once RACINE . "/metier/Identite.php";
require_once RACINE . "/metier/Authentification.php";
require_once RACINE . "/db/Connexion.php";
require_once RACINE . "/db/DAO.php";
require_once RACINE . "/db/IdentiteDAO.php";
/**
 *	Controleur secondaire : deconnexion 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// traitement si necessaire des donnees recuperees
\Promed\Authentification\Authentification::logout();

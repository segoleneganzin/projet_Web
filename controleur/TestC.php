<?php

/**
 *	Controleur secondaire : listeRestos
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}


require RACINE . "/db/Connexion.php";
require RACINE . "/db/DAO.php";

require RACINE . "/db/IdentiteDAO.php";
require RACINE . "/metier/Identite.php";
require RACINE . "/db/AdresseDAO.php";
require RACINE . "/metier/Adresse.php";

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Promed";
include RACINE . "/vue/entete.html.php";

include RACINE . "/vue/TestV.php";
include RACINE . "/vue/Pied.html.php";

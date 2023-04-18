<?php

/**
 *	Controleur secondaire : test de connexion a la bd
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les fichiers nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, TESTC);

// appel du script de vue avec le titre associé
$titre = "Promed";
vueTest($titre);

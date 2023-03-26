<?php

/*** Controleur principal ***/

// //D�pendances :
// require dirname(__FILE__) . "/controleur/config.php";
// require RACINE . "/db/Connexion.php"; // Param�tres de connexion MySQL
// require RACINE . "/db/IdentiteDAO.php";
// require RACINE . "/metier/Identite.php";
// require RACINE . "/vue/Vue.php"; // La vue

// // echo \DAO\Identite\IdentiteDAO::getIdentites();


require dirname(__FILE__) . "/controleur/Config.php";

require RACINE . "/controleur/Routage.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirigeVers($action);
require RACINE . "/controleur/" . $fichier;

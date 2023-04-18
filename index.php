<?php

/*** Controleur principal ***/


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

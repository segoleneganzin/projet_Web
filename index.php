<?php

/*** Controleur principal ***/

//D�pendances :
require dirname(__FILE__) . "/controleur/config.php";
require RACINE . "/db/Connexion.php"; // Param�tres de connexion MySQL
require RACINE . "/db/IdentiteDAO.php";
require RACINE . "/metier/Identite.php";
require RACINE . "/vue/Vue.php"; // La vue

// echo \DAO\Identite\IdentiteDAO::getIdentites();

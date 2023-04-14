<?php
require_once RACINE . "/metier/Identite.php";
require_once RACINE . "/metier/Authentification.php";
require_once RACINE . "/db/Connexion.php";
require_once RACINE . "/db/DAO.php";
require_once RACINE . "/db/IdentiteDAO.php";

if (\Promed\Authentification\Authentification::isLoggedOn()) {
    $titre = "Profil praticien";
    if (isset($_GET["action"]) && $_GET["action"] == "profil-praticien") {
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {
            include RACINE . "/vue/Entete.html.php";
            include RACINE . "/vue/VueProfilPraticien.php";
        }
    } else {
        $titre = "Authentification";
        include RACINE . "/vue/VueAuthentification.php";
    }
}

include RACINE . "/vue/Pied.html.php";

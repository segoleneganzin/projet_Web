<!-- TODO : gerer l'affichage des vues selon praticien (VueRdvPraticien) / patient (VueRdvPatient) -->
<?php
require_once RACINE . "/metier/Identite.php";
require_once RACINE . "/metier/Authentification.php";
require_once RACINE . "/db/Connexion.php";
require_once RACINE . "/db/DAO.php";
require_once RACINE . "/db/IdentiteDAO.php";

include RACINE . "/vue/Entete.html.php";
if (\Promed\Authentification\Authentification::isLoggedOn()) {
    $titre = "Mes rendez-vous";
    if (isset($_GET["action"]) && $_GET["action"] == "rdv-praticien") {
        include RACINE . "/vue/VueRdvPraticien.php";
    } else {
        include RACINE . "/vue/VueRdvPatient.php";
    }
} else {
    $titre = "Authentification";
    include RACINE . "/vue/VueAuthentification.php";
}

include RACINE . "/vue/Pied.html.php";

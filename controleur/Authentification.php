<?php
require_once RACINE . "/metier/Identite.php";
require_once RACINE . "/metier/Authentification.php";
require_once RACINE . "/db/Connexion.php";
require_once RACINE . "/db/DAO.php";
require_once RACINE . "/db/IdentiteDAO.php";

/**
 *	Controleur secondaire : authentification 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mail"]) && isset($_POST["mdp"])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    // connexion
    \Promed\Authentification\Authentification::login($mail, $mdp);
} else {
    $mail = null;
    $mdp = null;
}

if (\Promed\Authentification\Authentification::isLoggedOn()) { // si l'utilisateur est connecte on redirige vers le controleur praticien
    //if role = praticien :
    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        if ($role == "praticien") {
            header("Location: ?action=rdv-praticien");
        } else {
            header("Location: ?action=rdv-patient");
        }
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Authentification";
    include RACINE . "/vue/Head.html.php";
    include RACINE . "/vue/VueAuthentification.php";
    include RACINE . "/vue/Pied.html.php";
}

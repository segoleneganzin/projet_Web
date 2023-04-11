<?php
require_once RACINE . "/db/Connexion.php";
require_once RACINE . "/db/DAO.php";
require_once RACINE . "/metier/Inscription.php";
require_once RACINE . "/metier/Identite.php";
require_once RACINE . "/db/IdentiteDAO.php";
require_once RACINE . "/metier/Adresse.php";
require_once RACINE . "/db/AdresseDAO.php";
require_once RACINE . "/metier/Praticien.php";
require_once RACINE . "/db/PraticienDAO.php";
require_once RACINE . "/metier/Authentification.php";



/**
 *	Controleur secondaire : inscription 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["num"]) && isset($_POST["rue"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["specialite"]) && isset($_POST["description"]) && isset($_POST["mdp"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $num = $_POST["num"];
    $rue = $_POST["rue"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];
    $specialite = $_POST["specialite"];
    $description = $_POST["description"];
    $mdp = $_POST["mdp"];
    // inscription
    \Promed\Inscription\Inscription::inscriptionPraticien($nom, $prenom, $tel, $email, $num, $rue, $cp, $ville, $specialite, $description, $mdp);
    // connexion
    \Promed\Authentification\Authentification::login($emailId, $mdp);
    $_SESSION["mail"] = $emailId;
    $_SESSION["mdp"] = $mdp;
    $_SESSION["role"] = "praticien";
    header('Location: ?action=connexion');

    //TODO redirection à l'inscription

} else {
    $nom = null;
    $prenom = null;
    $tel = null;
    $email = null;
    $num = null;
    $rue = null;
    $cp = null;
    $ville = null;
    $specialite = null;
    $description = null;
    $mdp = null;
}

$titre = "Inscription";
include RACINE . "/vue/Head.html.php";
include RACINE . "/vue/VueInscription.php";
include RACINE . "/vue/Pied.html.php";

<?php

/**
 *	Controleur secondaire : inscription 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les fichiers nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, INSCRIPTION);

// recuperation des donnees POST
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

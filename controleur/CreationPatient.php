<?php

/**
 *	Controleur secondaire : creation patient 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les fichiers nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, CREATIONPATIENT);

// recuperation des donnees POST
if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["date_naissance"]) && isset($_POST["tel"]) && isset($_POST["email"]) && isset($_POST["num"]) && isset($_POST["rue"]) && isset($_POST["cp"]) && isset($_POST["ville"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $num = $_POST["num"];
    $rue = $_POST["rue"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];

    //pour generer un mdp (ex : DUPOND02111990)
    // $formatage_date_naissance = $date_naissance->format('d-m-Y');
    // $formatage_nom = str_replace(" ", "", $nom);
    // $nomMdp = strtoupper($formatage_nom);
    // $dateMdp = str_replace("-", "", $formatage_date_naissance);
    // $mdp = $nomMdp . $dateMdp;

    //mot de passe pour les test
    $mdp = "toto";

    // inscription
    \Promed\Inscription\Inscription::inscriptionPatient($nom, $prenom, $date_naissance, $tel, $email, $num, $rue, $cp, $ville, $mdp);
} else {
    $nom = null;
    $prenom = null;
    $tel = null;
    $date_naissance = null;
    $email = null;
    $num = null;
    $rue = null;
    $cp = null;
    $ville = null;
    $mdp = null;
}

$titre = "Nouvelle fiche patient";
if (\Promed\Authentification\Authentification::isLoggedOn()) {
    include RACINE . "/vue/Entete.html.php";
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {
        include RACINE . "/vue/VueCreationPatient.php";
        //TODO TESTER
        define("VUE", RACINE . "/vue/");
        include VUE . "/VueCreationPatient.php";
    } else {
        $titre = "Authentification";
        include RACINE . "/vue/VueAuthentification.php";
    }
}
include RACINE . "/vue/Pied.html.php";

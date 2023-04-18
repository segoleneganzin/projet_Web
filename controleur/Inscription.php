<?php

/**
 *	Controleur secondaire : inscription 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, INSCRIPTION);

if (\Promed\Authentification\Authentification::isLoggedOn()) { // si l'utilisateur est connecte on le redirige
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") { // l'utilisateur est un praticien, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-praticien');
    } else { // l'utilisateur est un patient, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-patient');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire d'inscription

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

    // appel du script de vue avec le titre associé
    $titre = "Inscription";
    vueInscription($titre);
}

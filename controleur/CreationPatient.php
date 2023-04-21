<?php

/**
 *	Controleur secondaire : creation patient 
 */

// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, CREATIONPATIENT);

if (\Promed\Authentification\Authentification::isLoggedOn()) {
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {

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
            $timestamp_date = strtotime($date_naissance);
            $formatage_date_naissance = date('d-m-Y', $timestamp_date);
            $formatage_nom = str_replace(" ", "", $nom);
            $nomMdp = strtoupper($formatage_nom);
            $dateMdp = str_replace("-", "", $formatage_date_naissance);
            $mdp = $nomMdp . $dateMdp;

            //mot de passe pour les test
            // $mdp = "toto";

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

        // appel du script de vue avec le titre associé
        $titre = "Nouvelle fiche patient";
        vueCreationPatient($titre);
    } else { // l'utilisateur est un patient, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-patient');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Authentification";
    header('Location: ?action=connexion');
}

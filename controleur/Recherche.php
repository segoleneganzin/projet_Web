<?php

/**
 *	Controleur secondaire : Recherche
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les fichiers nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, RECHERCHE);

if (\Promed\Authentification\Authentification::isLoggedOn()) {
    if (isset($_GET["action"]) && $_GET["action"] == "recherche") {
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {
            $identiteDao = new DAO\Identite\IdentiteDAO();

            $titre = "Recherche Patient";

            $url = 'fiche-patient';

            $identites = $identiteDao->readAllPatients();

            if (isset($_POST['submit'])) {
                $selectedId = $_POST['id_identite'];
                header("Location: ?action=fiche-patient&id=$selectedId");
                // empêche l'exécution d'autres instructions pour éviter erreur
                exit();
            }

            include RACINE . "/vue/Entete.html.php";
            include RACINE . "/vue/VueRecherche.php";
            include RACINE . "/vue/Pied.html.php";
        }
    }
} else {
    $titre = "Authentification";
    header('Location: ?action=connexion');
}

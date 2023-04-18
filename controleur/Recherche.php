<?php

/**
 *	Controleur secondaire : Recherche
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, RECHERCHE);

if (\Promed\Authentification\Authentification::isLoggedOn()) {
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {
        $identiteDao = new DAO\Identite\IdentiteDAO();

        $identites = $identiteDao->readAllPatients();

        if (isset($_POST['submit'])) {
            $selectedId = $_POST['id_identite'];
            header("Location: ?action=fiche-patient&id=$selectedId");
            // empêche l'exécution d'autres instructions pour éviter erreur
            exit();
        }

        // appel du script de vue avec le titre associé
        $titre = "Recherche Patient";
        vueRecherche($titre, $identites);
    } else { // l'utilisateur est un patient, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-patient');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Authentification";
    header('Location: ?action=connexion');
}

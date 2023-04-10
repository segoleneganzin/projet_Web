<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

require RACINE . "/db/Connexion.php";
require RACINE . "/db/DAO.php";
require RACINE . "/db/IdentiteDAO.php";
require RACINE . "/metier/Identite.php";
require RACINE . "/db/AdresseDAO.php";
require RACINE . "/metier/Adresse.php";

$identiteDao = new DAO\Identite\IdentiteDAO();

$url = 'fiche-patient';

$identites = $identiteDao->readAll();

if (isset($_POST['submit'])) {
    $selectedId = $_POST['identite_id'];
    header("Location: ?action=fiche-patient&id=$selectedId");
    // empêche l'exécution d'autres instructions pour éviter erreur
    exit();
}

$titre = "Rechercher";
include RACINE . "/vue/Entete.html.php";
include RACINE . "/vue/VueRecherche.php";
include RACINE . "/vue/Pied.html.php";

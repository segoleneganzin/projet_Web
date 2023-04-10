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
// Récupération de l'identifiant du patient depuis l'URL
if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];
} else {
    // Si l'identifiant n'est pas présent dans l'URL, on redirige vers la page de recherche
    header("Location: ?action=recherche");
    exit;
}

$fiche = $identiteDao->read($patient_id);
$adr = $fiche->getAdresse()->getNum() . " " . $fiche->getAdresse()->getRue() . " " .
    $fiche->getAdresse()->getCp() . " " . $fiche->getAdresse()->getVille();

if (isset($_POST['submit'])) {
    echo "rdv posé";
}

$titre = "Fiche Patient";
include RACINE . "/vue/Entete.html.php";
include RACINE . "/vue/VueFichePatient.php";
include RACINE . "/vue/Pied.html.php";

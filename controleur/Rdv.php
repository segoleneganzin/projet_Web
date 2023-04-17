<?php
session_start();

use Promed\Identite\Identite;

require_once RACINE . "/metier/Identite.php";
require_once RACINE . "/metier/Authentification.php";
require_once RACINE . "/db/Connexion.php";
require_once RACINE . "/db/DAO.php";
require_once RACINE . "/db/IdentiteDAO.php";
require_once RACINE . "/db/RdvDAO.php";
require_once RACINE . "/metier/Rdv.php";
require_once RACINE . "/db/PraticienDAO.php";
require_once RACINE . "/metier/Praticien.php";
require RACINE . "/db/AdresseDAO.php";
require RACINE . "/metier/Adresse.php";
require_once RACINE . "/db/PatientDAO.php";
require_once RACINE . "/metier/Patient.php";
require_once RACINE . "/db/ConsultationDAO.php";
require_once RACINE . "/metier/Consultation.php";

$praticienDAO = new DAO\Praticien\PraticienDAO();
$RdvDAO = new \DAO\Rdv\RdvDAO();

// ici on récupère les infos du praticien grace à son mail, et on transforme les données en objet
$infoIdentite = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($_SESSION["mail"]);
$IdentiteObj = new Identite(
    $infoIdentite["prenom"],
    $infoIdentite["nom"],
    $infoIdentite["tel"],
    $infoIdentite["mail"],
    $infoIdentite["mdp"],
    $infoIdentite["role"],
    $infoIdentite["id_adresse"]
);

// ici on récupère l'ID du praticien pour pouvoir afficher les rendez-vous du praticien connecté 
$idIdentite = $infoIdentite["id_identite"];
$idPraticien = $praticienDAO->readByIdIdentite($idIdentite)->getId();
$rdvs = \Promed\Praticien\Praticien::getRdvPraticien($idPraticien);


if (isset($_POST['submit'])) {
    $dateSelect = $_POST['date'];
} else {
    $dateSelect = date('Y-m-d');
}

if (isset($_POST['suppr'])) {
    $id = $_POST['id'];
    $RdvDAO->delete($id);
    echo "<script>alert('Le rendez-vous a bien été supprimé.');</script>";
    header("Refresh:0");
}

// Quelques lignes pour le test
//$test = new \DAO\Rdv\RdvDAO;
//$test2 = $test->readAllRdv();
//var_dump($infoIdentite);
//var_dump($IdentiteObj);
//var_dump($test2);
//var_dump($rdvs);
//var_dump($dateSelect);

if (\Promed\Authentification\Authentification::isLoggedOn()) {
    $titre = "Mes rendez-vous";
    if (isset($_GET["action"]) && $_GET["action"] == "rdv-praticien") {
        include RACINE . "/vue/Entete.html.php";
        include RACINE . "/vue/VueRdvPraticien.php";
    } else {
        include RACINE . "/vue/Entete.html.php";
        include RACINE . "/vue/VueRdvPatient.php";
    }
} else {
    $titre = "Authentification";
    include RACINE . "/vue/VueAuthentification.php";
}

include RACINE . "/vue/Pied.html.php";

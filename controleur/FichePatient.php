<?php
session_start();

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
require RACINE . "/db/RdvDAO.php";
require RACINE . "/metier/Rdv.php";
require RACINE . "/db/PraticienDAO.php";
require RACINE . "/metier/Praticien.php";
require RACINE . "/db/ConsultationDAO.php";
require RACINE . "/metier/Consultation.php";

$identiteDao = new DAO\Identite\IdentiteDAO();
$praticienDAO = new DAO\Praticien\PraticienDAO();
$consultationDao = new DAO\Consultation\ConsultationDAO();
$rdvDAO = new DAO\Rdv\RdvDAO();

// Récupération de l'identifiant du patient depuis l'URL
if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];
} else {
    // Si l'identifiant n'est pas présent dans l'URL, on redirige vers la page de recherche
    header("Location: ?action=recherche");
    exit;
}

// récupérer les informations du patient
$fiche = $identiteDao->read($patient_id);
$adr = $fiche->getAdresse()->getNum() . " " . $fiche->getAdresse()->getRue() . " " .
    $fiche->getAdresse()->getCp() . " " . $fiche->getAdresse()->getVille();

// récupérer l'Id Praticien : on prend le mail, on trouve l'idIdentite, et on l'utilise pour trouver IdPraticien
//$infoIdentite = $identiteDao->getUtilisateurByMailU($_SESSION["mail"]);
$infoIdentite = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($_SESSION["mail"]);
$idIdentite = $infoIdentite["id_identite"];
$idPraticien = $praticienDAO->readByIdIdentite($idIdentite)->getId();

//Obtenir les types de consultations
$consultations = $consultationDao->readAllConsultation();


//var_dump($infoIdentite["id_identite"]);
//var_dump($infoIdentite);
//var_dump($idIdentite);
//var_dump($idPraticien);
//var_dump($fiche->getId());
//var_dump($consultations);

if (isset($_POST['submit'])) {
    $date = $_POST['prise_date'];
    $heure = $_POST['prise_heure'];
    $type = $_POST['consulation'];
    $dateRdv = DateTime::createFromFormat('Y-m-d H:i', $_POST['prise_date'] . ' ' . $_POST['prise_heure']);
    $dateRdvSql = $dateRdv->format('Y-m-d H:i:s'); // Conversion en format SQL
    // TODO : créer consultation associé au rdv
    $rdv = new Promed\Rdv\Rdv($dateRdvSql, $idPraticien, $patient_id, $type);
    $rdvDAO->create($rdv);

    //echo "Rendez-vous pris le ".$date." à ".$heure." pour ".$patient_id." fait par ". $idPraticien;
    header('Location: ?action=recherche'); // a voir pour un récap plutôt (au moins là on évite que le rdv se crée de nouveau au rechargement)
    exit; //arrêter l'exécution du script après la redirection
}

$titre = "Fiche Patient";
include RACINE . "/vue/Entete.html.php";
include RACINE . "/vue/VueFichePatient.php";
include RACINE . "/vue/Pied.html.php";

<?php
session_start();
/**
 *	Controleur secondaire : Rdv
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, RDV);

if (\Promed\Authentification\Authentification::isLoggedOn()) {

    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {
        $praticienDAO = new DAO\Praticien\PraticienDAO();
        $RdvDAO = new \DAO\Rdv\RdvDAO();

        // ici on récupère les infos du praticien grace à son mail, et on transforme les données en objet
        $infoIdentite = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($_SESSION["mail"]);
        $IdentiteObj = new Promed\Identite\Identite(
            $infoIdentite["prenom"],
            $infoIdentite["nom"],
            $infoIdentite["tel"],
            $infoIdentite["mail"],
            $infoIdentite["mdp"],
            $infoIdentite["role"],
            $infoIdentite["id_adresse"]
        );

        // ici on récupère l'ID du praticien pour pouvoir afficher les rendez-vous du praticien connecté 
        $id_identite = $infoIdentite["id_identite"];
        $idPraticien = $praticienDAO->readByIdIdentite($id_identite)->getId();
        $rdvs = \Promed\Praticien\Praticien::getRdvPraticien($idPraticien);


        if (isset($_POST['submit'])) {
            $dateSelect = $_POST['date'];
        } else {
            $dateSelect = date('Y-m-d');
        }

        // permet d'annuler un rdv
        if (isset($_POST['suppr'])) {
            $id = $_POST['id'];
            // on appelle la méthode update
            $rdv = $RdvDAO->read($id);
            $rdv->setStatut("annulé");
            $RdvDAO->update($rdv);
            echo "<script>alert('Le rendez-vous a bien été annulé.');</script>";
            header("Refresh:0");
        }

        // permet de maintenir un rdv
        if (isset($_POST['maintenir'])) {
            $id = $_POST['id'];
            // on appelle la méthode update
            $rdv = $RdvDAO->read($id);
            $rdv->setStatut("maintenu");
            $RdvDAO->update($rdv);
            echo "<script>alert('Le rendez-vous a bien été maintenu.');</script>";
            header("Refresh:0");
        }

        // appel de la vue avec le titre associé
        $titre = "Mes rendez-vous";
        include PATH_ENTETE;
        include PATH_RDVPRATICIEN;
        include PATH_PIED;
    } else { // l'utilisateur est un patient, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-patient');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Authentification";
    header('Location: ?action=connexion');
}

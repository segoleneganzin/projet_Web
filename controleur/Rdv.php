<?php
session_start();
/**
 *	Controleur secondaire : Rdv
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les fichiers nécessaires
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
        $idIdentite = $infoIdentite["id_identite"];
        $idPraticien = $praticienDAO->readByIdIdentite($idIdentite)->getId();
        $rdvs = \Promed\Praticien\Praticien::getRdvPraticien($idPraticien);


        if (isset($_POST['submit'])) {
            $dateSelect = $_POST['date'];
        } else {
            $dateSelect = date('Y-m-d');
        }

        // permet d'annuler un rdv
        if (isset($_POST['annuler'])) {
            $id = $_POST['id'];
            // on appelle la méthode uptade
            $rdv = $RdvDAO->read($id);
            $rdv->setStatut("annulé");
            $RdvDAO->update($rdv);
            echo "<script>alert('Le rendez-vous a bien été annulé.');</script>";
            header("Refresh:0");
        }

        // permet de maintenir un rdv
        if (isset($_POST['maintenir'])) {
            $id = $_POST['id'];
            // on appelle la méthode uptade
            $rdv = $RdvDAO->read($id);
            $rdv->setStatut("maintenu");
            $RdvDAO->update($rdv);
            echo "<script>alert('Le rendez-vous a bien été maintenu.');</script>";
            header("Refresh:0");
        }


        $titre = "Mes rendez-vous";
        include RACINE . "/vue/Entete.html.php";
        include RACINE . "/vue/VueRdvPraticien.php";
        include RACINE . "/vue/Pied.html.php";
    } else {
        $titre = "Authentification";
        header("Location: ?action=connexion");
    }
}

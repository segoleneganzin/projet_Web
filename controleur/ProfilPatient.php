<?php

/**
 *	Controleur secondaire : profilPatient
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, PROFILPATIENT);

if (\Promed\Authentification\Authentification::isLoggedOn()) {
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "patient") {

        $patientDAO = new DAO\Patient\PatientDAO();
        $RdvDAO = new \DAO\Rdv\RdvDAO();
        $AdresseDAO = new \DAO\Adresse\AdresseDAO();

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

        // obtenir les informations adresse du patient
        $id_adresse = $IdentiteObj->getAdresse();
        $infoAdresse = $AdresseDAO->read($id_adresse);
        $ProfilAdresse = $infoAdresse->getNum() . " " . $infoAdresse->getRue() . ", " . $infoAdresse->getVille() . " ";

        // ici on récupère l'ID du praticien pour pouvoir afficher les rendez-vous du praticien connecté 
        $id_identite = $infoIdentite["id_identite"];
        $id_patient = $patientDAO->readByidIdentite($id_identite)->getId();
        $rdvs = \Promed\Patient\Patient::getRdvPatient($id_patient);

        // permet de demander l'annulation d'un rdv 
        if (isset($_POST['demande_annulation'])) {
            $id = $_POST['id'];
            // on appelle la méthode update
            $rdv = $RdvDAO->read($id);
            $rdv->setStatut("demande d'annulation");
            $RdvDAO->update($rdv);
            echo "<script>alert('Votre demande a bien été prise en compte.');</script>";
            header("Refresh:0");
        }

        // Le patient peut définitivement supprimer le Rdv de la Bd une fois la notification lue
        if (isset($_POST['suppr'])) {
            $id = $_POST['id'];
            $RdvDAO->delete($id);
            header("Refresh:0");
        }

        // appel de la vue avec le titre associé
        $titre = "Mes rendez-vous";
        include PATH_ENTETE;
        include PATH_PROFILPATIENT;
        include PATH_PIED;
    } else { // l'utilisateur est un praticien, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-praticien');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Authentification";
    header('Location: ?action=connexion');
}

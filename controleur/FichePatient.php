<?php

/**
 *	Controleur secondaire : FichePatient 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les dependances nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, FICHEPATIENT);

if (\Promed\Authentification\Authentification::isLoggedOn()) { // on vérifie si l'utilisateur est connecté
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "praticien") {
        $identiteDao = new DAO\Identite\IdentiteDAO();
        $praticienDAO = new DAO\Praticien\PraticienDAO();
        $patientDAO = new DAO\Patient\PatientDAO();
        $consultationDao = new DAO\Consultation\ConsultationDAO();
        $rdvDAO = new DAO\Rdv\RdvDAO();

        // Récupération de l'identifiant du patient depuis l'URL
        if (isset($_GET['id'])) {
            $id_identite = $_GET['id'];
        } else {
            // Si l'identifiant n'est pas présent dans l'URL, on redirige vers la page de recherche
            header("Location: ?action=recherche");
            exit;
        }

        // récupérer les informations du patient
        $fiche = $identiteDao->read($id_identite);
        $adr = $fiche->getAdresse()->getNum() . " " . $fiche->getAdresse()->getRue() . " " .
            $fiche->getAdresse()->getCp() . " " . $fiche->getAdresse()->getVille();

        // récupérer l'Id Praticien : on prend le mail, on trouve l'idIdentite, et on l'utilise pour trouver IdPraticien
        $infoIdentite = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($_SESSION["mail"]);
        $identite_prat = $infoIdentite["id_identite"];
        $id_praticien = $praticienDAO->readByIdIdentite($identite_prat)->getId();

        // récupérer l'Id Patient pour la prise de rendez-vous :
        $id_patient = $patientDAO->readByIdIdentite($id_identite)->getId();

        //Obtenir les types de consultations
        $consultations = $consultationDao->readAllConsultation();

        if (isset($_POST['submit'])) {
            $date = $_POST['prise_date'];
            $heure = $_POST['prise_heure'];
            $type = $_POST['consultation'];
            if ($date != null && $heure != null) {
                $dateRdv = DateTime::createFromFormat('Y-m-d H:i', $date . ' ' . $heure);
                $dateRdvSql = $dateRdv->format('Y-m-d H:i:s'); // Conversion en format SQL
                // Création d'un rendez-vous
                $rdv = new Promed\Rdv\Rdv($dateRdvSql, $id_praticien, $id_patient, $type, "maintenu");
                if (Promed\Praticien\Praticien::rdvExiste($dateRdvSql, $id_praticien)){
                    $rdvDAO->create($rdv);
                }
                //echo "Rendez-vous pris le ".$date." à ".$heure." pour ".$patient_id." fait par ". $idPraticien;
                header('Location: ?action=recherche'); // a voir pour un récap plutôt (au moins là on évite que le rdv se crée de nouveau au rechargement)
                exit; //arrêter l'exécution du script après la redirection
            } else {
                echo "<script>alert('Merci de bien remplir les champs demandés.');</script>";
            }
        }

        // appel du script de vue avec le titre associé
        $titre = "Fiche Patient";
        include PATH_ENTETE;
        include PATH_FICHEPATIENT;
        include PATH_PIED;
    } else { // l'utilisateur est un patient, il n'a pas accès à cette page, il est donc redirigé
        $titre = "Mes rendez-vous";
        header('Location: ?action=rdv-patient');
    }
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    $titre = "Authentification";
    header('Location: ?action=connexion');
}

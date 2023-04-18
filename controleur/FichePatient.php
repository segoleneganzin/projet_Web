<?php
session_start();

/**
 *	Controleur secondaire : FichePatient 
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// On require_once les fichiers nécessaires
array_map(function ($dependances) {
    require_once $dependances;
}, FICHEPATIENT);

if (\Promed\Authentification\Authentification::isLoggedOn()) { // si l'utilisateur est connecte on redirige vers le controleur praticien ou patient
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
        //$infoIdentite = $identiteDao->getUtilisateurByMailU($_SESSION["mail"]);
        $infoIdentite = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($_SESSION["mail"]);
        $identite_prat = $infoIdentite["id_identite"];
        $id_praticien = $praticienDAO->readByIdIdentite($identite_prat)->getId();

        // récupérer l'Id Patient pour la prise de rendez-vous :
        $id_patient = $patientDAO->readByIdIdentite($id_identite)->getId();
        var_dump($id_identite);
        var_dump($id_patient);
        var_dump($id_praticien);
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
                $rdvDAO->create($rdv);
                //echo "Rendez-vous pris le ".$date." à ".$heure." pour ".$patient_id." fait par ". $idPraticien;
                header('Location: ?action=recherche'); // a voir pour un récap plutôt (au moins là on évite que le rdv se crée de nouveau au rechargement)
                exit; //arrêter l'exécution du script après la redirection
            } else {
                echo "<script>alert('Merci de bien remplir les champs demandés.');</script>";
            }
        }
        $titre = "Fiche Patient";
        include RACINE . "/vue/Entete.html.php";
        include RACINE . "/vue/VueFichePatient.php";
        include RACINE . "/vue/Pied.html.php";
    } else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        $titre = "Authentification";
        header('Location: ?action=connexion');
    }
}

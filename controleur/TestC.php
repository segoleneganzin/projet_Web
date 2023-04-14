<?php

/**
 *	Controleur secondaire : test de connexion a la bd
 */

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

require RACINE . "/db/ConsultationDAO.php";
require RACINE . "/metier/Consultation.php";

require RACINE . "/db/RdvDAO.php";
require RACINE . "/metier/Rdv.php";

require RACINE . "/db/PatientDAO.php";
require RACINE . "/metier/Patient.php";

require RACINE . "/db/PraticienDAO.php";
require RACINE . "/metier/Praticien.php";

// appel du script de vue qui permet de gerer l'affichage des donnees

include RACINE . "/vue/TestV.php";

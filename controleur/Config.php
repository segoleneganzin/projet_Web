<?php

/**
 * CONFIG GLOBAL 
 */

//Chemin absolu de l'application :
define("RACINE", dirname(__DIR__));

//**Constantes chemin vers le metier
define("ADRESSE_METIER", RACINE . "/metier/Adresse.php");
define("AUTHENTIFICATION_METIER", RACINE . "/metier/Authentification.php");
define("CONSULTATION_METIER", RACINE . "/metier/Consultation.php");
define("IDENTITE_METIER", RACINE . "/metier/Identite.php");
define("INSCRIPTION_METIER", RACINE . "/metier/Inscription.php");
define("PATIENT_METIER", RACINE . "/metier/Patient.php");
define("PRATICIEN_METIER", RACINE . "/metier/Praticien.php");
define("RDV_METIER", RACINE . "/metier/Rdv.php");

//**Constantes chemin vers la dao
define("ADRESSE_DAO", RACINE . "/db/AdresseDAO.php");
define("CONNEXION", RACINE . "/db/Connexion.php");
define("CONSULTATION_DAO", RACINE . "/db/ConsultationDAO.php");
define("DAO", RACINE . "/db/DAO.php");
define("IDENTITE_DAO", RACINE . "/db/IdentiteDAO.php");
define("PATIENT_DAO", RACINE . "/db/PatientDAO.php");
define("PRATICIEN_DAO", RACINE . "/db/PraticienDAO.php");
define("RDV_DAO", RACINE . "/db/RdvDAO.php");

//**Constantes chemin vers la vue
define("PATH_HEAD", RACINE . "/vue/Head.html.php");
define("PATH_ENTETE", RACINE . "/vue/Entete.html.php");
define("PATH_TESTV", RACINE . "/vue/TestV.php");
define("PATH_AUTHENTIFICATION", RACINE . "/vue/VueAuthentification.php");
define("PATH_CHOIXROLE", RACINE . "/vue/VueChoixRole.php");
define("PATH_CONSULTATION", RACINE . "/vue/VueConsultation.php");
define("PATH_CREATIONPATIENT", RACINE . "/vue/VueCreationPatient.php");
define("PATH_FICHEPATIENT", RACINE . "/vue/VueFichePatient.php");
define("PATH_PROFILPATIENT", RACINE . "/vue/VueProfilPatient.php");
define("PATH_INSCRIPTION", RACINE . "/vue/VueInscription.php");
define("PATH_RDVPRATICIEN", RACINE . "/vue/VueRdvPraticien.php");
define("PATH_RECHERCHE", RACINE . "/vue/VueRecherche.php");
define("PATH_PIED", RACINE . "/vue/Pied.html.php");

//**Constantes Arrays require
define('CHOIXROLE', [AUTHENTIFICATION_METIER]);
define('AUTHENTIFICATION', [CONNEXION, DAO, AUTHENTIFICATION_METIER, IDENTITE_METIER, IDENTITE_DAO]);
define('TESTC', [CONNEXION, DAO, IDENTITE_METIER, IDENTITE_DAO, ADRESSE_METIER, ADRESSE_DAO, PATIENT_METIER, PATIENT_DAO, PRATICIEN_METIER, PRATICIEN_DAO, CONSULTATION_METIER, CONSULTATION_DAO, RDV_METIER, RDV_DAO]);
define('CREATIONPATIENT', [CONNEXION, DAO, INSCRIPTION_METIER, AUTHENTIFICATION_METIER, ADRESSE_METIER, ADRESSE_DAO, IDENTITE_METIER, IDENTITE_DAO, PATIENT_METIER, PATIENT_DAO]);
define('DECONNEXION', [CONNEXION, DAO, AUTHENTIFICATION_METIER, IDENTITE_METIER, IDENTITE_DAO]);
define('FICHEPATIENT', [CONNEXION, DAO, AUTHENTIFICATION_METIER, ADRESSE_METIER, ADRESSE_DAO, IDENTITE_METIER, IDENTITE_DAO, PRATICIEN_METIER, PRATICIEN_DAO, PATIENT_METIER, PATIENT_DAO, CONSULTATION_METIER, CONSULTATION_DAO, RDV_METIER, RDV_DAO]);
define('INSCRIPTION', [CONNEXION, DAO, AUTHENTIFICATION_METIER, INSCRIPTION_METIER, ADRESSE_METIER, ADRESSE_DAO, IDENTITE_METIER, IDENTITE_DAO, PRATICIEN_METIER, PRATICIEN_DAO]);
define('RDV', [CONNEXION, DAO, AUTHENTIFICATION_METIER, ADRESSE_METIER, ADRESSE_DAO, IDENTITE_METIER, IDENTITE_DAO, PRATICIEN_METIER, PRATICIEN_DAO, PATIENT_METIER, PATIENT_DAO, CONSULTATION_METIER, CONSULTATION_DAO, RDV_METIER, RDV_DAO]);
define('RECHERCHE', [CONNEXION, DAO, AUTHENTIFICATION_METIER, ADRESSE_METIER, ADRESSE_DAO, IDENTITE_METIER, IDENTITE_DAO]);
define('PROFILPATIENT', [CONNEXION, DAO, AUTHENTIFICATION_METIER, ADRESSE_METIER, ADRESSE_DAO, IDENTITE_METIER, IDENTITE_DAO, PRATICIEN_METIER, PRATICIEN_DAO, PATIENT_METIER, PATIENT_DAO, CONSULTATION_METIER, CONSULTATION_DAO, RDV_METIER, RDV_DAO]);

//**fonctions vues
function vueAuthentification($title)
{
    $titre = $title;
    include PATH_HEAD;
    include PATH_AUTHENTIFICATION;
    include PATH_PIED;
}
function vueChoixrole($title)
{
    $titre = $title;
    include PATH_HEAD;
    include PATH_CHOIXROLE;
    include PATH_PIED;
}
function vueCreationPatient($title)
{
    $titre = $title;
    include PATH_ENTETE;
    include PATH_CREATIONPATIENT;
    include PATH_PIED;
}
function vueInscription($title)
{
    $titre = $title;
    include PATH_HEAD;
    include PATH_INSCRIPTION;
    include PATH_PIED;
}
function vueRecherche($title, $identite)
{
    $titre = $title;
    $identites = $identite;
    include PATH_ENTETE;
    include PATH_RECHERCHE;
    include PATH_PIED;
}
function vueTest($title)
{
    $titre = $title;
    include PATH_HEAD;
    include PATH_TESTV;
    include PATH_PIED;
}

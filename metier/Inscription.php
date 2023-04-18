<?php

namespace Promed\Inscription {

    use Promed\Identite\Identite;
    use Promed\Adresse\Adresse;
    use Promed\Praticien\Praticien;
    use Promed\Patient\Patient;

    class Inscription
    {
        static function inscriptionPraticien($nomId, $prenomId, $telId, $emailId, $numAdr, $nomAdr, $cpAdr, $villeAdr, $specialitePrat, $descPrat, $mdp)
        {
            $daoAdresse = new \DAO\Adresse\AdresseDAO();
            $adresse = new Adresse($numAdr, $nomAdr, $cpAdr, $villeAdr);
            $daoAdresse->create($adresse);

            $daoIdentite = new \DAO\Identite\IdentiteDAO();
            //methode de hachage de mot de passe
            $mdp_brut = $mdp;
            $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
            $identite = new Identite($nomId, $prenomId, $telId, $emailId, $hash, "praticien", $adresse->getId());
            $daoIdentite->create($identite);

            $daoPraticien = new \DAO\Praticien\PraticienDAO();
            $praticien = new Praticien($specialitePrat, $descPrat, $identite->getId());
            $daoPraticien->create($praticien);

            exit;
        }

        static function inscriptionPatient($nomId, $prenomId, $date_naissancePatient, $telId, $emailId, $numAdr, $nomAdr, $cpAdr, $villeAdr, $mdp)
        {
            $daoAdresse = new \DAO\Adresse\AdresseDAO();
            $adresse = new Adresse($numAdr, $nomAdr, $cpAdr, $villeAdr);
            $daoAdresse->create($adresse);

            $daoIdentite = new \DAO\Identite\IdentiteDAO();
            //methode de hachage de mot de passe
            $mdp_brut = $mdp;
            $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
            $identite = new Identite($nomId, $prenomId, $telId, $emailId, $hash, "patient", $adresse->getId());
            $daoIdentite->create($identite);

            $daoPatient = new \DAO\Patient\PatientDAO();
            $patient = new Patient($date_naissancePatient, $identite->getId());
            $daoPatient->create($patient);

            exit;
        }
    }
}

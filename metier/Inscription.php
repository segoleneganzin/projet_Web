<?php

//methode de hachage de mot de passe


namespace Promed\Inscription {

    use Promed\Identite\Identite;
    use Promed\Adresse\Adresse;
    use Promed\Praticien\Praticien;

    // use DAO\Identite\IdentiteDAO;
    // use DAO\Adresse\AdresseDAO;

    class Inscription
    {
        static function inscriptionPraticien($lastnameId, $firstnameId, $telId, $emailId, $numAdr, $nomAdr, $cpAdr, $villeAdr, $specialitePrat, $descPrat, $mdp)
        {
            $daoAdresse = new \DAO\Adresse\AdresseDAO();
            $adresse = new Adresse($numAdr, $nomAdr, $cpAdr, $villeAdr);
            $daoAdresse->create($adresse);

            $daoIdentite = new \DAO\Identite\IdentiteDAO();
            $mdp_brut = $mdp;
            $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
            $identite = new Identite($lastnameId, $firstnameId, $telId, $emailId, $hash, "praticien", $adresse->getId());
            $daoIdentite->create($identite);

            $daoPraticien = new \DAO\Praticien\PraticienDAO();
            $praticien = new Praticien($specialitePrat, $descPrat, $identite->getId());
            $daoPraticien->create($praticien);
        }
    }
}

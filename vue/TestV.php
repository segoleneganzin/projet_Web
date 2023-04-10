<div class="container">
    <?php

    use \Promed\Identite\Identite;
    use \DAO\Identite\IdentiteDAO;

    // Prog de test des DAO

    //test pour l'authentification
    // $mail = "mail@test.com";
    // $test = \DAO\Identite\IdentiteDAO::getUtilisateurByMailU($mail);
    // print_r($test);

    //*****************************************IDENTITE 


    echo "getIdentites() : " . \DAO\Identite\IdentiteDAO::getIdentites();
    echo "<hr/>";
    $daoIdentite = new \DAO\Identite\IdentiteDAO();
    //!create d'une identite
    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new Identite("toto", "bob", 1, "mail@test.com", $hash, "test", 1);
    echo "Objet crée, refresh pour le voir apparaitre dans getIdentites : " . $obj;
    // $createIdentite = $daoIdentite->create($obj);
    //read d'une identite
    $readIdentite = $daoIdentite->read(1);
    //update d'une identite
    //TODO
    //delete d'une identite
    //TODO

    echo "Read de l'identite avec l'id (1) : $readIdentite";
    // echo "Arborescence de l'identite avec l'id (1) : ";
    // var_dump($identite);

    echo "<hr/>";

    //*****************************************ADRESSE
    echo "getAdresses() : " . \DAO\Adresse\AdresseDAO::getAdresses();
    echo "<hr/>";
    $daoAdr = new \DAO\Adresse\AdresseDAO();
    //create d'une adresse
    //TODO
    //read d'une adresse
    $readAdr = $daoAdr->read(1);
    //update d'une adresse
    //TODO
    //delete d'une adresse
    //TODO

    echo "Read de l'adresse avec l'id (1) : $readAdr";

    echo "<hr/>";

    //*****************************************CONSULTATION
    echo "getConsultations() : " . \DAO\Consultation\ConsultationDAO::getConsultations();
    echo "<hr/>";
    $daoConsult = new \DAO\Consultation\ConsultationDAO();
    //create d'une consultation
    //TODO
    //read d'une consultation
    $readConsult = $daoConsult->read(1);
    //update d'une consultation
    //TODO
    //delete d'une consultation
    //TODO

    echo "Read de la consultation avec l'id (1) : $readConsult";
    // echo "Arborescence de la consultation avec l'id (1) : ";
    // var_dump($consult);

    echo "<hr/>";

    //*****************************************RDV
    echo "getRdvs() : " . \DAO\Rdv\RdvDAO::getRdvs();
    echo "<hr/>";
    $daoRdv = new \DAO\Rdv\RdvDAO();
    //create d'un rdv
    //TODO
    //read d'un rdv
    $rdv = $daoRdv->read(1);
    //update d'un rdv
    //TODO
    //delete d'un rdv
    //TODO

    echo "Read du rdv avec l'id (1) : $rdv";
    // echo "Arborescence du rdv avec l'id (1) : ";
    // var_dump($rdv);

    echo "<hr/>";

    //*****************************************PATIENT
    echo "getPatients() : " . \DAO\Patient\PatientDAO::getPatients();
    echo "<hr/>";
    $daoPatient = new \DAO\Patient\PatientDAO();
    //create d'un patient
    //TODO
    //read d'un patient
    $patient = $daoPatient->read(1);
    //update d'un patient
    //TODO
    //delete d'un patient
    //TODO

    echo "Read du patient avec l'id (1) : $patient";
    // echo "Arborescence du patient avec l'id (1) : ";
    // var_dump($patient);


    echo "<hr/>";

    //*****************************************PRATICIEN
    echo "getPraticiens() : " . \DAO\Praticien\PraticienDAO::getPraticiens();
    echo "<hr/>";
    $daoPraticien = new \DAO\Praticien\PraticienDAO();
    //create d'un praticien
    //TODO
    //read d'un praticien
    $praticien = $daoPraticien->read(1);
    //update d'un praticien
    //TODO
    //delete d'un praticien
    //TODO

    echo "Read du praticien avec l'id (1) : $praticien";
    // echo "Arborescence du praticien avec l'id (1) : ";
    // var_dump($praticien);


    echo "<hr/>";

    ?>
</div>
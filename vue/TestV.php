<!-- Prog de test des DAO -->
<div class="container">
    <?php

    use DAO\Rdv\RdvDAO;
    use Promed\Identite\Identite;
    use Promed\Adresse\Adresse;
    use Promed\Consultation\Consultation;
    use Promed\Rdv\Rdv;
    use Promed\Patient\Patient;
    use Promed\Praticien\Praticien;

    //*****************************************IDENTITE 

    $daoIdentite = new \DAO\Identite\IdentiteDAO();

    //!create d'une identite
    // $role = "praticien";
    // $id_adresse = 2;
    // $mdp_brut = "toto";
    // $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    // $obj = new Identite("toto", "bob", "0123456789", "test@test.com", $hash, $role, $id_adresse);
    // echo "Objet crée : " . $obj;
    // $createIdentite = $daoIdentite->create($obj);

    //!read d'une identite
    // $readIdentite = $daoIdentite->read(1);
    // echo "Read de l'identite avec l'id (1) : $readIdentite";
    // echo "Arborescence de l'identite avec l'id (1) : ";
    // var_dump($readIdentite);

    //!update d'une identite
    // $readIdentite = $daoIdentite->read(1);
    // $readIdentite->setNom("Test");
    // $daoIdentite->update($readIdentite);

    //!delete d'une identite
    // $readIdentite = $daoIdentite->read(4);
    // $daoIdentite->delete($readIdentite);

    // echo "<hr/>";

    // echo "getIdentites() : " . \DAO\Identite\IdentiteDAO::getIdentites();

    // echo "<hr/>";

    //*****************************************ADRESSE

    $daoAdr = new \DAO\Adresse\AdresseDAO();

    //!create d'une adresse
    // $obj = new Adresse(2, "test", 56000, "Lorient");
    // echo "Objet crée : " . $obj;
    // $daoAdr->create($obj);

    //!read d'une adresse
    // $readAdr = $daoAdr->read(2);
    // echo "Read de l'adresse avec l'id (2) : $readAdr";

    //!update d'une adresse
    // $readAdresse = $daoAdr->read(4);
    // $readAdresse->setRue("le quatrième");
    // $daoAdr->update($readAdresse);

    //!delete d'une adresse
    // $readAdresse = $daoAdr->read(6);
    // $daoAdr->delete($readAdresse);

    // echo "<hr/>";

    // echo "getAdresses() : " . \DAO\Adresse\AdresseDAO::getAdresses();

    // echo "<hr/>";

    //*****************************************CONSULTATION

    $daoConsult = new \DAO\Consultation\ConsultationDAO();

    //!create d'une consultation
    // $obj = new Consultation("Bilan", "1 heure", 15.99);
    // echo "Objet crée : " . $obj;
    // $daoConsult->create($obj);

    //!read d'une consultation
    // $readConsult = $daoConsult->read(1);
    // echo "Read de la consultation avec l'id (1) : $readConsult";
    // echo "Arborescence de la consultation avec l'id (1) : ";
    // var_dump($readConsult);

    //!update d'une consultation
    // $readConsult = $daoConsult->read(2);
    // $readConsult->setType("blablou");
    // $daoConsult->update($readConsult);

    //!delete d'une consultation
    // $readConsult = $daoConsult->read(2);
    // $daoConsult->delete($readConsult);

    // echo "<hr/>";

    // echo "getConsultations() : " . \DAO\Consultation\ConsultationDAO::getConsultations();

    // echo "<hr/>";

    //*****************************************RDV

    $daoRdv = new \DAO\Rdv\RdvDAO();

    //!create d'un rdv
    // $obj = new Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 1, 1, 1);
    // echo "Objet crée : " . $obj;
    // $daoRdv->create($obj);

    //!read d'un rdv
    // $rdv = $daoRdv->read(1);
    // echo "Read du rdv avec l'id (1) : $rdv";
    // echo "Arborescence du rdv avec l'id (1) : ";
    // var_dump($rdv);

    //!update d'un rdv
    // $readRdv = $daoRdv->read(2);
    // $readRdv->setDateRDV(date("Y-m-d H:i:s", strtotime("+ 2 hours")));
    // $daoRdv->update($readRdv);

    //!delete d'un rdv
    // $readRdv = $daoRdv->read(2);
    // $daoRdv->delete($readRdv);

    // echo "<hr/>";

    // echo "getRdvs() : " . \DAO\Rdv\RdvDAO::getRdvs();

    // echo "<hr/>";

    //*****************************************PATIENT

    $daoPatient = new \DAO\Patient\PatientDAO();

    //!create d'un patient
    // $obj = new Patient("1999-09-20", 1);
    // echo "Objet crée : " . $obj;
    // $daoPatient->create($obj);

    //!read d'un patient
    // $readPatient = $daoPatient->read(1);
    // echo "Read du patient avec l'id (1) : $readPatient";
    // echo "Arborescence du patient avec l'id (1) : ";
    // var_dump($readPatient);

    //!update d'un patient
    // $readPatient = $daoPatient->read(2);
    // $readPatient->setDateDeNaissance("2023-09-20");
    // $daoPatient->update($readPatient);

    //!delete d'un patient
    // $readPatient = $daoPatient->read(2);
    // $daoPatient->delete($readPatient);


    // echo "<hr/>";

    // echo "getPatients : " . \DAO\Patient\PatientDAO::getPatients();

    // echo "<hr/>";

    //*****************************************PRATICIEN

    $daoPraticien = new \DAO\Praticien\PraticienDAO();

    //!create d'un praticien
    // $obj = new Praticien("Ophtalmo", "Description du praticien", 2);
    // echo "Objet crée : " . $obj;
    // $daoPraticien->create($obj);

    //!read d'un praticien
    // $readPraticien = $daoPraticien->read(1);
    // echo "Read du praticien avec l'id (1) : $readPraticien";
    // echo "Arborescence du praticien avec l'id (1) : ";
    // var_dump($readPraticien);

    //!update d'un praticien
    // $readPraticien = $daoPraticien->read(2);
    // $readPraticien->setSpecialiste("Chirurgien");
    // $daoPraticien->update($readPraticien);

    //!delete d'un praticien
    // $readPraticien = $daoPraticien->read(2);
    // $daoPraticien->delete($readPraticien);

    // echo "<hr/>";

    // echo "getPraticiens() : " . \DAO\Praticien\PraticienDAO::getPraticiens();

    // echo "<hr/>";

    //*****************************************SCRIPT CREATION DATA BD
    // $obj = new Adresse(2, "René Lesage", 56000, "Vannes");
    // $daoAdr->create($obj);
    // $obj = new Adresse(2, "Martin Luther King", 56100, "Lorient");
    // $daoAdr->create($obj);
    // $mdp_brut = "toto";
    // $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    // $obj = new Identite("toto", "bob", "0612345678", "test@test.com", $hash, "patient", 1);
    // $createIdentite = $daoIdentite->create($obj);
    // $mdp_brut = "toto";
    // $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    // $obj = new Identite("toto2", "bob2", "0612345678", "test2@test.com", $hash, "praticien", 2);
    // $createIdentite = $daoIdentite->create($obj);
    // $obj = new Patient("1999-09-20", 1);
    // $daoPatient->create($obj);
    // $obj = new Praticien("Ophtalmo", "Description du praticien", 2);
    // $daoPraticien->create($obj);
    // $obj = new Consultation("Premiere consultation", 45, 59.99);
    // $daoConsult->create($obj);
    // $obj = new Consultation("Suivi", 30, 50);
    // $daoConsult->create($obj);
    // $obj = new Consultation("Bilan", 15, 30);
    // $daoConsult->create($obj);
    // $obj = new Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 1, 1, 1);
    // $daoRdv->create($obj);
    // $obj = new Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 1, 1, 2);
    // $daoRdv->create($obj);
    // $obj = new Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 1, 1, 3);
    // $daoRdv->create($obj);
    // echo "La data a été créée dans la BD 👍";

    ?>
</div>
<!-- test des DAO -->
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

    //*****************************************SCRIPT CREATION DATA BD*******************************************

    // **------------Création adresse--------------------
    $obj = new \Promed\Adresse\Adresse(11, "René Lesage", 56000, "Vannes");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(20, "Martin Luther King", 56100, "Lorient");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(3, "Victor Hugo", 35000, "Rennes");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(7, "Jean Jaurès", 29000, "Quimper");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(14, "Georges Clémenceau", 56700, "Hennebont");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(6, "Jules Ferry", 35400, "Saint-Malo");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(5, "Louis Pasteur", 29600, "Morlaix");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(12, "Léon Gambetta", 56600, "Lanester");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(25, "Charles de Gaulle", 56400, "Auray");
    $daoAdr->create($obj);
    $obj = new \Promed\Adresse\Adresse(2, "Jean Moulin", 29200, "Brest");
    $daoAdr->create($obj);

    //**------------Création patient--------------------
    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient1", "Jean", "0612345678", "patient1@mail.com", $hash, "patient", 1);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Patient\Patient("2000-01-01", 10);
    $daoPatient->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient2", "Marie", "0612345678", "patient2@mail.com", $hash, "patient", 2);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Patient\Patient("2000-02-02", 9);
    $daoPatient->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient3", "Caroline", "0612345678", "patient3@mail.com", $hash, "patient", 3);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Patient\Patient("2000-03-03", 8);
    $daoPatient->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient4", "Colette", "0612345678", "patient4@mail.com", $hash, "patient", 4);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Patient\Patient("2000-04-04", 7);
    $daoPatient->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient5", "Charlotte", "0612345678", "patient5@mail.com", $hash, "patient", 5);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Patient\Patient("2000-05-05", 6);
    $daoPatient->create($obj);

    //**------------Création praticien--------------------
    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien1", "Brent", "0612345678", "praticien1@mail.com", $hash, "praticien", 6);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Praticien\Praticien("Ophtalmologue", "Chargé du traitement des maladies de l'œil et de ses annexes.", 5);
    $daoPraticien->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien2", "Matthiew", "0612345678", "praticien2@mail.com", $hash, "praticien", 7);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Praticien\Praticien("Kinesithérapeute", "Emploie le mouvement dans le but de renforcer, maintenir ou rétablir les capacités fonctionnelles.", 4);
    $daoPraticien->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien3", "Stanislas", "0612345678", "praticien3@mail.com", $hash, "praticien", 8);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Praticien\Praticien("Osthéopathe", "Travaille sur les articulations, les muscles et les tendons tout en considérant le corps dans sa globalité.", 3);
    $daoPraticien->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien4", "Marie", "0612345678", "praticien4@mail.com", $hash, "praticien", 9);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Praticien\Praticien("Dermatologue", "S'occupe de la peau, des muqueuses et des phanères", 2);
    $daoPraticien->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien5", "Laurence", "0612345678", "praticien5@mail.com", $hash, "praticien", 10);
    $createIdentite = $daoIdentite->create($obj);
    $obj = new \Promed\Praticien\Praticien("Orthopédiste", "Ils traitent les affections touchant toutes les parties du membre et de ses articulations, os, cartilages, tendons, ligaments.", 1);
    $daoPraticien->create($obj);

    //**------------Création consultation--------------------
    $obj = new \Promed\Consultation\Consultation("Premiere consultation", 45, 59.99);
    $daoConsult->create($obj);
    $obj = new \Promed\Consultation\Consultation("Suivi", 30, 50);
    $daoConsult->create($obj);
    $obj = new \Promed\Consultation\Consultation("Bilan", 15, 30);
    $daoConsult->create($obj);

    //**------------Création rdv--------------------
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 1, 5, 1, "maintenu");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 1, 5, 2, "demande d'annulation");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 1, 5, 3, "annulé");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 2, 4, 1, "maintenu");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 2, 4, 2, "demande d'annulation");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 2, 4, 3, "annulé");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 3, 3, 1, "maintenu");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 3, 3, 2, "demande d'annulation");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 3, 3, 3, "annulé");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 4, 2, 1, "maintenu");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 4, 2, 2, "demande d'annulation");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 4, 2, 3, "annulé");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 5, 1, 1, "maintenu");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 5, 1, 2, "demande d'annulation");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 5, 1, 3, "annulé");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 4, 1, 1, "maintenu");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 1 day")), 4, 1, 2, "demande d'annulation");
    $daoRdv->create($obj);
    $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 day")), 4, 1, 3, "annulé");
    $daoRdv->create($obj);
    echo "La data a été créée dans la BD 👍";

    ?>
</div>
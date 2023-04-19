<!-- Prog de test des DAO -->
<div class="container">
    <?php

    //*****************************************ADRESSE

    $daoAdr = new \DAO\Adresse\AdresseDAO();

    //!create d'une adresse
    // $obj = new \Promed\Adresse\Adresse(1, "nom_de_rue", 56000, "nom_ville");
    // echo "Objet crée : " . $obj;
    // $daoAdr->create($obj);

    //!read d'une adresse
    // $id = 1;
    // $readAdr = $daoAdr->read($id);
    // echo "Read de l'adresse avec l'id ($id) : $readAdr";

    //!update d'une adresse
    // $id = 1;
    // $readAdr = $daoAdr->read($id);
    // $readAdr->setRue("Test");
    // $daoAdr->update($readAdr);
    // echo "Update de l'adresse avec l'id ($id) : $readAdr";

    //!delete d'une adresse
    // $id = 1;
    // $readAdr = $daoAdr->read($id);
    // $daoAdr->delete($readAdr);
    // echo "Vous avez supprimé l'adresse avec l'id ($id)";

    // echo "<hr/>";


    //*****************************************IDENTITE 

    $daoIdentite = new \DAO\Identite\IdentiteDAO();

    //!create d'une identite
    // $role = "praticien";
    // $id_adresse = 1;
    // $mdp_brut = "toto";
    // $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    // $obj = new \Promed\Identite\Identite("nom_identite", "prenom_identite", "0123456789", "test@test.com", $hash, $role, $id_adresse);
    // echo "Objet crée : " . $obj;
    // $createIdentite = $daoIdentite->create($obj);

    //!read d'une identite
    // $id = 1;
    // $readIdentite = $daoIdentite->read($id);
    // echo "Read de l'identite avec l'id ($id) : $readIdentite";
    // echo "Arborescence de l'identite avec l'id ($id) : ";
    // var_dump($readIdentite);

    //!update d'une identite
    // $id = 1;
    // $readIdentite = $daoIdentite->read($id);
    // $readIdentite->setNom("Test");
    // $daoIdentite->update($readIdentite);
    // echo "Update de l'identite avec l'id ($id) : $readIdentite";

    //!delete d'une identite
    // $id = 1;
    // $readIdentite = $daoIdentite->read($id);
    // $daoIdentite->delete($readIdentite);
    // echo "Vous avez supprimé l'identite avec l'id ($id)";

    // echo "<hr/>";

    //*****************************************PATIENT

    $daoPatient = new \DAO\Patient\PatientDAO();

    //!create d'un patient
    // $obj = new \Promed\Patient\Patient("1999-09-20", 1);
    // echo "Objet crée : " . $obj;
    // $daoPatient->create($obj);

    //!read d'un patient
    // $id = 1;
    // $readPatient = $daoPatient->read($id);
    // echo "Read du patient avec l'id ($id) : $readPatient";
    // echo "Arborescence du patient avec l'id ($id) : ";
    // var_dump($readPatient);

    //!update d'un patient
    // $id = 1;
    // $readPatient = $daoPatient->read(1);
    // $readPatient->setDateDeNaissance("2023-09-20");
    // $daoPatient->update($readPatient);
    // echo "Update du patient avec l'id ($id) : $readPatient";

    //!delete d'un patient
    // $id = 1;
    // $readPatient = $daoPatient->read($id);
    // $daoPatient->delete($readPatient);
    // echo "Vous avez supprimé le patient avec l'id ($id)";


    // echo "<hr/>";


    //*****************************************PRATICIEN

    $daoPraticien = new \DAO\Praticien\PraticienDAO();

    //!create d'un praticien
    // $obj = new \Promed\Praticien\Praticien("Specialiste", "Description du praticien", 2);
    // echo "Objet crée : " . $obj;
    // $daoPraticien->create($obj);

    //!read d'un praticien
    // $id = 1;
    // $readPraticien = $daoPraticien->read($id);
    // echo "Read du praticien avec l'id ($id) : $readPraticien";
    // echo "Arborescence du praticien avec l'id ($id) : ";
    // var_dump($readPraticien);

    //!update d'un praticien
    // $id = 1;
    // $readPraticien = $daoPraticien->read($id);
    // $readPraticien->setSpecialiste("Test");
    // $daoPraticien->update($readPraticien);
    // echo "Update du praticien avec l'id ($id) : $readPraticien";

    //!delete d'un praticien
    // $id = 1;
    // $readPraticien = $daoPraticien->read($id);
    // $daoPraticien->delete($readPraticien);
    // echo "Vous avez supprimé le praticien avec l'id ($id)";

    // echo "<hr/>";


    //*****************************************CONSULTATION

    $daoConsult = new \DAO\Consultation\ConsultationDAO();

    //!create d'une consultation
    // $obj = new \Promed\Consultation\Consultation("Bilan", 45, 15.99);
    // echo "Objet crée : " . $obj;
    // $daoConsult->create($obj);

    //!read d'une consultation
    // $id = 1;
    // $readConsult = $daoConsult->read($id);
    // echo "Read de la consultation avec l'id ($id) : $readConsult";
    // echo "Arborescence de la consultation avec l'id ($id) : ";
    // var_dump($readConsult);

    //!update d'une consultation
    // $id = 1;
    // $readConsult = $daoConsult->read($id);
    // $readConsult->setType("Test");
    // $daoConsult->update($readConsult);
    // echo "Update de la consultation avec l'id ($id) : $readConsult";

    //!delete d'une consultation
    // $id = 1;
    // $readConsult = $daoConsult->read($id);
    // $daoConsult->delete($readConsult);
    // echo "Vous avez supprimé la consultation avec l'id ($id)";

    // echo "<hr/>";


    //*****************************************RDV

    $daoRdv = new \DAO\Rdv\RdvDAO();

    //!create d'un rdv
    // $obj = new \Promed\Rdv\Rdv(date("Y-m-d H:i:s", strtotime("+ 2 hours")), 1, 1, 1, "test");
    // echo "Objet crée : " . $obj;
    // $daoRdv->create($obj);

    //!read d'un rdv
    // $id = 1;
    // $rdv = $daoRdv->read($id);
    // echo "Read du rdv avec l'id ($id) : $rdv";
    // echo "Arborescence du rdv avec l'id ($id) : ";
    // var_dump($rdv);

    //!update d'un rdv
    // $id = 1;
    // $readRdv = $daoRdv->read($id);
    // $readRdv->setDateRDV(date("Y-m-d H:i:s", strtotime("+ 1 day")));
    // $daoRdv->update($readRdv);
    // echo "Update du rdv avec l'id ($id) : $readRdv";

    //!delete d'un rdv
    // $id = 1;
    // $readRdv = $daoRdv->read($id);
    // $daoRdv->delete($readRdv);
    // echo "Vous avez supprimé le rdv avec l'id ($id)";

    // echo "<hr/>";


    //*****************************************SCRIPT CREATION DATA BD*******************************************

    //**------------Création adresse--------------------
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

    //**------------Création identité--------------------
    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient1", "Jean", "0612345678", "patient1@mail.com", $hash, "patient", 1);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient2", "Marie", "0612345678", "patient2@mail.com", $hash, "patient", 2);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient3", "Caroline", "0612345678", "patient3@mail.com", $hash, "patient", 3);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient4", "Colette", "0612345678", "patient4@mail.com", $hash, "patient", 4);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Patient5", "Charlotte", "0612345678", "patient5@mail.com", $hash, "patient", 5);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien1", "Brent", "0612345678", "praticien1@mail.com", $hash, "praticien", 6);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien2", "Matthiew", "0612345678", "praticien2@mail.com", $hash, "praticien", 7);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien3", "Stanislas", "0612345678", "praticien3@mail.com", $hash, "praticien", 8);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien4", "Marie", "0612345678", "praticien4@mail.com", $hash, "praticien", 9);
    $createIdentite = $daoIdentite->create($obj);

    $mdp_brut = "toto";
    $hash = password_hash($mdp_brut, PASSWORD_DEFAULT);
    $obj = new \Promed\Identite\Identite("Praticien5", "Laurence", "0612345678", "praticien5@mail.com", $hash, "praticien", 10);
    $createIdentite = $daoIdentite->create($obj);

    //**------------Création patient--------------------
    $obj = new \Promed\Patient\Patient("2000-01-01", 1);
    $daoPatient->create($obj);
    $obj = new \Promed\Patient\Patient("2000-02-02", 2);
    $daoPatient->create($obj);
    $obj = new \Promed\Patient\Patient("2000-03-03", 3);
    $daoPatient->create($obj);
    $obj = new \Promed\Patient\Patient("2000-04-04", 4);
    $daoPatient->create($obj);
    $obj = new \Promed\Patient\Patient("2000-05-05", 5);
    $daoPatient->create($obj);

    //**------------Création praticien--------------------
    $obj = new \Promed\Praticien\Praticien("Ophtalmologue", "Chargé du traitement des maladies de l'œil et de ses annexes.", 6);
    $daoPraticien->create($obj);
    $obj = new \Promed\Praticien\Praticien("Kinesithérapeute", "Emploie le mouvement dans le but de renforcer, maintenir ou rétablir les capacités fonctionnelles.", 7);
    $daoPraticien->create($obj);
    $obj = new \Promed\Praticien\Praticien("Osthéopathe", "Travaille sur les articulations, les muscles et les tendons tout en considérant le corps dans sa globalité.", 8);
    $daoPraticien->create($obj);
    $obj = new \Promed\Praticien\Praticien("Dermatologue", "S'occupe de la peau, des muqueuses et des phanères", 9);
    $daoPraticien->create($obj);
    $obj = new \Promed\Praticien\Praticien("Orthopédiste", "Ils traitent les affections touchant toutes les parties du membre et de ses articulations, os, cartilages, tendons, ligaments.", 10);
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
    echo "La data a été créée dans la BD 👍";

    ?>
</div>
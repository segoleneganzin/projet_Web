<html>

<head>

    <title>Promed</title>
</head>

<body>


    <?php


    // Affichage de la table pilote
    echo \DAO\Identite\IdentiteDAO::getIdentites();

    // Affichage d'un vol particulier
    // $daoIdentite = new \DAO\Identite\IdentiteDAO();
    // $identite = $daoIdentite->read(1);
    // echo $identite;
    // echo "<br/><br/>";

    //Affiche un pilote
    // $daoPilote = new \DAO\Pilote\PiloteDAO();
    // echo $daoPilote->read(1); //lecture du premier tuple de la table "pilote"

    //Ajoute un pilote :
    /*
    use Aero\Pilote\Pilote;
    $pilote = new Pilote("Albert", "Meucon", 20000); //nom, ville, salaire
    $pilote->addPilote(); //appel de la fonction sur la classe métier Aero.php
    */


    //    test read / create sur Pilote avec récupération de la clé générée Connexion::getInstance()->lastInsertId();
    /*
    $pil=$daoPilote->read(1);
    echo "pilote de base : $pil";
    $pil->setNomPil("Dupont");
    $daoPilote->create($pil);
    $pil=$daoPilote->read($pil->getNumPil());
    echo "nouveau pilote : $pil";
    */


    // Lecture de l'avion
    /*
    $daoAvion = new \DAO\Avion\AvionDAO();
    echo $daoAvion->read(1);
    */


    // Supression du pilote :
    /*
    $pil=$daoPilote->read(3);
    echo "Suppression du pilote (id=3) : $pil";
    $daoPilote->delete($pil);
    */


    // Supression d'un vol :
    /*
    echo "Supression du vol n°2"
    echo $daoVol->read(2);
    $daoVol->delete($daoVol->read(2));
    */


    ?>

</body>

</html>

    <?php

    echo "getIdentites() : " . \DAO\Identite\IdentiteDAO::getIdentites();
    echo "getAdresses() : " . \DAO\Adresse\AdresseDAO::getAdresses();


    $daoIdentite = new \DAO\Identite\IdentiteDAO();
    $identite = $daoIdentite->read(1);
    echo "Read de l'identite avec l'id (1) : $identite";

    $daoAdresse = new \DAO\Adresse\AdresseDAO();
    $adresse = $daoAdresse->read(1);
    echo "Read de l'adresse avec l'id (1) : $adresse";

    ?>


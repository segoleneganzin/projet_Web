<?php

// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    die('Erreur : ' . basename(__FILE__));
}

?>
<!DOCTYPE html>
<html>
<?php include('Head.html.php');
if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    if ($role == "praticien") {

?>

        <body>
            <header>
                <img src="asset/images/promed_logo_3.png" alt="logo" />
                <nav class="menu">
                    <a class="item-menu" href="./?action=creation-patient">Ajouter patients</a>
                    <a class="item-menu" href="./?action=recherche">Chercher patient</a>
                    <a class="item-menu" href="./?action=rdv-praticien">Mes rendez-vous</a>
                    <a class="item-menu" href="./?action=deconnexion">Déconnexion</a>

                </nav>
            </header>
            <main>

            <?php

        } else {
            ?>

                <body>
                    <header>
                        <img src="asset/images/promed_logo_3.png" alt="logo" />
                        <nav class="menu">
                            <a class="item-menu" href="./?action=deconnexion">Déconnexion</a>
                        </nav>
                    </header>
            <?php
        }
    }
            ?>
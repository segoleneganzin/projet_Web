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
                <nav>
                    <ul id="menuGeneral">
                        <li id="logo"><img src="asset/images/promed_logo_3.png" alt="logo" /></li>
                        <li><a href="./?action=creation-patient">Ajouter patients</a></li>
                        <li><a href="./?action=recherche">Chercher patient</a></li>
                        <li><a href="./?action=rdv-praticien">Mes rendez-vous</a></li>
                        <li><a href="./?action=deconnexion">Déconnexion</a></li>
                    </ul>
                </nav>
            </header>
            <main>

            <?php

        } else {
            ?>

                <body>
                    <header>
                        <nav>
                            <ul id="menuGeneral">
                                <li id="logo"><a href="./?action=accueil"><img src="asset/images/promed_logo_3.png" alt="logo" /></a></li>
                                <li><a href="./?action=deconnexion">Déconnexion</a></li>
                            </ul>
                        </nav>
                    </header>
                    <main>

                <?php
            }
        }
                ?>
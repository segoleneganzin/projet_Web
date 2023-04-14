<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>
<!DOCTYPE html>
<html>
<?php include('Head.html.php'); ?>

<body>
    <header>
        <nav>
            <ul id="menuGeneral">
                <li id="logo"><a href="./?action=accueil"><img src="asset/images/promed_logo_3.png" alt="logo" /></a></li>
                <?php
                echo $_SESSION["role"];
                if (isset($_SESSION["role"])) {
                    $role = $_SESSION["role"];
                    if ($role == "praticien") {
                ?>
                        <li><a href="./?action=profil-praticien">Mon profil praticien</a></li>
                        <li><a href="./?action=creation-patient">Ajouter patient</a></li>
                        <li><a href="./?action=rdv-praticien">Mes rendez-vous</a></li>
                        <li><a href="./?action=recherche">Recherche patient</a></li>
                        <li><a href="./?action=deconnexion">Déconnexion</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="./?action=deconnexion">Déconnexion</a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
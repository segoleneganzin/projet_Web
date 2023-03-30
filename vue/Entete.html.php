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
                <li><a href="./?action=praticien">Praticien</a></li>
                <li><a href="./?action=patient">Patient</a></li>
                <li><a href="./?action=inscription">Inscription</a></li>
                <li><a href="./?action=connexion">Connexion</a></li>
                <li><a href="./?action=deconnexion">Déconnexion</a></li>
            </ul>
        </nav>
        <!-- <ul id="menuContextuel">
        <li><img src="asset/images/promed_logo_3.png" alt="logo" /></li>
        <?php if (isset($menuBurger)) { ?>
            <?php for ($i = 0; $i < count($menuBurger); $i++) { ?>
                <li>
                    <a href="<?= $menuBurger[$i]['url'] ?>">
                        <?= $menuBurger[$i]['label'] ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul> -->
    </header>
    <main>
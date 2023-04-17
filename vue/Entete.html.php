<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>
<!DOCTYPE html>
<html>
<?php include('Head.html.php');
echo $_SESSION["role"];
if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    if ($role == "praticien") {

?>

        <body>
            <header>
                <nav>
                    <ul id="menuGeneral">
                        <li id="logo"><a href="./?action=accueil"><img src="asset/images/promed_logo_3.png" alt="logo" /></a></li>
                        <li><a href="./?action=profil-praticien">Mon profil praticien</a></li>
                        <li><a href="./?action=creation-patient">Ajouter patients</a></li>
                        <li><a href="./?action=recherche">Chercher patient</a></li>
                        <li><a href="./?action=rdv-praticien">Mes rendez-vous</a></li>
                        <!-- <li><a href="./?action=inscription">Inscription</a></li>
                <li><a href="./?action=connexion">Connexion</a></li> -->
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
                <!--

<body>
    <header>
        <nav>
            <ul id="menuGeneral">
                <li id="logo"><a href="./?action=accueil"><img src="asset/images/promed_logo_3.png" alt="logo" /></a></li>
                <li><a href="./?action=profil-praticien">Mon profil praticien</a></li>
                <li><a href="./?action=creation-patient">Ajouter patients</a></li>
                <li><a href="./?action=recherche">Chercher patient</a></li>
                <li><a href="./?action=rdv-praticien">Mes rendez-vous</a></li>
                <<li><a href="./?action=inscription">Inscription</a></li>
                <li><a href="./?action=connexion">Connexion</a></li>
                <li><a href="./?action=deconnexion">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main> -->
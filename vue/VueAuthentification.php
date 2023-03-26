<?php


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>
<div class="container">
    <div class="form">
        <h1>Connexion</h1>
        <form class="form--input-container" action="./?action=connexion" method="POST">

            <input type="text" name="mail" placeholder="Email de connexion" />
            <input type="password" name="mdp" placeholder="Mot de passe" />
            <input type="submit" />

        </form>

        <br />
        <a href="./?action=inscription">Inscription</a>
    </div>
</div>
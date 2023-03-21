<html>

<head>
    <title>Authentification</title>
</head>

<body>
    <?php


    if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
        // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
        die('Erreur : ' . basename(__FILE__));
    }

    ?>
    <h1>Connexion</h1>
    <form action="./?action=connexion" method="POST">

        <input type="text" name="mail" placeholder="Email de connexion" /><br />
        <input type="password" name="mdp" placeholder="Mot de passe" /><br />
        <input type="submit" />

    </form>
    <br />
    <!-- <a href="./?action=inscription">Inscription</a> -->

    <hr>
    Utilisateur de test : <br />
    login : bob<br />
    mot de passe : bob

    ?>

</body>

</html>
<img src="asset/images/promed_logo_3.png" alt="logo" class="image-connexion" />
<div class="container">
    <h1>Connexion</h1>
    <hr />
    <div class="form">

        <form class="form--input-container" action="./?action=connexion" method="POST">

            <input type="text" name="mail" placeholder="Identifiant de connexion" />
            <input type="password" name="mdp" placeholder="Mot de passe" />
            <input type="submit" value="Connexion" class="button-submit" />

        </form>

        <br />

        <?php
        if (isset($_GET["action"]) && $_GET["action"] == "connexion-praticien") {
            echo "<p>Nouveau praticien ? <span style='font-weight:600'><a href='./?action=inscription'>Inscrivez-vous</a></span>";
        }
        ?>
    </div>
</div>
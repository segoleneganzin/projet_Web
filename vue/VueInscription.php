<div class="container">
    <div class="form">
        <h1>Nouveau praticien</h1>
        <!-- Le role sera definit en brut car les patients ne peuvent pas s'inscrire de cette maniere -->
        <form class="form--input-container" action="./?action=inscription" method="POST">

            <h2>Identité</h2>
            <input type="text" name="nom" placeholder="Nom" />
            <input type="text" name="prenom" placeholder="Prénom" />
            <!-- varchar pour ne pas que le 0 disparaisse -->
            <input type="text" name="tel" placeholder="Numéro de téléphone" />
            <input type="email" name="email" placeholder="Email" />
            <h2>Adresse</h2>
            <input type="number" name="num" placeholder="Numéro de rue" />
            <input type="text" name="rue" placeholder="Nom de rue" />
            <input type="number" name="cp" placeholder="Code postal" />
            <input type="text" name="ville" placeholder="Ville" />
            <h2>Activité professionnelle</h2>
            <input type="text" name="specialite" placeholder="Spécialité" />
            <textarea type="text" name="description" placeholder="Description"></textarea>
            <input type="password" name="mdp" placeholder="Mot de passe" />
            <input type="submit" value="S'enregistrer" class="button-submit" />
            <br /><a href="http://localhost/projet_Web">Retour</a>

        </form>
    </div>
</div>
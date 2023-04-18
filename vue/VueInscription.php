<div class="container">
    <div class="form">
        <h1>Nouveau praticien</h1>
        <!-- Le role sera definit en brut car les patients ne peuvent pas s'inscrire de cette maniere -->
        <div class="form--input-container">
            <h2>Identité</h2>
            <input type="text" name="nom" id="nom" placeholder="Nom" />

            <input type="text" name="prenom" id="prenom" placeholder="Prénom" />

            <!-- varchar pour ne pas que le 0 disparaisse -->
            <input type="text" name="tel" id="tel" placeholder="Numéro de téléphone" minlength="10" maxlength="10" />

            <input type="email" name="email" id="email" placeholder="Email" />

            <h2>Adresse</h2>
            <input type="number" name="num" id="num" placeholder="Numéro de rue" />

            <input type="text" name="rue" id="rue" placeholder="Nom de rue" />

            <input type="number" name="cp" id="cp" placeholder="Code postal" minlength="6" maxlength="6" />

            <input type="text" name="ville" id="ville" placeholder="Ville" />

            <h2>Activité professionnelle</h2>
            <input type="text" name="specialite" id="specialite" placeholder="Spécialité" />

            <textarea type="text" name="description" id="description" placeholder="Description"></textarea>

            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" />
            <p>Le mot de passe doit contenir au moins : <br />
            <ul>
                <li>minimum 8 caractères</li>
                <li>une lettre majuscule</li>
                <li>une lettre minuscule</li>
                <li>un chiffre</li>
                <li>un caractère spécial</li>
                <li>maximum 15 caractères</li>
            </ul>
            </p>

            <input type="submit" value="S'enregistrer" class="button-submit" id="button-submit" />

            <br /><a href="http://localhost/projet_Web">Retour</a>

            <div id="content"></div>
        </div>
    </div>
</div>
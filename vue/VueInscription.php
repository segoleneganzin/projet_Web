<div class="container">
    <div class="form">
        <h1>Nouveau praticien</h1>
        <!-- Le role sera definit en brut car les patients ne peuvent pas s'inscrire de cette maniere -->
        <!-- <form id="frmContact" class="form--input-container" action="./?action=inscription" method="POST"> -->
        <div class="form--input-container">
            <h2>Identité</h2>
            <span id="nom-info" class="info"></span><br />
            <input type="text" name="nom" id="nom" placeholder="Nom" />

            <span id="prenom-info" class="info"></span><br />
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" />

            <!-- varchar pour ne pas que le 0 disparaisse -->
            <span id="tel-info" class="info"></span><br />
            <input type="text" name="tel" id="tel" placeholder="Numéro de téléphone" minlength="10" maxlength="10" />

            <span id="email-info" class="info"></span><br />
            <input type="email" name="email" id="email" placeholder="Email" />

            <h2>Adresse</h2>
            <span id="num-info" class="info"></span><br />
            <input type="number" name="num" id="num" placeholder="Numéro de rue" />

            <span id="rue-info" class="info"></span><br />
            <input type="text" name="rue" id="rue" placeholder="Nom de rue" />

            <span id="cp-info" class="info"></span><br />
            <input type="number" name="cp" id="cp" placeholder="Code postal" minlength="6" maxlength="6" />

            <span id="ville-info" class="info"></span><br />
            <input type="text" name="ville" id="ville" placeholder="Ville" />

            <h2>Activité professionnelle</h2>
            <span id="specialite-info" class="info"></span><br />
            <input type="text" name="specialite" id="specialite" placeholder="Spécialité" />

            <span id="description-info" class="info"></span><br />
            <textarea type="text" name="description" id="description" placeholder="Description"></textarea>

            <span id="mdp-info" class="info"></span><br />
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
            <!-- <button type="submit" name="submit" class="button-submit">S'enregistrer</button> -->


            <br /><a href="http://localhost/projet_Web">Retour</a>

            <div id="content"></div>

            <!-- </form> -->
        </div>
    </div>
</div>
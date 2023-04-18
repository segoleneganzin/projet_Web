<div class="container nouveau-patient">
    <h1>Nouvelle fiche patient</h1>
    <hr />
    <div class="form">
        <div class="form--input-container">
            <h2>Identité</h2>
            <input type="text" name="nom" id="nom" placeholder="Nom" />
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" />
            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" placeholder="Date de naissance" />
            <!-- varchar pour ne pas que le 0 disparaisse -->
            <input type="text" name="tel" id="tel" placeholder="Numéro de téléphone" minlength="10" maxlength="10" />
            <input type="email" name="email" id="email" placeholder="Email" />
            <h2>Adresse</h2>
            <!-- Le numero de rue est en varchar car il peut y avoir des bis/ter -->
            <input type="text" name="num" id="num" placeholder="Numéro de rue" />
            <input type="text" name="rue" id="rue" placeholder="Nom de rue" />
            <input type="number" name="cp" id="cp" placeholder="Code postal" minlength="6" maxlength="6" />
            <input type="text" name="ville" id="ville" placeholder="Ville" />

            <input type="submit" value="Ajouter patient" id="ajout-patient-submit" class="button-submit" />
            <div id="content"></div>
        </div>
    </div>
</div>
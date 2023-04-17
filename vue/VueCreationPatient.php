<div class="container nouveau-patient">
    <h1>Nouvelle fiche patient</h1>
    <hr />
    <div class="form">
        <form class="form--input-container" action="./?action=inscription" method="POST">
            <h2>Identité</h2>
            <input type="text" name="nom" placeholder="Nom" />
            <input type="text" name="prenom" placeholder="Prénom" />
            <label for="date_naissance">Date de naissance</label>
            <input type="date" name="date_naissance" placeholder="Date de naissance" />
            <!-- varchar pour ne pas que le 0 disparaisse -->
            <input type="text" name="tel" placeholder="Numéro de téléphone" />
            <input type="email" name="email" placeholder="Email" />
            <h2>Adresse</h2>
            <!-- Le numero de rue est en varchar car il peut y avoir des bis/ter -->
            <input type="text" name="num" placeholder="Numéro de rue" />
            <input type="text" name="rue" placeholder="Nom de rue" />
            <input type="number" name="cp" placeholder="Code postal" />
            <input type="text" name="ville" placeholder="Ville" />

            <input type="submit" value="Ajouter patient" class="button-submit" />

        </form>
    </div>
</div>
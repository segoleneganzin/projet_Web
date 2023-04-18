<div class="container" id="fiche_patient">
    <h1>Fiche patient</h1>
    <hr />
    Nom : <?php echo $fiche->getNom(); ?><br>
    Prénom : <?php echo $fiche->getPrenom(); ?><br>
    Adresse : <?php echo $adr; ?><br>
    Téléphone : <?php echo $fiche->getTel(); ?><br>
    Mail : <?php echo $fiche->getMail(); ?><br>

    <div class="form">
        <h2 for="prise_rdv">Prendre un rendez-vous</h2>
        <form class="form--input-container" action="" method="POST">
            <input type="date" name="prise_date" placeholder="Date de Rendez-vous" />
            <input type="time" id="prise_heure" name="prise_heure" />
            <select name="consultation">
                <?php foreach ($consultations as $consultation) : ?>
                    <option value="<?php echo $consultation->getId(); ?>">
                        <?php echo $consultation->getType(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Prendre Rendez-Vous" name="submit" />
        </form>
    </div>
</div>
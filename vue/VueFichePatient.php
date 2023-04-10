<div class="container" id="fiche_patient">
    <label>Nom:</label>
    <?php echo $fiche->getNom(); ?>
    <label>Prénom:</label>
    <?php echo $fiche->getPrenom(); ?>
    <label>Adresse:</label>
    <?php echo $adr; ?>
    <label>Téléphone:</label>
    <?php echo $fiche->getTel(); ?>
    <label>Mail:</label>
    <?php echo $fiche->getMail(); ?>

    <form class="form--input-container" action="" method="POST">
        <label for="prise_rdv">Prendre un rendez-vous</label>
        <input type="date" name="prise_rdv" placeholder="Date de Rendez-vous" />
        <input type="submit" value="Prendre Rendez-Vous" name="submit" />
    </form>
</div>
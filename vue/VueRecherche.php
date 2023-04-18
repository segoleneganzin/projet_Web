<div class="container recherche">
    <h1>Rechercher un patient</h1>
    <hr />
    <div class="form">
        <form class="form--input-container" action="" method="POST">
            <select name="id_identite">
                <?php foreach ($identites as $identite) : ?>
                    <option value="<?php echo $identite->getId(); ?>">
                        <?php echo $identite->getNom() . ' ' . $identite->getPrenom(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="submit" value="Rechercher" />
        </form>
    </div>
</div>
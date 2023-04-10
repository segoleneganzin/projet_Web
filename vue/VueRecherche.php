<div class="container">
    <div class="form">
        <h1>Rechercher</h1>
        <form class="form--input-container" action="" method="POST">
            <select name="identite_id">
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
<div class="container rdv">
    <h1>Page rendez-vous</h1>
    <hr />
    <div class="entete-praticien">
        <h2>Bienvenue <?php echo $IdentiteObj->getPrenom() . " " . $IdentiteObj->getNom(); ?></h2>
        <form class="form--input-container" action="" method="POST">
            <div class="date">
                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br />
                <button type="submit" name="submit">Afficher les rendez-vous</button>
            </div>
    </div>
    <div class="affichage-liste-rdv">

        <table class="table">
            <tr>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date</th>
                <th>Type de consultation</th>
                <th>Tarif</th>
                <th>Statut</th>
                <th>Annuler ?</th>
            </tr>
            <?php
            foreach ($rdvs as $rdv) {
                // La fonction substr prend trois arguments : la chaîne de caractères d'origine, 
                //la position de départ et le nb de caractère à extraire (on ne veut que la date, pas l'heure pour le filtre)
                if (($dateSelect == substr($rdv->getDateRdv(), 0, 10) && $rdv->getStatut() == "maintenu")) {
                    echo "<tr>" .
                        "<td>" . $rdv->getPat()->getIdentite()->getNom() . "</td>" .
                        "<td>" . $rdv->getPat()->getIdentite()->getPrenom() . "</td>" .
                        "<td>" . $rdv->getDateRdv() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getType() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getTarif() . "€</td>" .
                        "<td>" . $rdv->getStatut() . "</td>" .
                        "<td>
                            <form method='post'>
                                <input type='hidden' name='id' value=" . $rdv->getId() . ">
                                <button type='submit' name='suppr'>X</button>
                            </form>
                        </td>" .
                        "</tr>";
                }
            }
            ?>
            </tr>
        </table>
        <h3>Nouvelles notifications : </h3>
        <table class="table">
            <tr>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date</th>
                <th>Type de consultation</th>
                <th>Tarif</th>
                <th>Statut</th>
                <th>Accepter annulation ?</th>
            </tr>
            <?php
            foreach ($rdvs as $rdv) {
                if ($rdv->getStatut() == "demande d'annulation") {
                    echo "<tr>" .
                        "<td>" . $rdv->getPat()->getIdentite()->getNom() . "</td>" .
                        "<td>" . $rdv->getPat()->getIdentite()->getPrenom() . "</td>" .
                        "<td>" . $rdv->getDateRdv() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getType() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getTarif() . "€</td>" .
                        "<td>" . $rdv->getStatut() . "</td>" .
                        "<td>
                            <form method='post'>
                                <input type='hidden' name='id' value=" . $rdv->getId() . ">
                                <button type='submit' name='annuler'>Oui</button>
                                <input type='hidden' name='id' value=" . $rdv->getId() . ">
                                <button type='submit' name='maintenir'>Non</button>
                            </form>
                        </td>" .
                        "</tr>";
                }
            }
            ?>
            </tr>
        </table>

        <h3>Des patients n'ont pas encore lus leurs notifications d'annulation : </h3>
        <table class="table">
            <tr>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date</th>
                <th>Type de consultation</th>
                <th>Tarif</th>
                <th>Statut</th>
            </tr>
            <?php
            foreach ($rdvs as $rdv) {
                if ($rdv->getStatut() == "annulé") {
                    echo "<tr>" .
                        "<td>" . $rdv->getPat()->getIdentite()->getNom() . "</td>" .
                        "<td>" . $rdv->getPat()->getIdentite()->getPrenom() . "</td>" .
                        "<td>" . $rdv->getDateRdv() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getType() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getTarif() . "€</td>" .
                        "<td>" . $rdv->getStatut() . "</td>" .
                        "</tr>";
                }
            }
            ?>
            </tr>
        </table>
    </div>
    </form>
</div>
<div class="container rdv">
    <h1>Page rendez-vous</h1>
    <hr />
    <div class="entete-patient">
        <h2>Bienvenue <?php echo $IdentiteObj->getPrenom() . " " . $IdentiteObj->getNom(); ?></h2>
        <?php echo $ProfilAdresse; ?>
    </div>
    <div class="affichage-liste-rdv">

        <table class="table">
            <tr>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Spécialité</th>
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
                if ($rdv->getStatut() !== "annulé") {
                    echo "<tr>" .
                        "<td>" . $rdv->getPrat()->getIdentite()->getNom() . "</td>" .
                        "<td>" . $rdv->getPrat()->getIdentite()->getPrenom() . "</td>" .
                        "<td>" . $rdv->getPrat()->getSpecialiste() . "</td>" .
                        "<td>" . $rdv->getDateRdv() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getType() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getTarif() . "€</td>" .
                        "<td>" . $rdv->getStatut() . "</td>" .
                        "<td>
                            <form method='post'>
                                <input type='hidden' name='id' value=" . $rdv->getId() . ">
                                <button type='submit' name='demande_annulation'>X</button>
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
                <th>Spécialité</th>
                <th>Date</th>
                <th>Type de consultation</th>
                <th>Tarif</th>
                <th>Statut</th>
                <th>Lu ?</th>
            </tr>
            <?php
            foreach ($rdvs as $rdv) {
                if ($rdv->getStatut() == "annulé") {
                    echo "<tr>" .
                        "<td>" . $rdv->getPrat()->getIdentite()->getNom() . "</td>" .
                        "<td>" . $rdv->getPrat()->getIdentite()->getPrenom() . "</td>" .
                        "<td>" . $rdv->getPrat()->getSpecialiste() . "</td>" .
                        "<td>" . $rdv->getDateRdv() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getType() . "</td>" .
                        "<td>" . $rdv->getConsultation()->getTarif() . "€</td>" .
                        "<td>" . $rdv->getStatut() . "</td>" .
                        "<td>
                            <form method='post'>
                                <input type='hidden' name='id' value=" . $rdv->getId() . ">
                                <button type='submit' name='suppr'>Oui</button>
                            </form>
                        </td>" .
                        "</tr>";
                }
            }
            ?>
            </tr>
        </table>


    </div>
</div>
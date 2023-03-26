<?php

namespace DAO\Rdv {

    use DB\Connexion\Connexion;

    class RdvDAO extends \DAO\DAO
    {


        function __construct()
        {
            parent::__construct("id_rdv ", "rdv");
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (heure_debut, id_praticien, id_patient) 
            VALUES (:heure_debut, :id_praticien, :id_patient)";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $heure_debut = $objet->getHDebut();
            $id_praticien = $objet->getPrat();
            $id_patient = $objet->getPat();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':heure_debut', $heure_debut);
            $stmt->bindParam(':id_praticien', $id_praticien);
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
            $objet->setId(parent::getLastKey());
        }

        public function read($id)
        {
            // On utilise le prepared statemet qui simplifie les typages
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $id_rdv = $row["id_rdv"];
            $heure_debut = $row["heure_debut"];
            $id_praticien  = $row["id_praticien"];
            $id_patient  = $row["id_patient"];
            $daoPrat = new \DAO\Praticien\PraticienDAO(); // A voir la nomen d'Ana
            $idPrat = $daoPrat->read($id_praticien);
            $daoPat = new \DAO\Patient\PatientDAO(); // A voir la nomen d'Ana
            $idPat = $daoPat->read($id_patient);
            $rep = new \Promed\Rdv\Rdv($heure_debut, $idPrat, $idPat);
            $rep->setId($id_rdv);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET heure_debut = :heure_debut, id_praticien = :id_praticien, id_patient = :id_patient  WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $heure_debut = $objet->getHDebut();
            $id_praticien = $objet->getPrat();
            $id_patient = $objet->getPat();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':heure_debut', $heure_debut);
            $stmt->bindParam(':id_praticien', $id_praticien);
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->execute();
        }

        public function delete($objet)
        {
            $sql = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE $this->key=:id; 
        SET FOREIGN_KEY_CHECKS=1";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        static function getRdvs()
        {
            $sql = "SELECT * FROM rdv";
            $rep = "<table class=\"table table-striped\">";
            $rows = Connexion::getInstance()->query($sql);
            foreach ($rows as $row) {
                $rep .= "<tr><td>" . $row["id_rdv"];
                $rep .= "</td><td>" . $row["heure_debut"];
                $rep .= "</td><td>" . $row["id_praticien"];
                $rep .= "</td><td>" . $row["id_patient"] . "</td></tr>";
            }
            return $rep . "</table>";
        }
    }
}

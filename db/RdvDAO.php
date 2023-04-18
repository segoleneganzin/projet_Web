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
            $sql = "INSERT INTO $this->table (date_rdv, id_praticien, id_patient, id_consultation, statut)
            VALUES (:date_rdv, :id_praticien, :id_patient, :id_consultation, :statut)";
            $stmt = Connexion::getInstance()->prepare($sql);
            $date_rdv = $objet->getDateRdv();
            $id_praticien = $objet->getPrat();
            $id_patient = $objet->getPat();
            $id_consultation = $objet->getConsultation();
            $statut = $objet->getStatut();
            $stmt->bindParam(':date_rdv', $date_rdv);
            $stmt->bindParam(':id_praticien', $id_praticien);
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->bindParam(':id_consultation', $id_consultation);
            $stmt->bindParam(':statut', $statut);
            $stmt->execute();
            $objet->setId(parent::getLastKey());
        }

        public function read($id)
        {
            // On utilise le prepared statement qui simplifie les typages
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $id_rdv = $row["id_rdv"];
            $date_rdv = $row["date_rdv"];
            $id_praticien  = $row["id_praticien"];
            $id_patient  = $row["id_patient"];
            $id_consultation  = $row["id_consultation"];
            $statut = $row["statut"];
            $daoPrat = new \DAO\Praticien\PraticienDAO();
            $praticien = $daoPrat->read($id_praticien);
            $daoPat = new \DAO\Patient\PatientDAO();
            $patient = $daoPat->read($id_patient);
            $daoConsult = new \DAO\Consultation\ConsultationDAO();
            $consultation = $daoConsult->read($id_consultation);
            $rep = new \Promed\Rdv\Rdv($date_rdv, $praticien, $patient, $consultation, $statut);
            $rep->setId($id_rdv);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET date_rdv = :date_rdv, id_praticien = :id_praticien, 
            id_patient = :id_patient, id_consultation = :id_consultation, statut = :statut WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $date_rdv = $objet->getDateRdv();
            $id_praticien = $objet->getPrat()->getId();
            $id_patient = $objet->getPat()->getId();
            $id_consultation = $objet->getConsultation()->getId();
            $statut = $objet->getStatut();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':date_rdv', $date_rdv);
            $stmt->bindParam(':id_praticien', $id_praticien);
            $stmt->bindParam(':id_patient', $id_patient);
            $stmt->bindParam(':id_consultation', $id_consultation);
            $stmt->bindParam(':statut', $statut);
            $stmt->execute();
        }

        public function delete($id)
        {
            $sql = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE $this->key=:id; SET FOREIGN_KEY_CHECKS=1";
            $stmt = Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function readAllRdv()
        {
            $sql = "SELECT * FROM $this->table";
            $stmt = Connexion::getInstance()->prepare($sql);
            $stmt->execute();

            $resultat = array();
            while ($row = $stmt->fetch()) {
                $id_rdv = $row["id_rdv"];
                $date_rdv = $row["date_rdv"];
                $id_praticien  = $row["id_praticien"];
                $id_patient  = $row["id_patient"];
                $id_consultation  = $row["id_consultation"];
                $statut  = $row["statut"];
                $daoPrat = new \DAO\Praticien\PraticienDAO();
                $praticien = $daoPrat->read($id_praticien);
                $daoPat = new \DAO\Patient\PatientDAO();
                $patient = $daoPat->read($id_patient);
                $daoConsult = new \DAO\Consultation\ConsultationDAO();
                $consultation = $daoConsult->read($id_consultation);
                $rep = new \Promed\Rdv\Rdv($date_rdv, $praticien, $patient, $consultation, $statut);
                $rep->setId($id_rdv);
                $resultat[] = $rep;
            }
            return $resultat;
        }
    }
}

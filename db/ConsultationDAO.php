<?php

namespace DAO\Consultation {

    // require("DAO.php");

    use DB\Connexion\Connexion;

    class ConsultationDAO extends \DAO\DAO
    {


        function __construct()
        {
            parent::__construct("id_consultation", "consultation");
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (type, duree, tarif, id_rdv) 
            VALUES (:type, :duree, :tarif, :id_rdv)";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $type = $objet->getType();
            $duree = $objet->getDuree();
            $tarif = $objet->getTarif();
            $id_rdv = $objet->getIdRdv();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':tarif', $tarif);
            $stmt->bindParam(':id_rdv', $id_rdv);
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
            $id_consultation = $row["id_consultation"];
            $type = $row["type"];
            $duree = $row["duree"];
            $tarif = $row["tarif"];
            $id_rdv = $row["id_rdv"];
            $daoRdv = new \DAO\Rdv\RdvDAO();
            $rdv = $daoRdv->read($id_rdv);
            $rep = new \Promed\Consulation\Consulation($type, $duree, $tarif, $rdv);
            $rep->setId($id_consultation);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET type = :type, duree = :duree, tarif = :tarif, id_rdv = :id_rdv  WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $type = $objet->getType();
            $duree = $objet->getDuree();
            $tarif = $objet->getTarif();
            $id_rdv = $objet->getIdRdv();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':duree', $duree);
            $stmt->bindParam(':tarif', $tarif);
            $stmt->bindParam(':id_rdv', $id_rdv);
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

        static function getConsultations()
        {
            $sql = "SELECT * FROM Consultation";
            $rep = "<table class=\"table table-striped\">";
            $rows = Connexion::getInstance()->query($sql);
            foreach ($rows as $row) {
                $rep .= "<tr><td>" . $row["id_consultation"];
                $rep .= "</td><td>" . $row["type"];
                $rep .= "</td><td>" . $row["duree"];
                $rep .= "</td><td>" . $row["tarif"];
                $rep .= "</td><td>" . $row["id_rdv"] . "</td></tr>";
            }
            return $rep . "</table>";
        }
    }
}

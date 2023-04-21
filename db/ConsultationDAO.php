<?php

namespace DAO\Consultation {

    class ConsultationDAO extends \DAO\DAO
    {
        function __construct()
        {
            parent::__construct("id_consultation", "consultation");
        }

        public function create($objet)
        {
            try {
                $sql = "INSERT INTO $this->table (type, duree, tarif) 
            VALUES (:type, :duree, :tarif)";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $type = $objet->getType();
                $duree = $objet->getDuree();
                $tarif = $objet->getTarif();
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':duree', $duree);
                $stmt->bindParam(':tarif', $tarif);
                $stmt->execute();
                $objet->setId(parent::getLastKey());
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
        }

        public function read($id)
        {
            try {
                // On utilise le prepared statement qui simplifie les typages
                $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $row = $stmt->fetch();
                $id_consultation = $row["id_consultation"];
                $type = $row["type"];
                $duree = $row["duree"];
                $tarif = $row["tarif"];
                $rep = new \Promed\Consultation\Consultation($type, $duree, $tarif);
                $rep->setId($id_consultation);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }

        public function update($objet)
        {
            try {
                $sql = "UPDATE $this->table SET type = :type, duree = :duree, tarif = :tarif 
            WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $id = $objet->getId();
                $type = $objet->getType();
                $duree = $objet->getDuree();
                $tarif = $objet->getTarif();
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':duree', $duree);
                $stmt->bindParam(':tarif', $tarif);
                $stmt->execute();
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
        }

        public function delete($objet)
        {
            try {
                $sql = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE $this->key=:id; 
        SET FOREIGN_KEY_CHECKS=1";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $id = $objet->getId();
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
        }

        public function readAllConsultation()
        {
            try {
                // On utilise le prepared statement qui simplifie les typages
                $sql = "SELECT * FROM $this->table";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $stmt->execute();
                $resultat = array();
                while ($row = $stmt->fetch()) {
                    $id_consultation = $row["id_consultation"];
                    $type = $row["type"];
                    $duree = $row["duree"];
                    $tarif = $row["tarif"];
                    $rep = new \Promed\Consultation\Consultation($type, $duree, $tarif);
                    $rep->setId($id_consultation);
                    $resultat[] = $rep;
                }
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $resultat;
        }
    }
}

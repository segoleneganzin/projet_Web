<?php

namespace DAO\Patient {

    class PatientDAO extends \DAO\DAO
    {
        function __construct()
        {
            parent::__construct("id_patient", "patient");
        }

        public function create($objet)
        {
            try {
                $sql = "INSERT INTO $this->table (date_de_naissance, id_identite) 
            VALUES (:date_de_naissance, :id_identite)";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $date_de_naissance = $objet->getDateDeNaissance();
                $id_identite = $objet->getIdentite();
                $stmt->bindParam(':date_de_naissance', $date_de_naissance);
                $stmt->bindParam(':id_identite', $id_identite);
                $stmt->execute();
                $objet->setId(parent::getLastKey());
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
        }

        public function read($id)
        {
            try {
                $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $row = $stmt->fetch();
                $id_patient = $row["id_patient"];
                $date_de_naissance = $row["date_de_naissance"];
                $id_identite = $row["id_identite"];
                $daoIdentite = new \DAO\Identite\IdentiteDAO();
                $identite = $daoIdentite->read($id_identite);
                $rep = new \Promed\Patient\Patient($date_de_naissance, $identite);
                $rep->setId($id_patient);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }

        public function update($objet)
        {
            try {
                $sql = "UPDATE $this->table SET date_de_naissance = :date_de_naissance, id_identite = :id_identite  WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $id = $objet->getId();
                $date_de_naissance = $objet->getDateDeNaissance();
                $id_identite = $objet->getIdentite()->getId();
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':date_de_naissance', $date_de_naissance);
                $stmt->bindParam(':id_identite', $id_identite);
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

        public function readByIdIdentite($idIdentite)
        {
            try {
                // On utilise le prepared statement qui simplifie les typages
                $sql = "SELECT * FROM $this->table WHERE id_identite=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $stmt->bindParam(':id', $idIdentite);
                $stmt->execute();

                $row = $stmt->fetch();
                $id_patient = $row["id_patient"];
                $date_de_naissance = $row["date_de_naissance"];
                $id_identite = $row["id_identite"];
                $daoIdentite = new \DAO\Identite\IdentiteDAO();
                $identite = $daoIdentite->read($id_identite);
                $rep = new \Promed\Patient\Patient($date_de_naissance, $identite);
                $rep->setId($id_patient);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }
    }
}

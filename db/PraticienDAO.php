<?php

namespace DAO\Praticien {

    class PraticienDAO extends \DAO\DAO
    {
        function __construct()
        {
            parent::__construct("id_praticien", "praticien");
        }

        public function create($objet)
        {
            try {
                $sql = "INSERT INTO $this->table (specialiste, description, id_identite) 
            VALUES (:specialiste, :description, :id_identite)";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $specialiste = $objet->getSpecialiste();
                $description = $objet->getDescription();
                $id_identite = $objet->getIdentite();
                $stmt->bindParam(':specialiste', $specialiste);
                $stmt->bindParam(':description', $description);
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
                // On utilise le prepared statement qui simplifie les typages
                $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                $row = $stmt->fetch();
                $id_praticien = $row["id_praticien"];
                $specialiste = $row["specialiste"];
                $description = $row["description"];
                $id_identite = $row["id_identite"];
                $daoIdentite = new \DAO\Identite\IdentiteDAO();
                $identite = $daoIdentite->read($id_identite);
                $rep = new \Promed\Praticien\Praticien($specialiste, $description, $identite);
                $rep->setId($id_praticien);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }

        public function update($objet)
        {
            try {
                $sql = "UPDATE $this->table SET specialiste = :specialiste, description = :description, id_identite = :id_identite  WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $id = $objet->getId();
                $specialiste = $objet->getSpecialiste();
                $description = $objet->getDescription();
                $id_identite = $objet->getIdentite()->getId();
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':specialiste', $specialiste);
                $stmt->bindParam(':description', $description);
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
                $id_praticien = $row["id_praticien"];
                $specialiste = $row["specialiste"];
                $description = $row["description"];
                $id_identite = $row["id_identite"];
                $daoIdentite = new \DAO\Identite\IdentiteDAO();
                $identite = $daoIdentite->read($id_identite);
                $rep = new \Promed\Praticien\Praticien($specialiste, $description, $identite);
                $rep->setId($id_praticien);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }
    }
}

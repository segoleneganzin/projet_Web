<?php

namespace DAO\Praticien {


    use DB\Connexion\Connexion;
    use Promed\Praticien\Praticien;

    class PraticienDAO extends \DAO\DAO
    {


        function __construct()
        {
            parent::__construct("id_praticien", "praticien");
        }

        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (specialiste, description, id_identite) 
            VALUES (:specialiste, :description, :id_identite)";
            $stmt = Connexion::getInstance()->prepare($sql);
            $specialiste = $objet->getSpecialiste();
            $description = $objet->getDescription();
            $id_identite = $objet->getIdentite();
            $stmt->bindParam(':specialiste', $specialiste);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_identite', $id_identite);
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
            $id_praticien = $row["id_praticien"];
            $specialiste = $row["specialiste"];
            $description = $row["description"];
            $id_identite = $row["id_identite"];
            $daoIdentite = new \DAO\Identite\IdentiteDAO();
            $identite = $daoIdentite->read($id_identite);
            $rep = new \Promed\Praticien\Praticien($specialiste, $description, $identite);
            $rep->setId($id_praticien);
            return $rep;
        }

        public function update($objet)
        {
            $sql = "UPDATE $this->table SET specialiste = :specialiste, description = :description, id_identite = :id_identite  WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $specialiste = $objet->getSpecialiste();
            $description = $objet->getDescription();
            $id_identite = $objet->getIdentite()->getId();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':specialiste', $specialiste);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_identite', $id_identite);
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

        public function readByIdIdentite($idIdentite)
        {
            // On utilise le prepared statemet qui simplifie les typages
            $sql = "SELECT * FROM $this->table WHERE id_identite=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
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
            return $rep;
        }
    }
}

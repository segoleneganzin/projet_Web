<?php

namespace DAO\Adresse {

    class AdresseDAO extends \DAO\DAO
    {
        function __construct()
        {
            parent::__construct("id_adresse", "adresse");
        }

        public function create($objet)
        {
            try {
                $sql = "INSERT INTO $this->table (num, rue, cp, ville) 
            VALUES (:num, :rue, :cp, :ville)";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $num = $objet->getNum();
                $rue = $objet->getRue();
                $cp = $objet->getCp();
                $ville = $objet->getVille();
                $stmt->bindParam(':num', $num);
                $stmt->bindParam(':rue', $rue);
                $stmt->bindParam(':cp', $cp);
                $stmt->bindParam(':ville', $ville);
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
                $id_adresse = $row["id_adresse"];
                $num = $row["num"];
                $rue = $row["rue"];
                $cp = $row["cp"];
                $ville = $row["ville"];
                $rep = new \Promed\Adresse\Adresse($num, $rue, $cp, $ville);
                $rep->setId($id_adresse);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }

        public function update($objet)
        {
            try {
                $sql = "UPDATE $this->table SET num = :num, rue = :rue, cp = :cp, ville = :ville WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $id = $objet->getId();
                $num = $objet->getNum();
                $rue = $objet->getRue();
                $cp = $objet->getCp();
                $ville = $objet->getVille();
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':num', $num);
                $stmt->bindParam(':rue', $rue);
                $stmt->bindParam(':cp', $cp);
                $stmt->bindParam(':ville', $ville);
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
    }
}

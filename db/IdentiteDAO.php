<?php

namespace DAO\Identite {
    // require("DAO.php");

    use DB\Connexion\Connexion;
    use Promed\Identite\Identite;

    class IdentiteDAO extends \DAO\DAO
    {

        function __construct()
        {
            parent::__construct("id_identite", "identite");
        }

        public function read($id)
        {
            // On utilise le prepared statemet qui simplifie les typages
            $sql = "SELECT * FROM $this->table WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            $idIdentite = $row["id_identite"];
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $tel = $row["tel"];
            $mail = $row["mail"];
            $mdp = $row["mdp"];
            $role = $row["role"];
            $idAdr = $row["id_adresse"];
            $rep = new \Promed\Identite\Identite($nom, $prenom, $tel, $mail, $mdp, $role, $idAdr);
            $rep->setId($idIdentite);
            return $rep;
        }
        public function update($objet)
        {
            $sql = "UPDATE $this->table SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail,
        mdp = :mdp, role = :role, id_adresse = :idAdr  WHERE $this->key=:id";
            $stmt = Connexion::getInstance()->prepare($sql);
            $id = $objet->getId();
            $nom = $objet->getNom();
            $prenom = $objet->getPrenom();
            $tel = $objet->getTel();
            $mail = $objet->getMail();
            $mdp = $objet->getMdp();
            $role = $objet->getRole();
            $idAdr = $objet->getAdresse();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':idAdr', $idAdr);
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
        public function create($objet)
        {
            $sql = "INSERT INTO $this->table (nom, prenom, tel, mail, mdp, role, id_adresse) 
            VALUES (:nom, :prenom, :tel, :mail, :mdp, :role, :idAdr)";
            $stmt = Connexion::getInstance()->prepare($sql);
            $nom = $objet->getNom();
            $prenom = $objet->getPrenom();
            $tel = $objet->getTel();
            $mail = $objet->getMail();
            $mdp = $objet->getMdp();
            $role = $objet->getRole();
            $idAdr = $objet->getAdresse();
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':idAdr', $idAdr);
            $stmt->execute();
            $objet->setId(parent::getLastKey());
        }

        static function getIdentites()
        {
            $sql = "SELECT * FROM identite";
            $rep = "<table class=\"table table-striped\">";
            $rows = Connexion::getInstance()->query($sql);
            foreach ($rows as $row) {
                $rep .= "<tr><td>" . $row["id_identite"];
                $rep .= "</td><td>" . $row["nom"];
                $rep .= "</td><td>" . $row["prenom"];
                $rep .= "</td><td>" . $row["tel"];
                $rep .= "</td><td>" . $row["mail"];
                $rep .= "</td><td>" . $row["mdp"];
                $rep .= "</td><td>" . $row["role"];
                $rep .= "</td><td>" . $row["idAdr"] . "</td></tr>";
            }
            return $rep . "</table>";
        }
    }
}

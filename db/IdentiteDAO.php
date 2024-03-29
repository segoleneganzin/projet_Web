<?php

namespace DAO\Identite {

    class IdentiteDAO extends \DAO\DAO
    {
        function __construct()
        {
            parent::__construct("id_identite", "identite");
        }

        public function create($objet)
        {
            try {
                $sql = "INSERT INTO $this->table (nom, prenom, tel, mail, mdp, role, id_adresse) 
            VALUES (:nom, :prenom, :tel, :mail, :mdp, :role, :id_adresse)";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $nom = $objet->getNom();
                $prenom = $objet->getPrenom();
                $tel = $objet->getTel();
                $mail = $objet->getMail();
                $mdp = $objet->getMdp();
                $role = $objet->getRole();
                $id_adresse = $objet->getAdresse();
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':tel', $tel);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':mdp', $mdp);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':id_adresse', $id_adresse);
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
                $id_identite = $row["id_identite"];
                $nom = $row["nom"];
                $prenom = $row["prenom"];
                $tel = $row["tel"];
                $mail = $row["mail"];
                $mdp = $row["mdp"];
                $role = $row["role"];
                $id_adresse = $row["id_adresse"];
                $daoAdresse = new \DAO\Adresse\AdresseDAO();
                $adr = $daoAdresse->read($id_adresse);
                $rep = new \Promed\Identite\Identite($nom, $prenom, $tel, $mail, $mdp, $role, $adr);
                $rep->setId($id_identite);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $rep;
        }

        public function update($objet)
        {
            try {
                $sql = "UPDATE $this->table SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail,
        mdp = :mdp, role = :role, id_adresse = :id_adresse  WHERE $this->key=:id";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $id = $objet->getId();
                $nom = $objet->getNom();
                $prenom = $objet->getPrenom();
                $tel = $objet->getTel();
                $mail = $objet->getMail();
                $mdp = $objet->getMdp();
                $role = $objet->getRole();
                $id_adresse = $objet->getAdresse()->getId();
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':tel', $tel);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':mdp', $mdp);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':id_adresse', $id_adresse);
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

        public function readAllPatients()
        {
            try {
                $sql = "SELECT * FROM $this->table WHERE role = 'patient' ";
                $stmt = \DB\Connexion\Connexion::getInstance()->prepare($sql);
                $stmt->execute();

                $resultat = array();
                while ($row = $stmt->fetch()) {
                    $id_identite = $row["id_identite"];
                    $nom = $row["nom"];
                    $prenom = $row["prenom"];
                    $tel = $row["tel"];
                    $mail = $row["mail"];
                    $mdp = $row["mdp"]; // à simplifier en fonction des besoins !!
                    $role = $row["role"];
                    $id_adresse = $row["id_adresse"];
                    $daoAdresse = new \DAO\Adresse\AdresseDAO();
                    $adr = $daoAdresse->read($id_adresse);
                    $rep = new \Promed\Identite\Identite($nom, $prenom, $tel, $mail, $mdp, $role, $adr);
                    $rep->setId($id_identite);
                    $resultat[] = $rep;
                }
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $resultat;
        }

        static function getUtilisateurByMailU($mail)
        {
            try {
                $cnx = \DB\Connexion\Connexion::getInstance();
                $req = $cnx->prepare("SELECT * FROM identite WHERE mail=:mail");
                $req->bindValue(':mail', $mail, \PDO::PARAM_STR);
                $req->execute();

                $resultat = $req->fetch(\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                die("Erreur !: " . $e->getMessage());
            }
            return $resultat;
        }
    }
}

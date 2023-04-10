<?php

namespace Promed\Identite {

    class Identite
    {

        private $idIdentite = 0;
        private $nom = "";
        private $prenom = "";
        private $tel = "";
        private $mail = "";
        private $mdp = "";
        private $role = "";
        private $adresse;

        function __construct($nom, $prenom, $tel, $mail, $mdp, $role, $adresse)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->tel = $tel;
            $this->mail = $mail;
            $this->mdp = $mdp;
            $this->role = $role;
            $this->adresse = $adresse;
        }

        // function __construct($idIdentite, $nom, $prenom, $tel, $mail, $mdp, $role, $adresse) {
        //     $this->idIdentite = $idIdentite;
        //     $this->nom = $nom;
        //     $this->prenom = $prenom;
        //     $this->tel = $tel;
        //     $this->mail = $mail;
        //     $this->mdp = $mdp;
        //     $this->role = $role;
        //     $this->adresse = $adresse;
        // }

        public function getId()
        {
            return $this->idIdentite;
        }
        public function getNom()
        {
            return $this->nom;
        }
        public function getPrenom()
        {
            return $this->prenom;
        }
        public function getTel()
        {
            return $this->tel;
        }
        public function getMail()
        {
            return $this->mail;
        }
        public function getMdp()
        {
            return $this->mdp;
        }
        public function getRole()
        {
            return $this->role;
        }
        public function getAdresse()
        {
            return $this->adresse;
        }
        public function setId($idIdentite)
        {
            $this->idIdentite = $idIdentite;
            return $this;
        }
        public function setNom($nom)
        {
            $this->nom = $nom;
            return $this;
        }
        public function setPrenom($prenom)
        {
            $this->prenom = $prenom;
            return $this;
        }
        public function setTel($tel)
        {
            $this->tel = $tel;
            return $this;
        }
        public function setMail($mail)
        {
            $this->mail = $mail;
            return $this;
        }
        public function setMdp($mdp)
        {
            $this->mdp = $mdp;
            return $this;
        }
        public function setRole($role)
        {
            $this->role = $role;
            return $this;
        }
        public function setAdresse($adresse)
        {
            $this->adresse = $adresse;
            return $this;
        }

        function __toString()
        {
            $rep = "<div class=\"infosIdentite\">id : [$this->idIdentite] nom : [$this->nom] prenom : [$this->prenom] tel : [$this->tel] mail : [$this->mail] mdp : [$this->mdp] role : [$this->role] adresse : [$this->adresse]</div>";
            return $rep;
        }
    }
}

<?php

namespace Promed\Praticien {

    use DAO\Rdv\RdvDAO;

    //require RACINE. "./db/RdvDAO.php";

    class Praticien
    {

        private $id_praticien = 0;
        private $specialiste = "";
        private $description = "";
        private $identite;

        function __construct($specialiste, $description, $identite)
        {
            $this->specialiste = $specialiste;
            $this->description = $description;
            $this->identite = $identite;
        }

        public function getId()
        {
            return $this->id_praticien;
        }
        public function getSpecialiste()
        {
            return $this->specialiste;
        }
        public function getDescription()
        {
            return $this->description;
        }
        public function getIdentite()
        {
            return $this->identite;
        }
        public function setId($id_praticien)
        {
            $this->id_praticien = $id_praticien;
            return $this;
        }
        public function setSpecialiste($specialiste)
        {
            $this->specialiste = $specialiste;
            return $this;
        }
        public function setDescription($description)
        {
            $this->description = $description;
            return $this;
        }
        public function setIdentite($identite)
        {
            $this->identite = $identite;
            return $this;
        }

        static function getRdvPraticien($id)
        {
            $rdvDAO = new \DAO\Rdv\RdvDAO();
            $rdvs = $rdvDAO->readAllRdv();
            $rep = [];
            foreach ($rdvs as $rdv) {
                if ($rdv->getPrat()->getId() === $id) {
                    $rep[] = $rdv;
                }
            }
            return $rep;
        }

        static function rdvExisteDeja($dateRdvSql, $id_praticien)
        {
            $rep = false;
            $rdvDAO = new \DAO\Rdv\RdvDAO();
            $rdvs = $rdvDAO->readAllRdv();
            foreach ($rdvs as $rdv) {
                if ($rdv->getDateRdv() === $dateRdvSql && $rdv->getPrat()->getId() === $id_praticien) {
                    $rep = true;
                }
            }
            return $rep;
        }

        function __toString()
        {
            $rep = "<div class=\"infosPraticien\">id : [$this->id_praticien] specialiste : [$this->specialiste] description : [$this->description] identite : </div>[$this->identite]";
            return $rep;
        }
    }
}

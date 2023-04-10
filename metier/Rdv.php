<?php

namespace Promed\Rdv {

    class Rdv
    {

        private $id_rdv  = 0;
        private $heure_debut = "";
        private $praticien;
        private $patient;

        function __construct($heure_debut, $praticien, $patient)
        {
            $this->heure_debut = $heure_debut;
            $this->praticien = $praticien;
            $this->patient = $patient;
        }

        public function getId()
        {
            return $this->id_rdv;
        }
        public function getHDebut()
        {
            return $this->heure_debut;
        }
        public function getPrat()
        {
            return $this->praticien;
        }
        public function getPat()
        {
            return $this->patient;
        }

        public function setId($id_rdv)
        {
            $this->id_rdv = $id_rdv;
            return $this;
        }
        public function setHDebut($heure_debut)
        {
            $this->heure_debut = $heure_debut;
            return $this;
        }
        public function setPrat($praticien)
        {
            $this->praticien = $praticien;
            return $this;
        }
        public function setPat($patient)
        {
            $this->patient = $patient;
            return $this;
        }


        function __toString()
        {
            $rep = "<div class=\"infosIdentite\">id : [$this->id_rdv] heure_debut : [$this->heure_debut] id_praticien : [$this->praticien] id_patient : [$this->patient]";
            return $rep;
        }
    }
}

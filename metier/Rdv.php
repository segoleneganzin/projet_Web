<?php

namespace Promed\Rdv {

    class Rdv
    {

        private $id_rdv  = 0;
        private $heure_debut = "";
        private $id_praticien  = "";
        private $id_patient  = 0;

        function __construct($heure_debut, $id_praticien, $id_patient)
        {
            $this->heure_debut = $heure_debut;
            $this->id_praticien = $id_praticien;
            $this->id_patient = $id_patient;
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
            return $this->id_praticien;
        }
        public function getPat()
        {
            return $this->id_patient;
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
        public function setPrat($id_praticien)
        {
            $this->id_praticien = $id_praticien;
            return $this;
        }
        public function setPat($id_patient)
        {
            $this->id_patient = $id_patient;
            return $this;
        }


        function __toString()
        {
            $rep = "<div class=\"infosIdentite\">id : [$this->id_rdv] heure_debut : [$this->heure_debut] id_praticien : [$this->id_praticien] id_patient : [$this->id_patient]";
            return $rep;
        }
    }
}

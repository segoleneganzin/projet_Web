<?php

namespace Promed\Rdv {

    class Rdv
    {

        private $id_rdv  = 0;
        private $date_rdv;
        private $praticien;
        private $patient;
        private $consultation;
        private $statut = "maintenu";

        function __construct($date_rdv, $praticien, $patient, $consultation, $statut)
        {
            $this->date_rdv = $date_rdv;
            $this->praticien = $praticien;
            $this->patient = $patient;
            $this->consultation = $consultation;
            $this->statut = $statut;
        }

        public function getId()
        {
            return $this->id_rdv;
        }
        public function getDateRdv()
        {
            return $this->date_rdv;
        }
        public function getPrat()
        {
            return $this->praticien;
        }
        public function getPat()
        {
            return $this->patient;
        }
        public function getConsultation()
        {
            return $this->consultation;
        }
        public function getStatut()
        {
            return $this->statut;
        }

        public function setId($id_rdv)
        {
            $this->id_rdv = $id_rdv;
            return $this;
        }
        public function setDateRdv($date_rdv)
        {
            $this->date_rdv = $date_rdv;
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
        public function setConsultation($consultation)
        {
            $this->consultation = $consultation;
            return $this;
        }
        public function setStatut($statut)
        {
            $this->statut = $statut;
            return $this;
        }


        function __toString()
        {
            $rep = "<div class=\"infosIdentite\">id : [$this->id_rdv] date_rdv : [$this->date_rdv] 
            id_praticien : [$this->praticien] id_patient : [$this->patient] 
            id_consultation : [$this->consultation] statut : [$this->statut]";
            return $rep;
        }
    }
}

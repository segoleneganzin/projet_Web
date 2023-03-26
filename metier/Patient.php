<?php

namespace Promed\Patient {

    class Patient
    {

        private $id_patient = 0;
        private $date_de_naissance = "";
        private $identite;

        function __construct($date_de_naissance, $identite)
        {
            $this->date_de_naissance = $date_de_naissance;
            $this->identite = $identite;
        }

        public function getId()
        {
            return $this->id_patient;
        }
        public function getDateDeNaissance()
        {
            return $this->date_de_naissance;
        }
        public function getIdentite()
        {
            return $this->identite;
        }
        public function setId($id_patient)
        {
            $this->id_patient = $id_patient;
            return $this;
        }
        public function setDateDeNaissance($date_de_naissance)
        {
            $this->date_de_naissance = $date_de_naissance;
            return $this;
        }
        public function setIdentite($identite)
        {
            $this->identite = $identite;
            return $this;
        }

        function __toString()
        {
            $rep = "<div class=\"infosPatient\">id : [$this->id_patient] date_de_naissance : [$this->date_de_naissance] identite : </div>[$this->identite]";
            return $rep;
        }
    }
}

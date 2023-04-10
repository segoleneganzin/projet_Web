<?php

namespace Promed\Consultation {

    class Consultation
    {

        private $idConsultation = 0;
        private $type = "";
        private $duree = "";
        private $tarif = 0;
        private $rdv;

        function __construct($type, $duree, $tarif, $rdv)
        {
            $this->type = $type;
            $this->duree = $duree;
            $this->tarif = $tarif;
            $this->rdv = $rdv;
        }

        public function getId()
        {
            return $this->idConsultation;
        }
        public function getType()
        {
            return $this->type;
        }
        public function getDuree()
        {
            return $this->duree;
        }
        public function getTarif()
        {
            return $this->tarif;
        }
        public function getRdv()
        {
            return $this->rdv;
        }

        public function setId($idConsultation)
        {
            $this->idConsultation = $idConsultation;
            return $this;
        }
        public function setType($type)
        {
            $this->type = $type;
            return $this;
        }
        public function setDuree($duree)
        {
            $this->duree = $duree;
            return $this;
        }
        public function setTarif($tarif)
        {
            $this->tarif = $tarif;
            return $this;
        }
        public function setRdv($rdv)
        {
            $this->rdv = $rdv;
            return $this;
        }


        function __toString()
        {
            $rep = "<div class=\"infosIdentite\">id : [$this->idConsultation] type : [$this->type] duree : [$this->duree] tarif : [$this->tarif] idRdv : [$this->rdv]";
            return $rep;
        }
    }
}

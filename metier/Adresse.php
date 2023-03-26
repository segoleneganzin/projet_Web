<?php

namespace Promed\Adresse {

    class Adresse
    {

        private $id_adresse = 0;
        private $num = 0;
        private $rue = "";
        private $cp = 0;
        private $ville = "";


        function __construct($num, $rue, $cp, $ville)
        {
            $this->num = $num;
            $this->rue = $rue;
            $this->cp = $cp;
            $this->ville = $ville;
        }

        public function getId()
        {
            return $this->id_adresse;
        }
        public function getNum()
        {
            return $this->num;
        }
        public function getRue()
        {
            return $this->rue;
        }
        public function getCp()
        {
            return $this->cp;
        }
        public function getVille()
        {
            return $this->ville;
        }

        public function setId($id_adresse)
        {
            $this->id_adresse = $id_adresse;
            return $this;
        }
        public function setNum($num)
        {
            $this->num = $num;
            return $this;
        }
        public function setRue($rue)
        {
            $this->rue = $rue;
            return $this;
        }
        public function setCp($cp)
        {
            $this->cp = $cp;
            return $this;
        }
        public function setVille($ville)
        {
            $this->ville = $ville;
            return $this;
        }


        function __toString()
        {
            $rep = "<div class=\"infosAdresse\">id : [$this->id_adresse] num : [$this->num] rue : [$this->rue] cp : [$this->cp] ville : [$this->ville] </div>";
            return $rep;
        }
    }
}

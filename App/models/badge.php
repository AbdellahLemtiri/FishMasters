<?php

    class Badge{
        private $id_badge;
        private $titre_badge;
        private $icon_badge;

        public function __get($property){
            if(property_exists($this, $property))
                return $this->$property;
            return null;
        }

        public function __set($property, $value){
            if(property_exists($this, $property)){
                $this->$property = match ($property) {
                     'titre_badge'=> trim($value),
                     'icon_badge'=> trim($value),
                };
            }
        }
    }
?>
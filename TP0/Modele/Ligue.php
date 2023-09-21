<?php
class Ligue {
    private $ID_ligue;
    private $Region;

    public function __construct($ID_ligue, $Region) {
        $this->ID_ligue = $ID_ligue;
        $this->Region = $Region;
    }

    public function getIDLigue() {
        return $this->ID_ligue;
    }

    public function setIDLigue($ID_ligue) {
        $this->ID_ligue = $ID_ligue;
    }

    public function getRegion() {
        return $this->Region;
    }

    public function setRegion($Region) {
        $this->Region = $Region;
    }
}

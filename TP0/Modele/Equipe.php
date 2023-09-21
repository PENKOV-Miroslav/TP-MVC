<?php
class Equipe {
    private $ID_equipe;
    private $Nom;
    private $President;
    private $ID_ligue;

    public function __construct($ID_equipe, $Nom, $President, $ID_ligue) {
        $this->ID_equipe = $ID_equipe;
        $this->Nom = $Nom;
        $this->President = $President;
        $this->ID_ligue = $ID_ligue;
    }

    public function getIDEquipe() {
        return $this->ID_equipe;
    }

    public function setIDEquipe($ID_equipe) {
        $this->ID_equipe = $ID_equipe;
    }

    public function getNom() {
        return $this->Nom;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

    public function getPresident() {
        return $this->President;
    }

    public function setPresident($President) {
        $this->President = $President;
    }

    public function getIDLigue() {
        return $this->ID_ligue;
    }

    public function setIDLigue($ID_ligue) {
        $this->ID_ligue = $ID_ligue;
    }
}

<?php
class Membre {
    private $ID_joueur;
    private $ID_equipe;

    public function __construct($ID_joueur, $ID_equipe) {
        $this->ID_joueur = $ID_joueur;
        $this->ID_equipe = $ID_equipe;
    }

    public function getIDJoueur() {
        return $this->ID_joueur;
    }

    public function setIDJoueur($ID_joueur) {
        $this->ID_joueur = $ID_joueur;
    }

    public function getIDEquipe() {
        return $this->ID_equipe;
    }

    public function setIDEquipe($ID_equipe) {
        $this->ID_equipe = $ID_equipe;
    }
}

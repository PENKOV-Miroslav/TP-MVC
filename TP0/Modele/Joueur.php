<?php
class Joueur {
    private $ID_joueur;
    private $Nom;
    private $Prenom;
    private $DateNaissance;

    public function __construct($ID_joueur, $Nom, $Prenom, $DateNaissance) {
        $this->ID_joueur = $ID_joueur;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->DateNaissance = $DateNaissance;
    }

    public function getIDJoueur() {
        return $this->ID_joueur;
    }

    public function setIDJoueur($ID_joueur) {
        $this->ID_joueur = $ID_joueur;
    }

    public function getNom() {
        return $this->Nom;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

    public function getPrenom() {
        return $this->Prenom;
    }

    public function setPrenom($Prenom) {
        $this->Prenom = $Prenom;
    }

    public function getDateNaissance() {
        return $this->DateNaissance;
    }

    public function setDateNaissance($DateNaissance) {
        $this->DateNaissance = $DateNaissance;
    }
}
